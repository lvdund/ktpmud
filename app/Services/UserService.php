<?php

namespace App\Services;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class UserService extends BaseService
{
    private $benhnhan;

    function __construct()
    {
        parent::__construct();
        $this->benhnhan = new UserModel();
        $this->benhnhan->protect(false);
    }

    public function getAllBenhNhan()
    {
        return $this->benhnhan->findAll();
    }

    public function addBenhNhanInfo($requestData)
    {
        $validate = $this->validateAddBenhNhan($requestData);

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
            $dataSave['mkBenhNhan'] = password_hash($dataSave['mkBenhNhan'],PASSWORD_BCRYPT);
            try {
                $this->benhnhan->save($dataSave);
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
    private function validateAddBenhNhan($requestData)
    {
        $rule=[
            'tkBenhNhan'=>'valid_email|is_unique[tbenhnhan.tkBenhNhan]',
            'tenBenhNhan'=>'max_length[100]',
            'mkBenhNhan'=>'max_length[100]|min_length[3]',
            // 'password_comfirm'=>'matches[password]',
        ];
        $message=[
            'tkBenhNhan'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
                'is_unique'=>'Email đã tồn tại'
            ],
            'tenBenhNhan'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ],
            'mkBenhNhan'=>[
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

    public function getBenhNhanByID($idBenhNhan)
    {
        return $this->benhnhan->where('idBenhNhan',$idBenhNhan)->first();
    }

    public function updateBenhNhanInfo($requestData,$idBenhNhan)
    {        
        $validate = $this->validateEditBenhNhan($requestData);

        if($validate->getErrors()){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];
        }
        
        $dataSave = $requestData->getPost();
        if(empty($dataSave['mkBenhNhan'])){
            unset($dataSave['mkBenhNhan']);
        }
        if(empty($dataSave['mkBenhNhan'])){
            unset($dataSave['mkBenhNhan']);
        }else{
            $dataSave['mkBenhNhan'] = password_hash($dataSave['mkBenhNhan'], PASSWORD_BCRYPT);
        }
        if(empty($dataSave['sdtBenhNhan'])){
            unset($dataSave['sdtBenhNhan']);
        }
        if(empty($dataSave['tenBenhNhan'])){
            unset($dataSave['tenBenhNhan']);
        }
        // dd($dataSave);

        try {
            $this->benhnhan->update($idBenhNhan,$dataSave);
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

    private function validateEditBenhNhan($requestData)
    {
        $rule=[
            'tenBenhNhan'=>'max_length[100]',
        ];
        $message=[
            'tenBenhNhan'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            ]
        ];

        if(!empty($requestData->getPost()['mkBenhNhan'])){
            $rule['mkBenhNhan'] = 'max_length[100]|min_length[3]';
            $message=[
                'mkBenhNhan'=>[
                    'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                    'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
                ],
            ];
        }
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

    public function deleteBenhNhan($idBenhNhan)
    {
        try {
            $this->benhnhan->where('idBenhNhan',$idBenhNhan)->delete();
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