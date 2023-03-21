<!-- ============================ Page Title Start================================== -->
<div class="page-title bg-cover" style="background:url(../assets/img/front_bg.webp)no-repeat;" data-overlay="5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12"></div>
		</div>
	</div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Main Section Start ================================== -->
<section class="gray-bg pt-4">
	<div class="container-fluid">
		<div class="row m-0">

			<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
				<div class="dashboard-navbar overlio-top">

					<div class="d-user-avater">
						<img src="../assets/img/users/default_male.png" class="img-fluid rounded" alt="">
						<h4 id="profile-fullname"></h4>
						<span id="profile-email"></span>
					</div>

					<div class="d-navigation">
						<ul id="metismenu">
							<li class="active"><a href="index.php?q=profile"><i class="ti-user"></i>My Profile</a></li>
							<li><a href="index.php?q=skills"><i class="fa fa-gears"></i>Skills</a></li>
							<li><a href="messages.html"><i class="ti-email"></i>Messages</a></li>
							<li>
								<a href="javascript:void(0);" aria-expanded="false"><i class="fa fa-briefcase"></i>Jobs</a>
							</li>
							<li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="ti-power-off"></i>Log Out</a></li>
						</ul>
					</div>

				</div>
			</div>

			<!-- Item Wrap Start -->
			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<!-- Breadcrumbs -->
						<div class="bredcrumb_wrap">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">My Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form id="frmProfile">
							<?=Components::csrf();?>
							<!-- Single Wrap -->
							<div class="_dashboard_content">
								<div class="_dashboard_content_header">
									<div class="_dashboard__header_flex">
										<h4><i class="fa fa-user mr-1"></i>My Profile</h4>
									</div>
								</div>

								<div class="_dashboard_content_body">
									<div class="row">
										<div class="col-auto">
											<div class="custom-file avater_uploads">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile"><i class="fa fa-user"></i></label>
											</div>
										</div>

										<div class="col">
											<div class="row">
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<label>First Name</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_fname' name='alumni_fname'>
													</div>
												</div>
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<label>Middle Name</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_mname' name='alumni_mname'>
													</div>
												</div>
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_lname' name='alumni_lname'>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Course</label>
														<select class="form-control with-light profile-value" data-column='course_id' name='course_id'>
															<?= Courses::options() ?>
														</select>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Graduation Date</label>
														<input type="date" class="form-control with-light profile-value" data-column='alumni_graduation' name='alumni_graduation'>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Gender</label>
														<select class="form-control with-light profile-value" data-column='alumni_gender' name='alumni_gender'>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Contact #</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_contact' name='alumni_contact'>
													</div>
												</div>
												<div class="col-xl-12 col-lg-12">
													<div class="form-group">
														<label>Address</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_address' name='alumni_address' required>
													</div>
												</div>
												<div class="col-xl-12 col-lg-12" id="response-profile-update"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Single Wrap End -->
							<button type="submit" class="btn btn-save" id="btn_update_profile"><span class="fa fa-edit"></span> Save Changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Log In Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
		<div class="modal-content" id="registermodal">
			<div class="modal-header">
				<h4>Sign Out</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
			</div>
			<div class="modal-body">


				<div class="form-group text-center">
					<span>Are you sure you want to sign out?</span>
				</div>

				<div class="social_logs mb-4">
					<ul class="shares_jobs text-center">
						<li><a href="auth/logout.php" class="share fb">Sign out</a></li>
						<li><a href="#" class="share gp">Cancel</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<script>
	profileText();
	fetchProfile();

	function fetchProfile() {
		$.post("controller/ajax.php?q=Alumni&m=profile", {}, function(data, status) {
			var res = JSON.parse(data);
			mapProfileValue(res);
		});
	}

	function mapProfileValue(res) {
		// Get all elements with the class name "profile-value"
		const profileValueElements = document.querySelectorAll('.profile-value');

		// Loop through each element and retrieve the value of the "data-column" attribute
		profileValueElements.forEach(element => {
			const dataColumnValue = element.getAttribute('data-column');
			element.value = res[dataColumnValue];
		});
	}

	function profileText() {
		$.post("controller/ajax.php?q=Users&m=profile", {}, function(data, status) {
			var res = JSON.parse(data);
			$("#profile-fullname").html(res.fullname);
			$("#profile-email").html(res.email);
		});
	}

	$("#frmProfile").submit(function(e){
		e.preventDefault();
		$("#btn_update_profile").prop('disabled',true);
		$("#btn_update_profile").html('Updating...');
		$.post("controller/ajax.php?q=Alumni&m=update_profile",$("#frmProfile").serialize(),function(data,status){
			if(data == 1){
	          	// SUCCESS
	          	$("#response-profile-update").html('<div class="alert alert-primary" role="alert">Profile successfully updated!</div>');
			}else if(data == -1){
				// EXPIRED CSRF TOKEN
				$("#response-profile-update").html('<div class="alert alert-danger" role="alert">Token already expired!<br> <b> Page will reload in <span id="countdown">3</span> seconds!</div>');
				countDown(3);
			}else{
				$("#response-profile-update").html('<div class="alert alert-danger" role="alert">'+data+'</div>');
			}
			$("#btn_update_profile").prop('disabled',false);
			$("#btn_update_profile").html('Save Changes');
		});
	});

	function countDown(sec = 5)
	{
		var countdownSeconds = sec;
		var countdownLabel = document.getElementById('countdown');
		var countdownInterval = setInterval(function() {
		  countdownLabel.innerHTML = countdownSeconds--;
		  if (countdownSeconds < 0) {
		    location.reload();
		  }
		}, 1000);
	}
</script>