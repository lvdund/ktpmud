<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return view('superadmin');
    }
    public function adminadd(){return view('admin-add');}
    public function adminchange(){return view('admin-change');}
    public function adminshow(){return view('admin-show');}
    public function productadd(){return view('product-add');}
    public function productlist(){return view('product-list');}
    public function productdel(){return view('product-del');}
    public function memberadd(){return view('member-add');}
    public function memberlist(){return view('member-list');}
    public function memberdel(){return view('member-del');}
    public function appointmentadd(){return view('appointment-add');}
    public function appointmentlist(){return view('appointment-list');}
    public function appointmentdel(){return view('appointment-del');}

    public function doctorlist(){return view('doctor-list');}
    public function doctordel(){return view('doctor-del');}
    public function doctoradd(){return view('doctor-add');}

    public function departmentlist(){return view('department-list');}
    public function departmentdel(){return view('department-del');}
    public function departmentadd(){return view('department-add');}
    public function adminrole(){return view('admin-role');}
    public function adminpermission(){return view('admin-permission');}
    public function adminlist(){return view('admin-list');}
    public function welcome(){return view('welcome');}
}