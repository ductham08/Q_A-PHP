<?php

    require_once("../../config/config.php");
    $sqlGetQuestion = "SELECT * FROM `topics` ORDER BY 'currentDate' ASC";

    $dataAllTopic = executeQuery($sqlGetQuestion, true) ?: [];
    $data = $dataAllTopic['data'] != null ? $dataAllTopic['data'] : [];
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Danh sách chủ đề</h4>
                <!-- <p class="text-muted font-13 mb-4">
                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                    that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                </p> -->

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Thể loại</th>
                            <th>Người tạo</th>
                            <th>Ngày tạo</th>
                            <th>Mức độ</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        <?php foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= $value['title'] ?></td>
                                <td><?= formatQuestionType($value['type']) ?></td>
                                <td>Còm</td>
                                <td><?= $value['currentDate'] ?></td>
                                <td><?= formatQuestionRank($value['rank']) ?></td>
                                <td>
                                    <a style="color:white" href="?manager=remove-question&qid=<?= $value['id'] ?>">
                                        <button class="btn btn-danger btn-xs waves-effect waves-light">
                                            <i class="fe-x-circle"></i>
                                        </button>
                                    </a>
                                    <a style="color:white" href="?manager=detail-question&qid=<?= $value['id'] ?>">
                                        <button class="btn btn-success  btn-xs waves-effect waves-light">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </a>
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