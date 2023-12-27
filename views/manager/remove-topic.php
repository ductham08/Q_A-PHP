<?php 

    $qid = $_GET['qid'];

    $userSession = !empty($_SESSION['user']) ? $_SESSION['user'] : '' ;
    $email = $userSession['email'];

    $sqlFindUser = "SELECT * FROM `users` WHERE email = '$email'";
    $user = executeQuery($sqlFindUser, false);

    $idUser = $user['data']['id'];

    $sqlRemoveTopic = "DELETE FROM `topics` WHERE id = $qid ";
    executeQuery($sqlRemoveTopic, true);

    $sqlRemoveQuestion = "DELETE FROM `questions` WHERE id_topic = $qid ";
    executeQuery($sqlRemoveQuestion, true);

    $sqlRemoveHistory = "DELETE FROM `exam_history` WHERE id_user = $idUser and id_topic = $qid ";
    executeQuery($sqlRemoveHistory, true);

    echo ("<script>window.location.href = '?action=list-topic'</script>");

?>