<?php

    $qid = $_GET['qid'];
    $id = $_GET['id'];

    $sqlGetQuestion = "SELECT questions.id AS id_ques, questions.*, exam_history.* FROM `exam_history` JOIN questions ON questions.id_topic = exam_history.id_topic WHERE exam_history.id = $id AND questions.id_topic = $qid";

    $dataAllQuestion = executeQuery($sqlGetQuestion, true) ?: [];
    $data = $dataAllQuestion['data'] != null ? $dataAllQuestion['data'] : [];

    $dataUnz = unserialize($data[0]['data']);

    $dataMerge = array_merge($data, $dataUnz);


?>

<style>

    .active-answer *{
        color: #23b397;
    }

    .question{
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .radio.radio-success.active *{
        color: #23b397;
    }

    .radio.radio-success.warring *{
        color: #f0643b;
    }

    .radio.radio-success.warring input[type=radio]:checked+label::after{
        background-color: #f0643b;
    }

    .radio.radio-success.warring input[type=radio]:checked+label::before{
        border-color: #f0643b;
    }

</style>

<div class="row detail-answer">
    <div class="col-12">

        <div class="card-box">
            <span>
                <b>Điểm số: 1 / 10</b>
            </span>
        </div>

        <?php foreach ($data as $key => $value) : ?>
            
            <div class="card-box">
                <div class="question">
                    <h4 class="title-answer">Câu <?= $key + 1 ?>. <?= $value['question'] ?></h4> 
                </div>
                
                <div class="answer">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="radio radio-success mb-2 answer-item-<?= $value['id_ques'] ?> <?= $value['correctAnswer'] == 1 ? 'active' : '' ?> ">
                                <input disabled='true' type="radio" name="correctAnswer-<?= $key ?>" class="<?= $value['id_ques'] ?>" id="answerA-<?= $key ?>" value="1" <?= $value['correctAnswer'] == 1 ? 'checked' : '' ?> >
                                <label for="answerA-<?= $key ?>">
                                    <span>A: </span>
                                    <span class="sub-header"><?= $value['answerA'] ?></span>
                                </label>
                            </div>
                            <div class="radio radio-success mb-2 answer-item-<?= $value['id_ques'] ?> <?= $value['correctAnswer'] == 2 ? 'active' : '' ?>">
                                <input disabled='true' type="radio" name="correctAnswer-<?= $key ?>" class="<?= $value['id_ques'] ?>" id="answerB-<?= $key ?>" value="2" <?= $value['correctAnswer'] == 2 ? 'checked' : '' ?>>
                                <label for="answerB-<?= $key ?>">
                                    <span>B: </span>
                                    <span class="sub-header"><?= $value['answerB'] ?></span>
                                </label>
                            </div>
                            <div class="radio radio-success mb-2 answer-item-<?= $value['id_ques'] ?> <?= $value['correctAnswer'] == 3 ? 'active' : '' ?>">
                                <input disabled='true' type="radio" name="correctAnswer-<?= $key ?>" class="<?= $value['id_ques'] ?>" id="answerC-<?= $key ?>" value="3" <?= $value['correctAnswer'] == 3 ? 'checked' : '' ?>>
                                <label for="answerC-<?= $key ?>">
                                    <span>C: </span>
                                    <span class="sub-header"><?= $value['answerC'] ?></span>
                                </label>
                            </div>
                            <div class="radio radio-success mb-2 answer-item-<?= $value['id_ques'] ?> <?= $value['correctAnswer'] == 4 ? 'active' : '' ?>">
                                <input disabled='true' type="radio" name="correctAnswer-<?= $key ?>" class="<?= $value['id_ques'] ?>" id="answerD-<?= $key ?>" value="4" <?= $value['correctAnswer'] == 4 ? 'checked' : '' ?>>
                                <label for="answerD-<?= $key ?>">
                                    <span>D: </span>
                                    <span class="sub-header"><?= $value['answerD'] ?></span>
                                </label>
                            </div>
                        </div> 
                    </div>
                </div>

            </div>
        <?php endforeach ?>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>