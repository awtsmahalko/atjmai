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
				<?php require 'template/sidebar.php';?>
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
									<li class="breadcrumb-item active" aria-current="page">My Skills</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form id="frmSkills">
							<?=Components::csrf();?>
							<!-- Single Wrap -->
							<div class="_dashboard_content">
								<div class="_dashboard_content_header">
									<div class="_dashboard__header_flex">
										<h4><i class="fa fa-user mr-1"></i>My Skills</h4>
									</div>
								</div>

								<div class="_dashboard_content_body">
									<div class="row">
										<div class="col">
											<div class="pills_basic_tab">
												<div class="row">
													<div class="col-md-4">
														<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
														</ul>
													</div>
													<div class="col-md-8">
														<div class="tab-content" id="pills-tabContent"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group-btn pull-right">
												<button style="border-radius: 50px;" type="submit"
													class="btn btn-md btn-save" id="btn_update_skills"><span
														class="fa fa-edit"></span> Save Changes</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Single Wrap End -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Log In Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
		<div class="modal-content" id="registermodal">
			<div class="modal-header">
				<h4>Sign Out</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
							class="ti-close"></i></span></button>
			</div>
			<div class="modal-body">


				<div class="form-group text-center">
					<span>Are you sure you want to sign out?</span>
				</div>

				<div class="social_logs mb-4">
					<ul class="shares_jobs text-center">
						<li><a href="auth/logout.php" class="share fb">Sign out</a></li>
						<li><a href="#" class="share gp">Cancel</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
<style type="text/css">
	#pills-tab {
		display: -ms-flexbox;
		display: flex;
		flex-direction: column;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		padding-left: 0;
		margin-bottom: 0;
		list-style: none;
	}

	.pills_basic_tab .nav-link {
		padding: 0.5rem 1rem;
	}

	.pills_basic_tab .nav-link.active {
		padding: 0.5rem 1rem;
	}

	.pills_basic_tab .nav-link.active:before {
		content: "";
		position: absolute;
		border-left: 15px solid #2944c1;
		border-top: 15px solid transparent;
		border-bottom: 15px solid transparent;
		right: 4%;
		/*    top: 26%;*/
	}

	.pills_basic_tab .nav-link {
		background: rgb(41 68 193 / 0%);
		margin-right: 10px;
		padding: 0.8rem 2rem;
		color: #2944c1;
		border: 1px solid rgba(41, 68, 193, .2);
		border-radius: 0;
	}

	.star-active {
		color: #ff9800 !important;
	}

	.fa-star {
		padding: 0 1.5px;
		color: #c8c8c8;
	}

	.accordion.light_modal>.card>.card-header .btn.btn-link {
		background: rgb(255 255 255);
	}
</style>
<script>
	var skills = [], experiences = [];
	fetchAlumniSkills();

	function fetchAlumniSkills() {
		$.post(base_controller + "alumni_skills", {}, function(data, status) {
			var res = JSON.parse(data);
			skillsPills(res);
		});
	}

	function skillsPills(res) {
		var pills_tab = '', pills_tabContent = '';
		for (var catIndex = 0; catIndex < res.category.length; catIndex++) {
			const catRow = res.category[catIndex];
			var is_active_tab = catIndex == 0 ? "active" : "";
			var is_active_tabContent = catIndex == 0 ? "show active" : "";
			var area_selected = catIndex == 0 ? "true" : "false";
			pills_tab += '<li class="nav-item" role="presentation">' +
				'<a class="nav-link ' + is_active_tab + '" id="pills-' + catRow.id + '-tab" data-toggle="pill" href="#pills-' + catRow.id + '" role="tab" aria-controls="pills-' + catRow.id + '" aria-selected="' + area_selected + '">' + catRow.name + '</a>' +
				'</li>';

			var disabled_prev = catIndex == 0 ? "disabled" : "";
			var disabled_next = catIndex == res.category.length - 1 ? "disabled" : "";
			var click_prev = catIndex == 0 ? "" : res.category[catIndex - 1].id;
			var click_next = catIndex == res.category.length - 1 ? "" : res.category[catIndex + 1].id;


			var skill_tab = '';
			for (var skillIndex = 0; skillIndex < catRow.skills.length; skillIndex++) {
				const skillRow = catRow.skills[skillIndex];
				const newSkill = { skill_id: skillRow.id, rate: skillRow.rate };
				skills.push(newSkill);
				skill_tab += '<div class="card">' +
					'<div class="card-header">' +
					'<h2 class="mb-0">' +
					'<button class="btn btn-link btn-block text-left collapsed" type="button">' + skillRow.name +
					'<div class="pull-right">' + starGenerator(skillRow.id, skillRow.rate) + '</div>' +
					'</button>' +
					'</h2>' +
					'</div>' +
					'</div>';
			}
			pills_tabContent += '<div class="tab-pane fade ' + is_active_tabContent + '" id="pills-' + catRow.id + '" role="tabpanel" aria-labelledby="pills-' + catRow.id + '-tab">' +
				//'<div class="col-md-8">'+
				'<h4>' + catRow.name + '</h4>' +
				'<h6>Self Assessed Skill Rating</h6>' +
				'<div class="accordion light_modal">' + skill_tab +
				'</div>' +
				//'</div>'+
				//'<div class="col-xl-8 col-lg-8 mt-2">'+
				'<div class="form-group">' +
				'<label class="active">' + catRow.name + ' Experience Details</label>' +
				'<textarea type="text" class="form-control with-light profile-value" data-column="alumni_address" name="alumni_address" style="height:85px;" placeholder="I have 5 years experience of ' + catRow.name + '"></textarea>' +
				'</div>' +
				//'</div>'+
				'<button ' + disabled_prev + ' type="button" class="btn btn-sm btn-primary" onclick="clickOtherTabs(' + click_prev + ')"><span class="fa fa-arrow-left"></span> Back</button>' +
				'<button ' + disabled_next + ' type="button" class="btn btn-sm btn-primary pull-right" onclick="clickOtherTabs(' + click_next + ')"><span class="fa fa-arrow-right"></span> Next</button>' +
				'</div>';
		}

		$("#pills-tab").html(pills_tab);
		$("#pills-tabContent").html(pills_tabContent);
	}

	function clickOtherTabs(click_prev) {
		$("#pills-" + click_prev + "-tab").click();
	}

	function rateSkill(id, rate) {
		const skillToUpdate = skills.find(skill => skill.skill_id === id);
		if (skillToUpdate) {
			skillToUpdate.rate = rate; // Update the rate to 5 (or whatever value you need)
		}

		const elements = document.querySelectorAll(".star-" + id);
		// Loop through each element and remove the class
		elements.forEach((element, index) => {
			element.classList.remove("star-active");
			if (index < rate) {
				element.classList.add("star-active");
			}
		});
	}

	function starGenerator(id, rate) {
		var stars = '';
		var tooltips = ['Good', 'Average', 'Very Good', 'Excellent', 'Superior'];
		for (var i = 1; i <= 5; i++) {
			var star_selected = i <= rate ? "star-active" : "";
			stars += '<i class="fa fa-star star-' + id + ' ' + star_selected + '" onclick="rateSkill(' + id + ',' + i + ')" data-toggle="tooltip" title="' + tooltips[i - 1] + '"></i>';
		}
		return stars;
	}

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

	$("#frmSkills").submit(function(e) {
		e.preventDefault();
		$("#btn_update_skills").prop('disabled', true);
		$("#btn_update_skills").html('Updating...');
		$.post(base_controller + "update_alumni_skills", {
			skills: JSON.stringify(skills),
			csrf: $("#csrf").val()
		}, function(data, status) {
			var res = JSON.parse(data);
			if (res == 1) {
				success_update();
			} else {
				error_response();
			}
			$("#btn_update_skills").prop('disabled', false);
			$("#btn_update_skills").html('<span class="fa fa-edit"></span> Save Changes');
		});
	});

</script>