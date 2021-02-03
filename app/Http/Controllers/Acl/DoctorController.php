<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Doctor\StatusEditRequest;
use App\Http\Resources\Acl\DoctorResource;
use App\Repositories\Acl\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctorRepository;

    public function __construct(DoctorRepository $DoctorRepository)
    {
        $this->doctorRepository = $DoctorRepository;
    }

    public function index()
    {
        $datas= $this->doctorRepository->Get_All_Data();
        return view('admin.acl.doctor.index',compact('datas'));
    }

    public function index_show()
    {
        $datas= $this->doctorRepository->Get_All_Data_Show();
        return view('admin.acl.doctor.index_show',compact('datas'));
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

    public function change_status_show($id)
    {
        $this->doctorRepository->Update_Status_One_Doctor_Show($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function search_name(Request $request)
    {
        change_locale_language($request->language_id);
        $doctor=$this->doctorRepository->Get_List_Data_By_Name($request->title);
        return response(['status' => 1, 'data' => ['doctor'=> DoctorResource::collection($doctor),
            'paginator' => [
                'total_count' => $doctor->Total(),
                'total_pages' => ceil($doctor->Total() / $doctor->PerPage()),
                'current_page' => $doctor->CurrentPage(),
                'limit' => $doctor->PerPage()]], 'message' => trans('lang.Index')], 206);
    }

    public function show(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['doctor'=> new DoctorResource($this->doctorRepository->Get_One_Data($request->doctor_id))], 'message' => trans('lang.Index')], 200);
    }
}