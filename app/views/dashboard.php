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
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                  <div class="dashboard-stat">
                    <div class="dashboard-stat-icon widget-1"><i class="ti-location-pin"></i></div>
                    <div class="dashboard-stat-content"><h4><span class="cto">72</span></h4> <p>Job Posted</p></div>
                  </div>  
                </div>
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                  <div class="dashboard-stat">  
                    <div class="dashboard-stat-icon widget-2"><i class="ti-pie-chart"></i></div>
                    <div class="dashboard-stat-content"><h4><span class="cto">12</span></h4> <p>Total Viewed</p></div>
                  </div>  
                </div>
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                  <div class="dashboard-stat">
                    <div class="dashboard-stat-icon widget-3"><i class="ti-user"></i></div>
                    <div class="dashboard-stat-content"><h4><span class="cto">72</span></h4> <p>User Applied</p></div>
                  </div>  
                </div>
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                  <div class="dashboard-stat">
                    <div class="dashboard-stat-icon widget-4"><i class="ti-bookmark"></i></div>
                    <div class="dashboard-stat-content"><h4><span class="cto">80</span></h4> <p>Job Bookmarked</p></div>
                  </div>  
                </div>
              </div>
                
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="_dashboard_content">
                    <div class="_dashboard_content_header">
                      <div class="_dashboard__header_flex">
                        <h4><i class="ti-briefcase mr-1"></i>Recent Job Posted</h4> 
                      </div>
                    </div>
                    <div class="_dashboard_content_body p-0">
                    <div class="_searches_lists_jobs">
                      <!-- Single Job -->
                      <div class="_jb_list72 shadow_0 _dash_singl_box">
                        <div class="jobs-like bookmark">
                          <label class="label bg-success">98 %</label>
                        </div>
                        <div class="_jb_list72_flex">
                          <div class="_jb_list72_first">
                            <div class="_jb_list72_yhumb">
                              <img src="../assets/img/users/default_company.png" class="img-fluid" alt="">
                            </div>
                          </div>
                          <div class="_jb_list72_last">
                            <h4 class="_jb_title"><a href="job-detail.html">Application Designer</a></h4>
                            <div class="_times_jb">$70k - 80k</div>
                            <div class="_jb_types fulltime_lite">Full Time</div>
                          </div>
                        </div>
                        <div class="_jb_list72_foot">
                          <div class="_times_jb">Just now</div>
                        </div>
                      </div>
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
                      <!-- Single Job -->
                      <div class="_jb_list72 shadow_0 _dash_singl_box">
                        <div class="jobs-like bookmark">
                          <label class="label bg-success">98 %</label>
                        </div>
                        <div class="_jb_list72_flex">
                          <div class="_jb_list72_first">
                            <div class="_jb_list72_yhumb">
                              <img src="../assets/img/users/default_company.png" class="img-fluid" alt="">
                            </div>
                          </div>
                          <div class="_jb_list72_last">
                            <h4 class="_jb_title"><a href="job-detail.html">Application Designer</a></h4>
                            <div class="_times_jb">$70k - 80k</div>
                            <div class="_jb_types fulltime_lite">Full Time</div>
                          </div>
                        </div>
                        <div class="_jb_list72_foot">
                          <div class="_times_jb">Just now</div>
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