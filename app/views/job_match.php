<script src="https://cdn.jsdelivr.net/npm/@grammarly/editor-sdk?clientId=client_94DaLUWYhcxUnx1PtV9VtD"></script>
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
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
                  <li class="breadcrumb-item active" aria-current="page">Job Matching</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="pills_basic_tab">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation" style="width: 50%;">
                  <a class="nav-link active" id="pills-preferences-tab" data-toggle="pill" href="#pills-preferences"
                    role="tab" aria-controls="pills-preferences" aria-selected="true">Job Preferences</a>
                </li>
                <li class="nav-item" role="presentation" style="width: 50%;">
                  <a class="nav-link" id="pills-matched-tab" data-toggle="pill" href="#pills-matched" role="tab"
                    aria-controls="pills-matched" aria-selected="false">Match Jobs</a>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-preferences" role="tabpanel"
                  aria-labelledby="pills-preferences-tab">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <form id="frmJobMatch">
                        <input type="hidden" name="alumni_id" class="preference-value" data-column="alumni_id">
                        <!-- Single Wrap -->
                        <div class="_dashboard_content">
                          <div class="_dashboard_content_header">
                            <div class="_dashboard__header_flex">
                              <h4><i class="fa fa-briefcase mr-1"></i>My Job Preferences</h4>
                            </div>
                          </div>

                          <div class="_dashboard_content_body">
                            <div class="row">

                              <div class="col-xl-6 col-lg-6">
                                <div class="form-group">
                                  <label class="">Job Title</label>
                                  <input type="text" class="form-control preference-value"
                                    placeholder="Who do you need?" data-column="job_title" name="job_title" required>
                                </div>
                              </div>

                              <div class="col-xl-3 col-lg-3">
                                <div class="form-group">
                                  <label class="">Minimu Salary</label>
                                  <input type="text" class="form-control preference-value" data-column="salary_min" name="salary_min">
                                </div>
                              </div>

                              <div class="col-xl-3 col-lg-3">
                                <div class="form-group">
                                  <label class="">Maximun Salary</label>
                                  <input type="text" class="form-control preference-value" data-column="salary_max" name="salary_max">
                                </div>
                              </div>

                              <div class="col-xl-6 col-lg-6">
                                <div class="form-group">
                                  <label>Type of Employment</label>
                                  <select style="width: 100%;" class="form-control select2 preference-value"
                                    name="job_type_id" data-column="job_type_id" required>
                                    <option value="0">Any</option>
                                    <?= JobTypes::options() ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-xl-6 col-lg-6">
                                <div class="form-group">
                                  <label>Schedule</label>
                                  <select style="width: 100%;" class="form-control select2 preference-value"
                                    data-column="job_sched_id" id="job_sched_id" name="job_sched_id" required>
                                    <option value="0">Any</option>
                                    <?= JobSchedules::options() ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                  <label class="">Job Description</label>
                                  <grammarly-editor-plugin>
                                    <textarea id="job-text" class="form-control preference-value"
                                      data-column="job_description" name="job_description"></textarea>
                                  </grammarly-editor-plugin>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                  <label>Skills</label>
                                  <select class="form-control select2" id="skills" multiple="true" style="width: 100%;"
                                    name="skills[]" required>
                                    <?= Skills::options(AlumniSkills::preferences()) ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group-btn pull-right">
                                  <button style="border-radius: 50px;" type="submit" class="btn btn-md btn-save"
                                    id="btn_match"><span class="fa fa-check-circle"></span> Match Job</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-matched" role="tabpanel" aria-labelledby="pills-matched-tab">
                  <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      <div class="_searches_lists_jobs" id="match-jobs"></div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
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
  var global_job_types = ['', 'Fulltime', 'Part-time', 'Permanent', 'Fixed Term', 'Temporary', 'OJT (On the job training)'];
  fetchAlumniPreferences();

  function fetchAlumniPreferences() {
    $.post(base_controller + "get_alumni_job_preferences", {}, function(data, status) {
      var res = JSON.parse(data);
      mapProfileValue(res);
    });
  }

  function mapProfileValue(res) {
    // Get all elements with the class name "profile-value"
    const profileValueElements = document.querySelectorAll('.preference-value');

    // Loop through each element and retrieve the value of the "data-column" attribute
    profileValueElements.forEach(element => {
      const dataColumnValue = element.getAttribute('data-column');
      element.value = res[dataColumnValue];
    });
    $(".select2").select2().trigger('change');
  }

  $("#frmJobMatch").submit(function(e) {
    e.preventDefault();
    $("#btn_match").prop('disabled', true);
    $("#btn_match").html('<span class="fa fa-spin fa-spinner"></span> Matching Jobs...');
    $.post(base_job_matcher, $("#frmJobMatch").serialize(),
      function(data, status) {
        if (use_python == '1') {
          var res = JSON.parse(use_python ? JSON.stringify(data) : data);
        } else {
          var res = JSON.parse(data);
        }
        skin_matcher(res);
        $("#btn_match").prop('disabled', false);
        $("#btn_match").html('<span class="fa fa-check-circle"></span> Match Job');
        $("#pills-matched-tab").click();
      });
  });

  function skin_matcher(res) {
    $("#match-jobs").html("");
    global_job_data = res.jobs;
    for (var jobIndex = 0; jobIndex < res.jobs.length; jobIndex++) {
      const jobData = res.jobs[jobIndex];
      var selectd = jobIndex == 0 ? "selectd" : "";
      skin_best_jobs(jobData, selectd);
    }
    viewJobDetails(global_job_data[0].job_id);
  }

  function skin_best_jobs(jobData, selectd) {
    var skin_job = '<div class="job_recommended job_recommended_' + jobData.job_id + ' left_jobs _jb_list72 shadow_0 w3-animate-top ' + selectd + '" onclick="viewJobDetails(' + jobData.job_id + ')" style="cursor:pointer">' +
      '<div class="jobs-like bookmark">' +
      '<label class="label bg-success">' + jobData.percentage + ' %</label>' +
      '</div>' +
      '<div class="_jb_list72_flex">' +
      '<div class="_jb_list72_first">' +
      '<div class="_jb_list72_yhumb">' +
      '<img src="' + base_url_img + jobData.employers.users.user_img + '" class="img-fluid" alt="">' +
      '</div>' +
      '</div>' +
      '<div class="_jb_list72_last">' +
      '<h4 class="_jb_title"><a href="#">' + jobData.job_title + '</a></h4>' +
      '<div class="_times_jb">' + jobData.salary_details + '</div>' +
      '<div class="_jb_types fulltime_lite">' + global_job_types[jobData.job_type_id] + '</div>' +
      '</div>' +
      '</div>' +
      '<div class="_jb_list72_foot">' +
      '<div class="_times_jb">Just now</div>' +
      '</div>' +
      '</div>';
    $("#match-jobs").append(skin_job);
  }

  function viewJobDetails(job_id) {
    $(".job_recommended").removeClass('selectd');
    $(".job_recommended_"+job_id).addClass('selectd');
    for (var jobIndex = 0; jobIndex < global_job_data.length; jobIndex++) {
      const jobData = global_job_data[jobIndex];
      if (jobData.job_id == job_id) {
        skin_job_content(jobData);
        break;
      }
    }
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

    var btn_hire = "";
    if (jobData.job_status == '-1') {
      btn_hire = '<div class="hired">Applied</div>';
    }else if (jobData.job_status == '1') {
      btn_hire = '<div class="hired">Hired</div>';
    }else{
      btn_hire = '<ul class="_flex_btn">' +
      // '<li><a href="#" class="_saveed_jb"><i class="fa fa-heart"></i></a></li>' +
      '<li><a href="#" onclick="applyJob(' + jobData.job_id + ')" class="_applied_jb dark-btn">Apply Job</a></li>' +
      '</ul>';
    }
    var skin_job_content = '<div class="_job_details_single w3-animate-left ">' +
      '<div class="_jb_details01">' +
      '<div class="_jb_details01_flex">' +
      '<div class="_jb_details01_authors">' +
      '<img src="' + base_url_img + jobData.employers.users.user_img + '" class="img-fluid" alt="">' +
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
      '<div class="jb_types fulltime">' + global_job_types[jobData.job_type_id] + '</div>' +
      '</li>' +
      '</ul>' +
      '</div>' +
      '</div>' +
      '<div class="_jb_details01_last">' +btn_hire +
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
      // '<li>Collaborate with marketing teams and management to discuss which mockups are effective</li>' +
      // '<li>Revise the work of previous designers to create a unified aesthetic for our brand</li>' +
      // '<li>Work on multiple projects at once, and consistently meet draft deadlines</li>' +
      // '<li>Communicate frequently with clients to update them on the progress of the project and to</li>' +
      // '<li>Work on multiple projects at once, and consistently meet draft deadlines</li>' +
      // '<li>can start the part time job/internship between 4th Mar21 and 8th Apr21</li>' +
      // '<li>have already graduated or are currently in any year of study</li>' +
      // '<li>Revise the work of previous designers to create a unified aesthetic for our brandmaterials</li>' +
      // '<li>Other duties as requested</li>' +
      // '</ul>' +
      // '</div>' +
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

  function applyJob(job_id) {
    Swal.fire({
      title: 'Are you sure to apply?',
      text: "Employer will be notified of your application!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, apply!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(base_controller + "add_job_apply", {
          job_id: job_id
        }, function(response, status) {
          if (response == 1) {
            success_add();
          } else if (response == 2) {
            Swal.fire(
              'Oops!',
              'You already applied to this job.',
              'warning'
            )
          } else {
            error_response();
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
</style>