<?php

    require_once("../../../config/config.php");
    session_start();

    $userSession = !empty($_SESSION['user']) ? $_SESSION['user'] : '' ;
    $email = $userSession['email'];

    $sqlFindUser = "SELECT * FROM `users` WHERE email = '$email'";
    $user = executeQuery($sqlFindUser, false);

    $idUser = $user['data']['id'];

    $title = $_POST['title'];
    $type = $_POST['type'];
    $rank = $_POST['rank'];
    $currentDate = $_POST['currentDate'];

    $sqlAddTopic = "INSERT INTO `topics`(`title`, `type`, `rank`, `currentDate`, `id_user`) VALUES ('$title','$type','$rank','$currentDate', '$idUser')";


    $dataAddTopic = executeQuery($sqlAddTopic);


    // Trả về kết quả dưới dạng JSON
    echo json_encode($dataAddTopic);
?>