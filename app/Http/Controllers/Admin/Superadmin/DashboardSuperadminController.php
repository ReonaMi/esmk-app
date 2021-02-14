<?php

namespace App\Http\Controllers\Admin\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardSuperadminController extends Controller
{
    public function index(){
        return view('admin.super.dashboardSuperadmin');
    }
}
