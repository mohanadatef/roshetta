<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;

class ClinicController extends Controller
{
    private $clinicRepository;
    private $clinic_detailRepository;
    public function __construct(ClinicRepository $ClinicRepository, ClinicDetailRepository $ClinicDetailRepository)
    {
        $this->clinicRepository = $ClinicRepository;
        $this->clinic_detailRepository = $ClinicDetailRepository;
    }

    public function index()
    {
        $datas = $this->clinicRepository->Get_All_Data();
        return view('admin.acl.clinic.index', compact('datas'));
    }

    public function index_request()
    {
            $datas = $this->clinicRepository->Get_All_Data_Request();
            return view('admin.acl.clinic.index_request', compact('datas'));
    }

    public function change_status($id)
    {
        $this->clinicRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->clinicRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_status_Request($id)
    {
        $this->clinic_detailRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function search_name(Request $request)
    {
        change_locale_language($request->language_id);
        $clinic = $this->clinicRepository->Get_List_Data_By_Name($request->title);
        return response(['status' => 1, 'data' => ['clinic' => clinicResource::collection($clinic),
            'paginator' => [
                'total_count' => $clinic->Total(),
                'total_pages' => ceil($clinic->Total() / $clinic->PerPage()),
                'current_page' => $clinic->CurrentPage(),
                'limit' => $clinic->PerPage()]], 'message' => trans('lang.Index')], 206);
    }

    public function show(Request $request)
    {
        change_locale_language($request->language_id);
        $clinic = $this->clinicRepository->Get_One_Data($request->clinic_id);
            if ($clinic->clinic && $clinic->clinic->status_request == 1) {
                $this->clinic_detailRepository->Update_View($clinic->clinic->id);
                return response(['status' => 1, 'data' => ['clinic' => new clinicResource($clinic)], 'message' => trans('lang.Index')], 200);
            }
        return response(['status' => 1, 'data' => ['clinic' => array()], 'message' => trans('lang.Index')], 200);
    }

    public function create()
    {
        return view('admin.acl.clinic.create');
    }

    public function store(CreateRequest $request)
    {
        $this->clinic_detailRepository->Create_Data($request);
        return redirect('/admin')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->clinic_detailRepository->Get_One_Data_Translation($id);
        return view('admin.acl.clinic.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->clinic_detailRepository->Update_Data($request, $id);
        return redirect('/admin')->with('message', trans('lang.Message_Edit'));
    }

    public function show_request($id)
    {
        $data = $this->clinic_detailRepository->Get_One_Data_Translation($id);
        return view('admin.acl.clinic.show',compact('data'));
    }
}