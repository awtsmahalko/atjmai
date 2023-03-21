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
				<?php require 'template/sidebar.php';?>
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
									<li class="breadcrumb-item active" aria-current="page">My Skills</li>
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
										<h4><i class="fa fa-user mr-1"></i>My Skills</h4>
									</div>
								</div>

								<div class="_dashboard_content_body">
									<div class="row">
										<div class="col">
											<div class="row">
												<div class="pills_basic_tab">
													<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Tab 01</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tab 02</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link active" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Tab 03</a>
														</li>
													</ul>
													<div class="tab-content" id="pills-tabContent">
														<div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
															<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
														</div>
														<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
															<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
														</div>
														<div class="tab-pane fade active show" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
															<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
														</div>
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