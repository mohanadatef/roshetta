<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Product\CreateRequest;
use App\Http\Requests\Core_Data\Product\EditRequest;
use App\Http\Requests\Core_Data\Product\StatusEditRequest;
use App\Repositories\Core_Data\ProductCategoryRepository;
use App\Repositories\Core_Data\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;
    private $product_categoryRepository;

    public function __construct(ProductRepository $ProductRepository,ProductCategoryRepository $Product_CategoryRepository)
    {
        $this->productRepository = $ProductRepository;
        $this->product_categoryRepository = $Product_CategoryRepository;
    }

    public function index()
    {
        $datas = $this->productRepository->Get_All_Data();
        return view('admin.core_data.product.index',compact('datas'));
    }

    public function create()
    {
        $product_category = $this->product_categoryRepository->Get_List_Data();
        return view('admin.core_data.product.create',compact('product_category'));
    }

    public function store(CreateRequest $request)
    {
        $this->productRepository->Create_Data($request);

        return redirect('/admin/product/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $product_category = $this->product_categoryRepository->Get_List_Data();
        $data = $this->productRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.product.edit',compact('data','product_category'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->productRepository->Update_Data($request, $id);
        return redirect('/admin/product/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->productRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->productRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

}
