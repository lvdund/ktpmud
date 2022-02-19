<?php

namespace App\Controllers\Admin\Product;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Services\ProductService;
use CodeIgniter\HTTP\Request;


class ProductController extends BaseController
{
    // Tạo biến lưu Servce
    private $service;
    public function __construct()
    {
        $this->service = new ProductService();
    }

    public function list()
    {
        if($this->request->getGet('tendichvu')||$this->request->getGet('tenkhoa')){
            $tendichvu = $this->request->getGet('tendichvu');
            $tenkhoa = $this->request->getGet('tenkhoa');
            $model = new ProductModel();
            $data['dichvu'] = $model->like('tenDichVu', $tendichvu)->orLike('tenKhoa', $tenkhoa)->findAll();
            return view('Product/product-list',$data);
        }

        $data['dichvu']=$this->service->getAllDichVu();
        return view('Product/product-list',$data);
    }
    public function add()
    {
        return view('Product/product-add');
    }
    public function create()
    {
        // dd($this->request);
        $result = $this->service->addDichVuInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function edit($maDichVu)
    {
        $admin = $this->service->getDichVuByID($maDichVu);
        if(!$admin){
            return redirect('error/404');
        }

        $data['dichvu']=$admin;
        return view('Product/product-change',$data);
    }

    public function update($maDichVu)
    {
        $result = $this->service->updateDichVuInfo($this->request,$maDichVu);
        return redirect('admin/product/list')->with($result['messageCode'], $result['message']);
    }

    public function delete($maDichVu)
    {
        $admin = $this->service->getDichVuByID($maDichVu);
        if(!$admin){
            return redirect('error/404');
        }
        $result = $this->service->deleteDichVu($maDichVu);
        return redirect('admin/product/list')->with($result['messageCode'], $result['message']);
    }
}