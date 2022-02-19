<?php

namespace App\Services;
use App\Models\AdminModel;
use App\Common\ResultUtils;
use Exception;

class AdminService extends BaseService
{
    private $admin;

    function __construct()
    {
        parent::__construct();
        $this->admin = new AdminModel();
        $this->admin->protect(false);
    }

    public function getAllAdmin()
    {
        return $this->admin->findAll();
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
            // dd('Hết lỗi');
            // dd($requestData->getPost());
            $dataSave = $requestData->getPost();
            // unset($dataSave['password_comfirm']);
            $dataSave['mkAdmin'] = password_hash($dataSave['mkAdmin'],PASSWORD_BCRYPT);
            try {
                $this->admin->save($dataSave);
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
            'tkAdmin'=>'valid_email|is_unique[admin.tkAdmin]',
            'tenAdmin'=>'max_length[100]',
            'mkAdmin'=>'max_length[100]|min_length[3]',
            // 'password_comfirm'=>'matches[password]',
        ];
        $message=[
            'tkAdmin'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
                'is_unique'=>'Email đã tồn tại'
            ],
            'tenAdmin'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ],
            'mkAdmin'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
            ],
            // 'password_comfirm'=>[
            //     'matches'=>'Mật khẩu không khớp'
            // ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function getAdminByID($idAdmin)
    {
        return $this->admin->where('idAdmin',$idAdmin)->first();
    }

    public function updateAdminInfo($requestData,$idAdmin)
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
        if(empty($dataSave['mkAdmin'])){
            unset($dataSave['mkAdmin']);
        }
        if(empty($dataSave['mkAdmin'])){
            unset($dataSave['mkAdmin']);
        }else{
            $dataSave['mkAdmin'] = password_hash($dataSave['mkAdmin'], PASSWORD_BCRYPT);
        }
        if(empty($dataSave['sdtAdmin'])){
            unset($dataSave['sdtAdmin']);
        }
        if(empty($dataSave['tenAdmin'])){
            unset($dataSave['tenAdmin']);
        }
        // dd($dataSave);

        try {
            $this->admin->update($idAdmin,$dataSave);
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
            'tenAdmin'=>'max_length[100]',
        ];
        $message=[
            'tenAdmin'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ]
        ];

        if(!empty($requestData->getPost()['mkAdmin'])){
            $rule['mkAdmin'] = 'max_length[100]|min_length[3]';
            $message=[
                'mkAdmin'=>[
                    'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                    'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
                ],
            ];
        }
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

    public function deleteAdmin($idAdmin)
    {
        try {
            $this->admin->where('idAdmin',$idAdmin)->delete();
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

    //login
    // public function hasLoginInfo($reqData)
    // {
    //     $validate = $this->validateLogin($reqData);

    //     if($validate->getErrors()){
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_ERR,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
    //             'message'=>$validate->getErrors()
    //         ];  
    //     }
    //     $param = $reqData->getPost();
    //     $admin_ =$this->admin->where('tkAdmin', $param['tkAdmin'])->first();
    //     if(!$admin_){
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_ERR,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
    //             'message'=>[
    //                 'notExist' => 'email không tồn tại'
    //             ]
    //         ];
    //     }
    //     if(!password_verify($param['mkAdmin'],$admin_['mkAdmin'])){
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_ERR,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
    //             'message'=>[
    //                 'wrongPass' => 'Mật khẩu không đúng'
    //             ]
    //         ];
    //     }
    //     $session = session();
    //     unset($admin_['mkAdmin']);
    //     $session->set('Admin_login',$admin_);
    //     return [
    //         'status'=>ResultUtils::STATUS_CODE_OK,
    //         'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
    //         'message'=>null
    //         ];
    // }
    // private function validateLogin($reqData){
    //     $rule=[
    //         // 'tkBenhNhan'=>'valid_email|is_unique[tbenhnhan.tkBenhNhan]',
    //         'tkAdmin'=>'valid_email',
    //         // 'tenBenhNhan'=>'max_length[100]',
    //         'mkAdmin'=>'max_length[30]|min_length[3]',
    //         // 'password_comfirm'=>'matches[password]',
    //     ];
    //     $message=[
    //         'tkAdmin'=>[
    //             'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
    //             // 'is_unique'=>'Email đã tồn tại'
    //         ],
    //         // 'tenBenhNhan'=>[
    //         //     'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
    //         // ],
    //         'mkAdmin'=>[
    //             'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
    //             'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
    //         ],
    //         // 'password_comfirm'=>[
    //         //     'matches'=>'Mật khẩu không khớp'
    //         // ]
    //     ];
    //     $this->validation->setRules($rule, $message);
    //     $this->validation->withRequest($reqData)->run();

    //     return $this->validation;
    // }
}