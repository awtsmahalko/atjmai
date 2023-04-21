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
									<li class="breadcrumb-item"><a href="#">Report</a></li>
									<li class="breadcrumb-item active" aria-current="page">Alumni</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<!-- Single Wrap -->
						<div class="pills_basic_tab">
							<div class="_dashboard_content">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item" style="width: 33.3333%;" role="presentation">
										<a class="nav-link active" id="batch-tab" data-toggle="tab" href="#batch"
											role="tab" aria-controls="batch" aria-selected="true">Per Batch</a>
									</li>
									<li class="nav-item" style="width: 33.3333%;" role="presentation">
										<a class="nav-link" id="per-college-tab" data-toggle="tab" href="#per-college"
											role="tab" aria-controls="per-college" aria-selected="false">Per
											Colleges</a>
									</li>
									<li class="nav-item" style="width: 33.3333%;" role="presentation">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
											role="tab" aria-controls="contact" aria-selected="false">Per Courses</a>
									</li>
								</ul>

								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade active show" id="batch" role="tabpanel"
										aria-labelledby="batch-tab">
										<div class="_dashboard_content_body">
											<div class="row">
												<div class="col">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<select class="form-control profile-value select2"
																	id='batch_year' style="width: 100%;">
																	<?= Components::option_years() ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group-btn pull-right">
																<button class="btn btn-outline-primary"
																	style="padding: 5px !important;"
																	onclick="generate_per_batch()"
																	id="btn_per_year"><span
																		class="fa fa-refresh"></span> Generate</button>
																<button class="btn btn-outline-secondary"
																	style="padding: 5px !important;"><span
																		class="fa fa-print"></span> Print</button>
															</div>
														</div>
													</div>
													<hr>
													<div class="row" id="content_per_batch"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="tab-pane fade" id="per-college" role="tabpanel"
										aria-labelledby="per-college-tab">
										<div class="_dashboard_content_body">
											<div class="row">
												<div class="col">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<select class="form-control profile-value select2"
																	name='course_id' style="width: 100%;"
																	id="college_id">
																	<?= Colleges::options() ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group-btn pull-right">
																<button class="btn btn-outline-primary"
																	style="padding: 5px !important;"
																	onclick="generate_per_colleges()"
																	id="btn_per_college"><span
																		class="fa fa-refresh"></span> Generate</button>
																<button class="btn btn-outline-secondary"
																	style="padding: 5px !important;"><span
																		class="fa fa-print"></span> Print</button>
															</div>
														</div>
													</div>
													<hr>
													<div class="row" id="content_per_college"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="tab-pane fade" id="contact" role="tabpanel"
										aria-labelledby="contact-tab">
										<div class="_dashboard_content_body">
											<div class="row">
												<div class="col">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<select class="form-control profile-value select2"
																	name='course_id' id='course_id'
																	style="width: 100%;">
																	<?= Courses::options() ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group-btn pull-right">
																<button class="btn btn-outline-primary"
																	style="padding: 5px !important;"
																	onclick="generate_per_courses()"
																	id="btn_per_course"><span
																		class="fa fa-refresh"></span> Generate</button>
																<button class="btn btn-outline-success"
																	style="padding: 5px !important;"><span
																		class="fa fa-print"></span> Print</button>
															</div>
														</div>
													</div>
													<hr>
													<div class="row" id="content_per_course"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		line-height: 34px;
	}

	.select2-container--default .select2-selection--single .select2-selection__arrow {
		height: 34px;
	}

	.select2-container--default .select2-selection--single {
		height: 37px;
	}
</style>
<script>
	$(document).ready(function() {
		generate_per_batch();
		generate_per_colleges();
		generate_per_courses();
	});
	function generate_per_batch() {
		var batch_year = $("#batch_year").val();
		btn_processor('btn_per_year', true, "<span class='fa fa-spin fa-spinner'></span> Generating");
		$.post(base_controller + "generate_alumni_per_batch", {
			batch_year: batch_year
		}, function(data, status) {
			var res = JSON.parse(data);
			skin_per_batch(res);
			btn_processor('btn_per_year', false, "<span class='fa fa-refresh'></span> Generate");
		});
	}

	function skin_per_batch(res) {
		var header_skin = '<div class="col-lg-12 col-md-12 text-center"><img src="../assets/img/nonescost_logo.png" class="img-fluid circle" alt="" style="width:100px"><h3>Alumni Report</h3><h4>Batch ' + res.batch + '</h4></div>';

		var table_tr = "";
		for (var cIndex = 0; cIndex < res.colleges.length; cIndex++) {
			const colRow = res.colleges[cIndex];
			if (colRow.alumni.length > 0) {
				table_tr += "<tr><td colspan='6'>" + colRow.college_name + "</td></tr>";
				for (var alIndex = 0; alIndex < colRow.alumni.length; alIndex++) {
					const alRow = colRow.alumni[alIndex];
					table_tr += '<tr>' +
						'<td>' + (alIndex + 1) + '</td>' +
						'<td>' + alRow.alumni_lname + ', ' + alRow.alumni_fname + ' ' + alRow.alumni_mname + '</td>' +
						'<td class="text-right">' + alRow.email + '</td>' +
						'<td>' + alRow.alumni_contact + '</td>' +
						'<td>' + alRow.course_code + '</td>' +
						'<td>' + alRow.job_title + '</td>' +
						'</tr>';
				}
			}
		}

		var table = '<table class="table table-bordered table-striped">' +
			'<thead class="thead-light">' +
			'<tr>' +
			'<th scope="col">#</th>' +
			'<th scope="col">Alumni</th>' +
			'<th scope="col" class="text-right">Email</th>' +
			'<th scope="col">Contact #</th>' +
			'<th scope="col">Program</th>' +
			'<th scope="col">Occupation</th>' +
			'</tr>' +
			'</thead>' +
			'<tbody>' + table_tr + '</tbody>' +
			'</table>';

		$("#content_per_batch").html(header_skin + table);
	}

	function generate_per_colleges() {
		var college_id = $("#college_id").val();
		btn_processor('btn_per_college', true, "<span class='fa fa-spin fa-spinner'></span> Generating");
		$.post(base_controller + "generate_alumni_per_college", {
			college_id: college_id
		}, function(data, status) {
			var res = JSON.parse(data);
			skin_per_college(res);
			btn_processor('btn_per_college', false, "<span class='fa fa-refresh'></span> Generate");
		});
	}
	function skin_per_college(res) {
		var header_skin = '<div class="col-lg-12 col-md-12 text-center"><img src="../assets/img/nonescost_logo.png" class="img-fluid circle" alt="" style="width:100px"><h3>Alumni Report</h3><h4>' + res.college_name + '</h4></div>';

		var table_tr = "";
		for (var cIndex = 0; cIndex < res.batches.length; cIndex++) {
			const colRow = res.batches[cIndex];
			if (colRow.alumni.length > 0) {
				table_tr += "<tr><td colspan='6'>Batch " + colRow.batch + "</td></tr>";
				for (var alIndex = 0; alIndex < colRow.alumni.length; alIndex++) {
					const alRow = colRow.alumni[alIndex];
					table_tr += '<tr>' +
						'<td>' + (alIndex + 1) + '</td>' +
						'<td>' + alRow.alumni_lname + ', ' + alRow.alumni_fname + ' ' + alRow.alumni_mname + '</td>' +
						'<td class="text-right">' + alRow.email + '</td>' +
						'<td>' + alRow.alumni_contact + '</td>' +
						'<td>' + alRow.course_code + '</td>' +
						'<td>' + alRow.job_title + '</td>' +
						'</tr>';
				}
			}
		}

		var table = '<table class="table table-bordered table-striped">' +
			'<thead class="thead-light">' +
			'<tr>' +
			'<th scope="col">#</th>' +
			'<th scope="col">Alumni</th>' +
			'<th scope="col" class="text-right">Email</th>' +
			'<th scope="col">Contact #</th>' +
			'<th scope="col">Program</th>' +
			'<th scope="col">Occupation</th>' +
			'</tr>' +
			'</thead>' +
			'<tbody>' + table_tr + '</tbody>' +
			'</table>';

		$("#content_per_college").html(header_skin + table);
	}

	function generate_per_courses() {
		var course_id = $("#course_id").val();
		btn_processor('btn_per_course', true, "<span class='fa fa-spin fa-spinner'></span> Generating");
		$.post(base_controller + "generate_alumni_per_course", {
			course_id: course_id
		}, function(data, status) {
			var res = JSON.parse(data);
			skin_per_course(res);
			btn_processor('btn_per_course', false, "<span class='fa fa-refresh'></span> Generate");
		});
	}

	function skin_per_course(res) {
		var header_skin = '<div class="col-lg-12 col-md-12 text-center"><img src="../assets/img/nonescost_logo.png" class="img-fluid circle" alt="" style="width:100px"><h3>Alumni Report</h3><h4>' + res.course_name + '</h4></div>';

		var table_tr = "";
		for (var cIndex = 0; cIndex < res.batches.length; cIndex++) {
			const colRow = res.batches[cIndex];
			if (colRow.alumni.length > 0) {
				table_tr += "<tr><td colspan='6'>Batch " + colRow.batch + "</td></tr>";
				for (var alIndex = 0; alIndex < colRow.alumni.length; alIndex++) {
					const alRow = colRow.alumni[alIndex];
					table_tr += '<tr>' +
						'<td>' + (alIndex + 1) + '</td>' +
						'<td>' + alRow.alumni_lname + ', ' + alRow.alumni_fname + ' ' + alRow.alumni_mname + '</td>' +
						'<td class="text-right">' + alRow.email + '</td>' +
						'<td>' + alRow.alumni_contact + '</td>' +
						'<td>' + alRow.job_title + '</td>' +
						'</tr>';
				}
			}
		}

		var table = '<table class="table table-bordered table-striped">' +
			'<thead class="thead-light">' +
			'<tr>' +
			'<th scope="col">#</th>' +
			'<th scope="col">Alumni</th>' +
			'<th scope="col" class="text-right">Email</th>' +
			'<th scope="col">Contact #</th>' +
			'<th scope="col">Occupation</th>' +
			'</tr>' +
			'</thead>' +
			'<tbody>' + table_tr + '</tbody>' +
			'</table>';

		$("#content_per_course").html(header_skin + table);
	}
</script>