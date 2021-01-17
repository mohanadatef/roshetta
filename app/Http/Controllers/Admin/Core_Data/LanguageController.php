<?php

namespace App\Http\Controllers\Admin\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Core_Data\Language\CreateRequest;
use App\Http\Requests\Admin\Core_Data\Language\EditRequest;
use App\Http\Requests\Admin\Core_Data\Language\StatusEditRequest;
use App\Repositories\Core_Data\LanguageRepository;

class LanguageController extends Controller
{
    private $languageRepository;

    public function __construct(LanguageRepository $LanguageRepository)
    {
        $this->languageRepository = $LanguageRepository;
    }

    public function index()
    {
        $datas = $this->languageRepository->Get_All_Data();
        return view('admin.core_data.language.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.language.create');
    }

    public function store(CreateRequest $request)
    {
        $this->languageRepository->Create_Data($request);
        return redirect('/admin/language/index')->with('message', 'اضافه بيانات بنجاح');
    }

    public function edit($id)
    {
        $data = $this->languageRepository->Get_One_Data($id);
        return view('admin.core_data.language.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->languageRepository->Update_Data($request, $id);
        return redirect('/admin/language/index')->with('message', 'تم تعديل البيانات بنجاح');
    }

    public function change_status($id)
    {
        $this->languageRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', 'تغير حاله الدائرة بنجاح');
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->languageRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', 'تم تغير حاله الدوائر بنجاح');
    }
}
