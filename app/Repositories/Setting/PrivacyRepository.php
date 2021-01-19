<?php

namespace App\Repositories\Setting;

use App\Http\Requests\Setting\Privacy\CreateRequest;
use App\Http\Requests\Setting\Privacy\EditRequest;
use App\Interfaces\Setting\PrivacyInterface;
use App\Models\Setting\Privacy;

class PrivacyRepository implements PrivacyInterface
{

    protected $privacy;

    public function __construct(Privacy $privacy)
    {
        $this->privacy = $privacy;
    }

    public function Get_All_Data()
    {
        return $this->privacy->all();
    }

    public function Create_Data(CreateRequest $request)
    {
        $this->privacy->create($request->all());
    }

    public function Get_One_Data_Translation($id)
    {
        return array_merge($this->privacy->find($id)->toarray(),$this->privacy->find($id)->translations);
    }

    public function Get_One_Data($id)
    {
        return $this->privacy->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $privacy = $this->Get_One_Data($id);
        $privacy->update($request->all());
    }
}
