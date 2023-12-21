<?php

    require_once("../../config/config.php");
    $qid = $_GET['qid'];

    $sqlGetQuestion = "SELECT * FROM `questions` JOIN topics ON questions.id_topic = topics.id WHERE id_topic = $qid";

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

</style>

<div class="row detail-answer">
    <div class="col-12">

        <?php foreach ($data as $key => $value) : ?>
            <div class="card-box">
                <div class="question">
                    <h4 class="title-answer"><?= $value['question'] ?></h4> 
                </div>
                
                <div class="answer">
                    <div class="item-answer <?= $value['correctAnswer'] == 1 ? 'active-answer' : '' ?>">
                        <i class="<?= $value['correctAnswer'] == 1 ? 'fe-check-circle' : 'fe-x-circle' ?>"></i>
                        <span>A: </span>
                        <span class="sub-header"><?= $value['answerA'] ?></span>
                    </div>

                    <div class="item-answer <?= $value['correctAnswer'] == 2 ? 'active-answer' : '' ?>">
                        <i class="<?= $value['correctAnswer'] == 2 ? 'fe-check-circle' : 'fe-x-circle' ?>"></i>
                        <span>B: </span>
                        <span class="sub-header"><?= $value['answerB'] ?></span>
                    </div>

                    <div class="item-answer <?= $value['correctAnswer'] == 3 ? 'active-answer' : '' ?>">
                        <i class="<?= $value['correctAnswer'] == 3 ? 'fe-check-circle' : 'fe-x-circle' ?>"></i>
                        <span>C: </span>
                        <span class="sub-header"><?= $value['answerC'] ?></span>
                    </div>

                    <div class="item-answer <?= $value['correctAnswer'] == 4 ? 'active-answer' : '' ?>">
                        <i class="<?= $value['correctAnswer'] == 4 ? 'fe-check-circle' : 'fe-x-circle' ?>"></i>
                        <span>D: </span>
                        <span class="sub-header"><?= $value['answerD'] ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <div class="card-box">
            <div class="button-list">
                <button type="button" class="btn btn-success waves-effect waves-light">Hoàn thành</button>
            </div>
        </div>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
<script>

    var qid = '<?= $qid ?>';

    $(document).ready(function() {
        // Xử lý khi nút "Lưu thông tin" trong modal được click
        $('.btn-submit-data').on('click', function() {
            // Lấy thông tin từ các input, textarea và radio trong modal
            var question = $('#question').val();
            var answerA = $('#field-1').val();
            var answerB = $('#field-2').val();
            var answerC = $('#field-3').val();
            var answerD = $('#field-4').val(); 
            var correctAnswer = $("input[name='correctAnswer']:checked").val();

            var currentDate = new Date();
            var formattedDate = currentDate.toISOString().split('T')[0];

            // Tạo đối tượng chứa thông tin câu hỏi để gửi qua AJAX
            var dataToSend = {
                question: question,
                answerA: answerA,
                answerB: answerB,
                answerC: answerC,
                answerD: answerD,
                correctAnswer: correctAnswer,
                currentDate: formattedDate,
                qid: qid,
            };

            console.log(dataToSend);

            $.ajax({
                type: 'POST', 
                url: './controller/add_question.php',
                data: dataToSend,
                success: function(response) {
                    console.log('Dữ liệu đã được gửi thành công!');
                    location.reload();
                },
                error: function(error) {
                    console.error('Đã có lỗi xảy ra: ', error);
                }
            });
        });
    });

</script>