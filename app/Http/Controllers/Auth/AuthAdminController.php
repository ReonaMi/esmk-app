<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function login(Request $request)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $request->email;
            $password = $request->password;
            $auth = auth()->guard('admin')->attempt([
                'email' => $email,
                'password' => $password
            ]);
            if (!$auth){
                return back()->with('error', 'Anda Bukan Admin!');
            }else{
               auth()->guard('siswa')->logout();
               auth()->guard('guru')->logout();
               $role = Auth::guard('admin')->user()->wewenang;
               if ($role == "superadmin"){
                   return redirect()->route('get.dashboardSuperadmin')->with('success', 'Berhasil Login!');
               }elseif ($role == "kesiswaan"){
                   echo "kesiswaan";
               }elseif ($role == "kurikulum"){
                   echo "kurikulum";
               }elseif ($role == "toolman"){
                   echo "toolman";
               }else{
                   return back()->with('error', 'Anda Tidak Punya Wewenang!');
               }
            }
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

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('get.loginAdmin');
    }
}
