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
									<li class="breadcrumb-item active" aria-current="page">Work Experience</li>
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
										<h4><i class="fa fa-briefcase mr-1"></i>Work Experience</h4>

									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-sm btn-primary" id="btn_update_profile"
											style="float: right !important;" data-toggle="modal" data-target="#modalAddWorkExperience"
											onclick="resetFields()"><span class="fa fa-plus"></span> Add Work Experience</button>

									</div>
								</div>

								<div class="_dashboard_content_body">
									<div class="row">
										<div class="col">
											<div class="row">
												<table class="table" id="tbl_work">
													<thead class="thead-light">
														<tr>
															<th scope="col">#</th>
															<th scope="col">Company</th>
															<th scope="col">Job Title</th>
															<th scope="col">Achievements</th>
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

<form id="frmWorkExperience">
	<!-- Log In Modal -->
	<div class="modal fade" id="modalAddWorkExperience" tabindex="-1" role="dialog" aria-labelledby="modalworkexperience"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered login-pop-form" role="document" style="max-width: 60% !important;">
			<div class="modal-content" id="modalworkexperience">
				<div class="modal-header">
					<h4>Add Work Experience</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeAddWorkExpModal"><span
							aria-hidden="true"><i class="ti-close"></i></span></button>
				</div>
				<div class="modal-body">
					<input type="hidden" class="work-exp-value" id="work_exp_id" name="work_exp_id" data-column="work_exp_id">
					<div class="row">
						<div class="col-xl-6 col-lg-12">
							<div class="form-group">
								<label>Company Name</label>
								<input type="text" class="form-control work-exp-value" data-column="company_name"
									name='company_name' placeholder="Meta" required>
							</div>
						</div>
						<div class="col-xl-6 col-lg-12">
							<div class="form-group">
								<label>Job Title</label>
								<input type="text" class="form-control work-exp-value" data-column="job_title"
									name='job_title' placeholder="Web Developer" required>
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group mb-1">
								<input id="check_work" class="checkbox-custom" name="currently_worked" type="checkbox" onchange="currentlyWorked(this)">
								<label for="check_work" class="checkbox-custom-label">I currently worked here</label>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 year-start">
							<div class="form-group">
								<label>Year Started</label>
								<input type="month" class="form-control work-exp-value" data-column="date_hired"
									name='date_hired' required>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 year-end">
							<div class="form-group">
								<label>Year Ended</label>
								<input type="month" class="form-control work-exp-value" data-column="date_resigned"
									name='date_resigned'>
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label>Achievements<span></span></label>
								<div class="tg_grouping">
									<grammarly-editor-plugin>
									 <input type="text" id="lg-input" class="form-control with-light" placeholder="e.g. job title, career">
									</grammarly-editor-plugin>
									<a id="cmd-ChipsAjout" class="btn_groupin_tag"><i class="fa fa-plus"></i></a>
								</div>
								<div id="lg-Chips"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-group">
						<button type="submit" class="btn dark-2 btn-md full-width pop-login"
							id="btn_update_work">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->
</form>
<script>
	var chipsAchievements = [];

	function fDisplayChips() {
		// FILLS THE CHIPS ZONE FROM THE LIST
		$('#lg-Chips').material_chip({
			data: chipsAchievements
		});
	}
		// ADDING A NEW CHIP
	function fChipAdd(lChipName){
		// lChipName = lChipName.toLowerCase();
		// test1 : minimum word size
		if (!(lChipName.length > 2)){
			return 0;
		}
		// test2 :  no duplicates
		for(i=0;i<chipsAchievements.length;i++) {
			if(lChipName == chipsAchievements[i].tag){
				return 0;
			}
		}
		// tests Okay => add the chip and refresh the view
		appendAchievements(lChipName);
		fDisplayChips();
		return 1;
	};
	function appendAchievements(lChipName,id=0){
		chipsAchievements.push({"tag":lChipName,"id" : id});
	}
	$(function() {
	// delete chip command
	$('#lg-Chips').on('chip.delete', function(e, chip){
		chipsAchievements = $("#lg-Chips").material_chip('data');
	});

	$("#lg-Chips").focusin(function () {
		$("#lg-input").focus();
	});
	fDisplayChips();

// NEW CHIP COMMAND
	$("#cmd-ChipsAjout").click(function () {
		fChipAdd($("#lg-input").val()) ;
		$("#lg-input").val("");
	});
});
</script>
<script>
	get_work_experiences();
	$("#frmWorkExperience").submit(function(e) {
		e.preventDefault();

		var formData = new FormData(this);
		formData.append('achievements', JSON.stringify(chipsAchievements));

		var form_type = $("#work_exp_id").val() * 1;
		var text_before = form_type > 0 ? "Updating...":"Adding...";
		var controller_post = form_type > 0 ? "update_alumni_work" :"add_alumni_work";

		$("#btn_update_work").prop('disabled', true);
		$("#btn_update_work").html(text_before);
		$.ajax({
	      url: base_controller + controller_post,
	      type: 'POST',
	      data: formData,
	      processData: false,
	      contentType: false,
	      success: function(response) {

			$("#closeAddWorkExpModal").click();
			if(response == 1){
				form_type > 0 ? success_update() :success_add();
			}else{
				error_response();
			}
			get_work_experiences();

			$("#btn_update_work").prop('disabled', false);
			$("#btn_update_work").html('Submit');
	        // handle successful response
	      },
	      error: function(xhr, status, error) {
	        // handle error
	      }
	    });

		// $("#btn_update_work").prop('disabled', true);
		// $("#btn_update_work").html(text_before);
		// $.post(base_controller + controller_post, $("#frmWorkExperience").serialize(), function(data, status) {
		// 	$("#closeAddWorkExpModal").click();
		// 	if(data == 1){
		// 		form_type > 0 ? success_update() :success_add();
		// 	}else{
		// 		error_response();
		// 	}
		// 	get_work_experiences();
		// 	$("#btn_update_work").prop('disabled', false);
		// 	$("#btn_update_work").html('Submit');
		// });
	});

	function get_work_experiences() {
		$("#tbl_work tbody").html("<tr><td colspan='6'>Loading</td></tr>");
		$.ajax({
			url: base_controller + "get_work_experience_data",
			dataType: "json",
			success: function(data) {
				$("#tbl_work tbody").html("");
				if(data.alumni.length > 0){
					$.each(data.alumni, function(index, element) {
						if(element.achievements.length > 0){
							var achieve_li = '';
							for (var i = 0; i < element.achievements.length; i++) {
								const liRow = element.achievements[i];
								achieve_li += '<li style="list-style: initial;">'+liRow.achievement_name+'</li>';
							}
							var achieve_data = "<ul>"+achieve_li+"</ul>";
						}else{
							var achieve_data = "";
						}
						$("#tbl_work tbody").append("<tr>"+
						"<td>" + element.count + "</td>"+
						"<td>" + element.company_name + "</td>"+
						"<td>" + element.job_title + "</td>"+
						"<td>" +achieve_data+"</td>"+
						"<td>" + element.year_span + "</td>" +
						"<td>"+
						"<button type='button' class='btn btn-xs btn-primary' onclick='editWorkExperience(" + JSON.stringify(element) + ")'  data-toggle='modal' data-target='#modalAddWorkExperience'><span class='fa fa-edit'></span></button>"+
						"<button type='button' class='btn btn-xs btn-danger' onclick='deleteWork(" + element.work_exp_id + ")'><span class='fa fa-trash'></span></button>"+
						"</td>"+
						"</tr>");
					});
				}else{
					$("#tbl_work tbody").append("<tr>"+
						"<td colspan='6' align='center'>No records found</td>"+
					"</tr>");
				}
			}
		});
	}

	function editWorkExperience(res) {
		const profileValueElements = document.querySelectorAll('.work-exp-value');

		// Loop through each element and retrieve the value of the "data-column" attribute
		profileValueElements.forEach(element => {
			const dataColumnValue = element.getAttribute('data-column');
			element.value = res[dataColumnValue];
		});

		if(res.currently_worked == 1){
			$("#check_work").attr("checked",true);
			// $(".year-start").removeClass("col-lg-6").removeClass("col-xl-6").addClass("col-lg-12").addClass("col-xl-12");
			$(".year-end").hide();
		}else{
			$("#check_work").attr("checked",false);
			// $(".year-start").addClass("col-lg-6").addClass("col-xl-6").removeClass("col-lg-12").removeClass("col-xl-12");
			$(".year-end").show();
		}
		chipsAchievements = [];
		for (var i = 0; i < res.achievements.length; i++) {
			const liRow = res.achievements[i];
			appendAchievements(liRow.achievement_name,liRow.achievements_id);
		}
		fDisplayChips();
	}

	function currentlyWorked(el){
		if(el.checked){
			// $(".year-start").removeClass("col-lg-6").removeClass("col-xl-6").addClass("col-lg-12").addClass("col-xl-12");
			$(".year-end").hide();
		}else{
			// $(".year-start").addClass("col-lg-6").addClass("col-xl-6").removeClass("col-lg-12").removeClass("col-xl-12");
			$(".year-end").show();
		}
	}
	function resetFields() {
		$("#check_work").attr("selected",false);
		const profileValueElements = document.querySelectorAll('.work-exp-value');

		// Loop through each element and retrieve the value of the "data-column" attribute
		profileValueElements.forEach(element => {
			element.value = "";
		});

		$('#lg-Chips').material_chip({
			data: []
		});
	}

	function deleteWork(work_exp_id) {
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
				$.post(base_controller + "delete_alumni_work", { work_exp_id: work_exp_id }, function(data, status) {
					get_work_experiences();
					Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
					)
				});
			}
		});
	}
</script>