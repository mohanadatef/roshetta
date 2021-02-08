<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::User()->status_login == 0)
        {
            return view('admin.acl.user.password');
        }elseif(Auth::User()->role_id == 4 && !Auth::User()->doctor)
        {
            return redirect('admin/doctor/create')->with('message',trans('Message_Doctor_Create'));
        }elseif(Auth::User()->role_id == 5 && !Auth::User()->hospital)
        {
            return redirect('admin/hospital/create')->with('message',trans('Message_Hospatil_Create'));
        }elseif(Auth::User()->role_id == 6 && !Auth::User()->clinic)
        {
            return redirect('admin/clinic/create')->with('message',trans('Message_Clinic_Create'));
        }/*elseif(Auth::User()->role_id == 7 && !Auth::User()->vendor)
        {
            return redirect('admin/vendor/create')->with('message',trans('Message_vendor_Create'));
        }*/
        $count_patient = User::where('role_id', 3)->count();
        $count_vendor = User::where('role_id', 7)->count();
        $count_doctor = User::where('role_id', 4)->count();
        $count_clinic = User::where('role_id', 6)->count();
        $count_hospital = User::where('role_id', 5)->count();
        return view('admin.admin', compact('count_patient','count_doctor','count_hospital','count_clinic','count_vendor'));
    }

    public function error_403()
    {
        return view('errors.403');
    }

}
