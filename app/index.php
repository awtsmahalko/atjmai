<?php
include 'core/config.php';
if (!isset($_SESSION['user']['id'])) {
  header("location:signin.php");
}

require 'routes/routes.php';

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ALMAI - Alumni Tracker with Job Matching using AI</title>

  <!-- All Plugins Css -->
  <link href="../assets/css/plugins.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../assets/css/styles.css" rel="stylesheet">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/ion.rangeSlider.min.js"></script>
  <script src="../assets/js/counterup.min.js"></script>
  <script src="../assets/js/materialize.min.js"></script>
  <script src="../assets/js/metisMenu.min.js"></script>
  <script src="../assets/js/select2.min.js"></script>
  <script type="text/javascript">
    var base_controller = "controller/web.php?uri=";
  </script>
  <script src="../assets/dist/sweetalert2/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../assets/dist/sweetalert2/sweetalert2.min.css">
</head>

<body class="blue-skin">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="Loader"></div>

  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <?php include_once('template/header.php') ?>
    <div class="clearfix"></div>
    <?php include_once('views/' . $router->route['file']) ?>
    <?php include_once('template/footer.php') ?>
  </div>
  <!-- ============================================================== -->
  <!-- This page plugins -->
  <!-- ============================================================== -->
  <script>
    //Loader  
    $(window).on('load', function() {
      $('.Loader').delay(350).fadeOut('slow');
      $('body').delay(350).css({
        'overflow': 'visible'
      });
    })

    // Count
    $(window).on('load', function() {
      $('.count').counterUp({
        delay: 20,
        time: 800
      });
    });

    // Tooltip
    $('[data-toggle="tooltip"]').tooltip()

    // Metis Menu
    $("#metismenu").metisMenu();

    // Select2
    $(".select2").select2();
  </script>
  <script>
    function success_add() {
      Swal.fire(
        'Success!',
        'Your data has been added.',
        'success'
      )
    }

    function success_update() {
      Swal.fire(
        'Success!',
        'Your data has been updated.',
        'success'
      )
    }

    function success_delete() {
      Swal.fire(
        'Deleted!',
        'Your data has been deleted.',
        'success'
      )
    }

    function error_response() {
      Swal.fire(
        'Error!',
        'Please contact your support',
        'error'
      )
    }
  </script>
</body>

</html>