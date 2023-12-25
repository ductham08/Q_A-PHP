<?php

    require_once("../../../config/config.php");
    session_start();

    $dataAnswer = $_POST['dataAnswer'];
    $qid = $_POST['qid'];
    $currentDate = $_POST['currentDate'];

    $userSession = !empty($_SESSION['user']) ? $_SESSION['user'] : '' ;
    $email = $userSession['email'];

    $sqlFindUser = "SELECT * FROM `users` WHERE email = '$email'";
    $user = executeQuery($sqlFindUser, false);

    $idUser = $user['data']['id'];

    $sqlCountQuestion = "SELECT COUNT(*) AS total_questions FROM questions WHERE id_topic = $qid";
    $countQuestion = executeQuery($sqlCountQuestion, false);


    $totalQuestion=$countQuestion['data']['total_questions'];
    $resultAnswer = '';
    $dataQuestion = [];
    $correctAnswerFinal = [];
    $countTrue = 0;
    $countFalse = 0;
    
    foreach ($dataAnswer as $key => $value) {
        $id = $value['id'];
        $sqlCorrectAnswer = "SELECT questions.id AS id_ques, questions.correctAnswer FROM `questions` WHERE questions.id = $id";
        $correctAnswer = executeQuery($sqlCorrectAnswer, false);
        
        if($correctAnswer['data']['correctAnswer'] == $value['answer']){
            $resultAnswer = true;
            $countTrue++;
        } else {
            $resultAnswer = false;
            $countFalse++;
        }

        $dataQuestion[] = [
            'id'            => $value['id'],
            'resultAnswer'  => $resultAnswer,
            'index'         => $correctAnswer['data']['correctAnswer'],
            'user_index'    => $value['answer'],
        ];
    }
    
    $point = (10 / $totalQuestion) * $countTrue;
    
    $sqlSaveHistory = "INSERT INTO `exam_history`(`id_user`, `id_topic`, `point`, `currentDate`) VALUES ('$idUser','$qid','$point','$currentDate')";
    $hisstory = executeQuery($sqlSaveHistory, false);
    
    $result = [
        'dataQuestion'      => $dataQuestion,
        'point'             => customRound($point)
    ];

    echo json_encode($result); 

?>