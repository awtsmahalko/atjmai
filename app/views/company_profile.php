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
				<?php require 'template/sidebar.php'; ?>
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
							<?= Components::csrf(); ?>
							<!-- Single Wrap -->
							<div class="_dashboard_content">
								<div class="_dashboard_content_header">
									<div class="_dashboard__header_flex">
										<h4><i class="fa fa-user mr-1"></i>My Company Profile</h4>
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
												<div class="col-xl-12 col-lg-12">
													<div class="form-group">
														<label>Company Name</label>
														<input type="text" class="form-control with-light profile-value" data-column='employer_name' name='employer_name'>
													</div>
												</div>
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<label>Industry</label>
														<input type="text" class="form-control with-light profile-value" data-column='employer_industry' name='employer_industry'>
													</div>
												</div>
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<label>Foundation Date</label>
														<input type="date" class="form-control with-light profile-value" data-column='employer_foundation' name='employer_foundation'>
													</div>
												</div>
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<label>Contact #</label>
														<input type="text" class="form-control with-light profile-value" data-column='employer_contact' name='employer_contact'>
													</div>
												</div>
												<div class="col-xl-12 col-lg-12">
													<div class="form-group">
														<label>Address</label>
														<input type="text" class="form-control with-light profile-value" data-column='employer_address' name='employer_address' required>
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
	fetchProfile();

	function fetchProfile() {
		$.post(base_controller + "employer_profile", {}, function(data, status) {
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

	$("#frmProfile").submit(function(e) {
		e.preventDefault();
		$("#btn_update_profile").prop('disabled', true);
		$("#btn_update_profile").html('Updating...');
		$.post(base_controller + "update_employer_profile", $("#frmProfile").serialize(), function(data, status) {
			if (data == 1) {
				// SUCCESS
				$("#response-profile-update").html('<div class="alert alert-primary" role="alert">Profile successfully updated!</div>');
			} else if (data == -1) {
				// EXPIRED CSRF TOKEN
				$("#response-profile-update").html('<div class="alert alert-danger" role="alert">Token already expired!<br> <b> Page will reload in <span id="countdown">3</span> seconds!</div>');
				countDown(3);
			} else {
				$("#response-profile-update").html('<div class="alert alert-danger" role="alert">' + data + '</div>');
			}
			$("#btn_update_profile").prop('disabled', false);
			$("#btn_update_profile").html('Save Changes');
		});
	});

	function countDown(sec = 5) {
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