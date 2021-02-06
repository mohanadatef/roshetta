<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Vendor\CreateRequest;
use App\Http\Requests\Acl\Vendor\EditRequest;
use App\Http\Requests\Acl\Vendor\StatusEditRequest;
use App\Http\Resources\Acl\VendorResource;
use App\Repositories\Acl\VendorDetailRepository;
use App\Repositories\Acl\vendorVendorRepository;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    private $vendorRepository;
    private $vendor_detailRepository;

    public function __construct(VendorRepository $VendorRepository, VendorDetailRepository $VendorDetailRepository)
    {
        $this->vendorRepository = $VendorRepository;
        $this->vendor_detailRepository = $VendorDetailRepository;
    }

    public function index()
    {
        $datas = $this->vendorRepository->Get_All_Data();
        return view('admin.acl.vendor.index', compact('datas'));
    }

    public function index_request()
    {
        $datas = $this->vendorRepository->Get_All_Data_Request();
        return view('admin.acl.vendor.index_request', compact('datas'));
    }

    public function change_status($id)
    {
        $this->vendorRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->vendorRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_status_Request($id)
    {
        $this->vendor_detailRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function show(Request $request)
    {
        change_locale_language($request->language_id);
        $vendor = $this->vendorRepository->Get_One_Data($request->vendor_id);
            if ($vendor->vendor && $vendor->vendor->status_request == 1) {
                $this->vendor_detailRepository->Update_View($vendor->vendor->id);
                return response(['status' => 1, 'data' => ['vendor' => new vendorResource($vendor)], 'message' => trans('lang.Index')], 200);
            }
        return response(['status' => 1, 'data' => ['vendor' => array()], 'message' => trans('lang.Index')], 200);
    }

    public function create()
    {
        return view('admin.acl.vendor.create');
    }

    public function store(CreateRequest $request)
    {
        $this->vendor_detailRepository->Create_Data($request);
        return redirect('/admin')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->vendor_detailRepository->Get_One_Data_Translation($id);
        return view('admin.acl.vendor.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->vendor_detailRepository->Update_Data($request, $id);
        return redirect('/admin')->with('message', trans('lang.Message_Edit'));
    }

    public function show_request($id)
    {
        $data = $this->vendor_detailRepository->Get_One_Data_Translation($id);
        return view('admin.acl.vendor.show',compact('data'));
    }
}