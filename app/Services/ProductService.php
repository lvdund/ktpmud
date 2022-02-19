<?php

namespace App\Services;
use App\Models\ProductModel;
use App\Common\ResultUtils;
use Exception;

class ProductService extends BaseService
{
    private $dichvu;

    function __construct()
    {
        parent::__construct();
        $this->dichvu = new ProductModel();
        $this->dichvu->protect(false);
    }

    public function getAllDichVu()
    {
        return $this->dichvu->findAll();
    }

    public function addDichVuInfo($requestData)
    {
        $validate = $this->validateAddDichVu($requestData);

        if($validate->getErrors()){
            // dd($validate->getErrors());
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }else{
            // dd('Hết lỗi');
            // dd($requestData->getPost());
            $dataSave = $requestData->getPost();
            // unset($dataSave['password_comfirm']);
            $dataSave['mkDichVu'] = password_hash($dataSave['mkDichVu'],PASSWORD_BCRYPT);
            try {
                $this->dichvu->save($dataSave);
                return [
                    'status'=>ResultUtils::STATUS_CODE_OK,
                    'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
                    'message'=>['success'=>'Thêm dữ liệu thành công']
                ];
            } catch (Exception $e) {
                return [
                    'status'=>ResultUtils::STATUS_CODE_ERR,
                    'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                    'message'=>['success'=> $e->getMessage()]
                ];
            }
            
        }


    }
    private function validateAddDichVu($requestData)
    {
        $rule=[
            'tenDichVu'=>'max_length[100]|min_length[1]',
            'phiDichVu'=>'max_length[100]|min_length[3]',
        ];
        $message=[
            'tenDichVu'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
            ],
            'phiDichVu'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function getDichVuByID($maDichVu)
    {
        return $this->dichvu->where('maDichVu',$maDichVu)->first();
    }

    public function updateDichVuInfo($requestData,$maDichVu)
    {        
        $validate = $this->validateEditDichVu($requestData);

        if($validate->getErrors()){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }
        
        $dataSave = $requestData->getPost();

        try {
            $this->dichvu->update($maDichVu,$dataSave);
            return [
                'status'=>ResultUtils::STATUS_CODE_OK,
                'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
                'message'=>['success'=>'Cap nhat dữ liệu thành công']
            ];
        } catch (Exception $e) {
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>['success'=> $e->getMessage()]
            ];
        }
    }

    private function validateEditDichVu($requestData)
    {
        $rule=[
            'tenDichVu'=>'max_length[100]|min_length[1]',
        ];
        $message=[
            'tenDichVu'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
            ],
        ];

        if(!empty($requestData->getPost()['mkDichVu'])){
            $rule['phiDichVu'] = 'max_length[100]|min_length[3]';
            $message=[
                'phiDichVu'=>[
                    'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                    'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
                ],
            ];
        }
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

    public function deleteDichVu($maDichVu)
    {
        try {
            $this->dichvu->where('maDichVu',$maDichVu)->delete();
            return [
                'status'=>ResultUtils::STATUS_CODE_OK,
                'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
                'message'=>['success'=>'Cap nhat dữ liệu thành công']
            ];
        } catch (Exception $e) {
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>['success'=> $e->getMessage()]
            ];
        }
    }
}