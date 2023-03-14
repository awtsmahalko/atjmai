<?php
session_start();
$tab_login = false;
$error = isset($_SESSION['login_error'])?$_SESSION['login_error']:'';
$login = ['user_email' => '','password' => ''];
if(isset($_SESSION['login'])){
  $login['user_email'] = $_SESSION['login']['user_email'];
  $login['password'] = $_SESSION['login']['password'];
  $tab_login = true;
}

$tab_signup = false;
$signup_error = isset($_SESSION['signup_error'])?$_SESSION['signup_error']:'';
$signup = ['user_fname' => '','user_mname' => '','user_lname' => '','email' => '','user_category' => 1, 'user_mobile' => ''];
if(isset($_SESSION['signup'])){
  $signup = $_SESSION['signup'];
  $tab_signup = true;
}
session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CPSU Private Tutor Finder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/line-awesome-font-awesome.min.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
  </head>
  <body class="sign-in">
    <div class="wrapper">
      <div class="sign-in-page">
        <div class="signin-popup">
          <div class="signin-pop">
            <div class="row">
              <div class="col-lg-6">
                <div class="cmp-info">
                  <div class="cm-logo" style="margin-bottom: 30px !important;">
                    <img src="../images/cpsu-tutor-logo.png" alt="">
                    <p>The CPSU private tutor finder will help you find tuition teachers from nearby locations.</p>
                  </div>
                  <img src="../images/cm-main-img2.png" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="login-sec">
                  <ul class="sign-control">
                    <li data-tab="tab-1" class="<?=!$tab_signup ? 'current' : '';?>">
                      <a href="#" title="">Sign in</a>
                    </li>
                    <li data-tab="tab-2" class="<?=$tab_signup ? 'current' : ''?>">
                      <a href="#" title="">Sign up</a>
                    </li>
                  </ul>
                  <div class="sign_in_sec <?=!$tab_signup ? 'current' : '';?>" id="tab-1">
                    <h3>Sign in</h3>
                    <form action="auth/login.php" method="POST">
                      <div class="row">
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                            <input type="email" name="email" placeholder="Email" value="<?=$login['user_email']?>" required>
                            <i class="la la-user"></i>
                          </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                            <input type="password" name="password" placeholder="Password" value="<?=$login['password']?>" required>
                            <i class="la la-lock"></i>
                          </div>
                        </div>
                        <div class="col-lg-12 no-pdd"><?=$error?></div>
                        <div class="col-lg-12 no-pdd">
                          <button type="submit" value="submit">Sign in</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="sign_in_sec <?=$tab_signup ? 'current' : '';?>" id="tab-2">
                    <div class="signup-tab">
                      <ul>
                        <li data-tab="1" class="current">
                          <a href="#" title="">Teacher</a>
                        </li>
                        <li data-tab="2">
                          <a href="#" title="">Student</a>
                        </li>
                      </ul>
                    </div>
                    <div class="dff-tab current">
                      <form id="frmSignUp" action="auth/signup.php" method="POST">
                        <input type="hidden" name="user_category" id="user_category" value="<?=$signup['user_category']?>">
                        <div class="row">
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="text" name="user_fname" placeholder="First Name" value="<?=$signup['user_fname']?>" required>
                              <i class="la la-user"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="text" name="user_mname" placeholder="Middle Name" value="<?=$signup['user_mname']?>">
                              <i class="la la-user"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="text" name="user_lname" placeholder="Last Name" value="<?=$signup['user_lname']?>" required>
                              <i class="la la-user"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="email" name="user_email" placeholder="Email" value="<?=$signup['email']?>" required>
                              <i class="la la-globe"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="text" name="user_mobile" placeholder="Phone" value="<?=$signup['user_mobile']?>" required>
                              <i class="la la-mobile"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="password" name="password" placeholder="Password" required>
                              <i class="la la-lock"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="password" name="password2" placeholder="Repeat Password" required>
                              <i class="la la-lock"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <?=$signup_error?>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <button type="submit" value="submit">Get Started</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../lib/slick/slick.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
  </body>
</html>