<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\About_Us\CreateRequest;
use App\Http\Requests\Setting\About_Us\EditRequest;
use App\Http\Resources\Setting\AboutUsResource;
use App\Repositories\Setting\AboutUsRepository;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    private $about_usRepository;

    public function __construct(AboutUsRepository $About_UsRepository)
    {
        $this->about_usRepository = $About_UsRepository;
    }

    public function index()
    {
        $datas = $this->about_usRepository->Get_All_Data();
        return view('admin.setting.about_us.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.setting.about_us.create');
    }

    public function store(CreateRequest $request)
    {
        $this->about_usRepository->Create_Data($request);
        return redirect('/admin/about_us/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->about_usRepository->Get_One_Data_Translation($id);
        return view('admin.setting.about_us.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->about_usRepository->Update_Data($request, $id);
        return redirect('/admin/about_us/index')->with('message', trans('lang.Message_Edit'));
    }

    public function show_api(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['about_us'=> new AboutUsResource($this->about_usRepository->Get_All_Data()->first())], 'message' => trans('lang.Index')], 206);
    }

    public function show()
    {
        $data = $this->about_usRepository->Get_All_Data()->first();
        return view('frontend.about_us',compact('data'));
    }
}
