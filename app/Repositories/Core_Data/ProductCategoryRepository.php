<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Product_Category\CreateRequest;
use App\Http\Requests\Core_Data\Product_Category\EditRequest;
use App\Http\Requests\Core_Data\Product_Category\StatusEditRequest;
use App\Interfaces\Core_Data\ProductCategoryInterface;
use App\Models\Core_Data\Product_Category;
use Illuminate\Http\Request;

class ProductCategoryRepository implements ProductCategoryInterface
{

    protected $product_category;

    public function __construct(Product_Category $product_category)
    {
        $this->product_category = $product_category;
    }

    public function Get_All_Data()
    {
        return $this->product_category->orderby('order', 'asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/product_category'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->product_category->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data_Translation($id)
    {
        $product_category = $this->product_category->find($id)->translations;
        return $product_category ? array_merge($this->product_category->find($id)->toarray(), $product_category) : $this->product_category->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->product_category->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/product_category'), $imageName);
            $data['image'] = $imageName;
            $this->Get_One_Data($id)->update(array_merge($request->all(), $data));
        } else $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $product_category = $this->Get_One_Data($id);
        $product_category->status == 1 ? $product_category->status = '0' : $product_category->status = '1';
        $product_category->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->product_category->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $product_category) {
            $product_category->status == 1 ? $product_category->status = '0' : $product_category->status = '1';
            $product_category->update();
        }
    }

    public function Get_List_Data()
    {
        return $this->product_category->select('title', 'id')->where('status', 1)->orderby('order', 'asc')->get();
    }
}

