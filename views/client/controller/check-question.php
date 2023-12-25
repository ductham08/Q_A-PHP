<?php

    require_once("../../../config/config.php");
    $dataAnswer = $_POST['dataAnswer'];
    $qid = $_POST['qid'];

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

    $result = [
        'dataQuestion'      => $dataQuestion,
        'point'             => customRound($point)
    ];

    echo json_encode($result); 

?>