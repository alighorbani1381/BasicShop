<!DOCTYPE html>
<html lang="fa">
<head>
    <style>
        h1,
        h2,
        h3 {
            font-family: IRANSANSWEB !important;
        }
    </style>
    <base href="http://localhost/Project List/Shop/Panel_Admin/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">
    <title>پنل مدیریت</title>

    <!-- Bootstrap core CSS -->
    <link href="Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="Public/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="Public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="Public/css/style.css" rel="stylesheet">
    <link href="Public/css/style-responsive.css" rel="stylesheet" />

    <!-- CheckBoxes And FontIcon !-->
    <link href="Public/css/CheckBox.css" rel="stylesheet" />
    <link href="Public/css/MaterialDesign/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- Live Icon !-->
    <script src="Public/js/liveicon/jquery-1.9.1.min.js"></script>
    <script src="Public/js/liveicon/raphael-min.js"></script>
    <script src="Public/js/liveicon/livicons-1.2.min.js"></script>
    <script src="Public/js/liveicon/liveicon.js"></script>

    <script>
        $(window).load(function() {
            setTimeout(function() {
                $('.preloader').fadeOut('slow');
            }, 400);
        });
    </script>
</head>

<body>
    <div class="preloader"></div>

    <section id="container" class="">

        <!--header start-->
        <?php require_once('TopRibbon.view.php'); ?>
        <!--header end-->

        <!--sidebar start-->
        <?php require_once('Menu.view.php'); ?>
        <!--sidebar end-->