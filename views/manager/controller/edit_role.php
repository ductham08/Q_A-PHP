<?php

    require_once("../../../config/config.php");
    session_start();

    $userId = $_POST['userId'];
    $value = $_POST['value'];

    $sqlUpdateRole = "UPDATE `users` SET `role`='$value' WHERE id = $userId";
    $dataUpdateRole = executeQuery($sqlUpdateRole);


    // Trả về kết quả dưới dạng JSON
    echo json_encode($dataUpdateRole);
?>