<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function signup()
    {
        return view('layout/admin/signup');
    }
    public function forget()
    {
        return view('layout/admin/forget_password');
    }
    
}
