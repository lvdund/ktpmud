<?php

namespace App\Services;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class UserService extends BaseService
{
    private $users;

    function __construct()
    {
        parent::__construct();
        $this->users = new UserModel();
        $this->users->protect(false);
    }

    public function getAllUsers()
    {
        return $this->users->findAll();
    }

    public function addUserInfo($requestData)
    {
        $validate = $this->validateAddUser($requestData);

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
            unset($dataSave['password_comfirm']);
            $dataSave['password'] = password_hash($dataSave['password'],PASSWORD_BCRYPT);
            try {
                $this->users->save($dataSave);
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
    private function validateAddUser($requestData)
    {
        $rule=[
            'email'=>'valid_email|is_unique[users.email]',
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

    public function getUserByID($id)
    {
        return $this->users->where('id',$id)->first();
    }

    public function updateUserInfo($requestData)
    {        
        $validate = $this->validateEditUser($requestData);

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
            $this->users->save($dataSave);
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

    private function validateEditUser($requestData)
    {
        $rule=[
            'email'=>'valid_email|is_unique[users.email, id, '.$requestData->getPost()['id'].']',
            'name'=>'max_length[100]',
        ];
        $message=[
            'email'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
                'is_unique'=>'Email đã tồn tại'
            ],
            'name'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ]
        ];

        if(!empty($requestData->getPost()['change_password'])){
            $rule['password'] = 'max_length[100]|min_length[3]';
            $rule['password_comfirm'] = 'matches[password]';

            $message=[
                'password'=>[
                    'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                    'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
                ],
                'password_comfirm'=>[
                    'matches'=>'Mật khẩu không khớp'
                ]
            ];
        }
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function deleteUser($id)
    {
        try {
            $this->users->delete($id);
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