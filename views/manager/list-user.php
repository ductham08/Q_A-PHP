<?php

    $sqlGetUser = "SELECT * FROM `users`";

    $dataAllUser = executeQuery($sqlGetUser, true) ?: [];
    $data = $dataAllUser['data'] != null ? $dataAllUser['data'] : [];

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Danh sách người dùng</h4>
                <!-- <p class="text-muted font-13 mb-4">
                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                    that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                </p> -->

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Phân quyền</th>
                            <th>Ngày tạo</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        <?php foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value['full_name'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= formatRoleUser($value['role']) ?></td>
                                <td><?= $value['currentDate'] ?></td>
                                <td>
                                    <select id="role" class="custom-select col-12">
                                        <option data-id="<?= $value['id'] ?>" selected='true' disabled='true'>Phân quyền</option>
                                        <option data-id="<?= $value['id'] ?>" value="0">Người dùng</option>
                                        <option data-id="<?= $value['id'] ?>" value="1">Quản trị viên</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

    $('#role').change(function() {
        var selectedOption = $(this).find('option:selected');
        var userId = selectedOption.data('id');
        var value = selectedOption.val();
        
        $.ajax({
            url: './views/manager/controller/edit_role.php',
            method: 'POST',
            data: { userId: userId, value: value },
            success: function(response) {
                const res = JSON.parse(response);

                if(res.error_code == 0){
                    toastr.success('Cập nhật thành công!');
                    location.reload();
                } else {
                    toastr.error('Có lỗi khi cập nhật!');
                }
            },
            error: function(error) {
                // Xử lý lỗi nếu có
            }
        });
    });
</script>