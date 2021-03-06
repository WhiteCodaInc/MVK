<html>
    <head>
        <meta charset="UTF-8">
        <title>M V K</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="shortcut icon" href="<?= base_url() ?>assets/admin/favicon2.ico" type="image/x-icon">
        <link rel="icon" href="<?= base_url() ?>assets/admin/favicon2.ico" type="image/x-icon">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>

        <!-- Bootstrap Slider -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/bootstrap-slider/slider.css"/>

        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/colorpicker/bootstrap-colorpicker.min.css"/>

        <!-- Bootstrap Time Picker -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/timepicker/bootstrap-timepicker.min.css"/>

        <!-- DATA TABLES -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/datatables/dataTables.bootstrap.css"/>

        <!-- Bootstrap WYSIHTML5 (Text Editor) -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>

        <!-- Font-Awesome -->
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>

        <!-- Ionicons -->
        <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css"/>

        <!-- Ion Slider -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/ionslider/ion.rangeSlider.css"/>

        <!-- Ion Slider Nice -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/ionslider/ion.rangeSlider.skinNice.css"/>

        <!-- Morris chart -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/morris/morris.css"/>

        <!-- jvectormap -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/jvectormap/jquery-jvectormap-1.2.2.css"/>

        <!--pickers css-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/js/plugins/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/js/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" />

        <!-- Date Picker -->
        <!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/datepicker/datepicker3.css"/>-->

        <!-- Daterange Picker -->
        <!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/daterangepicker/daterangepicker-bs3.css"/>-->

        <!-- Full Calendar -->
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.css"/>
        <link rel="stylesheet" type="text/css" media='print' href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.print.css"/>

        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/iCheck/all.css"/>

        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/iCheck/minimal/blue.css"  />

        <!-- Theme Style -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/AdminLTE.css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- Alertify -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/alertify.core.css"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/alertify.default.css"/>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>

        <!-- JQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!-- JQuery UI -->
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/AdminLTE/jquery.resize.js"></script>

        <!--BOOTSTRAP--> 
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

        <!--pickers plugins-->
        <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        <!--Cookie-->
        <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/jquery.cookie.js"></script>

        <!--Alertify-->
        <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/alertify.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/alertify.min.js"></script>


        <!--<script type="text/javascript" src="<?= base_url() ?>assets/admin/js/autohidingnavbar.js"></script>-->
        <script>

            $(function () {
                // Check the initial Poistion of the Sticky Header
                var stickyHeaderTop = $('.content-header').offset().top;
                $(window).scroll(function () {
                    if ($(window).scrollTop() > stickyHeaderTop) {
                        $('.content-header').css({position: 'fixed', top: '0px'});
                        //$('.box .create,.box .delete,.box .default,.box .publish,.box .draft').hide();
                        $('.content-header div.search').css('float', 'left');
                    } else {
                        $('.content-header').css({position: 'static', top: '0px'});
                        $('.content-header div.search').css('float', 'right');
//                        $('.content-header > h1').removeAttr('style');
                        //$('.box .create,.box .delete,.box .default,.box .publish,.box .draft').show();
                        //$('.content-header .create,.content-header .delete,.content-header .default,.content-header .publish,.content-header .draft').hide();
                    }
                });
            });
        </script>
    </head>
    <body class="skin-blue">