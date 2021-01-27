<?php

namespace App\Interfaces\Acl;

use App\Http\Requests\Acl\Patient\CreateRequest;


interface PatientInterface{
    public function Create_Data(CreateRequest $request);
}