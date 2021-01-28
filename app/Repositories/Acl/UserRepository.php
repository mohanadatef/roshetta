<?php

namespace App\Repositories\Acl;


use App\Http\Requests\Acl\User\CreateRequest;
use App\Http\Requests\Acl\User\EditRequest;
use App\Http\Requests\Acl\User\PasswordRequest;
use App\Http\Requests\Acl\User\StatusEditRequest;
use App\Interfaces\Acl\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function Get_All_Data()
    {
        return $this->user->whereNotIn('role_id', [3])->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $data['status_login'] = 0;
        $data['password'] = Hash::make($request->password);
        if ($request->image) {
            $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/user'), $imageName);
            $data['image'] = $imageName;
        }
        return $this->user->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data_Translation($id)
    {
        $user = $this->user->find($id)->translations;
        return $user ? array_merge($this->user->find($id)->toarray(), $user) : $this->user->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->user->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/user'), $imageName);
            $data['image'] = $imageName;
            return $this->Get_One_Data($id)->update(array_merge($request->all(), $data));
        } else return $this->Get_One_Data($id)->update($request->all());
    }

    public function Resat_Password($id)
    {
        $user = $this->Get_One_Data($id);
        $user->password = Hash::make('123456');
        $user->status_login = 0;
        $user->update();
    }

    public function Update_Password_Data(PasswordRequest $request, $id)
    {
        $user = $this->Get_One_Data($id);
        $user->password = Hash::make($request->password);
        $user->status_login = 1;
        $user->update();
    }

    public function Update_Status_One_Data($id)
    {
        $user = $this->Get_One_Data($id);
        $user->status == 1 ? $user->status = '0' : $user->status = '1';
        $user->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->user->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Data(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $user) {
            $user->status == 1 ? $user->status = '0' : $user->status = '1';
            $user->update();
        }
    }
}
