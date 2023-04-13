<!-- CREATE TABLE `tbl_alumni_educations` (
`educ_id` INT(11) NOT NULL AUTO_INCREMENT,
`alumni_id` INT(11) NOT NULL,
`educ_degree` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
`educ_school` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
`year_enrolled` YEAR NOT NULL,
`year_graduated` YEAR NOT NULL,
`honor_received` VARCHAR(150) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` DATETIME NULL DEFAULT NULL,
PRIMARY KEY (`educ_id`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;
 -->
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
						<!-- Single Wrap -->
						<div class="_dashboard_content">
							<div class="_dashboard_content_header row">
								<div class="col-md-6">
									<h4><i class="fa fa-graduation-cap mr-1"></i>Education</h4>

								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-sm btn-primary" id="btn_update_profile"
										style="float: right !important;" data-toggle="modal" data-target="#modalAddEduc"
										onclick="resetFields()"><span class="fa fa-plus"></span> Add Education</button>

								</div>
							</div>

							<div class="_dashboard_content_body">
								<div class="row">
									<div class="col">
										<div class="row">
											<table class="table" id="tbl_educ">
												<thead class="thead-light">
													<tr>
														<th scope="col">#</th>
														<th scope="col">Qualifications</th>
														<th scope="col">Institution</th>
														<th scope="col">Honors Received</th>
														<th scope="col">Years</th>
														<th scope="col">Action</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<div class="col-xl-12 col-lg-12" id="response-profile-update"></div>
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

<form id="frmEducation">
	<!-- Log In Modal -->
	<div class="modal fade" id="modalAddEduc" tabindex="-1" role="dialog" aria-labelledby="modaladdeduc"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
			<div class="modal-content" id="modaladdeduc">
				<div class="modal-header">
					<h4>Add Education</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"
						id="closeAddEducModal"><span aria-hidden="true"><i class="ti-close"></i></span></button>
				</div>
				<div class="modal-body">
					<input type="hidden" class="educ-value" id="educ_id" name="educ_id" data-column="educ_id">
					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<div class="form-group">
								<label>Qualifications</label>
								<input type="text" class="form-control educ-value" data-column="educ_degree"
									name='educ_degree' placeholder="Bachelor of Science in " required>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12">
							<div class="form-group">
								<label>Institution</label>
								<input type="text" class="form-control educ-value" data-column="educ_school"
									name='educ_school' placeholder="NONESCOST" required>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12">
							<div class="form-group">
								<label>Honors Received</label>
								<input type="text" class="form-control educ-value" data-column="honor_received"
									name='honor_received' placeholder="Cumlaude">
							</div>
						</div>
						<div class="col-xl-6 col-lg-6">
							<div class="form-group">
								<label>Year Start</label>
								<input type="number" class="form-control educ-value" data-column="year_enrolled"
									name='year_enrolled' required>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6">
							<div class="form-group">
								<label>Year End</label>
								<input type="number" class="form-control educ-value" data-column="year_graduated"
									name='year_graduated' required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-group">
						<button type="submit" class="btn dark-2 btn-md full-width pop-login"
							id="btn_update_education">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->
</form>

<script>
	var modal_educ = document.getElementById("modalAddEduc");
	get_educations();
	$("#frmEducation").submit(function(e) {
		e.preventDefault();

		var form_type = $("#educ_id").val() * 1;
		var text_before = form_type > 0 ? "Updating..." : "Adding...";
		var controller_post = form_type > 0 ? "update_alumni_education" : "add_alumni_education";
		$("#btn_update_education").prop('disabled', true);
		$("#btn_update_education").html(text_before);
		$.post(base_controller + controller_post, $("#frmEducation").serialize(), function(data, status) {
			$("#closeAddEducModal").click();
			if (data == 1) {
				form_type > 0 ? success_update() : success_add();
			} else {
				error_response();
			}
			get_educations();
			$("#btn_update_education").prop('disabled', false);
			$("#btn_update_education").html('Submit');
		});
	});

	function get_educations() {
		$("#tbl_educ tbody").html("<tr><td colspan='6'>Loading</td></tr>");
		$.ajax({
			url: base_controller + "get_alumni_data",
			dataType: "json",
			success: function(data) {
				$("#tbl_educ tbody").html("");
				$.each(data.alumni, function(index, element) {
					$("#tbl_educ tbody").append("<tr><td>" + element.count + "</td><td>" + element.educ_degree + "</td><td>" + element.educ_school + "</td><td>" + element.honor_received + "</td><td>" + element.year_enrolled + " - " + element.year_graduated + "</td>" +
						"<td><button class='btn btn-xs btn-primary' onclick='editEduc(" + JSON.stringify(element) + ")'  data-toggle='modal' data-target='#modalAddEduc'><span class='fa fa-edit'></span></button> <button class='btn btn-xs btn-danger' onclick='deleteEduc(" + element.educ_id + ")'><span class='fa fa-trash'></span></button></td></tr>");
				});
			}
		});
	}

	function editEduc(res) {
		const profileValueElements = document.querySelectorAll('.educ-value');

		// Loop through each element and retrieve the value of the "data-column" attribute
		profileValueElements.forEach(element => {
			const dataColumnValue = element.getAttribute('data-column');
			element.value = res[dataColumnValue];
		});
	}

	function deleteEduc(educ_id) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.post(base_controller + "delete_alumni_education", { educ_id: educ_id }, function(data, status) {
					get_educations();
					Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
					)
				});
			}
		});
	}

	function resetFields() {
		const profileValueElements = document.querySelectorAll('.educ-value');

		// Loop through each element and retrieve the value of the "data-column" attribute
		profileValueElements.forEach(element => {
			element.value = "";
		});
	}
</script>