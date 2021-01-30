<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Contact_Us\CreateRequest;
use App\Http\Requests\Setting\Contact_Us\EditRequest;
use App\Http\Resources\Setting\ContactUsResource;
use App\Repositories\Setting\ContactUsRepository;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private $Contact_usRepository;

    public function __construct(ContactUsRepository $Contact_UsRepository)
    {
        $this->Contact_usRepository = $Contact_UsRepository;
    }

    public function index()
    {
        $datas = $this->Contact_usRepository->Get_All_Data();
        return view('admin.setting.Contact_us.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.setting.Contact_us.create');
    }

    public function store(CreateRequest $request)
    {
        $this->Contact_usRepository->Create_Data($request);
        return redirect('/admin/contact_us/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->Contact_usRepository->Get_One_Data_Translation($id);
        return view('admin.setting.Contact_us.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->Contact_usRepository->Update_Data($request, $id);
        return redirect('/admin/contact_us/index')->with('message', trans('lang.Message_Edit'));
    }

    public function index_api(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['contact_us'=> new ContactUsResource($this->Contact_usRepository->Get_All_Data()->first())], 'message' => trans('lang.Index')], 206);
    }
}
