<?php

namespace App\Services;
use App\Models\DepartmentModel;
use App\Common\ResultUtils;
use Exception;

class DepartmentService extends BaseService
{
    private $tkhoa;

    function __construct()
    {
        parent::__construct();
        $this->tkhoa = new DepartmentModel();
        $this->tkhoa->protect(false);
    }

    public function getAllKhoa()
    {
        return $this->tkhoa->findAll();
    }

    public function addKhoaInfo($requestData)
    {
        $validate = $this->validateAddKhoa($requestData);

        if($validate->getErrors()){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }else{
            $dataSave = $requestData->getPost();
            try {
                $this->tkhoa->save($dataSave);
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
    private function validateAddKhoa($requestData)
    {
        $rule=[
            'tenKhoa'=>'max_length[100]|min_length[1]|is_unique[tkhoa.tenKhoa]',
            'emailKhoa'=>'valid_email|is_unique[tkhoa.emailKhoa]',
        ];
        $message=[
            'tenKhoa'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
                'is_unique'=>'Tên Khoa đã tồn tại'
            ],
            'emailKhoa'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
                'is_unique'=>'Email đã tồn tại'
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function getKhoaByID($tenKhoa)
    {
        return $this->tkhoa->where('tenKhoa',$tenKhoa)->first();
    }

    public function updateKhoaInfo($requestData,$tenKhoa)
    {        
        $validate = $this->validateEditKhoa($requestData);

        if($validate->getErrors()){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }
        
        $dataSave = $requestData->getPost();

        try {
            $this->tkhoa->update($tenKhoa,$dataSave);
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

    private function validateEditKhoa($requestData)
    {
        $rule=[
            'tenKhoa'=>'max_length[100]|min_length[1]|is_unique[tkhoa.tenKhoa]',
            'emailKhoa'=>'valid_email|is_unique[tkhoa.emailKhoa]',
        ];
        $message=[
            'tenKhoa'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
                'is_unique'=>'Tên Khoa đã tồn tại'
            ],            
            'emailKhoa'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
                'is_unique'=>'Email đã tồn tại'
            ],
        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

    public function deleteKhoa($tenKhoa)
    {
        try {
            $this->tkhoa->where('tenKhoa',$tenKhoa)->delete();
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