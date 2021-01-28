<?php

namespace App\Repositories\Setting;

use App\Http\Requests\Setting\About_Us\CreateRequest;
use App\Http\Requests\Setting\About_Us\EditRequest;
use App\Interfaces\Setting\AboutUsInterface;
use App\Models\Setting\About_Us;

class AboutUsRepository implements AboutUsInterface
{

    protected $about_us;

    public function __construct(About_Us $about_us)
    {
        $this->about_us = $about_us;
    }

    public function Get_All_Data()
    {
        return $this->about_us->all();
    }
    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/about_us'), $imageName);
        $data['image'] = $imageName;
        $this->about_us->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        $about_us =  $this->about_us->find($id)->translations;
        return $about_us ? array_merge($this->about_us->find($id)->toarray(),$about_us) : $this->about_us->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->about_us->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/about_us'), $imageName);
            $data['image'] = $imageName;
            $this->Get_One_Data($id)->update(array_merge($request->all(),$data));
        } else $this->Get_One_Data($id)->update($request->all());
    }
}
