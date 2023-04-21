<script src="https://cdn.jsdelivr.net/npm/@grammarly/editor-sdk?clientId=client_94DaLUWYhcxUnx1PtV9VtD"></script>

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
									<li class="breadcrumb-item active" aria-current="page">Create Job</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form id="frmPostJob" autocomplete="off">
							<?= Components::csrf(); ?>
							<!-- Single Wrap -->
							<div class="_dashboard_content">
								<div class="_dashboard_content_header">
									<div class="_dashboard__header_flex">
										<h4><i class="ti-briefcase mr-1"></i>Create Job Form</h4>
									</div>
								</div>

								<div class="_dashboard_content_body">
									<div class="row">

										<div class="col-xl-6 col-lg-6">
											<div class="form-group">
												<label class="">Job Title</label>
												<input type="text" class="form-control" placeholder="Who do you need?"
													name="job_title" required>
											</div>
										</div>

										<div class="col-xl-3 col-lg-3">
											<div class="form-group">
												<label class="">Salary Minimum</label>
												<input type="number" class="form-control" name="salary_min">
											</div>
										</div>

										<div class="col-xl-3 col-lg-3">
											<div class="form-group">
												<label class="">Salary Maximum</label>
												<input type="number" class="form-control" name="salary_max">
											</div>
										</div>

										<div class="col-xl-4 col-lg-6">
											<div class="form-group">
												<label>Type of Employment</label>
												<select class="form-control select2" name="job_type_id" required>
													<option value="">Select</option>
													<?= JobTypes::options() ?>
												</select>
											</div>
										</div>

										<div class="col-xl-4 col-lg-6">
											<div class="form-group">
												<label>Schedule</label>
												<select class="form-control select2" id="job_sched_id" required>
													<option value="0">Any</option>
													<?= JobSchedules::options() ?>
												</select>
											</div>
										</div>

										<div class="col-xl-4 col-lg-6">
											<div class="form-group">
												<label class="">No. of Employee</label>
												<input type="number" class="form-control" name="hire_needed"
													placeholder="How many you need?" required>
											</div>
										</div>

										<div class="col-xl-12 col-lg-12">
											<div class="form-group">
												<label class="">Job Summary</label>
												<grammarly-editor-plugin>
													<textarea id="job-text" class="form-control"
														name="job_description"></textarea>
												</grammarly-editor-plugin>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12">
											<div class="form-group">
												<label>Qualifications</label>
												<select class="form-control select2" id="courses" multiple="true"
													style="width: 100%;" name="courses[]" required>
													<?= Courses::options() ?>
												</select>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12">
											<div class="form-group">
												<label>Skills</label>
												<select class="form-control select2" id="skills" multiple="true"
													style="width: 100%;" name="skills[]" required>
													<?= Skills::options() ?>
												</select>
											</div>
										</div>
									</div>
								</div>
									<hr>
		                            <div class="row">
		                              <div class="col-md-12">
		                                <div class="form-group-btn">
										<button type="submit" class="btn btn-save" id="btn-post" style="border-radius: 50px;"><span
									class="fa fa-edit"></span> Save Changes</button>
		                                </div>
		                              </div>
		                            </div>
		                            <br>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
	// $(document).ready(function() {
	// 	$('#summernotes').summernote();
	// });


	$("#frmPostJob").submit(function(e) {
		e.preventDefault();
		$("#btn-post").prop('disabled', true);
		$("#btn-post").html('Posting Job...');
		$.post(base_controller + "add_job", $("#frmPostJob").serialize(), function(response, status) {
			if (response == 1) {
				success_add();
				setTimeout(function() {
					window.location = base_url + "app/jobs";
				}, 1500);
			} else if (response == -1) {
				token_expired();
				setTimeout(function() {
					location.reload();
				}, 1000);
			} else {
				error_response();
			}
			$("#btn-post").prop('disabled', false);
			$("#btn-post").html('Submit');
		});
	});
</script>