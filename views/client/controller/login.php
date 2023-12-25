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

            $key = 'ADM_234_RIP';
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

            $encrypted = openssl_encrypt(json_encode($user), 'AES-256-CBC', $key, 0, $iv);

            // Giải mã dữ liệu
            // $decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', $key, 0, $iv);

            // var_dump($encrypted);die;
            $_SESSION['user'] = $encrypted;
        }

    }

    // Trả về kết quả dưới dạng JSON
    echo json_encode($result);

?>