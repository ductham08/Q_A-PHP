<?php

    require_once("../../../config/config.php");

    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $currentDate   = $_POST['currentDate'];
    $hashPass = md5($password);

    $sqlFindUser = "SELECT * FROM `users` WHERE email = '$email'";
    $user = executeQuery($sqlFindUser, true) ;

    if(!empty($user['data'])){

        $result= [
            'error_code'    => 1,
            'message'       => "Email này đã được liên kết với tài khoản khác!"
        ];

    } else {

        $sqlCreateUser = "INSERT INTO `users`(`email`, `full_name`, `pasword`, `currentDate`, `avatar`) VALUES ('$email','$username','$hashPass','$currentDate','')";
        $newUser = executeQuery($sqlCreateUser, false) ;
        
        if($newUser['error_code'] == 0){
            $result= [
                'error_code'    => 0,
                'message'       => "Đăng ký tài khoản thành công!"
            ];
        } else {
            $result= [
                'error_code'    => 1,
                'message'       => "Hệ thống đang bảo trì, vui lòng quay lại sau ít phút!"
            ];
        }

    }

    // Trả về kết quả dưới dạng JSON
    echo json_encode($result);

?>