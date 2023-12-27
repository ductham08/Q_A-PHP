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

    <style>
        .logo-box {
            display: flex;
            align-items: center;
            justify-content: center;
        }

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
        #toast-containe{
            z-index: 9999;
        }

        #toast-container *{
            font-size: 13px
        }

        .content table td{
            font-size: 0.85rem;
        }

        .content table th{
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <?php

        require_once("./config/config.php");

        session_start();

        $action = isset($_GET["action"]) ? $_GET["action"] : "";
        $user = !empty($_SESSION['user']) ? $_SESSION['user'] : '' ;

        if(empty($user)){

            switch ($action) {
                case "":
                    require("./views/client/login.php");
                    break;

                case "login":
                    require("./views/client/login.php");
                    break;

                case "register":
                    require("./views/client/register.php");
                    break;
                    
                default:
            }

        } else {
            switch ($action) {
                case "":
                    require("./views/client/index.php");
                    break;
        
                case "client":
                    require("./views/client/index.php");
        
                case "view-question":
                    require("./views/client/index.php");
                    break;
                    
                case "history":
                    require("./views/client/index.php");
                    break;
        
                case "logout":
                    require("./views/client/index.php");
                    break;
        
                // MANAGER
                case "manager":
                    require("./views/manager/index.php");
                    break;
            
                case "list-topic":
                    require("./views/manager/index.php");
                    break;
            
                case "list-users":
                    require("./views/manager/index.php");
                    break;
            
                case "add-topic":
                    require("./views/manager/index.php");
                    break;
            
                case "detail-question":
                    require("./views/manager/index.php");
                    break;
            
                case "detail-user":
                    require("./views/manager/index.php");
                    break;
            
                case "remove-question":
                    require("./views/manager/index.php");
                    break;
            
                case "remove-topic":
                    require("./views/manager/index.php");
                    break;
        
                default:
            }
        }
        
    ?>

    <!-- Vendor js -->
    <script src="./assets/js/vendor.min.js"></script>
    <script src="/cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Third Party js-->
    <script src="./assets/libs/peity/jquery.peity.min.js"></script>
    <script src="./assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="./assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="./assets/libs/jquery-vectormap/jquery-jvectormap-us-merc-en.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script> -->

    <!-- Dashboard init -->
    <script src="./assets/js/pages/dashboard-1.init.js"></script>

    <!-- App js -->
    <script src="./assets/js/app.min.js"></script>

        <!-- Sweet Alerts js -->
    <script src="./assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="./assets/js/pages/sweet-alerts.init.js"></script>

</body>
</html>