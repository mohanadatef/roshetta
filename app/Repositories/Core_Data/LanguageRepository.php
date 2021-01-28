<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Language\CreateRequest;
use App\Http\Requests\Core_Data\Language\EditRequest;
use App\Http\Requests\Core_Data\Language\StatusEditRequest;
use App\Interfaces\Core_Data\LanguageInterface;
use App\Models\Core_Data\Language;
use Illuminate\Http\Request;

class LanguageRepository implements LanguageInterface
{

    protected $language;

    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    public function Get_All_Data()
    {
        return $this->language->orderby('order', 'asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/language'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->language->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data($id)
    {
        return $this->language->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/language'), $imageName);
            $data['image'] = $imageName;
            $this->Get_One_Data($id)->update(array_merge($request->all(), $data));
        } else $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $language = $this->Get_One_Data($id);
        $language->status == 1 ? $language->status = '0' : $language->status = '1';
        $language->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->language->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $language) {
            $language->status == 1 ? $language->status = '0' : $language->status = '1';
            $language->update();
        }
    }
}
