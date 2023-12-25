<?php 

    $qid = $_GET['qid'];

    $sqlRemoveQuestion = "DELETE FROM `topics` WHERE id = $qid ";
    executeQuery($sqlRemoveQuestion, true);

    echo ("<script>window.location.href = '?action=list-topic'</script>");

?>