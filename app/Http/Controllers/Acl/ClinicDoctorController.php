<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Clinic_Doctor\FindRequest;
use App\Repositories\Acl\ClinicDoctorRepository;
use App\Repositories\Acl\DoctorDetailRepository;

class ClinicDoctorController extends Controller
{
    private $clinicRepository;
    private $doctor_detailRepository;

    public function __construct(ClinicDoctorRepository $ClinicRepository,DoctorDetailRepository $DoctorDetailRepository)
    {
        $this->clinicRepository = $ClinicRepository;
        $this->doctor_detailRepository = $DoctorDetailRepository;
    }

    public function index()
    {
        $datas = $this->clinicRepository->Get_All_Data();
        return view('admin.acl.clinic.doctor.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.acl.clinic.doctor.create');
    }

    public function store(FindRequest $request)
    {
        $doctor = $this->doctor_detailRepository->Get_One_By_Code($request->code);
        $this->clinicRepository->Create_Data($doctor->id);
        return redirect('/admin/clinic/doctor/index')->with('message', trans('lang.Message_Store'));
    }
}