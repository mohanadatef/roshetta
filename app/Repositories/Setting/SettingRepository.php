<?php

namespace App\Repositories\Setting;

use App\Http\Requests\Setting\Setting\CreateRequest;
use App\Http\Requests\Setting\Setting\EditRequest;
use App\Interfaces\Setting\SettingInterface;
use App\Models\Setting\Setting;

class SettingRepository implements SettingInterface
{

    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function Get_All_Data()
    {
        return $this->setting->all();
    }

    public function Create_Data(CreateRequest $request)
    {
        $logoName = $request->logo->getClientOriginalname() . '-' . time() . '-logo.' . Request()->logo->getClientOriginalExtension();
        Request()->logo->move(public_path('images/setting'), $logoName);
        $data['logo'] = $logoName;
        $this->setting->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data_Translation($id)
    {
        $setting =  $this->setting->find($id)->translations;
        if($setting)
        {
            return array_merge($this->setting->find($id)->toarray(),$setting);
        }
        else
        {
            return $this->setting->find($id);
        }
    }

    public function Get_One_Data($id)
    {
        return $this->setting->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $setting = $this->Get_One_Data($id);
        if ($request->logo != null) {
            $logoName = $request->logo->getClientOriginalname() . '-' . time() . '-logo.' . Request()->logo->getClientOriginalExtension();
            Request()->logo->move(public_path('images/setting'), $logoName);
            $data['logo'] = $logoName;
            $setting->update(array_merge($request->all(), $data));
        } else {
            $setting->update($request->all());
        }
    }
}
