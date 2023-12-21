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
                    
                    <div>
                        <button type="button" class="btn btn-xs" data-toggle="modal" data-target="#con-close-modal">
                            <i class="fas fa-pen-nib"></i>
                        </button>
                    </div>
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
                <!-- Responsive modal -->
                <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Thêm câu hỏi</button>
            </div>

            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thông tin câu hỏi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body p-4">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="question" class="control-label">Câu hỏi:</label>
                                        <textarea class="form-control" id="question" rows="5"></textarea>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Đáp án A:</label>
                                        <input type="text" class="form-control" id="field-1" placeholder="Boston">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Đáp án B:</label>
                                        <input type="text" class="form-control" id="field-2" placeholder="123456">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Đáp án C:</label>
                                        <input type="text" class="form-control" id="field-3" placeholder="123456">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-4" class="control-label">Đáp án D:</label>
                                        <input type="text" class="form-control" id="field-4" placeholder="123456">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <h4 class="header-title mt-3 mt-md-0">Đáp án đúng:</h4>
                                    <p class="sub-header">
                                        Chọn đáp án đúng cho câu hỏi trên.
                                    </p>

                                    <div class="radio mb-2">
                                        <input type="radio" name="correctAnswer" id="a" value="1" checked="">
                                        <label for="a">
                                            Đáp án A
                                        </label>
                                    </div>

                                    <div class="radio mb-2">
                                        <input type="radio" name="correctAnswer" id="b" value="2" checked="">
                                        <label for="b">
                                            Đáp án B
                                        </label>
                                    </div>

                                    <div class="radio mb-2">
                                        <input type="radio" name="correctAnswer" id="c" value="3" checked="">
                                        <label for="c">
                                            Đáp án C
                                        </label>
                                    </div>

                                    <div class="radio mb-2">
                                        <input type="radio" name="correctAnswer" id="d" value="4" checked="">
                                        <label for="d">
                                            Đáp án D
                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Trở lại</button>
                            <button type="button" class="btn btn-info waves-effect waves-light btn-submit-data">Lưu thông tin</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
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