<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthSiswaController extends Controller
{
    public function login(Request $request)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $request->email;
            $password = $request->password;
            $auth = auth()->guard('siswa')->attempt([
                'email_siswa' => $email,
                'password' => $password
            ]);

            if (!$auth){
                return back()->with('error', 'Kamu Bukan Siswa!');
            }else{
                auth()->guard('guru')->logout();
                auth()->guard('admin')->logout();
                return redirect()->route('get.dashboardSiswa')->with('success', 'Berhasil Login!');
            }
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

    public function logout()
    {
        auth()->guard('siswa')->logout();
        return redirect()->route('get.loginSiswa');
    }
}
