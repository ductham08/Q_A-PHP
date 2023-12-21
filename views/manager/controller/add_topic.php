<?php

    require_once("../../../config/config.php");

    $title = $_POST['title'];
    $type = $_POST['type'];
    $rank = $_POST['rank'];
    $currentDate = $_POST['currentDate'];

    $sqlAddTopic = "INSERT INTO `topics`(`title`, `type`, `rank`, `currentDate`, `id_user`) VALUES ('$title','$type','$rank','$currentDate', '1')";
    $dataAddTopic = executeQuery($sqlAddTopic);


    // Trả về kết quả dưới dạng JSON
    echo json_encode($dataAddTopic);
?>