<?php

    require_once("../../config/config.php");

    $manager = isset($_GET["manager"]) ? $_GET["manager"] : "";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Upvex - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="shortcut icon" href="../../assets/images/favicon.ico">

        <!-- plugin css -->
        <link href="../../assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">

        <!-- Sweet Alert-->
        <link href="../../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="../../assets/css/app.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <style>

            .detail-answer .title-answer{
                font-size: 18px;
            }

            .item-answer{
                margin: 2px 0;
                font-size: 15px;
            }

            .item-answer i{
                font-size: 15px;
            }
            .#toast-containe{
                z-index: 9999;
            }

            .#toast-container *{
                font-size: 10px
            }

        </style>
    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="../../assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">Còm<i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Tài khoản</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Cài đặt</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Đăng xuất</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="../../assets/images/logo-light.png" alt="" height="24">
                            <!-- <span class="logo-lg-text-light">Upvex</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="../../assets/images/logo-sm.png" alt="" height="28">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-question"></i>
                                    <span>  Bộ câu hỏi </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="./?manager=list-topic">
                                            <span>Danh sách</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./?manager=add-topic">
                                            <span>Thêm mới</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-user"></i>
                                    <span>  Người chơi </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="./?manager=list-users">Danh sách</a>
                                    </li>
                                    <li>
                                        <a href="">Phân quyền</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- CONTENT START -->
                <div class="content" style="padding: 15px 0 0 0">
                    
                    <?php
                        switch ($manager) {
                            case "list-topic":
                                require("./questions/list.php");
                                break;

                            case "add-topic":
                                require("./questions/add.php");
                                break;

                            case "detail-question":
                                require("./questions/detail.php");
                                break;

                            case "remove-question":
                                require("./questions/remove.php");
                                break;

                            case "list-users":
                                require("./users/list.php");
                                break;

                            case "detail-user":
                                require("./users/list.php");
                                break;

                            default:
                        }
                    ?>
                    
                </div>
                <!-- CONTENT END -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2023 &copy; Thiết kế bởi <a href="">Upvex</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

                        
            <!-- Vendor js -->
            <script src="../../assets/js/vendor.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            <!-- Third Party js-->
            <script src="../../assets/libs/peity/jquery.peity.min.js"></script>
            <script src="../../assets/libs/apexcharts/apexcharts.min.js"></script>
            <script src="../../assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="../../assets/libs/jquery-vectormap/jquery-jvectormap-us-merc-en.js"></script>
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script> -->

            <!-- Dashboard init -->
            <script src="../../assets/js/pages/dashboard-1.init.js"></script>

            <!-- App js -->
            <script src="../../assets/js/app.min.js"></script>

             <!-- Sweet Alerts js -->
            <script src="../../assets/libs/sweetalert2/sweetalert2.min.js"></script>

            <!-- Sweet alert init js-->
            <script src="../../assets/js/pages/sweet-alerts.init.js"></script>

        </div>
        <!-- END wrapper -->

        
    </body>
</html>