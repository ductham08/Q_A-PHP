<?php
    require_once("./config/config.php");

    $action = isset($_GET["action"]) ? $_GET["action"] : "";

    
    $userSession = !empty($_SESSION['user']) ? $_SESSION['user'] : '' ;
    $email = $userSession['email'];
    // var_dump($userSession);die;

    $sqlFindUser = "SELECT * FROM `users` WHERE email = '$email'";
    $user = executeQuery($sqlFindUser, false);

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
        <!-- App favicon -->
        

        <link rel="shortcut icon" href="./assets/images/favicon.ico">

        <!-- plugin css -->
        <link href="./assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">

        <!-- Sweet Alert-->
        <link href="./assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/app.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="./assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1"><?=  $user['data']['full_name'] ?><i class="mdi mdi-chevron-down"></i> 
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
                            <a href="./?action=logout" class="dropdown-item notify-item">
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
                            <img src="./assets/images/logo-light.png" alt="" height="24">
                            <!-- <span class="logo-lg-text-light">Upvex</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="./assets/images/logo-sm.png" alt="" height="28">
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
                                    <i class="la la-dashboard"></i>
                                    <span> Đề tài </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="./index.php">Đề thi</a>
                                    </li>
                                    <li>
                                        <a href="?action=history">Lịch sử</a>
                                    </li>
                                </ul>
                            </li>

                            <?php if ($userSession['role'] == 1) :?>
                                <li>
                                    <a href="./?action=manager">
                                        <i class="fe-layers"></i>
                                        <span> Dashboard </span>
                                    </a>
                                </li>
                            <?php endif ?>

                           

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
                        switch ($action) {
                            case "":
                                require("./views/client/list-topic.php");
                                break;

                            case "view-question":
                                require("./views/client/detail-topic.php");
                                break;

                            case "history":
                                require("./views/client/list-history.php");
                                break;

                            case "logout":
                                require("./views/client/logout.php");
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


        </div>
        <!-- END wrapper -->
        
    </body>
</html>