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
									<li class="breadcrumb-item active" aria-current="page">Employer</li>
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
									<li class="nav-item" style="width: 50%;" role="presentation">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
											role="tab" aria-controls="home" aria-selected="true">All</a>
									</li>
									<li class="nav-item" style="width: 50%;" role="presentation">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
											role="tab" aria-controls="contact" aria-selected="false">Per Industry</a>
									</li>
								</ul>

								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade active show" id="home" role="tabpanel"
										aria-labelledby="home-tab">
										<div class="_dashboard_content_body">
											<div class="row">
												<div class="col">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group-btn pull-right">
																<button class="btn btn-success"
																	style="padding: 5px !important;"
																	onclick="generate_all()" id="btn_all"><span
																		class="fa fa-refresh"></span> Generate</button>
																<button class="btn btn-primary"
																	style="padding: 5px !important;"><span
																		class="fa fa-print"></span> Print</button>
															</div>
														</div>
													</div>
													<hr>
													<div class="row" id="content_per_all"></div>
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
																	id='industry_id' style="width: 100%;">
																	<?= Industries::options() ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group-btn pull-right">
																<button id="btn_per_industry" class="btn btn-success"
																	onclick="generate_per_industry()"
																	style="padding: 5px !important;"><span
																		class="fa fa-refresh"></span> Generate</button>
																<button class="btn btn-primary"
																	style="padding: 5px !important;"><span
																		class="fa fa-print"></span> Print</button>
															</div>
														</div>
													</div>
													<hr>
													<hr>
													<div class="row" id="content_per_industry"></div>
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
		generate_all();
		generate_per_industry();
	});
	function generate_all() {
		btn_processor('btn_all', true, "<span class='fa fa-spin fa-spinner'></span> Generating");
		$.post(base_controller + "generate_employer_all", {

		}, function(data, status) {
			var res = JSON.parse(data);
			skin_per_all(res);
			btn_processor('btn_all', false, "<span class='fa fa-refresh'></span> Generate");
		});
	}

	function skin_per_all(res) {
		var header_skin = '<div class="col-lg-12 col-md-12 text-center"><img src="../assets/img/nonescost_logo.png" class="img-fluid circle" alt="" style="width:100px"><h3>Employer Report</h3><h4>' + res.course_name + '</h4></div>';

		var table_tr = "";
		for (var cIndex = 0; cIndex < res.employers.length; cIndex++) {
			const empRow = res.employers[cIndex];

			table_tr += '<tr>' +
				'<td>' + (cIndex + 1) + '</td>' +
				'<td>' + empRow.employer_name + '</td>' +
				'<td>' + empRow.company_contact + '</td>' +
				'<td>' + empRow.industry_id + '</td>' +
				'<td>' + empRow.job_title + '</td>' +
				'</tr>';

		}

		var table = '<table class="table table-bordered table-striped">' +
			'<thead class="thead-light">' +
			'<tr>' +
			'<th scope="col">#</th>' +
			'<th scope="col">Company Name</th>' +
			'<th scope="col">Contact #</th>' +
			'<th scope="col">Industry</th>' +
			'<th scope="col">Location</th>' +
			'</tr>' +
			'</thead>' +
			'<tbody>' + table_tr + '</tbody>' +
			'</table>';

		$("#content_per_all").html(header_skin + table);
	}

	function generate_per_industry() {
		btn_processor('btn_per_industry', true, "<span class='fa fa-spin fa-spinner'></span> Generating");
		$.post(base_controller + "generate_employer_per_industry", {
			industry_id: $("#industry_id").val()
		}, function(data, status) {
			var res = JSON.parse(data);
			skin_per_industry(res);
			btn_processor('btn_per_industry', false, "<span class='fa fa-refresh'></span> Generate");
		});
	}
	function skin_per_industry(res) {
		var header_skin = '<div class="col-lg-12 col-md-12 text-center"><img src="../assets/img/nonescost_logo.png" class="img-fluid circle" alt="" style="width:100px"><h3>Employer Report</h3><h4>' + res.industry_name + '</h4></div>';

		var table_tr = "";
		for (var cIndex = 0; cIndex < res.employers.length; cIndex++) {
			const empRow = res.employers[cIndex];

			table_tr += '<tr>' +
				'<td>' + (cIndex + 1) + '</td>' +
				'<td>' + empRow.employer_name + '</td>' +
				'<td>' + empRow.company_contact + '</td>' +
				'<td>' + empRow.industry_id + '</td>' +
				'<td>' + empRow.job_title + '</td>' +
				'</tr>';

		}

		var table = '<table class="table table-bordered table-striped">' +
			'<thead class="thead-light">' +
			'<tr>' +
			'<th scope="col">#</th>' +
			'<th scope="col">Company Name</th>' +
			'<th scope="col">Contact #</th>' +
			'<th scope="col">Industry</th>' +
			'<th scope="col">Location</th>' +
			'</tr>' +
			'</thead>' +
			'<tbody>' + table_tr + '</tbody>' +
			'</table>';

		$("#content_per_industry").html(header_skin + table);
	}

</script>