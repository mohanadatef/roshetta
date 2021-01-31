<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Call_Us\CreateRequest;
use App\Models\Setting\Call_Us;

class CallUsController extends Controller
{
    public function store(CreateRequest $request)
    {
        change_locale_language($request->language_id);
        $call_us = new Call_Us();
        $data['status']=0;
        $call_us->create(array_merge($request->all(),$data));
        return response(['status' => 1,'data'=>array(),'message'=>trans('lang.Message_Store')], 200);
    }
}