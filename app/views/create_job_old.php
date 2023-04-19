<?php

// Define job and candidate data
$jobs = [
	"Data Analyst, New York, NY",
	"Software Engineer, San Francisco, CA",
	"Marketing Manager, Chicago, IL",
	"Project Manager, Boston, MA"
];

$candidates = [
	"Experienced data analyst with 3 years of experience in Python, SQL and Tableau",
	"Full-stack software engineer with 5 years of experience in Java, React and Node.js",
	"Marketing manager with 4 years of experience in digital marketing and lead generation",
	"Project manager with 6 years of experience in Agile methodology and project management tools"
];

// Iterate through jobs and find best matching candidates
foreach ($jobs as $job) {
	$best_match_score = 0;
	$best_match_candidate = '';
	foreach ($candidates as $candidate) {
		$score = similar_text(strtolower($job), strtolower($candidate), $percennt);
		if ($score > $best_match_score) {
			$best_match_score = $score;
			$best_match_candidate = $candidate;
		}
	}
	echo "Job: $job, Best Candidate: $best_match_candidate, Score: $best_match_score\n<br>";
}


?>
<?php

// Define job and candidate data
$jobs = [
	"Data Analyst, New York, NY",
	"Software Engineer, San Francisco, CA",
	"Marketing Manager, Chicago, IL",
	"Project Manager, Boston, MA"
];

$candidates = [
	"Experienced data analyst with 3 years of experience in Python, SQL and Tableau",
	"Full-stack software engineer with 5 years of experience in Java, React and Node.js",
	"Marketing manager with 4 years of experience in digital marketing and lead generation",
	"Project manager with 6 years of experience in Agile methodology and project management tools"
];

// Define the job seeker's profile
$seeker = "Experienced data analyst with strong skills in SQL and Python";

// Calculate similarity scores between seeker and jobs
$job_scores = array();
foreach ($jobs as $job) {
	$score = similar_text(strtolower($seeker), strtolower($job), $percent);
	$job_scores[$job] =  round($percent, 2);
}

// Sort job scores in descending order
arsort($job_scores);

// Print the top 3 job matches
$i = 1;
foreach ($job_scores as $job => $score) {
	echo "$i. $job (Score: $score)\n<br>";
	if (++$i > 3) {
		break;
	}
}

?>

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
									<li class="breadcrumb-item active" aria-current="page">Create Post</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">

						<!-- Single Wrap -->
						<div class="_dashboard_content">
							<div class="_dashboard_content_header">
								<div class="_dashboard__header_flex">
									<h4><i class="ti-briefcase mr-1"></i>Submit Task Form</h4>
								</div>
							</div>

							<div class="_dashboard_content_body">
								<div class="row">

									<div class="col-xl-4 col-lg-6">
										<div class="form-group">
											<label class="">Project Name</label>
											<input type="text" class="form-control with-light">
										</div>
									</div>

									<div class="col-xl-4 col-lg-6">
										<div class="form-group with-light" data-select2-id="4">
											<label>Category</label>
											<select id="jb-category" class="form-control  select2-hidden-accessible"
												data-select2-id="jb-category" tabindex="-1" aria-hidden="true">
												<option value="" data-select2-id="2"></option>
												<option value="1" data-select2-id="5">Finance &amp; Accounting</option>
												<option value="2" data-select2-id="6">Banking</option>
												<option value="3" data-select2-id="7">Medical &amp; Health</option>
												<option value="4" data-select2-id="8">Human Resources</option>
												<option value="5" data-select2-id="9">IT &amp; Computor</option>
											</select><span
												class="select2 select2-container select2-container--default select2-container--below"
												dir="ltr" data-select2-id="1" style="width: 284px;"><span
													class="selection"><span
														class="select2-selection select2-selection--single"
														role="combobox" aria-haspopup="true" aria-expanded="false"
														tabindex="0"
														aria-labelledby="select2-jb-category-container"><span
															class="select2-selection__rendered"
															id="select2-jb-category-container" role="textbox"
															aria-readonly="true"><span
																class="select2-selection__placeholder">Select
																Category</span></span><span
															class="select2-selection__arrow" role="presentation"><b
																role="presentation"></b></span></span></span><span
													class="dropdown-wrapper" aria-hidden="true"></span></span>
										</div>
									</div>

									<div class="col-xl-4 col-lg-6">
										<div class="form-group">
											<label class="">Location</label>
											<input type="text" class="form-control with-light">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6">
										<label>Salary</label>
										<div class="form-row">
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="input-group mb-3">
													<input type="text" class="form-control with-light br-0"
														placeholder="min">
													<div class="input-group-append">
														<span class="input-group-text light">USD</span>
													</div>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="input-group mb-3">
													<input type="text" class="form-control with-light br-0"
														placeholder="Max">
													<div class="input-group-append">
														<span class="input-group-text light">USD</span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-6 col-lg-12">
										<label>Choose Your Option</label>
										<div class="yn_feedback">
											<div class="radio">
												<input id="hourly" class="radio-custom" name="feedback" type="radio"
													checked="">
												<label for="hourly" class="radio-custom-label">Hourly Project</label>
											</div>
											<div class="radio">
												<input id="fixed" class="radio-custom" name="feedback" type="radio">
												<label for="fixed" class="radio-custom-label">Fixed Rate Project</label>
											</div>
										</div>
									</div>

									<div class="col-xl-12 col-lg-12">
										<div class="form-group with-light">
											<label>Required Skills <span>(optional)</span></label>
											<div class="tg_grouping">
												<input type="text" id="lg-input" class="form-control with-light"
													placeholder="e.g. job title, career">
												<ul class="autocomplete-content dropdown-content"></ul>
												<a id="cmd-ChipsAjout" class="btn_groupin_tag"><i
														class="fa fa-plus"></i></a>
											</div>
											<div id="lg-Chips" data-index="0" data-initialized="true" class="chips">
												<div class="chip">Photoshop<i class="material-icons close">close</i>
												</div>
												<div class="chip">WordPress<i class="material-icons close">close</i>
												</div>
												<div class="chip">Jquery<i class="material-icons close">close</i></div>
												<input id="afd126af-fd8b-a79d-6c84-7acddf20e0d2" class="input"
													placeholder="">
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-lg-12">
										<div class="form-group">
											<grammarly-editor-plugin>
												<textarea id="job-text" class="form-control"></textarea>
											</grammarly-editor-plugin>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Single Wrap End -->

						<button type="button" class="btn btn-save">Submit Job</button>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
	// $(document).ready(function() {
	// 	$('#summernotes').summernote();
	// });
</script>