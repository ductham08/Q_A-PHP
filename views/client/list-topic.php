<?php

    $sqlGetQuestion = "SELECT * FROM `topics` ORDER BY 'currentDate' DESC";

    $dataAllTopic = executeQuery($sqlGetQuestion, true) ?: [];
    $data = $dataAllTopic['data'] != null ? $dataAllTopic['data'] : [];

?>


<div class="row">
    <?php foreach ($data as $key => $value) : ?>
        <div class="col-md-4">
            <div class="card">
                <h6 class="card-header">Tác Giả: Còm</h6>
                <div class="card-body">
                    <h5 class="card-title"><?= $value['title'] ?></h5>
                    <p class="card-text">Mức độ: <?= formatQuestionRank($value['rank']) ?></p>
                    <p class="card-text">Thể loại: <?= formatQuestionType($value['type']) ?></p>
                    <a href="?action=view-question&qid=<?= $value['id'] ?>" class="btn btn-primary waves-effect waves-light">Làm bài</a>
                </div>
            </div>
        </div> 
    <?php endforeach ?>

</div>