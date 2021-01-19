<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Language\CreateRequest;
use App\Http\Requests\Core_Data\Language\EditRequest;
use App\Http\Requests\Core_Data\Language\StatusEditRequest;
use App\Repositories\Core_Data\LanguageRepository;
use Illuminate\Http\Request;

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

        return redirect('/admin/language/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->languageRepository->Get_One_Data($id);
        return view('admin.core_data.language.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->languageRepository->Update_Data($request, $id);
        return redirect('/admin/language/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->languageRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->languageRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function language(Request $request)
    {
        //save for 1 month
        return redirect()->back()->withCookie('language',$request->lang,45000);
    }
}
