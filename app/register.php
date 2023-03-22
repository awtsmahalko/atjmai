<?php
include 'core/config.php';
if (isset($_SESSION['user']['id'])) {
  header("location:index.php");
}
$csrf = Components::csrf();
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
        <style>
					.register-form-wrap .nav {
					    -webkit-box-pack: center;
					    -ms-flex-pack: center;
					    justify-content: center;
					    margin-bottom: 30px;
					}
					ul li {
					    list-style: none;
					}
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

					.register-form-wrap .nav .nav-link.active {
					    background-color: #03a84e;
					    border-color: #03a84e;
					    color: #fff;
					}

					.register-form-wrap .nav .nav-link {
					    background-color: #fff;
					    border: 1px solid #eef0f5;
					    border-radius: 5px;
					    color: #272a33;
					    font-size: 15px;
					    width: 130px;
					    height: 42px;
					    padding: 4px;
					    transition: all 0.3s ease-out;
					    -webkit-transition: all 0.3s ease-out;
					    -moz-transition: all 0.3s ease-out;
					    -ms-transition: all 0.3s ease-out;
					    -o-transition: all 0.3s ease-out;
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
											<a href="signin.php"><i class="ti-user mr-1"></i> Sigin</a>
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
    <section class="account-login-area bg-cover" style="background:#191f2b url(../assets/img/front_bg.webp) no-repeat;">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-8 col-lg-8 col-xl-8">
						<div class="login-register-form-wrap register-form-wrap">
              <div class="login-register-form">
                <div class="form-title">
                  <h4 class="title">Register Now</h4>
                </div>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="candidate-tab" data-bs-toggle="pill" data-bs-target="#candidate" type="button" role="tab" aria-controls="candidate" aria-selected="true"><i class="fa fa-solid fa-user-graduate"></i> Alumni</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="employer-tab" data-bs-toggle="pill" data-bs-target="#employer" type="button" role="tab" aria-controls="employer" aria-selected="false" tabindex="-1"><i class="icofont-bag-alt"></i> Employer</button>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
                    <form action="#" id="frmRegister">
                    	<input type='hidden' value='S' name='user_category'>
                    	<?=$csrf?>
                      <div class="row">
                      	<div class="col-4">
                          <div class="form-group">
                          	<label>Firstname</label>
                            <input class="form-control" type="text" placeholder="Firstname" name="user_fname" required>
                          </div>
                        </div>
                      	<div class="col-4">
                          <div class="form-group">
                          	<label>Middlename</label>
                            <input class="form-control" type="text" placeholder="Middlename" name="user_mname">
                          </div>
                        </div>
                      	<div class="col-4">
                          <div class="form-group">
                          	<label>Lastname</label>
                            <input class="form-control" type="text" placeholder="Lastname" name="user_lname" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      	<div class="col-6">
                          <div class="form-group">
                          	<label>Course</label>
                            <select class="form-control" id="course" name="course_id" required>
                        				<option value="">Please Select</option>
                        				<?=Courses::options()?>
                            </select>
                          </div>
                        </div>
                      	<div class="col-6">
                          <div class="form-group">
                          	<label>Date of Graduation</label> 
                            <input class="form-control" type="date" name="alumni_graduation" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      	<div class="col-6">
                          <div class="form-group">
                          	<label>Employer</label> 
                            <input class="form-control" type="text" placeholder="Employer" name="work_employer" required>
                          </div>
                        </div>
                      	<div class="col-6">
                          <div class="form-group">
                          	<label>Position</label>
                            <input class="form-control" type="text" placeholder="Position" name="work_designation" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                          	<label>Company Address</label>
                            <input class="form-control" type="text" placeholder="Company Address" name="work_place" required>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                          	<label>Email Address</label>
                            <input class="form-control" type="email" placeholder="Email" name="user_email" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      	<div class="col-6">
                          <div class="form-group">
                          	<label>Password</label> 
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                          </div>
                        </div>
                      	<div class="col-6">
                          <div class="form-group">
                          	<label>Confirm Password</label>
                            <input class="form-control" type="password" placeholder="Confirm Password" name="password2" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <div class="remember-forgot-info">
                              <div class="remember">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                <label class="form-check-label" for="defaultCheck1">I accept our terms and conditions and privacy policy.</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <button type="submit" class="btn-theme" id="btn_register">Register Now</button>
                          </div>
                        </div>
                        <div class="col-12" id="response_register"></div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
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
                            <input class="form-control" type="password" placeholder="Confirm Password">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <div class="remember-forgot-info">
                              <div class="remember">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Aaccept our terms and conditions and privacy policy.</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <button type="button" class="btn-theme">Register Now</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="login-register-form-info">
                  <p>Already have an account? <a href="signin.php">Login</a></p>
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
		<script src="../finite/assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/select2.min.js"></script>
		<script src="../assets/js/ion.rangeSlider.min.js"></script>
		<script src="../assets/js/counterup.min.js"></script>
		<script src="../assets/js/materialize.min.js"></script>
		<script src="../assets/js/metisMenu.min.js"></script>
		<script>
			
			//Loader	
			$(window).on('load', function () {
				$('.Loader').delay(350).fadeOut('slow');
				$('body').delay(350).css({ 'overflow': 'visible' });
			})
			
			// Count
			$(window).on('load', function() {
				$('.count').counterUp({
					delay:20,
					time: 800
				});
			});
	
		
			// Specialisms 
			$("#course").select2({
				placeholder: "Please Select"
			});

			$("#frmRegister").submit(function(e){
	      e.preventDefault();
	      $("#btn_register").prop('disabled',true);
	      $("#btn_register").html('Registering...');
	      $.post("controller/web.php?uri=signup",$("#frmRegister").serialize(),function(data,status){
	          // var res = JSON.parse(data);
	          if(data == 1){
	          	// SUCCESS
	          	$("#response_register").html('<div class="alert alert-primary" role="alert">Successfully registered! <br> <b> Page will redirect in <span id="countdown">5</span> seconds!</div>');
	          	countDown();
	          }else if(data == 2){
	          	// EMAIL ALREADY TAKEN
	          	$("#response_register").html('<div class="alert alert-danger" role="alert">Email is already taken!</div>');
	          }else if(data == -2){
	          	// PASSWORD DOES NOT MATCH
	          	$("#response_register").html('<div class="alert alert-danger" role="alert">Password does not match!</div>');
	          }else if(data == -1){
	          	// EXPIRED CSRF TOKEN
	          	$("#response_register").html('<div class="alert alert-danger" role="alert">Token already expired!<br> <b> Page will redirect in <span id="countdown">5</span> seconds!</div>');
	          	countDown();
	          }else{
	          	$("#response_register").html('<div class="alert alert-danger" role="alert">'+data+'</div>');
	          }
						$("#btn_register").prop('disabled',false);
	      		$("#btn_register").html('Register Now');
	      });
	    });
      function countDown()
      {
        var countdownSeconds = 5;
        var countdownLabel = document.getElementById('countdown');
        var countdownInterval = setInterval(function() {
          countdownLabel.innerHTML = countdownSeconds--;
          if (countdownSeconds < 0) {
            location.reload();
          }
        }, 1000);
      }
		</script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		
	</body>
</html>