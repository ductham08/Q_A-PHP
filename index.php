<?php
    require ("./config/link.php");
    require ("./config/config.php");

    $action = isset($_GET["action"]) ? $_GET["action"] : "";
    switch ($action) {
        case "":
            require("./views/client/index.php");
            break;

        case "manager":
            require("./views/manager/index.php");
            break;

        default:
    }
?>

<link rel="shortcut icon" href="assets\images\favicon.ico">

<!-- plugin css -->
<link href="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">

<!-- App css -->
<link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
<link href="assets\css\app.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Vendor js -->
<script src="assets\js\vendor.min.js"></script>

<!-- Third Party js-->
<script src="assets\libs\peity\jquery.peity.min.js"></script>
<script src="assets\libs\apexcharts\apexcharts.min.js"></script>
<script src="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets\libs\jquery-vectormap\jquery-jvectormap-us-merc-en.js"></script>

<!-- Dashboard init -->
<script src="assets\js\pages\dashboard-1.init.js"></script>

<!-- App js -->
<script src="assets\js\app.min.js"></script>