<!-- CREATE TABLE `tbl_alumni_educations` (
 `educ_id` int(11) NOT NULL AUTO_INCREMENT,
 `alumni_id` int(11) NOT NULL,
 `educ_degree` varchar(255) DEFAULT NULL,
 `educ_school` varchar(255) DEFAULT NULL,
 `year_enrolled` year(4) NOT NULL,
 `year_graduated` year(4) NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `updated_at` datetime DEFAULT NULL,
 PRIMARY KEY (`educ_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 -->
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
									<li class="breadcrumb-item active" aria-current="page">Education</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form id="frmEducation">
							<?= Components::csrf(); ?>
							<!-- Single Wrap -->
							<div class="_dashboard_content">
								<div class="_dashboard_content_header row">
									<div class="col-md-6">
										<h4><i class="fa fa-graduation-cap mr-1"></i>Education</h4>
								
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-sm btn-primary" id="btn_update_profile" style="float: right !important;" data-toggle="modal" data-target="#modalAddEduc"><span class="fa fa-plus"></span> Add Education</button>
								
									</div>
								</div>

								<div class="_dashboard_content_body">
									<div class="row">
										<div class="col">
											<div class="row">
												<table class="table">
													<thead class="thead-light">
														<tr>
															<th scope="col">#</th>
															<th scope="col">Qualifications</th>
															<th scope="col">Institution</th>
															<th scope="col">Years</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Primary</td>
															<td>MIS</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
													</tbody>
												</table>
												<div class="col-xl-12 col-lg-12" id="response-profile-update"></div>
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

<!-- Log In Modal -->
<div class="modal fade" id="modalAddEduc" tabindex="-1" role="dialog" aria-labelledby="modaladdeduc" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
		<div class="modal-content" id="modaladdeduc">
			<div class="modal-header">
				<h4>Add Education</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
			</div>
			<div class="modal-body">


											<div class="row">
												<div class="col-xl-12 col-lg-12">
													<div class="form-group">
														<label>Qualifications</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_fname' name='alumni_fname'>
													</div>
												</div>
												<div class="col-xl-12 col-lg-12">
													<div class="form-group">
														<label>Institution</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_fname' name='alumni_fname'>
													</div>
												</div>
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<label>Middle Name</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_mname' name='alumni_mname'>
													</div>
												</div>
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_lname' name='alumni_lname'>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Course</label>
														<select class="form-control with-light profile-value" data-column='course_id' name='course_id'>
															<?= Courses::options() ?>
														</select>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Graduation Date</label>
														<input type="date" class="form-control with-light profile-value" data-column='alumni_graduation' name='alumni_graduation'>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Gender</label>
														<select class="form-control with-light profile-value" data-column='alumni_gender' name='alumni_gender'>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<label>Contact #</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_contact' name='alumni_contact'>
													</div>
												</div>
												<div class="col-xl-12 col-lg-12">
													<div class="form-group">
														<label>Address</label>
														<input type="text" class="form-control with-light profile-value" data-column='alumni_address' name='alumni_address' required>
													</div>
												</div>
												<div class="col-xl-12 col-lg-12" id="response-profile-update"></div>
											</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<script>
	function addEduc(){
		$("#modalAddEduc").modal('open');
	}
</script>