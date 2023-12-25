<?php
    require_once("./config/config.php");

    session_start();

    $action = isset($_GET["action"]) ? $_GET["action"] : "";
    $user = !empty($_SESSION['user']) ? $_SESSION['user'] : '' ;

    // var_dump($user); 
    // die;


    if(empty($user)){

        switch ($action) {
            case "":
                require("./views/client/login.php");
                break;

            case "login":
                require("./views/client/login.php");
                break;
                
            case "logout":
                require("./views/client/logout.php");
                break;
                    
            default:
        }

    }
    
    switch ($action) {
        case "":
            require("./views/client/index.php");
            break;

        case "client":
            require("./views/client/index.php");

        case "view-question":
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

        default:
    }


    
?>

<style>
    .logo-box {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>