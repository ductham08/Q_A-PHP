<?php

    $sqlGetQuestion = "SELECT topics.*, topics.id as id_topic, questions.*, COUNT(questions.id) AS so_luong_cau_hoi FROM topics LEFT JOIN questions ON topics.id = questions.id_topic GROUP BY topics.id HAVING COUNT(questions.id) > 1";

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
                    <span class="card-text">Mức độ: <b><?= formatQuestionRank($value['rank']) ?></b></span>
                    <br>
                    <span class="card-text">Số câu hỏi: <b><?= $value['so_luong_cau_hoi'] ?> câu</b></span>
                    <br>
                    <span class="card-text">Thể loại: <b><?= formatQuestionType($value['type']) ?></b></span>
                    <br>
                    <br>
                    <a href="?action=view-question&qid=<?= $value['id_topic'] ?>" class="btn btn-primary waves-effect waves-light">Làm bài</a>
                </div>
            </div>
        </div> 
    <?php endforeach ?>

</div>