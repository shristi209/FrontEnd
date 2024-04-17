<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class resetPassword extends controller
{
    public function forgotPassword(){
        return view("auth.forgotPassword");
    }
}

?>