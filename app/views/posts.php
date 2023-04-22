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
									<li class="breadcrumb-item active" aria-current="page">Posts & Announcements</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<?php if ($_SESSION['user']['category'] == 'A') { ?>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<form id="frmPosts">
								<!-- Single Wrap -->
								<div class="_dashboard_content">
									<div class="_dashboard_content_header">
										<div class="_dashboard__header_flex">
											<h4><i class="fa fa-briefcase mr-1"></i>New Post</h4>
										</div>
									</div>

									<div class="_dashboard_content_body">
										<div class="row">
											<div class="col-xl-12 col-lg-12">
												<div class="form-group">
													<label class="">Message</label>
													<grammarly-editor-plugin>
														<textarea id="post_message" class="form-control preference-value" data-column="post_message" name="post_message"></textarea>
													</grammarly-editor-plugin>
												</div>
											</div>

											<div class="col-xl-6 col-lg-6">
												<div class="form-group">
													<label class="">Post Type</label>
													<select class="form-control select2 preference-value" name="post_type" data-column="post_type" required>
														<option value="Announcement">Announcement</option>
														<option value="News">News</option>
														<option value="Events">Events</option>
													</select>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6">
												<div class="form-group">
													<label>Show to Employer</label>
													<select class="form-control select2 preference-value" name="show_to_employer" data-column="show_to_employer" required>
														<option value="0">No</option>
														<option value="1">Yes</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xl-12 col-lg-12">
												<div class="form-group">
													<label>College</label>
													<select class="form-control select2 preference-value" name="college_id" data-column="college_id" style="width: 100%;" required>
														<?= Colleges::options() ?>
													</select>
												</div>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group-btn pull-right">
													<button style="border-radius: 50px;" type="submit" class="btn btn-md btn-save" id="btn_post"><span class="fa fa-check-circle"></span> Create Post</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				<?php } ?>
				<div class="row" id="post-content">
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	get_posts();
	$("#frmPosts").submit(function(e) {
		e.preventDefault();
		btn_processor('btn_post');
		$.post(base_controller + "add_post", $("#frmPosts").serialize(), function(data, status) {
			get_posts();
			if (data == 1) {
				success_add();
			}
			btn_processor('btn_post', false, '<span class="fa fa-check-circle"></span> Create Post');
		});
	});

	function get_posts() {
		$("#post-content").html('');
		$.post(base_controller + "get_posts_timeline", {}, function(data, status) {
			var res = JSON.parse(data);
			if (res.posts.length > 0) {
				for (var pIndex = 0; pIndex < res.posts.length; pIndex++) {
					const postRow = res.posts[pIndex];
					skin_post_content(postRow);
				}
			}
		});
	}

	function skin_post_content(postData) {
		var skin_post_content = '<div class="col-lg-12 col-md-12 col-sm-12 mb-3"><div class="_job_detail_box light"><div class="_job_details_single w3-animate-left ">' +
			'<div class="_jb_details01">' +
			'<div class="_jb_details01_flex">' +
			'<div class="_jb_details01_authors">' +
			'<img src="' + base_url + 'assets/img/users/' + postData.users.user_img + '" class="img-fluid" alt="">' +
			'</div>' +
			'<div class="_jb_details01_authors_caption">' +
			'<h4 class="jbs_title">' + postData.users.user_fullname + '</h4>' +
			'<ul class="jbx_info_list">' +
			'<li><span><i class="ti-calendar"></i>' + postData.time_ago + '</span></li>' +
			'</ul>' +
			'<ul class="jbx_info_list">' +
			'<li>' +
			'<div class="jb_types remote">' + postData.post_type + '</div>' +
			'</li>' +
			'<li>' +
			'<div class="jb_types fulltime">' + postData.college_name + '</div>' +
			'</li>' +
			'</ul>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'<div class="_job_detail_box_body w3-animate-left">' +
			'<div class="_job_detail_single">' +
			'<h4>Message</h4>' +
			'<p>' + postData.post_message + '</p>' +
			'</div>' +

			'<div class="_job_detail_single flexeo">' +
			'<div class="_job_detail_single_flex">' +
			'</div>' +

			'</div>' +
			'</div>' +
			'</div>' +
			'</div>';

		$("#post-content").append(skin_post_content);
	}
</script>