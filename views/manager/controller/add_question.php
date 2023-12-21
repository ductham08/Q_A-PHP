<?php

    require_once("../../../config/config.php");

    $question           = $_POST['question'] ;
    $answerA            = $_POST['answerA'] ;
    $answerB            = $_POST['answerB'] ;
    $answerC            = $_POST['answerC'] ;
    $answerD            = $_POST['answerD'] ;
    $correctAnswer      = $_POST['correctAnswer'];
    $currentDate        = $_POST['currentDate'];
    $qid                = $_POST['qid'];

    $sqlAddQuestion = "INSERT INTO `questions`(`id_topic`, `question`, `answerA`, `answerB`, `answerC`, `answerD`, `correctAnswer`, `currentDate`) VALUES 
    ('$qid', '$question','$answerA','$answerB','$answerC','$answerD','$correctAnswer','$currentDate')";
    $dataAddQuestion = executeQuery($sqlAddQuestion);


    // Trả về kết quả dưới dạng JSON
    echo json_encode($dataAddQuestion);

?>