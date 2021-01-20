<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Product_Category\CreateRequest;
use App\Http\Requests\Core_Data\Product_Category\EditRequest;
use App\Http\Requests\Core_Data\Product_Category\StatusEditRequest;
use App\Repositories\Core_Data\ProductCategoryRepository;

class ProductCategoryController extends Controller
{
    private $product_categoryRepository;

    public function __construct(ProductCategoryRepository $ProductCategoryRepository)
    {
        $this->product_categoryRepository = $ProductCategoryRepository;
    }

    public function index()
    {
        $datas = $this->product_categoryRepository->Get_All_Data();
        return view('admin.core_data.product_category.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.product_category.create');
    }

    public function store(CreateRequest $request)
    {
        $this->product_categoryRepository->Create_Data($request);

        return redirect('/admin/product_category/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->product_categoryRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.product_category.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->product_categoryRepository->Update_Data($request, $id);
        return redirect('/admin/product_category/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->product_categoryRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->product_categoryRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

}
