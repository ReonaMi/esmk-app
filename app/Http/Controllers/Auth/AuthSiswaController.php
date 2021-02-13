<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthSiswaController extends Controller
{
    public function login(Request $request)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "login siswa";
        }else{
            $title = 'Login Siswa';
            $route = 'post.loginSiswa';
            $status = 'siswa';
            return view('auth.login', [
                'title' => $title,
                'route' => $route,
                'status' => $status
            ]);
        }
    }
}
