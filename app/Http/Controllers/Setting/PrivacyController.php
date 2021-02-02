<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Privacy\CreateRequest;
use App\Http\Requests\Setting\Privacy\EditRequest;
use App\Http\Resources\Setting\PrivacyResource;
use App\Repositories\Setting\PrivacyRepository;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    private $privacyRepository;

    public function __construct(PrivacyRepository $PrivacyRepository)
    {
        $this->privacyRepository = $PrivacyRepository;
    }

    public function index()
    {
        $datas = $this->privacyRepository->Get_All_Data();
        return view('admin.setting.privacy.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.setting.privacy.create');
    }

    public function store(CreateRequest $request)
    {
        $this->privacyRepository->Create_Data($request);
        return redirect('/admin/privacy/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->privacyRepository->Get_One_Data_Translation($id);
        return view('admin.setting.privacy.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->privacyRepository->Update_Data($request, $id);
        return redirect('/admin/privacy/index')->with('message', trans('lang.Message_Edit'));
    }

    public function show_api(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['privacy'=> new PrivacyResource($this->privacyRepository->Get_All_Data()->first())], 'message' => trans('lang.Index')], 206);
    }

    public function show()
    {
        $data = $this->privacyRepository->Get_All_Data()->first();
        return view('frontend.privacy',compact('data'));
    }

}
