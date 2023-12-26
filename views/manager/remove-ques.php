<?php 

    $qid = $_GET['qid'];

    $sqlRemoveTopic = "DELETE FROM `topics` WHERE id = $qid ";
    executeQuery($sqlRemoveTopic, true);

    $sqlRemoveQuestion = "DELETE FROM `questions` WHERE id_topic = $qid ";
    executeQuery($sqlRemoveQuestion, true);

    echo ("<script>window.location.href = '?action=list-topic'</script>");

?>