<?php

    $qid = $_GET['qid'];

    $sqlGetQuestion = "SELECT questions.id AS id_ques, questions.*, topics.* FROM `questions` JOIN topics ON questions.id_topic = topics.id WHERE id_topic = $qid";

    $dataAllQuestion = executeQuery($sqlGetQuestion, true) ?: [];
    $data = $dataAllQuestion['data'] != null ? $dataAllQuestion['data'] : [];

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

        <?php foreach ($data as $key => $value) : ?>
            <div class="card-box">
                <div class="question">
                    <h4 class="title-answer">Câu <?= $key + 1 ?>. <?= $value['question'] ?></h4> 
                </div>
                
                <div class="answer">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="radio radio-success mb-2 answer-item-<?= $value['id_ques'] ?>">
                                <input require type="radio" name="correctAnswer-<?= $key ?>" class="<?= $value['id_ques'] ?>" id="answerA-<?= $key ?>" value="1">
                                <label for="answerA-<?= $key ?>">
                                    <span>A: </span>
                                    <span class="sub-header"><?= $value['answerA'] ?></span>
                                </label>
                            </div>
                            <div class="radio radio-success mb-2 answer-item-<?= $value['id_ques'] ?>">
                                <input require type="radio" name="correctAnswer-<?= $key ?>" class="<?= $value['id_ques'] ?>" id="answerB-<?= $key ?>" value="2">
                                <label for="answerB-<?= $key ?>">
                                    <span>B: </span>
                                    <span class="sub-header"><?= $value['answerB'] ?></span>
                                </label>
                            </div>
                            <div class="radio radio-success mb-2 answer-item-<?= $value['id_ques'] ?>">
                                <input require type="radio" name="correctAnswer-<?= $key ?>" class="<?= $value['id_ques'] ?>" id="answerC-<?= $key ?>" value="3">
                                <label for="answerC-<?= $key ?>">
                                    <span>C: </span>
                                    <span class="sub-header"><?= $value['answerC'] ?></span>
                                </label>
                            </div>
                            <div class="radio radio-success mb-2 answer-item-<?= $value['id_ques'] ?>">
                                <input require type="radio" name="correctAnswer-<?= $key ?>" class="<?= $value['id_ques'] ?>" id="answerD-<?= $key ?>" value="4">
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

        <div class="card-box">
            <div class="button-list">
                <button id='btn-submit' type="button" class="btn btn-success waves-effect waves-light">Hoàn thành</button>
            </div>
        </div>

        <div id='res-point'>
            <b style="color: #f0643b;"><span id="point"></span></b>
        </div>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
<script>

    var qid = '<?= $qid ?>';

    $(document).ready(function() {
        // Xử lý khi nút "Lưu thông tin" trong modal được click
        
        $('.btn.btn-success').on('click', function() {

            var selectedAnswers = {};
            var selectedAnswers = {};

            $('[name^="correctAnswer-"]').each(function() {
                var questionIndex = $(this).attr('name').split('-')[1];
                var questionId = $(this).attr('class');
                var answer = $('input[name="correctAnswer-' + questionIndex + '"]:checked').val();
                selectedAnswers[questionIndex] = {
                    id: questionId,
                    answer: answer
                };
            });

            var currentDate = new Date();

            var year = currentDate.getFullYear();
            var month = currentDate.getMonth() + 1; 
            var day = currentDate.getDate();
            var hours = currentDate.getHours();
            var minutes = currentDate.getMinutes();
            var seconds = currentDate.getSeconds();

            var formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

            const dataSend = {
                dataAnswer: selectedAnswers,
                qid: qid,
                currentDate: formattedDate
            }

            $.ajax({
                type: 'POST', 
                url: './views/client/controller/check-question.php',
                data: dataSend,
                success: function(response) {
                    const res = JSON.parse(response);
                    const dataQuestion = res.dataQuestion;

                    dataQuestion.map(element => {
                        var answerItems = $('.answer-item-'+element.id);

                        if(element.resultAnswer == true){
                            $('.answer-item-'+element.id).removeClass('warring')
                            $('.answer-item-'+element.id).removeClass('active')
                            $('.answer-item-'+element.id).eq(element.index - 1).addClass('active')
                        } else {
                            $('.answer-item-'+element.id).removeClass('warring')
                            $('.answer-item-'+element.id).removeClass('active')
                            $('.answer-item-'+element.id).eq(element.user_index - 1).addClass('warring')
                        }
                        
                    });

                    $('#res-point').addClass('card-box')
                    $('#point').text('Điểm số: ' + res.point + ' / 10')

                },
                error: function(error) {
                    console.error('Đã có lỗi xảy ra: ', error);
                }
            });

        });

    });

</script>