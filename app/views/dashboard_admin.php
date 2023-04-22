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
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard-stat">
              <div class="dashboard-stat-icon widget-2"><i class="fa fa-graduation-cap"></i></div>
              <div class="dashboard-stat-content">
                <h4><span class="cto"><?= Alumni::count(); ?></span></h4>
                <p>Alumni</p>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard-stat">
              <div class="dashboard-stat-icon widget-3"><i class="ti-user"></i></div>
              <div class="dashboard-stat-content">
                <h4><span class="cto"><?= Employers::count() ?></span></h4>
                <p>Employers</p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard-stat">
              <div class="dashboard-stat-icon widget-1"><i class="ti-briefcase"></i></div>
              <div class="dashboard-stat-content">
                <h4><span class="cto"><?= Jobs::countPosted() ?></span></h4>
                <p>Jobs</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="_dashboard_content">
              <div class="_dashboard_content_header">
                <div class="_dashboard__header_flex">
                  <h4><i class="ti-briefcase mr-1"></i>Recent Jobs Posted</h4>
                </div>
              </div>
              <div class="_dashboard_content_body p-0">
                <div class="_searches_lists_jobs">
                  <!-- Single Job -->
                  <?php
                  $Jobs = new Jobs();
                  $recent_jobs = $Jobs->recent_jobs();
                  foreach ($recent_jobs as $job_data) {
                    $users_data = $job_data['employers']['users'];
                  ?>
                    <div class="_jb_list72 shadow_0 _dash_singl_box">
                      <div class="_jb_list72_flex">
                        <div class="_jb_list72_first">
                          <div class="_jb_list72_yhumb">
                            <img src="../assets/img/users/<?= $users_data['user_img'] ?>" class="img-fluid" alt="">
                          </div>
                        </div>
                        <div class="_jb_list72_last">
                          <h4 class="_jb_title"><a href="#"><?= $job_data['job_title'] ?></a></h4>
                          <div class="_times_jb"><?= $job_data['salary_details'] ?></div>
                          <div class="_jb_types fulltime_lite"><?= $job_data['employers']['employer_name']; ?></div>
                        </div>
                      </div>
                      <div class="_jb_list72_foot">
                        <div class="_times_jb"><?= $Jobs->time_ago($job_data['created_at']) ?></div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="_dashboard_content">
              <div class="_dashboard_content_header">
                <div class="_dashboard__header_flex">
                  <h4><i class="fa fa-graduation-cap mr-1"></i>Best Candidates</h4>
                </div>
              </div>
              <div class="_dashboard_content_body p-0">
                <div class="_searches_lists_jobs">
                  <div class="_list_jobs_wraps candidates_list shadow_0 _dash_singl_box">
                    <div class="_list_jobs_f1ex first">
                      <div class="_list_110">
                        <div class="_list_110_thumb">
                          <a href="candidate-detail.html"><img src="../assets/img/users/6436d50fd04309.35459911.jpg" class="img-fluid circle" alt=""></a>
                        </div>
                        <div class="_list_110_caption">
                          <h4 class="_jb_title"><a href="candidate-detail.html">Eduard Rino Q. Carton</a></h4>
                          <div class="_emp_jb">Web Developer</div>
                        </div>
                      </div>
                    </div>
                    <div class="_list_jobs_f1ex">
                      <div class="_list_110_caption">
                        <h4 class="_jb_title">Bacolod, Philippines</h4>
                        <div class="_emp_jb">Location</div>
                      </div>
                    </div>
                    <div class="_list_jobs_f1ex">
                      <a href="candidate-detail.html" class="_jb_apply">View</a>
                    </div>
                  </div>
                  <div class="_list_jobs_wraps candidates_list shadow_0 _dash_singl_box">
                    <div class="_list_jobs_f1ex first">
                      <div class="_list_110">
                        <div class="_list_110_thumb">
                          <a href="candidate-detail.html"><img src="../assets/img/users/default_male.png" class="img-fluid circle" alt=""></a>
                        </div>
                        <div class="_list_110_caption">
                          <h4 class="_jb_title"><a href="candidate-detail.html">Jeffred P. Lim</a></h4>
                          <div class="_emp_jb">Data Analyst</div>
                        </div>
                      </div>
                    </div>
                    <div class="_list_jobs_f1ex">
                      <div class="_list_110_caption">
                        <h4 class="_jb_title">Bacolod, Philippines</h4>
                        <div class="_emp_jb">Location</div>
                      </div>
                    </div>
                    <div class="_list_jobs_f1ex">
                      <a href="candidate-detail.html" class="_jb_apply">View</a>
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