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
                  <li class="breadcrumb-item">
                    <a href="#">Jobs</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Job Status</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <div class="row row-head" id="job_lists_top"></div>
        <div class="row row-detail">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- Single Wrap -->
            <div class="_dashboard_content">
              <div class="_dashboard_content_body p-0">
                <div class="_dashboard_list_group" id="job_lists"></div>
              </div>
            </div>
            <!-- Single Wrap End -->
          </div>
        </div>
        <div class="row row-detail">
          <div class="col-lg-12 col-md-12">
            <div class="pills_basic_tab">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation" style="width: 50%;">
                  <a class="nav-link active" id="pills-preferences-tab" data-toggle="pill" href="#pills-preferences"
                    role="tab" aria-controls="pills-preferences" aria-selected="true">Job Information</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-preferences" role="tabpanel"
                  aria-labelledby="pills-preferences-tab">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="_job_detail_box light" id="job-content"></div>
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
  var global_job_data = [];
  $(".row-head").show();
  $(".row-detail").hide();
  get_jobs();
  function get_jobs() {
    $("#job_lists_top").html('');
    $.post(base_controller + "get_alumni_jobs", {}, function(data, status) {
      var res = JSON.parse(data);
      console.log(res);
      global_job_data = res.jobs;
      if (res.jobs.length > 0) {
        for (var JobIndex = 0; JobIndex < res.jobs.length; JobIndex++) {
          var jobData = res.jobs[JobIndex];
          skin_job_top(jobData);
        }
      }
    });
  }

  function skin_job_top(jobData) {
    var skin = '<div class="col-lg-4 col-md-4 col-sm-4 w3-animate-left">' +
      '<div class="job_grid_02 shadow_0">' +
      // '<div class="jobs-like">'+
      // 	'<label class="toggler toggler-danger"><input type="checkbox"><i class="fa fa-heart"></i></label>'+
      // '</div>'+
      '<div class="jb_types contract">' + jobData.job_type_name + '</div>' +
      '<div class="jb_grid_01_thumb">' +
      '<a href="javascript:void(0);"><img src="' + base_url + 'assets/img/users/default_company.png" class="img-fluid" alt=""></a>' +
      '</div>' +
      '<div class="jb_grid_01_caption">' +
      '<h4 class="_jb_title"><a href="javascript:void(0);">' + jobData.job_title + '</a></h4>' +
      '<div class="_emp_jb">' + jobData.salary_details + '</div>' +
      '</div>' +
      '<div class="jb_grid_01_footer">' +
      '<a href="javascript:void(0);" class="_jb_apply" onclick="viewJob(' + jobData.job_id + ')">View Job</a>' +
      '</div>' +
      '</div>' +
      '</div>';
    $("#job_lists_top").append(skin);
  }

  function viewJob(job_id) {
    for (var jobIndex = 0; jobIndex < global_job_data.length; jobIndex++) {
      const jobData = global_job_data[jobIndex];
      if (jobData.job_id == job_id) {
        skin_job_header(jobData);
        skin_job_content(jobData);
        // skin_candidates(jobData.candidates);
        $(".row-head").hide();
        $(".row-detail").show();
        break;
      }
    }
  }

  function backToMain(){
  $(".row-head").show();
  $(".row-detail").hide();
  }

  function skin_job_header(jobData) {
    if(jobData.job_status == -1){
      var status_label = '<li><a href="#" class="_aaplied_candidates">Applied</a></li>';
    }else if(jobData.job_status == 1){
      var status_label = '<li><a href="#" class="_hired_candidates">Hired</a></li>';
    }else{
      var status_label = '<li><a href="#" class="_hired_candidates">Declined</a></li>';
    }
    var skin = '<div class="_dash_singl_box w3-animate-top">' +
      '<div class="_dash_singl_captions col-md-6">' +
      '<h4 class="_jb_title"><a href="#">' + jobData.job_title + '</a></h4>' +
      '<ul class="_grouping_list">' +
      '<li><span><i class="ti-location-pin"></i>' + jobData.employers.company_address + '</span></li>' +
      '<li><span><i class="ti-credit-card"></i>' + jobData.salary_details + '</span></li>' +
      '</ul>' +
      '</div>' +
      '<div class="_dash_singl_thumbs col-md-6">' +
      '<ul class="_action_grouping_list pull-right">' + status_label+
      '<li><a href="#" class="_back_list_point" onclick="backToMain()"><i class="fa fa-undo"></i></a></li>' +
      '</ul>' +
      '</div>' +
      '</div>';
    $("#job_lists").html(skin);
  }

  function skin_job_content(jobData) {
    var skill_data = '';
    for (var skillIndex = 0; skillIndex < jobData.skills.length; skillIndex++) {
      const skillRow = jobData.skills[skillIndex];
      skill_data += '<li>' + skillRow.skill_name + '</li>';
    }
    var qualifications_data = '';
    for (var qIndex = 0; qIndex < jobData.qualifications.length; qIndex++) {
      const qRow = jobData.qualifications[qIndex];
      qualifications_data += '<li>' + qRow.qualification_name + '</li>';
    }
    var skin_job_content = '<div class="_job_details_single w3-animate-left ">' +
      '<div class="_jb_details01">' +
      '<div class="_jb_details01_flex">' +
      '<div class="_jb_details01_authors">' +
      '<img src="' + base_url_img+jobData.user_img+'" class="img-fluid" alt="">' +
      '</div>' +
      '<div class="_jb_details01_authors_caption">' +
      '<h4 class="jbs_title">' + jobData.job_title + '<img src="../assets/img/verify.svg" class="ml-1" width="12" alt=""></h4>' +
      '<ul class="jbx_info_list">' +
      '<li><span><i class="ti-briefcase"></i>' + jobData.employers.employer_name + '</span></li>' +
      '<li><span><i class="ti-credit-card"></i>' + jobData.salary_details + '</span></li>' +
      '<li><span><i class="ti-location-pin"></i>' + jobData.employers.company_address + '</span></li>' +
      '</ul>' +
      '<ul class="jbx_info_list">' +
      '<li>' +
      '<div class="jb_types fulltime">' + jobData.job_type_name + '</div>' +
      '</li>' +
      '</ul>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '<div class="_job_detail_box_body w3-animate-left">' +
      '<div class="_job_detail_single">' +
      '<h4>Job Summary</h4>' +
      '<p>' + jobData.job_description + '</p>' +
      '</div>' +
      '<div class="_job_detail_single">' +
      '<h4>Skill &amp; Experience</h4>' +
      '<ul>' + skill_data + '</ul>' +
      '</div>' +
      '<div class="_job_detail_single">' +
      '<h4>Qualification</h4>' +
      '<ul>' + qualifications_data + '</ul>' +
      '</div>' +
      '<div class="_job_detail_single flexeo">' +
      '<div class="_job_detail_single_flex">' +
      '</div>' +
      '</div>' +
      '</div>';

    $("#job-content").html(skin_job_content);
  }

  function skin_candidates(candidateData) {
    var skin = '';
    $("#candidate-content").html('');
    for (var cIndex = 0; cIndex < candidateData.length; cIndex++) {
      const cRow = candidateData[cIndex];
      skin = '<div class="_list_jobs_wraps candidates_list shadow_0">' +
        '<div class="_list_jobs_f1ex" style="width: 70%;flex: 0 0 70%;">' +
        '<div class="_list_110">' +
        '<div class="_list_110_thumb col-md-4">' +
        '<a href="#">' +
        '<img src="' + base_url_img + cRow.user_img + '" class="img-fluid circle" alt="">' +
        '</a>' +
        '</div>' +
        '<div class="_list_110_caption col-md-8">' +
        '<h4 class="_jb_title">' +
        '<a href="candidate-detail.html">' + cRow.name + '<img src="assets/img/verify.svg" class="ml-1" width="12" alt="">' +
        '</a>' +
        '</h4>' +
        '<div class="_emp_jb">' + cRow.job_title + '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="_list_jobs_f1ex col-md-4" style="width: 30%;flex: 0 0 30%;">' +
        '<a href="javascript:void(0);" class="_jb_apply" onclick="fetchCandidateProfile(' + cRow.alumni_id + ')">View</a>' +
        '</div>' +
        '</div>';
      $("#candidate-content").append(skin);
    }
    skin_candidate_details(candidateData[0].alumni_id);
  }

  function fetchCandidateProfile(id) {
    skin_candidate_details();
  }

  function skin_candidate_details() {
    var skin = '<div class="_jb_summary light_box w3-animate-left">' +
      '<div class="_jb_summary_largethumb"><span></span><br></div>' +
      '<div class="_jb_summary_thumb" style="margin-top: unset;">' +
      '<img src="http://localhost/atjmai/assets/img/users/6436d50fd04309.35459911.jpg" class="img-fluid circle" alt = "" >' +
      '</div>' +
      '<div class="_jb_summary_caption">' +
      '<h4>Eduard Rino Carton</h4>' +
      '<span>IT Programmer</span>' +
      '</div>' +
      '<div class="_jb_summary_body">' +
      '<div class="_view_dis_908">' +
      '<a href="#" class="btn flw_btn">Hire Now</a>' +
      '<a href="#" class="btn msg_btn">Message</a>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '<div class="_job_detail_box w3-animate-left">' +
      '<div class="_wrap_box_slice">' +
      '<div class="_job_detail_single">' +
      '<h4>About Candidate</h4>' +
      '<p>We are one of the leading manufacturers and exporters of finished leather goodsfrom Calcutta, India for the last 20 years. We are a 100% EOU and manufactureleather goods for global brands worldwide. We maintain strict quality parameters andensure total employee retention and satisfaction.</p>' +
      '</div>' +
      '<div class="_job_detail_single">' +
      '<h4>Skill &amp; Experience</h4>' +
      '<ul class="skilss">' +
      '<li>' +
      '<a href="javascript:void(0);">IOS Developer</a>' +
      '</li>' +
      '</ul>' +
      '</div>' +
      '</div>' +
      '<div class="_wrap_box_slice w3-animate-left">' +
      '<div class="_job_detail_single">' +
      '<h4>Work Experience</h4>' +
      '<ul class="qa-skill-list">' +
      '<li>' +
      '<div class="qa-skill-box">' +
      '<h4 class="qa-skill-title">Team Leader <span class="qa-time">2017 - 2019</span></h4>' +
      '<h5 class="qa-subtitle">Mingoo Infotech</h5>' +
      '<div class="qa-content">' +
      '<p>sa</p>' +
      '</div>' +
      '</div>' +
      '</li>' +
      '</ul>' +
      '</div>' +
      '</div>' +
      '<div class="_wrap_box_slice w3-animate-left">' +
      '<div class="_job_detail_single">' +
      '<h4>Education &amp; Qualification</h4>' +
      '<ul class="qa-skill-list">' +
      '<li>' +
      '<div class="qa-skill-box">' +
      '<h4 class="qa-skill-title">Master in Information Technology <span class="qa-time">2013 - 2016</span></h4>' +
      '<h5 class="qa-subtitle">Cumlaude</h5>' +
      '<div class="qa-content">' +
      '<p>NONESCOST</p>' +
      '</div>' +
      '</div>' +
      '</li>' +
      '<li>' +
      '<div class="qa-skill-box">' +
      '<h4 class="qa-skill-title">Master in Information Technology <span class="qa-time">2013 - 2016</span>' +
      '</h4>' +
      '<h5 class="qa-subtitle">Cumlaude</h5>' +
      '<div class="qa-content">' +
      '<p>NONESCOST</p>' +
      '</div>' +
      '</div>' +
      '</li>' +
      '</ul>' +
      '</div>' +
      '</div>' +
      '</div>';
    $("#candidate-detail").html(skin);
  }
</script>
<style>
  .w3-animate-left {
    position: relative;
    animation: animateleft 0.8s
  }

  @keyframes animateleft {
    from {
      left: -300px;
      opacity: 0
    }

    to {
      left: 0;
      opacity: 1
    }
  }

  .w3-animate-zoom {
    animation: animatezoom 0.8s
  }

  @keyframes animatezoom {
    from {
      transform: scale(0)
    }

    to {
      transform: scale(1)
    }
  }

  .w3-animate-top {
    position: relative;
    animation: animatetop 0.4s
  }

  @keyframes animatetop {
    from {
      top: -300px;
      opacity: 0
    }

    to {
      top: 0;
      opacity: 1
    }
  }
  ul._action_grouping_list li a._declined_candidates {
      color: #ffffff;
      background: rgb(232 53 53);
  }
  ul._action_grouping_list li a._hired_list_point {
      background: rgb(41 68 192);
      color: #ffffff;
  }
  ul._action_grouping_list li a._back_list_point {
      background: #0b8200;
      color: #ffffff;
  }

</style>