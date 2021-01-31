<?php

namespace App\Interfaces\Acl;

interface ForgotPasswordInterface{
    public function Store($id);
    public function Check_User($id);
    public function Check_Code($id,$code);
    public function Update($id);
}