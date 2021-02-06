<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    private $hospitalRepository;
    private $hospital_detailRepository;
    public function __construct(HospitalRepository $HospitalRepository, HospitalDetailRepository $HospitalDetailRepository)
    {
        $this->hospitalRepository = $HospitalRepository;
        $this->hospital_detailRepository = $HospitalDetailRepository;
    }

    public function index()
    {
        $datas = $this->hospitalRepository->Get_All_Data();
        return view('admin.acl.hospital.index', compact('datas'));
    }

    public function index_request()
    {
            $datas = $this->hospitalRepository->Get_All_Data_Request();
            return view('admin.acl.hospital.index_request', compact('datas'));
    }

    public function change_status($id)
    {
        $this->hospitalRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->hospitalRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_status_Request($id)
    {
        $this->hospital_detailRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function search_name(Request $request)
    {
        change_locale_language($request->language_id);
        $hospital = $this->hospitalRepository->Get_List_Data_By_Name($request->title);
        return response(['status' => 1, 'data' => ['hospital' => hospitalResource::collection($hospital),
            'paginator' => [
                'total_count' => $hospital->Total(),
                'total_pages' => ceil($hospital->Total() / $hospital->PerPage()),
                'current_page' => $hospital->CurrentPage(),
                'limit' => $hospital->PerPage()]], 'message' => trans('lang.Index')], 206);
    }

    public function show(Request $request)
    {
        change_locale_language($request->language_id);
        $hospital = $this->hospitalRepository->Get_One_Data($request->hospital_id);
            if ($hospital->hospital && $hospital->hospital->status_request == 1) {
                $this->hospital_detailRepository->Update_View($hospital->hospital->id);
                return response(['status' => 1, 'data' => ['hospital' => new hospitalResource($hospital)], 'message' => trans('lang.Index')], 200);
            }
        return response(['status' => 1, 'data' => ['hospital' => array()], 'message' => trans('lang.Index')], 200);
    }

    public function create()
    {
        return view('admin.acl.hospital.create');
    }

    public function store(CreateRequest $request)
    {
        $this->hospital_detailRepository->Create_Data($request);
        return redirect('/admin')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->hospital_detailRepository->Get_One_Data_Translation($id);
        return view('admin.acl.hospital.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->hospital_detailRepository->Update_Data($request, $id);
        return redirect('/admin')->with('message', trans('lang.Message_Edit'));
    }

    public function show_request($id)
    {
        $data = $this->hospital_detailRepository->Get_One_Data_Translation($id);
        return view('admin.acl.hospital.show',compact('data'));
    }
}