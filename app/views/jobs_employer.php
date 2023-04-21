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
                    <a href="<?= HTACCESS_APP . "jobs" ?>">Jobs</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Manage Jobs</li>
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
                <li class="nav-item" role="presentation" style="width: 50%;">
                  <a class="nav-link" id="pills-matched-tab" data-toggle="pill" href="#pills-matched" role="tab"
                    aria-controls="pills-matched" aria-selected="false">Candidates</a>
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
                <div class="tab-pane fade" id="pills-matched" role="tabpanel" aria-labelledby="pills-matched-tab">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="_job_detail_box">
                        <div class="row">
                          <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12" id="candidate-content"></div>
                            </div>
                          </div>
                          <div class="col-lg-7 col-md-12 col-sm-12" id="candidate-detail"></div>
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
<script>
  var global_job_data = [];
  $(".row-head").show();
  $(".row-detail").hide();
  get_jobs();

  function get_jobs() {
    $("#job_lists_top").html('');
    $.post(base_controller + "get_employer_jobs", {}, function(data, status) {
      var res = JSON.parse(data);
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
      '<a href="javascript:void(0);"><img src="' + base_url_img + jobData.user_img + '" class="img-fluid" alt=""></a>' +
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
        skin_candidates(jobData.candidates, job_id);
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
    var skin = '<div class="_dash_singl_box w3-animate-top">' +
      '<div class="_dash_singl_captions col-md-6">' +
      '<h4 class="_jb_title"><a href="#">' + jobData.job_title + '</a></h4>' +
      '<ul class="_grouping_list">' +
      '<li><span><i class="ti-location-pin"></i>' + jobData.employers.company_address + '</span></li>' +
      '<li><span><i class="ti-credit-card"></i>' + jobData.salary_detail + '</span></li>' +
      '</ul>' +
      '</div>' +
      '<div class="_dash_singl_thumbs col-md-6">' +
      '<ul class="_action_grouping_list pull-right">' +
      // '<li onclick="alert(1)"><a href="#" class="_aaplied_candidates">Best Candidate &nbsp; <i class="fa fa-graduation-cap"></i> </a></li>'+
      '<li><a href="#" class="_aaplied_candidates">Applied<span>' + jobData.candidates.length + '</span></a></li>' +
      '<li><a href="#" class="_back_list_point" onclick="backToMain()"><i class="fa fa-undo"></i></a></li>' +
      '<li><a href="' + base_url + 'app/edit-job/' + jobData.job_id + '" data-toggle="tooltip" data-placement="top" title="Edit job" class="_edit_list_point"><i class="fa fa-edit"></i></a></li>' +
      '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Delete Job" class="_delete_point" onclick="deleteJob(' + jobData.job_id + ')"><i class="fa fa-trash"></i></a></li>' +
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
    var skin_job_content = '<div class="_job_details_single w3-animate-left ">' +
      '<div class="_jb_details01">' +
      '<div class="_jb_details01_flex">' +
      '<div class="_jb_details01_authors">' +
      '<img src="' + base_url_img + jobData.user_img + '" class="img-fluid" alt="">' +
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
      // '<div class="_job_detail_single">' +
      // '<h4>Job Duties:</h4>' +
      // '<p>Were looking for someone with the creative spark, eye for illustration and design, passionfor graphics and ability to produce high quality design collaterals end-to-end.</p>' +
      // '<ul>' +
      // '<li>Draft mockups of website designs, brochures, iconography, and any other marketing</li>' +
      // '</ul>' +
      // '</div>' +
      '<div class="_job_detail_single">' +
      '<h4>Skill &amp; Experience</h4>' +
      '<ul>' + skill_data + '</ul>' +
      '</div>' +
      '<div class="_job_detail_single flexeo">' +
      '<div class="_job_detail_single_flex">' +
      '</div>' +
      '</div>' +
      '</div>';

    $("#job-content").html(skin_job_content);
  }

  function skin_candidates(candidateData, job_id) {
    var skin = '';
    $("#candidate-content").html('');
    if (candidateData.length > 0) {
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
          '<a href="javascript:void(0);" class="_jb_apply" onclick="fetchCandidateProfile(' + cRow.alumni_id + ',' + job_id + ')">View</a>' +
          '</div>' +
          '</div>';
        $("#candidate-content").append(skin);
      }
      fetchCandidateProfile(candidateData[0].alumni_id, job_id);
    }
  }

  function fetchCandidateProfile(id, job_id) {
    $.post(base_controller + "get_alumni_pds_data", {
      alumni_id: id,
      job_id: job_id
    }, function(data, status) {
      var res = JSON.parse(data);
      console.log(res);
      skin_candidate_details(res);
    });
  }

  function skin_candidate_details(res) {
    var skills = "";
    for (var sIndex = 0; sIndex < res.skills.length; sIndex++) {
      const skillRow = res.skills[sIndex];
      skills += '<li>' +
        '<a href="javascript:void(0);">' + skillRow.skill_name + '</a>' +
        '</li>';
    }

    var experiences = '';
    for (var workIndex = 0; workIndex < res.works.length; workIndex++) {
      const workRow = res.works[workIndex];
      var achievements = '';
      for (var aIndex = 0; aIndex < workRow.achievements.length; aIndex++) {
        const aRow = workRow.achievements[aIndex];
        achievements += '<p><img src="../assets/img/verify.svg" class="ml-1" width="12" alt=""> ' + aRow.achievement_name + '</p>';
      }
      experiences += '<li>' +
        '<div class="qa-skill-box">' +
        '<h4 class="qa-skill-title">' + workRow.job_title + ' <span class="qa-time">' + workRow.year_span + '</span></h4>' +
        '<h5 class="qa-subtitle">' + workRow.company_name + '</h5>' +
        '<div class="qa-content">' + achievements + '</div>' +
        '</div>' +
        '</li>';
    }

    var educations = '';
    for (var educIndex = 0; educIndex < res.educations.length; educIndex++) {
      const educRow = res.educations[educIndex];
      educations += '<li>' +
        '<div class="qa-skill-box">' +
        '<h4 class="qa-skill-title">' + educRow.educ_degree + ' <span class="qa-time">' + educRow.year_enrolled + ' - ' + educRow.year_graduated + '</span></h4>' +
        '<h5 class="qa-subtitle">' + educRow.honor_received + '</h5>' +
        '<div class="qa-content">' +
        '<p>' + educRow.educ_school + '</p>' +
        '</div>' +
        '</div>' +
        '</li>';
    }

    var btn_hire = "";
    if (res.job_status == '-1') {
      btn_hire = '<a href="#" class="btn flw_btn" onclick="hireCandidate(' + res.job_id + ',' + res.alumni_id + ')">Hire Now</a>';
    }
    if (res.job_status == '1') {
      btn_hire = '<div class="hired">Hired</div>';
    }
    var skin = '<div class="_jb_summary light_box w3-animate-left">' +
      '<div class="_jb_summary_largethumb"><span></span><br></div>' +
      '<div class="_jb_summary_thumb" style="margin-top: unset;">' +
      '<img src="' + base_url_img + res.users.user_img + '" class="img-fluid circle" alt = "" >' +
      '</div>' +
      '<div class="_jb_summary_caption">' +
      '<h4>' + res.alumni_fname + ' ' + res.alumni_mname + '' + res.alumni_lname + '</h4>' +
      '<span>' + res.preferences.job_title + '</span>' +
      '</div>' +
      '<div class="_jb_summary_body">' +
      '<div class="_view_dis_908">' + btn_hire + '</div>' +
      '</div>' +
      '</div>' +
      '<div class="_job_detail_box w3-animate-left">' +
      '<div class="_wrap_box_slice">' +
      '<div class="_job_detail_single">' +
      '<h4>About Candidate</h4>' +
      '<p>' + res.preferences.job_description + '</p>' +
      '</div>' +
      '<div class="_job_detail_single">' +
      '<h4>Skill &amp; Experience</h4>' +
      '<ul class="skilss">' + skills + '</ul>' +
      '</div>' +
      '</div>' +
      '<div class="_wrap_box_slice w3-animate-left">' +
      '<div class="_job_detail_single">' +
      '<h4>Work Experience</h4>' +
      '<ul class="qa-skill-list">' + experiences + '</ul>' +
      '</div>' +
      '</div>' +
      '<div class="_wrap_box_slice w3-animate-left">' +
      '<div class="_job_detail_single">' +
      '<h4>Education &amp; Qualification</h4>' +
      '<ul class="qa-skill-list">' + educations + '</ul>' +
      '</div>' +
      '</div>' +
      '</div>';
    $("#candidate-detail").html(skin);
  }

  function deleteJob(job_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Your data will lose!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(base_controller + "delete_job", {
          job_id: job_id
        }, function(data, status) {
          get_jobs();
          $(".row-head").show();
          $(".row-detail").hide();
          if (data == 1) {
            success_delete();
          }
        });
      }
    })
  }

  function hireCandidate(job_id, alumni_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "The candidate will be hired!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, hire now!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(base_controller + "accept_job_apply", {
          job_id: job_id,
          alumni_id: alumni_id
        }, function(data, status) {
          fetchCandidateProfile(alumni_id, job_id);
          if (data == 1) {
            success_update();
          }
        });
      }
    })
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

  .hired {
    height: 25px;
    padding: 0 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    border-radius: 50px;
    color: #fff;
    background: #16b739;
  }
  
  ul._action_grouping_list li a._back_list_point {
      background: #0b8200;
      color: #ffffff;
  }

</style>