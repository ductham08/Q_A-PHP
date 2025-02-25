﻿<?php

    $action = isset($_GET["action"]) ? $_GET["action"] : "";
    $userSession = !empty($_SESSION['user']) ? $_SESSION['user'] : '' ;
    $email = $userSession['email'];

    $sqlFindUser = "SELECT * FROM `users` WHERE email = '$email'";
    $user = executeQuery($sqlFindUser, false);

?>

<style>
    .navbar-custom{
        top: 0    
    }
</style>


<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="./assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        <?=  $user['data']['full_name'] ?>
                        <i class="mdi mdi-chevron-down"></i> 
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
                            <i class="fas fa-question"></i>
                            <span>  Bộ câu hỏi </span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="./?action=list-topic">
                                    <span>Danh sách</span>
                                </a>
                            </li>
                            <li>
                                <a href="./?action=add-topic">
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
                                <a href="./?action=list-users">Danh sách</a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>
            <!-- End Sidebar -->

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">

        <!-- CONTENT START -->
        <div class="content" >
            
            <?php
                switch ($action) {

                    case "manager":
                        require("./views/manager/list-ques.php");
                        break;

                    case "list-topic":
                        require("./views/manager/list-ques.php");
                        break;

                    case "add-topic":
                        require("./views/manager/add-ques.php");
                        break;

                    case "detail-question":
                        require("./views/manager/detail-ques.php");
                        break;

                    case "remove-question":
                        require("./views/manager/remove-ques.php");
                        break;

                    case "remove-topic":
                        require("./views/manager/remove-topic.php");
                        break;

                    case "list-users":
                        require("./views/manager/list-user.php");
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

    </div>

</div>
