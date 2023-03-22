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
						<form id="frmProfile">
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
											<div class="row">
												<div class="pills_basic_tab">
													<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"></ul>
													<hr>
													<div class="tab-content" id="pills-tabContent"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Single Wrap End -->
							<button type="submit" class="btn btn-save" id="btn_update_profile"><span class="fa fa-edit"></span> Save Changes</button>
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
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
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
.pills_basic_tab .nav-link {
    padding: 0.5rem 1rem;
}

.pills_basic_tab .nav-link.active{
    padding: 0.5rem 1rem;
}
</style>
<script>
	fetchAlumniSkills();

	function fetchAlumniSkills() {
		$.post(base_controller+"alumni_skills", {}, function(data, status) {
			var res = JSON.parse(data);
			console.log(res);
			skillsPills(res);
		});
	}

	function skillsPills(res)
	{
		var pills_tab = '',pills_tabContent = '';
		for (var catIndex = 0; catIndex < res.category.length; catIndex++) {
			const catRow = res.category[catIndex];
			var is_active_tab = catIndex == 0 ? "active" : "";
			var is_active_tabContent = catIndex == 0 ? "show active" : "";
			var area_selected = catIndex == 0 ? "true" : "false";
			pills_tab += '<li class="nav-item" role="presentation">'+
				'<a class="nav-link '+is_active_tab+'" id="pills-'+catRow.id+'-tab" data-toggle="pill" href="#pills-'+catRow.id+'" role="tab" aria-controls="pills-'+catRow.id+'" aria-selected="'+area_selected+'">'+catRow.name+'</a>'+
			'</li>';

			var skill_tab = '';
			for (var skillIndex = 0; skillIndex < catRow.skills.length; skillIndex++) {
				const skillRow = catRow.skills[skillIndex];
				skill_tab += '<div class="card">'+
					'<div class="card-header">'+
					  '<h2 class="mb-0">'+
						'<button class="btn btn-link btn-block text-left collapsed" type="button">'+skillRow.name+
						  	'<div class="pull-right">'+
								'<i class="fa fa-star"></i>'+
								'<i class="fa fa-star"></i>'+
								'<i class="fa fa-star"></i>'+
								'<i class="fa fa-star"></i>'+
								'<i class="fa fa-star"></i>'+
							'</div>'+
							// '<div class="rate-stars pull-right">'+
							// 	'<input type="checkbox" value="1">'+
							// 	'<label for="st1"></label>'+
							// 	'<input type="checkbox" value="2">'+
							// 	'<label for="st2"></label>'+
							// 	'<input type="checkbox" value="3">'+
							// 	'<label for="st3"></label>'+
							// 	'<input type="checkbox" value="4">'+
							// 	'<label for="st4"></label>'+
							// 	'<input type="checkbox" value="5">'+
							// 	'<label for="st5"></label>'+
							// '</div>'+
						'</button>'+
					  '</h2>'+
					'</div>'+
				'</div>';
			}
			pills_tabContent += '<div class="tab-pane fade '+is_active_tabContent+'" id="pills-'+catRow.id+'" role="tabpanel" aria-labelledby="pills-'+catRow.id+'-tab">'+
			'<div class="col-md-8">'+
			'<h4>'+catRow.name+'</h4>'+
			'<h6>Self Assessed Skill Rating</h6>'+
			'<div class="accordion light_modal">'+skill_tab+
			'</div>'+
			'</div>'+
			'<div class="col-xl-8 col-lg-8 mt-2">'+
				'<div class="form-group">'+
					'<label class="active">'+catRow.name+' Experience Details</label>'+
					'<textarea type="text" class="form-control with-light profile-value" data-column="alumni_address" name="alumni_address" required="" style="height:85px;"></textarea>'+
				'</div>'+
			'</div>'+
			'</div>';
		}

		$("#pills-tab").html(pills_tab);
		$("#pills-tabContent").html(pills_tabContent);
	}

	function countDown(sec = 5)
	{
		var countdownSeconds = sec;
		var countdownLabel = document.getElementById('countdown');
		var countdownInterval = setInterval(function() {
		  countdownLabel.innerHTML = countdownSeconds--;
		  if (countdownSeconds < 0) {
		    location.reload();
		  }
		}, 1000);
	}
</script>