<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthGuruController extends Controller
{
    public function login(Request $request){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "login Guru";
        }else{
            $title = 'Login Guru';
            $route = 'post.loginGuru';
            $status = 'guru';
            return view('auth.login', [
                'title' => $title,
                'route' => $route,
                'status' => $status
            ]);
        }
    }
}
