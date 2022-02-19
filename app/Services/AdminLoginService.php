<?php

namespace App\Services;
use App\Models\AdminModel;
use App\Common\ResultUtils;
use Exception;

class AdminLoginService extends BaseService
{
    private $Admin;

    function __construct()
    {
        parent::__construct();
        $this->Admin = new AdminModel();
        $this->Admin->protect(false);
    }
    public function hasLoginInfo($reqData)
    {
        $validate = $this->validateLogin($reqData);
        if($validate->getErrors()){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];  
        }
        $param = $reqData->getPost();
        $admin =$this->Admin->where('tkAdmin', $param['tkAdmin'])->first();
        if(!$admin){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>[
                    'notExist' => 'email không tồn tại'
                ]
            ];  
        }
        if(!password_verify($param['mkAdmin'],$admin['mkAdmin'])){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>[
                    'wrongPass' => 'Mật khẩu không đúng'
                ]
            ];
        }
        $session = session();
        unset($admin['mkAdmin']);
        $session->set('admin',$admin);
        return [
            'status'=>ResultUtils::STATUS_CODE_OK,
            'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
            'message'=>null,
            'admin' => $admin,
            ];
    }
    private function validateLogin($reqData){
        $rule=[
            'tkAdmin'=>'valid_email',
            'mkAdmin'=>'max_length[30]|min_length[3]',
        ];
        $message=[
            'tkAdmin'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
            ],
            'password'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($reqData)->run();

        return $this->validation;
    }
}