<?php 

    require_once("../../config/config.php");

    $qid = $_GET['qid'];

    $sqlRemoveQuestion = "DELETE FROM `topics` WHERE id = $qid ";
    executeQuery($sqlRemoveQuestion, true);

    echo ("<script>window.location.href = '?manager=list-topic'</script>");

?>