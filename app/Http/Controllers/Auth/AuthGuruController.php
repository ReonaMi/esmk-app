<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthGuruController extends Controller
{
    public function login(Request $request){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $request->email;
            $password = $request->password;
            $auth = auth()->guard('guru')->attempt([
                'email' => $email,
                'password' => $password
            ]);
            if (!$auth){
                return back()->with('error', 'Anda Bukan Guru!');
            }else{
                auth()->guard('siswa')->logout();
                auth()->guard('admin')->logout();
                return redirect()->route('get.dashboardGuru')->with('success', 'Berhasil Login!');
            }
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

    public function logout()
    {
        auth()->guard('guru')->logout();
        return redirect()->route('get.loginGuru');
    }
}
