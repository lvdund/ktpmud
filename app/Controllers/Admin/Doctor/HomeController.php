<?php

namespace App\Controllers\Admin\Doctor;
use App\Controllers\BaseController;

class HomeController extends BaseController
{

    public function doctorlist(){return view('doctor-list');}
    public function doctordel(){return view('doctor-del');}
    public function doctoradd(){return view('doctor-add');}

}