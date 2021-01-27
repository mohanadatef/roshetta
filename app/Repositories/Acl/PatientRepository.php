<?php

namespace App\Repositories\Acl;


use App\Http\Requests\Acl\Patient\CreateRequest;
use App\Interfaces\Acl\PatientInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $data['status_login'] = 1;
        $data['role_id'] = 1;
        $data['password'] = Hash::make($request->password);
        if ($request->image) {
            $folderPath = public_path('images/user/');
            $image_type = 'png';
            $image_base64 = base64_decode($request->image);
            $imageName = time() . uniqid() . '.' . $image_type;
            $file = $folderPath . $imageName;
            file_put_contents($file, $image_base64);
            $data['image'] = $imageName;
        }
       return $this->user->create(array_merge($request->all(), $data));
    }
}
