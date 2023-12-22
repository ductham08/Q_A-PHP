<?php

    require_once("../../../config/config.php");

    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $currentDate   = $_POST['currentDate'];
    $hashPass = md5($password);

    $sqlFindUser = "SELECT * FROM `users` WHERE 'email' = '$email'";
    $user = executeQuery($sqlFindUser, true) ;

    if(!empty($user['data'])){
        $result= [
            'error_code'    => 1,
            'message'       => "Email này đã được liên kết với tài khoản khác!"
        ];

        return $result;
    }

    $sqlCreateUser = "INSERT INTO `users`(`email`, `full_name`, `pasword`, `currentDate`, `avatar`) VALUES ('$email','$username','$hashPass','$currentDate','')";
    $newUser = executeQuery($sqlCreateUser, false) ;

    var_dump($newUser);die;

?>