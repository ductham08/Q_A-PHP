<?php

    require_once("../../../config/config.php");
    session_start();

    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $hashPass = md5($password);

    $sqlFindUser = "SELECT * FROM `users` WHERE email = '$email'";
    $user = executeQuery($sqlFindUser, true) ;

    if(empty($user['data'])){

        $result= [
            'error_code'    => 1,
            'message'       => "Email này không tồn tại trên hệ thống!"
        ];

    } else {

        if($user['data'][0]['pasword'] != $hashPass){

            $result= [
                'error_code'    => 1,
                'message'       => "Sai thông tin tài khoản hoặc mật khẩu!"
            ];

        } else {
            $result= [
                'error_code'    => 0,
                'message'       => 'Đăng nhập hệ thống thành công! Bạn sẽ quay lại trang chủ sau giây lát'
            ];

            $user = [
                'email' => $user['data'][0]['email'],
                'role' => $user['data'][0]['role'],
            ];

            $_SESSION['user'] = $user;
        }

    }

    // Trả về kết quả dưới dạng JSON
    echo json_encode($result);

?>