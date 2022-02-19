<?php

namespace App\Services;
use App\Models\AdminModel;
use App\Common\ResultUtils;
use Exception;

class AdminService extends BaseService
{
    private $admins;

    function __construct()
    {
        parent::__construct();
        $this->admins = new AdminModel();
        $this->admins->protect(false);
    }

    public function getAllAdmins()
    {
        return $this->admins->findAll();
    }

    public function addAdminInfo($requestData)
    {
        $validate = $this->validateAddAdmin($requestData);

        if($validate->getErrors()){
            // dd($validate->getErrors());
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }else{
            $dataSave = $requestData->getPost();
            unset($dataSave['password_comfirm']);
            $dataSave['password'] = password_hash($dataSave['password'],PASSWORD_BCRYPT);
            try {
                $this->admins->save($dataSave);
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
    private function validateAddAdmin($requestData)
    {
        $rule=[
            'email'=>'valid_email|is_unique[admin.tkAdmin]',
            'name'=>'max_length[100]',
            'password'=>'max_length[100]|min_length[3]',
            'password_comfirm'=>'matches[password]',
        ];
        $message=[
            'email'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
                'is_unique'=>'Email đã tồn tại'
            ],
            'name'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ],
            'password'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
            ],
            'password_comfirm'=>[
                'matches'=>'Mật khẩu không khớp'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function getAdminByID($idAdmin)
    {
        return $this->admins->where('idAdmin',$idAdmin)->first();
    }

    public function updateAdminInfo($requestData)
    {        
        $validate = $this->validateEditAdmin($requestData);

        if($validate->getErrors()){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }
        
        $dataSave = $requestData->getPost();
        if(!empty($dataSave['change_password'])){
            unset($dataSave['change_password']);
            unset($dataSave['password_comfirm']);
            $dataSave['password'] = password_hash($dataSave['password'], PASSWORD_BCRYPT);
        }else{
            unset($dataSave['password']);
            unset($dataSave['password_comfirm']);
        }

        try {
            $this->admins->save($dataSave);
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

    private function validateEditAdmin($requestData)
    {
        $rule=[
            // 'tkAdmin'=>'valid_email|is_unique[admin.tkAdmin, idAdmin, '.$requestData->getPost()['idAdmin'].']',
            'tenAdmin'=>'max_length[100]',
        ];
        $message=[
            // 'email'=>[
            //     'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
            //     'is_unique'=>'Email đã tồn tại'
            // ],
            'tenAdmin'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ]
        ];

        if(!empty($requestData->getPost()['change_password'])){
            $rule['password'] = 'max_length[100]|min_length[3]';
            // $rule['password_comfirm'] = 'matches[password]';

            $message=[
                'mkAdmin'=>[
                    'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                    'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
                ],
                // 'password_comfirm'=>[
                //     'matches'=>'Mật khẩu không khớp'
                // ]
            ];
        }
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function deleteAdmin($idAdmin)
    {
        try {
            $this->doctor->where('idAdmin',$idAdmin)->delete();
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