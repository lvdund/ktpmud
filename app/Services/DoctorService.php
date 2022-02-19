<?php

namespace App\Services;
use App\Models\DoctorModel;
use App\Common\ResultUtils;
use Exception;

class DoctorService extends BaseService
{
    private $doctor;

    function __construct()
    {
        parent::__construct();
        $this->doctor = new DoctorModel();
        $this->doctor->protect(false);
    }

    public function getAllDoctor()
    {
        return $this->doctor->findAll();
    }

    public function addDoctorInfo($requestData)
    {
        $validate = $this->validateAddDoctor($requestData);

        if($validate->getErrors()){
            // dd($validate->getErrors());
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }else{
            $dataSave = $requestData->getPost();
            // unset($dataSave['password_comfirm']);
            $dataSave['mkBacSi'] = password_hash($dataSave['mkBacSi'],PASSWORD_BCRYPT);
            try {
                $this->doctor->save($dataSave);
                // dd($requestData);
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
    private function validateAddDoctor($requestData)
    {
        $rule=[
            'tkBacSi'=>'valid_email|is_unique[tbacsi.tkBacSi]',
            'tenBacSi'=>'max_length[100]',
            'mkBacSi'=>'max_length[100]|min_length[3]',
            // 'password_comfirm'=>'matches[mkBacSi]',
        ];
        $message=[
            'tkBacSi'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
                'is_unique'=>'Email đã tồn tại'
            ],
            'tenBacSi'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ],
            'mkBacSi'=>[
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

    public function getDoctorByID($idBacSi)
    {
        return $this->doctor->where('idBacSi',$idBacSi)->first();
    }

    public function updateDoctorInfo($requestData,$id)
    {
        $validate = $this->validateEditDoctor($requestData);

        if($validate->getErrors()){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }
        
        $dataSave = $requestData->getPost();
        // if(!empty($dataSave['change_password'])){
        //     unset($dataSave['change_password']);
        //     unset($dataSave['password_comfirm']);
        //     $dataSave['mkBacSi'] = password_hash($dataSave['mkBacSi'], PASSWORD_BCRYPT);
        // }else{
        //     unset($dataSave['mkBacSi']);
        //     unset($dataSave['password_comfirm']);
        // }
        if(empty($dataSave['mkBacSi'])){
            unset($dataSave['mkBacSi']);
        }
        if(empty($dataSave['mkBacSi'])){
            unset($dataSave['mkBacSi']);
        }else{
            $dataSave['mkBacSi'] = password_hash($dataSave['mkBacSi'], PASSWORD_BCRYPT);
        }
        if(empty($dataSave['dobBacSi'])){
            unset($dataSave['dobBacSi']);
        }
        if(empty($dataSave['tenKhoa'])){
            unset($dataSave['tenKhoa']);
        }
        if(empty($dataSave['sdtBacSi'])){
            unset($dataSave['sdtBacSi']);
        }
        if(empty($dataSave['tenBacSi'])){
            unset($dataSave['tenBacSi']);
        }
        // dd($dataSave);
        try {
            $this->doctor->update($id,$dataSave);
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

    private function validateEditDoctor($requestData)
    {
        // dd($requestData->getPost());
        $rule=[
            // 'tkBacSi'=>'valid_email|is_unique[tbacsi.tkBacSi, idBacSi, '.$requestData->getPost()['idBacSi'].']',
            'tenBacSi'=>'max_length[100]',
        ];
        $message=[
            // 'tkBacSi'=>[
            //     'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
            //     'is_unique'=>'Email đã tồn tại'
            // ],
            'tenBacSi'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ]
        ];

        if(!empty($requestData->getPost()['mkBacSi'])){
            $rule['mkBacSi'] = 'max_length[100]|min_length[3]';
            // $rule['password_comfirm'] = 'matches[mkBacSi]';

            $message=[
                'mkBacSi'=>[
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

    public function deleteDoctor($idBacSi)
    {
        // dd($idBacSi);
        try {
            $this->doctor->where('idBacSi',$idBacSi)->delete();
            // $this->doctor->delete($idBacSi);
            return [
                'status'=>ResultUtils::STATUS_CODE_OK,
                'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
                'message'=>['success'=>'Xoa dữ liệu thành công']
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
    //     $tbacsi =$this->doctor->where('tkBacSi', $param['tkBacSi'])->first();
    //     if(!$tbacsi){
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_ERR,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
    //             'message'=>[
    //                 'notExist' => 'email không tồn tại'
    //             ]
    //         ];  
    //     }
    //     if(!password_verify($param['mkBacSi'],$tbacsi['mkBacSi'])){
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_ERR,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
    //             'message'=>[
    //                 'wrongPass' => 'Mật khẩu không đúng'
    //             ]
    //         ];
    //     }
    //     $session = session();
    //     unset($tbacsi['mkBacSi']);
    //     $session->set('BacSi_login',$tbacsi);
    //     return [
    //         'status'=>ResultUtils::STATUS_CODE_OK,
    //         'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
    //         'message'=>null
    //         ];
    // }
    // private function validateLogin($reqData){
    //     $rule=[
    //         // 'tkBenhNhan'=>'valid_email|is_unique[tbenhnhan.tkBenhNhan]',
    //         'tkBacSi'=>'valid_email',
    //         // 'tenBenhNhan'=>'max_length[100]',
    //         'mkBacSi'=>'max_length[30]|min_length[3]',
    //         // 'password_comfirm'=>'matches[password]',
    //     ];
    //     $message=[
    //         'tkBacSi'=>[
    //             'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
    //             // 'is_unique'=>'Email đã tồn tại'
    //         ],
    //         // 'tenBenhNhan'=>[
    //         //     'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
    //         // ],
    //         'password'=>[
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