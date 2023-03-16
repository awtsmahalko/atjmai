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
        <style>
          .login-register-form-wrap {
              background-color: #f4f7f7;
              border-radius: 8px;
              padding: 48px 70px 51px;
          }
          .justify-content-center {
              justify-content: center!important;
          }

          .login-register-form {
              position: relative;
          }

          .login-register-form-wrap .form-title .title {
              border-bottom: 1px solid #d7e1dc;
              font-size: 30px;
              margin-bottom: 50px;
              padding-bottom: 24px;
              position: relative;
              text-align: center;
          }
          .login-register-form-wrap .form-title .title:before {
              background-color: #03a84e;
              content: "";
              height: 3px;
              width: 50px;
              position: absolute;
              left: 50%;
              -webkit-transform: translate(-50%, 0%);
              transform: translate(-50%, 0%);
              bottom: -2px;
          }

          ::selection {
              background: #91b2c3;
              color: #fff;
              text-shadow: none;
          }
          .login-register-form-info {
              text-align: center;
              margin: 14px 0 0;
          }
          .login-register-form .remember-forgot-info {
              display: -webkit-box;
              display: -ms-flexbox;
              display: flex;
              -webkit-box-align: center;
              -ms-flex-align: center;
              align-items: center;
              -webkit-box-pack: justify;
              -ms-flex-pack: justify;
              justify-content: space-between;
              margin-top: 16px;
          }

          .login-register-form .form-group {
              margin-bottom: 10px;
          }
          .login-register-form .btn-theme {
              display: block;
              width: 100%;
              font-size: 16px;
              margin-top: 13px;
              padding: 12px 35px 10px;
          }

          .btn-theme {
              background-color: #03a84e;
              border: 1px solid #03a84e;
              border-radius: 5px;
              color: #fff;
              display: inline-block;
              font-size: 15px;
              padding: 8px 35px 8px;
              text-align: center;
          }
        </style>
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
    
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
      <div class="header header-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                  <a class="nav-brand" href="#">
                    <img src="../assets/img/logo1.png" class="logo" alt="" />
                  </a>
                  <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper">                 
                  <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="add-listing">
                      <a href="register.php"><i class="ti-user mr-1"></i> Register</a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navigation -->
      <div class="clearfix"></div>
      <!-- ============================================================== -->
      <!-- Top header  -->
      <!-- ============================================================== -->
      
      
      <!-- ============================ Page Title End ================================== -->
      
      <!-- ============================ Main Section Start ================================== -->     
    <!--== Start Login Area Wrapper ==-->
    <section class="account-login-area hero-banner full bg-cover" style="background:#df3411 url(../assets/img/front_bg.webp) no-repeat;" data-overlay="7">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="login-register-form-wrap">
              <div class="login-register-form">
                <div class="form-title">
                  <h4 class="title">Sign In</h4>
                </div>
                <form action="#">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input class="form-control" type="password" placeholder="Password">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <div class="remember-forgot-info">
                          <div class="remember">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Remember me</label>
                          </div>
                          <div class="forgot-password">
                            <a href="#/">Forgot Password?</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button type="button" class="btn-theme">Sign In</button>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="login-register-form-info">
                  <p>Don't you have an account? <a href="register.php">Register</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Login Area Wrapper ==-->
      <!-- ============================ Main Section End ================================== -->
      
      <!-- =========================== Footer Start ========================================= -->
      <footer class="dark-footer skin-dark-footer">
        <div class="footer-bottom">
          <div class="container">
            <div class="row align-items-center">
              
              <div class="col-lg-12 col-md-12 text-center">
                <p class="mb-0">© 2022 NONESCOST Alumni Tracker with Job Matching using AI Integration</p>
              </div>
              
            </div>
          </div>
        </div>
      </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/ion.rangeSlider.min.js"></script>
    <script src="../assets/js/counterup.min.js"></script>
    <script src="../assets/js/materialize.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
  </body>
</html>