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
									<li class="breadcrumb-item active" aria-current="page">My Job Preferences</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form id="frmJobPreferences">
							<?= Components::csrf(); ?>
							<!-- Single Wrap -->
							<div class="_dashboard_content">
								<div class="_dashboard_content_header">
									<div class="_dashboard__header_flex">
										<h4><i class="fa fa-briefcase mr-1"></i>My Job Preferences</h4>
									</div>
								</div>

								<div class="_dashboard_content_body">
									<div class="row">

										<div class="col-xl-6 col-lg-6">
											<div class="form-group">
												<label class="">Job Title</label>
												<input type="text" class="form-control preference-value"
													placeholder="Who do you need?" data-column="job_title"
													name="job_title" required>
											</div>
										</div>

										<div class="col-xl-3 col-lg-3">
											<div class="form-group">
												<label class="">Minimum Salary</label>
												<input type="number" class="form-control preference-value"
													data-column="salary_min"
													name="salary_min">
											</div>
										</div>
										<div class="col-xl-3 col-lg-3">
											<div class="form-group">
												<label class="">Maximum Salary</label>
												<input type="number" class="form-control preference-value"
													data-column="salary_max"
													name="salary_max">
											</div>
										</div>

										<div class="col-xl-6 col-lg-6">
											<div class="form-group">
												<label>Type of Employment</label>
												<select class="form-control select2 preference-value" name="job_type_id"
													data-column="job_type_id" required>
													<option value="0">Any</option>
													<?= JobTypes::options() ?>
												</select>
											</div>
										</div>

										<div class="col-xl-6 col-lg-6">
											<div class="form-group">
												<label>Schedule</label>
												<select class="form-control select2 preference-value"
													data-column="job_sched_id" id="job_sched_id" required>
													<option value="0">Any</option>
													<?= JobSchedules::options() ?>
												</select>
											</div>
										</div>

										<div class="col-xl-12 col-lg-12">
											<div class="form-group">
												<label class="">Summary</label>
												<grammarly-editor-plugin>
													<textarea id="job-text" class="form-control preference-value"
														data-column="job_description" name="job_description"></textarea>
												</grammarly-editor-plugin>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Single Wrap End -->
							<button type="submit" class="btn btn-save" id="btn_update"><span class="fa fa-edit"></span>
								Save Changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	fetchAlumniPreferences();

	function fetchAlumniPreferences() {
		$.post(base_controller + "get_alumni_job_preferences", {}, function(data, status) {
			var res = JSON.parse(data);
			mapProfileValue(res);
		});
	}

	function mapProfileValue(res) {
		// Get all elements with the class name "profile-value"
		const profileValueElements = document.querySelectorAll('.preference-value');

		// Loop through each element and retrieve the value of the "data-column" attribute
		profileValueElements.forEach(element => {
			const dataColumnValue = element.getAttribute('data-column');
			element.value = res[dataColumnValue];
		});

		$(".select2").select2().trigger('change');
	}

	$("#frmJobPreferences").submit(function(e) {
		e.preventDefault();
		$("#btn_update").prop('disabled', true);
		$("#btn_update").html('Updating...');
		$.post(base_controller + "update_alumni_job_preferences", $("#frmJobPreferences").serialize(), function(data, status) {
			if (data == 1) {
				success_update();
			}
			$("#btn_update").prop('disabled', false);
			$("#btn_update").html('<span class="fa fa-edit"></span> Save Changes');
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