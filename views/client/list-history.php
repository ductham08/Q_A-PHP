<?php

    $userSession = !empty($_SESSION['user']) ? $_SESSION['user'] : '' ;
    $email = $userSession['email'];

    $sqlFindUser = "SELECT * FROM `users` WHERE email = '$email'";
    $user = executeQuery($sqlFindUser, false);

    $idUser = $user['data']['id'];

    $sqlGetHistory = "SELECT exam_history.currentDate as time,exam_history.*, topics.* FROM `exam_history` JOIN topics ON topics.id = exam_history.id_topic WHERE exam_history.id_user = $idUser";

    $dataAllHistory = executeQuery($sqlGetHistory, true) ?: [];
    $data = $dataAllHistory['data'] != null ? $dataAllHistory['data'] : [];

?>


<div class="row"  style="margin-left: 0">
    <h4 class="header-title">Lịch sử làm bài</h4>
    <!-- <p class="text-muted font-13 mb-4">
        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
        that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
    </p> -->

    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Thể loại</th>
                <th>Điểm</th>
                <th>Người tạo</th>
                <th>Ngày tạo</th>
                <th>Thời gian làm bài</th>
                <th>Mức độ</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $value) : ?>
                <tr>
                    <td><?= $value['title'] ?></td>
                    <td><?= formatQuestionType($value['type']) ?></td>
                    <td><?= $value['point'] ?>  / 10</td>
                    <td>Còm</td>
                    <td><?= $value['currentDate'] ?></td>
                    <td><?= $value['time'] ?></td>
                    <td><?= formatQuestionRank($value['rank']) ?></td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
    

</div>