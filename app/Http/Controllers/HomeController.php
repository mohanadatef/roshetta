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
        }
        if(Auth::User()->role_id == 4 && !Auth::User()->doctor)
        {
            return redirect('admin/doctor/create')->with('message',trans('Message_Doctor_Create'));
        }
        $count_patient = User::where('role_id', 3)->count();
        $count_doctor = User::where('role_id', 4)->count();
        $count_clinic = Clinic::where('status', 1)->count();
        return view('admin.admin', compact('count_patient','count_doctor','count_clinic'));
    }

    public function error_403()
    {
        return view('errors.403');
    }

}
