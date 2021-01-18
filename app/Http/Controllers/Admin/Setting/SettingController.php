<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\Setting\CreateRequest;
use App\Http\Requests\Admin\Setting\Setting\EditRequest;
use App\Repositories\Setting\SettingRepository;

class SettingController extends Controller
{
    private $settingRepository;

    public function __construct(SettingRepository $SettingRepository)
    {
        $this->settingRepository = $SettingRepository;
    }

    public function index()
    {
        $datas = $this->settingRepository->Get_All_Data();
        return view('admin.setting.setting.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.setting.setting.create');
    }

    public function store(CreateRequest $request)
    {
        $this->settingRepository->Create_Data($request);
        return redirect('/admin/setting/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->settingRepository->Get_One_Data($id);
        return view('admin.setting.setting.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->settingRepository->Update_Data($request, $id);
        return redirect('/admin/setting/index')->with('message', trans('lang.Message_Edit'));
    }

}
