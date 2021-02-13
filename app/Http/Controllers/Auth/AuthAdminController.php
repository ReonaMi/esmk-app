<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    public function login(Request $request)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "login admin";
        }else{
            $title = 'Login Admin';
            $route = 'post.loginAdmin';
            $status = 'admin';
            return view('auth.login', [
                'title' => $title,
                'route' => $route,
                'status' => $status
            ]);
        }
    }
}
