<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Product\CreateRequest;
use App\Http\Requests\Core_Data\Product\EditRequest;
use App\Http\Requests\Core_Data\Product\StatusEditRequest;
use App\Interfaces\Core_Data\ProductInterface;
use App\Models\Core_Data\Product;
use Illuminate\Http\Request;

class ProductRepository implements ProductInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function Get_All_Data()
    {
        return $this->product->orderby('order','asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/product'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->product->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        $product =  $this->product->find($id)->translations;
        if($product)
        {
            return array_merge($this->product->find($id)->toarray(),$product);
        }
        else
        {
            return $this->product->find($id);
        }
    }

    public function Get_One_Data($id)
    {
        return $this->product->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $product = $this->Get_One_Data($id);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/product'), $imageName);
            $data['image'] = $imageName;
            $product->update(array_merge($request->all(),$data));
        }
        else
        {
            $product->update($request->all());
        }
    }

    public function Update_Status_One_Data($id)
    {
        $product = $this->Get_One_Data($id);
        if ($product->status == 1) {
            $product->status = '0';
        } elseif ($product->status == 0) {
            $product->status = '1';
        }
        $product->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->product->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {

        $products = $this->Get_Many_Data($request);
        foreach($products as $product)
        {
            if ($product->status == 1) {
                $product->status = '0';
            } elseif ($product->status == 0) {
                $product->status = '1';
            }
            $product->update();
        }
    }
}