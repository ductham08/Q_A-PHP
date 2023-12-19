
<?php

    require ("./config/link.php");
    session_start();

    $action = isset($_GET["action"]) ? $_GET["action"] : "";

    $userLogin = $_SESSION['user'];
    
    if(empty($userLogin) || !isset($userLogin) || !$userLogin){
        header("location: ./signup.php");
    }

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
        

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <?php
            
            switch ($action) {
                case "":
                    require("./pages/home.php");
                    break;

                case "home":
                    require("./pages/home.php");
                    break;

                case "mission":
                    require("./pages/mission.php");
                    break;

                case "account":
                    require("./pages/account.php");
                    break;

                case "support":
                    require("./pages/support.php");
                    break;

                case "bank":
                    require("./pages/bank.php");
                    break;

                case "setting":
                    require("./pages/setting.php");
                    break;

                case "messager":
                    require("./pages/messager.php");
                    break;

                case "history-mission":
                    require("./pages/history-mission.php");
                    break;

                case "history-payout":
                    require("./pages/history-payout.php");
                    break;

                case "history-payin":
                    require("./pages/history-payin.php");
                    break;

                case "payment":
                    require("./pages/payment.php");
                    break;

                case "change-password":
                    require("./pages/change-password.php");
                    break;

                case "change-code":
                    require("./pages/change-code.php");
                    break;

                default:
            }

            ?>

        </div>
        <!-- END wrapper -->
        
    </body>
</html>