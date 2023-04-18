<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
									<li class="breadcrumb-item active" aria-current="page">JJob Posting</li>
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
											role="tab" aria-controls="home" aria-selected="true">Per Year</a>
									</li>
									<li class="nav-item" style="width: 50%;" role="presentation">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
											role="tab" aria-controls="contact" aria-selected="false">Per Month</a>
									</li>
								</ul>

								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade active show" id="home" role="tabpanel"
										aria-labelledby="home-tab">
										<div class="_dashboard_content_body">
											<div class="row" id="job_per_year">
											</div>
										</div>
									</div>

									<div class="tab-pane fade" id="contact" role="tabpanel"
										aria-labelledby="contact-tab">
										<div class="_dashboard_content_body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<select class="form-control profile-value select2"
															id='batch_year' style="width: 100%;">
															<?= Components::option_years('') ?>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group-btn pull-right">
														<button class="btn btn-success" style="padding: 5px !important;"
															onclick="generate_per_batch()" id="btn_per_year"><span
																class="fa fa-refresh"></span> Generate</button>
													</div>
												</div>
											</div>
											<hr>
											<div class="row" id="job_per_month">
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
	generate_per_year();
	generate_per_month();
	function generate_per_month() {
		// Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
		Highcharts.chart('job_per_month', {
			chart: {
				type: 'line'
			},
			title: {
				text: 'Job Posting per month'
			},
			subtitle: {
				text: '2023'
			},
			xAxis: {
				categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			},
			yAxis: {
				title: {
					text: 'Number of Posts'
				}
			},
			plotOptions: {
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: false
				}
			},
			series: [{
				name: 'Aerospace & Defense',
				data: [49, 71, 106, 129, 49, 71, 106, 129, 49, 71, 106, 129]

			}, {
				name: 'Agriculture',
				data: [83, 78, 10, 129, 49, 71, 98, 93, 106, 3, 6, 11]

			}, {
				name: 'Information Technology',
				data: [48, 38, 3, 106, 129, 49, 71, 41, 47, 4, 6, 23]

			}, {
				name: 'Education',
				data: [42, 106, 129, 48, 71, 33, 34, 39, 52, 106, 129, 48]

			}]
		});

	}
	function generate_per_year() {
		Highcharts.chart('job_per_year', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'Job Posting Per Year'
			},
			subtitle: {
				text: '2019 - 2023'
			},
			xAxis: {
				categories: [
					'2019',
					'2020',
					'2021',
					'2022',
					'2023'
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Number of Post'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: 'Aerospace & Defense',
				data: [49.9, 71.5, 106.4, 129.2]

			}, {
				name: 'Agriculture',
				data: [83.6, 78.8, 98.5, 93.4, 106.0]

			}, {
				name: 'Information Technology',
				data: [48.9, 38.8, 39.3, 41.4, 47.0]

			}, {
				name: 'Education',
				data: [42.4, 33.2, 34.5, 39.7, 52.6]

			}]
		});
	}
</script>