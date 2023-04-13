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
									<li class="nav-item" role="presentation">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
											role="tab" aria-controls="home" aria-selected="true">Per Batch</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
											role="tab" aria-controls="profile" aria-selected="false">Per Colleges</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
											role="tab" aria-controls="contact" aria-selected="false">Per Courses</a>
									</li>
								</ul>

								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade active show" id="home" role="tabpanel"
										aria-labelledby="home-tab">
										<div class="_dashboard_content_body">
											<div class="row">
												<div class="col">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<select class="form-control profile-value select2"
																	name='course_id' style="width: 100%;">
																	<?= Courses::options() ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group-btn pull-right">
																<button class="btn btn-success"
																	style="padding: 5px !important;"><span
																		class="fa fa-refresh"></span> Generate</button>
																<button class="btn btn-primary"
																	style="padding: 5px !important;"><span
																		class="fa fa-print"></span> Print</button>
															</div>
														</div>
													</div>
													<hr>
													<div class="row">
														<div class="col-lg-12 col-md-12 text-center">
															<h3>Alumni Report</h3>
															<h4>Batch 2013</h4>
														</div>
														<table class="table table-bordered table-striped">
															<thead class="thead-light">
																<tr>
																	<th scope="col">#</th>
																	<th scope="col">Alumni</th>
																	<th scope="col">Contact #</th>
																	<th scope="col">Program</th>
																	<th scope="col">Occupation</th>

																</tr>
															</thead>
															<tbody>
																<tr>
																	<td colspan="5">Graduate School</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td><img src="<?=BASE_URL?>/assets/img/users/default_male.png"
																			class="img-fluid circle"
																			style="width: 50px;">Carton, Eduard Rino
																	</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="tab-pane fade" id="profile" role="tabpanel"
										aria-labelledby="profile-tab">
										<div class="_dashboard_content_body">
											<div class="row">
												<div class="col">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<select class="form-control profile-value select2"
																	name='course_id' style="width: 100%;">
																	<?= Courses::options() ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group-btn">
																<button class="btn btn-success"
																	style="padding: 5px !important;"><span
																		class="fa fa-refresh"></span> Generate</button>
																<button class="btn btn-primary"
																	style="padding: 5px !important;"><span
																		class="fa fa-print"></span> Print</button>
															</div>
														</div>
													</div>
													<hr>
													<div class="row">
														<div class="col-lg-12 col-md-12 text-center">
															<h3>Alumni Report</h3>
															<h4>Graduate School</h4>
														</div>
														<table class="table table-bordered table-striped">
															<thead class="thead-light">
																<tr>
																	<th scope="col">#</th>
																	<th scope="col">Alumni</th>
																	<th scope="col">Contact #</th>
																	<th scope="col">Program</th>
																	<th scope="col">Occupation</th>

																</tr>
															</thead>
															<tbody>
																<tr>
																	<td colspan="5">Batch 1998</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>MIT</td>
																	<td>IT Programmer</td>
																</tr>
															</tbody>
														</table>
													</div>
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
																	name='course_id' style="width: 100%;">
																	<?= Courses::options() ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group-btn pull-right">
																<button class="btn btn-success"
																	style="padding: 5px !important;"><span
																		class="fa fa-refresh"></span> Generate</button>
																<button class="btn btn-primary"
																	style="padding: 5px !important;"><span
																		class="fa fa-print"></span> Print</button>
															</div>
														</div>
													</div>
													<hr>
													<div class="row">
														<div class="col-lg-12 col-md-12 text-center">
															<h3>Alumni Report</h3>
															<h4>Master in Information Technology</h4>
														</div>
														<table class="table table-bordered table-striped">
															<thead class="thead-light">
																<tr>
																	<th scope="col">#</th>
																	<th scope="col">Alumni</th>
																	<th scope="col">Contact #</th>
																	<th scope="col">Occupation</th>

																</tr>
															</thead>
															<tbody>
																<tr>
																	<td colspan="5">Batch 1998</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>IT Programmer</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Carton, Eduard Rino</td>
																	<td>0909009909</td>
																	<td>IT Programmer</td>
																</tr>
															</tbody>
														</table>
														<div class="col-lg-12 col-md-12">
															<p>Prepared by : Eduard Rino Carton <br> Date Generated :
																01/02/2020</p>
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

</script>