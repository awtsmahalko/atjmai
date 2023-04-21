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
						<form id="frmProfile" enctype="multipart/form-data">
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
												<input type="file" name="file" class="custom-file-input" id="customFile"
													onchange="previewImage(this)">
												<label class="custom-file-label" for="customFile"><img
														src="../assets/img/users/<?=$_SESSION['user']['img']?>"
														id="preview" class="img-fluid rounded" alt=""></label>
											</div>
										</div>
										<div class="col">
											<div class="row">
												<div class="col-xl-12 col-lg-12">
													<div class="form-group">
														<label>Company Name</label>
														<input type="text" class="form-control profile-value"
															data-column='employer_name' name='employer_name'>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Industry</label>
														<select style="width: 100%;" class="form-control profile-value select2"
															data-column='industry_id' name='industry_id'>
															<?= Industries::options() ?>
														</select>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Contact #</label>
														<input type="text" class="form-control  profile-value"
															data-column='company_contact' name='company_contact'>
													</div>
												</div>
												<div class="col-xl-12 col-lg-12">
													<div class="form-group">
														<label>Address</label>
														<input type="text" class="form-control  profile-value"
															data-column='company_address' name='company_address'
															required>
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>
		                            <div class="row">
		                              <div class="col-md-12">
		                                <div class="form-group-btn pull-right">
										<button type="submit" class="btn btn-save" id="btn_update_profile" style="border-radius: 50px;"><span
									class="fa fa-edit"></span> Save Changes</button>
		                                </div>
		                              </div>
		                            </div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	fetchProfile();

	function fetchProfile() {
		$.post(base_controller + "employer_profile", {}, function(data, status) {
			var res = JSON.parse(data);
			console.log(res);
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
		$(".select2").select2().trigger('change');
	}

	$("#frmProfile").submit(function(e) {
		e.preventDefault();

		var formData = new FormData(this);
		btn_processor('btn_update_profile');
		// send AJAX request
		$.ajax({
			url: base_controller + "update_employer_profile",
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				if (response == 1) {
					success_update();
				} else if (response == -1) {
					token_expired();
					setTimeout(function(){
						location.reload();
					},2000);
				} else if (response = 'IMG-SUCCESS') {
					success_update('picture');
					setTimeout(function(){
						location.reload();
					},2000);
				} else {
					error_response();
				}
				btn_processor('btn_update_profile',false,'<span class="fa fa-edit"></span> Save Changes');
				// handle successful response
			},
			error: function(xhr, status, error) {
				// handle error
			}
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
	function previewImage(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				document.getElementById("preview").src = e.target.result;
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>