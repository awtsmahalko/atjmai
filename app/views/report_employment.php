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
									<li class="breadcrumb-item active" aria-current="page">Employment Rate</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<!-- Single Wrap -->
						<div class="_dashboard_content">
							<div class="_dashboard_content_body">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<input id="year_from" type="number" class="form-control" name="" value="<?= date('Y') - 2 ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input id="year_to" type="number" class="form-control" name="" value="<?= date('Y') ?>" max="<?= date('Y') ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<select class="form-control profile-value select2" id='group' style="width: 100%;">
												<option value="per-batch">By Batch</option>
												<option value="per-college">By Colleges</option>
												<option value="per-program">By Programs</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group-btn pull-right">
											<button class="btn btn-outline-primary" style="padding: 5px !important;" onclick="generate_report()" id="btn_per_year"><span class="fa fa-refresh"></span> Generate</button>
										</div>
									</div>
								</div>
								<hr>
								<div class="row" id="container">
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

	.form-control {
		height: 37px;
	}
</style>
<script>
	$(document).ready(function() {
		generate_report();
	});

	function generate_report() {
		var year_from = $("#year_from").val();
		var year_to = $("#year_to").val();
		var group = $("#group").val();
		btn_processor('btn_per_year', true, "<span class='fa fa-spin fa-spinner'></span> Generating");
		$.post(base_controller + "generate_employment_rate", {
			year_from: year_from,
			year_to: year_to,
			group: group,
		}, function(data, status) {
			var res = JSON.parse(data);

			Highcharts.chart('container', {
				chart: {
					type: 'bar'
				},
				title: res.title,
				subtitle: res.subtitle,
				xAxis: res.xAxis,
				yAxis: {
					min: 0,
					max: 100,
					title: {
						text: 'Percentage (%)',
					},
					labels: {
						overflow: 'justify'
					}
				},
				tooltip: {
					valueSuffix: ' %'
				},
				plotOptions: {
					bar: {
						dataLabels: {
							enabled: true
						}
					}
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'top',
					x: -40,
					y: 80,
					floating: true,
					borderWidth: 1,
					backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
					shadow: true
				},
				credits: {
					enabled: false
				},
				series: res.series
			});

			btn_processor('btn_per_year', false, "<span class='fa fa-refresh'></span> Generate");
		});
	}
</script>