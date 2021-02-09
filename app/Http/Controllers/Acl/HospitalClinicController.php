<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Hospital_Clinic\FindRequest;
use App\Repositories\Acl\HospitalClinicRepository;
use App\Repositories\Acl\ClinicRepository;

class HospitalClinicController extends Controller
{
    private $hospitalRepository;
    private $clinicRepository;

    public function __construct(HospitalClinicRepository $HospitalRepository,ClinicRepository $ClinicDetailRepository)
    {
        $this->hospitalRepository = $HospitalRepository;
        $this->clinicRepository = $ClinicDetailRepository;
    }

    public function index()
    {
        $datas = $this->hospitalRepository->Get_All_Data();
        return view('admin.acl.hospital.clinic.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.acl.hospital.clinic.create');
    }

    public function store(FindRequest $request)
    {
        $clinic = $this->clinicRepository->Get_One_By_Code($request->code);
        $this->hospitalRepository->Create_Data($clinic->id);
        return redirect('/admin/hospital/clinic/index')->with('message', trans('lang.Message_Store'));
    }
}