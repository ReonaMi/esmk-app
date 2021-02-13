<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardGuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:guru');
    }

    public function index(){
        return view('guru.dashboardGuru');
    }
}
