<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Medicine\CreateRequest;
use App\Http\Requests\Core_Data\Medicine\EditRequest;
use App\Http\Requests\Core_Data\Medicine\StatusEditRequest;
use App\Http\Resources\Core_Data\MedicineResource;
use App\Repositories\Core_Data\MedicineCategoryRepository;
use App\Repositories\Core_Data\MedicineRepository;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    private $medicineRepository;
    private $medicine_categoryRepository;

    public function __construct(MedicineRepository $MedicineRepository,MedicineCategoryRepository $Medicine_CategoryRepository)
    {
        $this->medicineRepository = $MedicineRepository;
        $this->medicine_categoryRepository = $Medicine_CategoryRepository;
    }

    public function index()
    {
        $datas = $this->medicineRepository->Get_All_Data();
        return view('admin.core_data.medicine.index',compact('datas'));
    }

    public function create()
    {
        $medicine_category = $this->medicine_categoryRepository->Get_List_Data();
        return view('admin.core_data.medicine.create',compact('medicine_category'));
    }

    public function store(CreateRequest $request)
    {
        $this->medicineRepository->Create_Data($request);

        return redirect('/admin/medicine/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $medicine_category = $this->medicine_categoryRepository->Get_List_Data();
        $data = $this->medicineRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.medicine.edit',compact('data','medicine_category'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->medicineRepository->Update_Data($request, $id);
        return redirect('/admin/medicine/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->medicineRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->medicineRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function search(Request $request)
    {
        change_locale_language($request->language_id);
            return response(['status' => 1, 'data' => ['medicine'=> MedicineResource::collection($this->medicineRepository->Get_List_Data_By_Name($request->title))], 'message' => trans('lang.Index')], 206);
    }

}
