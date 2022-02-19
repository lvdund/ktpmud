<?php

namespace App\Services;
use App\Models\AppointmentModel;
use App\Common\ResultUtils;
use Exception;

class AppointmentService extends BaseService
{
    private $ph;

    function __construct()
    {
        parent::__construct();
        $this->ph = new AppointmentModel();
        $this->ph->protect(false);
    }

    public function getAllAppointment()
    {
        return $this->ph->findAll();
    }

    public function addAppointmentInfo($requestData)
    {
        $validate = $this->validateAddAppointment($requestData);

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
                $this->ph->save($dataSave);
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
    private function validateAddAppointment($requestData)
    {
        $rule=[
            // 'tkBacSi'=>'valid_email|is_unique[tbacsi.tkBacSi]',
            // 'tenBacSi'=>'max_length[100]',
            // 'mkBacSi'=>'max_length[100]|min_length[3]',
            // 'password_comfirm'=>'matches[mkBacSi]',
        ];
        $message=[
            // 'tkBacSi'=>[
            //     'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
            //     'is_unique'=>'Email đã tồn tại'
            // ],
            // 'tenBacSi'=>[
            //     'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            // ],
            // 'mkBacSi'=>[
            //     'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
            //     'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
            // ],
            // 'password_comfirm'=>[
            //     'matches'=>'Mật khẩu không khớp'
            // ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function getAppointmentByID($idPH)
    {
        return $this->ph->where('idPH',$idPH)->first();
    }

    // public function updateAppointmentInfo($requestData,$id)
    // {
    //     $validate = $this->validateEditAppointment($requestData);

    //     if($validate->getErrors()){
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_ERR,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
    //             'message'=>$validate->getErrors()
    //         ];
    //     }
        
    //     $dataSave = $requestData->getPost();

    //     try {
    //         $this->ph->update($id,$dataSave);
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_OK,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
    //             'message'=>['success'=>'Cap nhat dữ liệu thành công']
    //         ];
    //     } catch (Exception $e) {
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_ERR,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
    //             'message'=>['success'=> $e->getMessage()]
    //         ];
    //     }
    // }

    // private function validateEditAppointment($requestData)
    // {
    //     // dd($requestData->getPost());
    //     $rule=[
    //         // 'tkBacSi'=>'valid_email|is_unique[tbacsi.tkBacSi, idPH, '.$requestData->getPost()['idPH'].']',
    //         // 'tenBacSi'=>'max_length[100]',
    //     ];
    //     $message=[
    //         // 'tenBacSi'=>[
    //         //     'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
    //         // ]
    //     ];

    //     // if(!empty($requestData->getPost()['mkBacSi'])){
    //     //     $rule['mkBacSi'] = 'max_length[100]|min_length[3]';

    //     //     $message=[
    //     //         'mkBacSi'=>[
    //     //             'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
    //     //             'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
    //     //         ],
    //     //     ];
    //     // }
    //     $this->validation->setRules($rule, $message);
    //     $this->validation->withRequest($requestData)->run();
    //     return $this->validation;
    // }

    // public function deleteAppointment($idPH)
    // {
    //     // dd($idPH);
    //     try {
    //         $this->ph->where('idPH',$idPH)->delete();
    //         // $this->ph->delete($idPH);
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_OK,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
    //             'message'=>['success'=>'Xoa dữ liệu thành công']
    //         ];
    //     } catch (Exception $e) {
    //         return [
    //             'status'=>ResultUtils::STATUS_CODE_ERR,
    //             'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
    //             'message'=>['success'=> $e->getMessage()]
    //         ];
    //     }
    // }

    // public function combine($data1,$data2,$data3,$data4)
    // {
    //     // print_r($data1);
    //     // echo "<br><br>";
    //     // echo $data1[0]['idPH'];
    //     // echo "<br><br>";
    //     foreach ($data1 as $key1 => $value1) {
    //         foreach ($value1 as $key11 => $value11) {
    //             echo $key11;
    //             echo "=$value11;- ";
    //             if($key11 == 'idBenhNhan'){

    //             }
    //             // foreach ($data2 as $key2 => $value2) {
    //             //     foreach ($key2 as $key22 => $value22) {
                        
    //             //     }
    //             // }
    //         }
    //     }
    // }
}