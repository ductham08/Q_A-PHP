<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Thêm Bộ Câu Hỏi</h4>
                <p class="sub-header">
                    Bộ câu hỏi sẽ được thêm vào danh sách chỉ khi bạn điền đầy đủ thông tin vào các mục dưới đây.
                </p>

                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="form-group mb-3">
                                <label for="simpleinput">Tiêu đề</label>
                                <input type="text" id="title_input" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="example-select">Thể loại</label>
                                <select class="form-control" id="type_input">
                                    <option>Trắc nghiệm</option>
                                    <option>Tự luận</option>
                                    <option>Tổng hợp</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="example-select">Độ khó</label>
                                <select class="form-control" id="rank_input">
                                    <option>Dễ</option>
                                    <option>Trung bình</option>
                                    <option>Khó</option>
                                    <option>Rất khó</option>
                                </select>
                            </div>

                            <!-- <div class="form-group mb-3">
                                <label for="example-fileinput">Ảnh mô tả</label>
                                <input type="file" id="example-fileinput" class="form-control-file">
                            </div> -->

                            <div class="form-group mb-3">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">
                                    <i class="far fa-save"></i>
                                    <span>Lưu thông tin</span>
                                </button>
                            </div>

                        </form>
                    </div> <!-- end col -->

                </div>
                <!-- end row-->

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>

<script>

    $(document).ready(function() {
        $('.btn-success').on('click', function() {
            var title = $('#title_input').val();
            var type = $('#type_input').val();
            var rank = $('#rank_input').val();

            var currentDate = new Date();
            var formattedDate = currentDate.toISOString().split('T')[0];

            var dataToSend = {
                title: title,
                type: type,
                rank: rank,
                currentDate: formattedDate
            };

            $.ajax({
                type: 'POST',
                url: './controller/add_question.php', 
                data: dataToSend,
                success: function(response) {
                    console.log('Dữ liệu đã được gửi thành công!');
                    console.log(response); 
                },
                error: function(error) {
                    console.error('Đã có lỗi xảy ra: ', error);
                }
            });
        });
    });

</script>