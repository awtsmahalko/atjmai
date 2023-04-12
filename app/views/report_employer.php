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
						<div class="_dashboard_content">
							<div class="_dashboard_content_header row">
								<div class="col-md-6">
									<h4><i class="fa fa-graduation-cap mr-1"></i>Alumni Report</h4>
								</div>
								<div class="col-md-6">
									<select class="form-control profile-value select2" data-column='course_id'
										name='course_id'>
										<?= Courses::options() ?>
									</select>
									<button type="button" class="btn btn-sm btn-primary" id="btn_update_profile"><span
											class="fa fa-print"></span>
										Generate</button>
								</div>
							</div>

							<div class="_dashboard_content_body">
								<div class="row">
									<div class="col">
										<div class="row">
											<table class="table" id="tbl_report_alumni">
												<thead class="thead-light">
													<tr>
														<th scope="col">#</th>
														<th scope="col">Alumni</th>
														<th scope="col">Batch</th>
														<th scope="col">Contact #</th>
														<th scope="col">Employer</th>
														<th scope="col">Job Title</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
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

<script>

</script>