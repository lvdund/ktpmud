<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        echo 'Admin controller';
        $data=[];
        $data = $this->loadMasterLayout($data);
        $data['title']='title từ controller';
        return view('main',$data);
    }
}