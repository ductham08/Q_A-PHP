<?php 

    $id = $_GET['id'];
    $qid = $_GET['qid'];

    $sqlRemoveQuestion = "DELETE FROM `questions` WHERE id = $id ";
    executeQuery($sqlRemoveQuestion, true);

    echo ("<script>window.location.href = '?action=detail-question&qid=$qid'</script>");

?>