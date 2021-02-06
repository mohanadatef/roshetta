<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Doctor\CreateRequest;
use App\Http\Requests\Acl\Doctor\EditRequest;
use App\Http\Requests\Acl\Doctor\StatusEditRequest;
use App\Http\Resources\Acl\DoctorResource;
use App\Repositories\Acl\DoctorDetailRepository;
use App\Repositories\Acl\DoctorRepository;
use App\Repositories\Core_Data\ScientificDegreeRepository;
use App\Repositories\Core_Data\SpecialtyRepository;
use App\Repositories\Core_Data\SubSpecialtyRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctorRepository;
    private $doctor_detailRepository;
    private $specialtyRepository;
    private $scientific_degreeRepository;
    private $sub_specialtyRepository;

    public function __construct(DoctorRepository $DoctorRepository, DoctorDetailRepository $DoctorDetailRepository,ScientificDegreeRepository $Scientific_DegreeRepository,
                                SpecialtyRepository $SpecialtyRepository,SubSpecialtyRepository $SubSpecialtyRepository)
    {
        $this->doctorRepository = $DoctorRepository;
        $this->doctor_detailRepository = $DoctorDetailRepository;
        $this->specialtyRepository = $SpecialtyRepository;
        $this->sub_specialtyRepository = $SubSpecialtyRepository;
        $this->scientific_degreeRepository = $Scientific_DegreeRepository;
    }

    public function index()
    {
        $datas = $this->doctorRepository->Get_All_Data();
        return view('admin.acl.doctor.index', compact('datas'));
    }

    public function index_request()
    {
        if (permission_show('doctor-index-request')) {
            $datas = $this->doctorRepository->Get_All_Data_Request();
            return view('admin.acl.doctor.index_request', compact('datas'));
        }
        return view('errors.403');
    }

    public function change_status($id)
    {
        $this->doctorRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->doctorRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_status_Request($id)
    {
        $this->doctor_detailRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function search_name(Request $request)
    {
        change_locale_language($request->language_id);
        $doctor = $this->doctorRepository->Get_List_Data_By_Name($request->title);
        return response(['status' => 1, 'data' => ['doctor' => DoctorResource::collection($doctor),
            'paginator' => [
                'total_count' => $doctor->Total(),
                'total_pages' => ceil($doctor->Total() / $doctor->PerPage()),
                'current_page' => $doctor->CurrentPage(),
                'limit' => $doctor->PerPage()]], 'message' => trans('lang.Index')], 206);
    }

    public function show(Request $request)
    {
        change_locale_language($request->language_id);
        $doctor = $this->doctorRepository->Get_One_Data($request->doctor_id);
            if ($doctor->doctor && $doctor->doctor->status_request == 1) {
                $this->doctor_detailRepository->Update_View($doctor->doctor->id);
                return response(['status' => 1, 'data' => ['doctor' => new DoctorResource($doctor)], 'message' => trans('lang.Index')], 200);
            }
        return response(['status' => 1, 'data' => ['doctor' => array()], 'message' => trans('lang.Index')], 200);
    }

    public function create()
    {
        $specialty=$this->specialtyRepository->Get_List_Data();
        $scientific_degree=$this->scientific_degreeRepository->Get_List_Data();
        return view('admin.acl.doctor.create',compact('scientific_degree','specialty'));
    }

    public function store(CreateRequest $request)
    {
        $this->doctor_detailRepository->Create_Data($request);
        return redirect('/admin')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $specialty=$this->specialtyRepository->Get_List_Data();
        $scientific_degree=$this->scientific_degreeRepository->Get_List_Data();
        $data = $this->doctor_detailRepository->Get_One_Data_Translation($id);
        $sub_specialty=$this->sub_specialtyRepository->Get_List_Data_For_Specialty($data['specialty_id']);
        return view('admin.acl.doctor.edit',compact('data','scientific_degree','sub_specialty','specialty'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->doctor_detailRepository->Update_Data($request, $id);
        return redirect('/admin')->with('message', trans('lang.Message_Edit'));
    }

    public function show_request($id)
    {
        $data = $this->doctor_detailRepository->Get_One_Data_Translation($id);
        return view('admin.acl.doctor.show',compact('data'));
    }
}