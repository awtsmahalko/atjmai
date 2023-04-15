<div class="search-form" style="padding: 2rem;">
  <div class="container">
    <div class="row m-0 justify-content-center">
      <div class="col-lg-10 col-md-10">
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

<section class="gray-bg">
  <div class="container" style="
    max-width: 100%;
">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="pills_basic_tab">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation" style="width: 50%;">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true">Job Preferences</a>
            </li>
            <li class="nav-item" role="presentation" style="width: 50%;">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Match Jobs</a>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <form id="frmJobPreferences">
                    <?= Components::csrf(); ?>
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
                              <input type="text" class="form-control preference-value" placeholder="Who do you need?"
                                data-column="job_title" name="job_title" required>
                            </div>
                          </div>

                          <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                              <label class="">Wage/Salary</label>
                              <input type="text" class="form-control preference-value" data-column="salary_details"
                                placeholder="Indicate currency (e.g. Php 20,000/mo)" name="salary_details">
                            </div>
                          </div>

                          <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                              <label>Type of Employment</label>
                              <select class="form-control select2 preference-value" name="job_type_id"
                                data-column="job_type_id" required>
                                <option value="0">Any</option>
                                <?= JobTypes::options() ?>
                              </select>
                            </div>
                          </div>

                          <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                              <label>Schedule</label>
                              <select class="form-control select2 preference-value" data-column="job_sched_id"
                                id="job_sched_id" required>
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
                      </div>
                    </div>

                    <div class="_job_detail_single flexeo">
                      <div class="_job_detail_single_flex"></div>
                      <div class="_exlio_buttons">
                        <ul class="bottoms_applies">
                          <li>
                            <a href="#" class="_applied_jb">Match Job</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

              <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <div class="_searches_lists_jobs">
                    <!-- Single Job -->
                    <div class="_jb_list72 shadow_0 selectd">
                      <div class="jobs-like bookmark">
                        <label class="label bg-success">98 %</label>
                      </div>
                      <div class="_jb_list72_flex">
                        <div class="_jb_list72_first">
                          <div class="_jb_list72_yhumb">
                            <img src="../assets/img/c-1.png" class="img-fluid" alt="">
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

                    <!-- Single Job -->
                    <div class="_jb_list72 shadow_0">
                      <div class="jobs-like bookmark">
                        <label class="label bg-success">95 %</label>
                      </div>
                      <div class="_jb_list72_flex">
                        <div class="_jb_list72_first">
                          <div class="_jb_list72_yhumb">
                            <img src="../assets/img/c-2.png" class="img-fluid" alt="">
                          </div>
                        </div>
                        <div class="_jb_list72_last">
                          <h4 class="_jb_title"><a href="job-detail.html">IOS Developer</a></h4>
                          <div class="_times_jb">$55k - 80k</div>
                          <div class="_jb_types parttime_lite">Part Time</div>
                        </div>
                      </div>
                      <div class="_jb_list72_foot">
                        <div class="_times_jb">10 min ago</div>
                      </div>
                    </div>

                    <!-- Single Job -->
                    <div class="_jb_list72 shadow_0">
                      <div class="jobs-like bookmark">
                        <label class="label bg-success">94 %</label>
                      </div>
                      <div class="_jb_list72_flex">
                        <div class="_jb_list72_first">
                          <div class="_jb_list72_yhumb">
                            <img src="../assets/img/c-3.png" class="img-fluid" alt="">
                          </div>
                        </div>
                        <div class="_jb_list72_last">
                          <h4 class="_jb_title"><a href="job-detail.html">Web Developer</a></h4>
                          <div class="_times_jb">$50k - 60k</div>
                          <div class="_jb_types internship_lite">Internship</div>
                        </div>
                      </div>
                      <div class="_jb_list72_foot">
                        <div class="_times_jb">02 min ago</div>
                      </div>
                    </div>

                    <!-- Single Job -->
                    <div class="_jb_list72 shadow_0">
                      <div class="jobs-like bookmark">
                        <label class="label bg-warning">89 %</label>
                      </div>
                      <div class="_jb_list72_flex">
                        <div class="_jb_list72_first">
                          <div class="_jb_list72_yhumb">
                            <img src="../assets/img/c-4.png" class="img-fluid" alt="">
                          </div>
                        </div>
                        <div class="_jb_list72_last">
                          <h4 class="_jb_title"><a href="job-detail.html">Product Designer</a></h4>
                          <div class="_times_jb">$40k - 60k</div>
                          <div class="_jb_types parttime_lite">Part Time</div>
                        </div>
                      </div>
                      <div class="_jb_list72_foot">
                        <div class="_times_jb">05 min ago</div>
                      </div>
                    </div>

                    <!-- Single Job -->
                    <div class="_jb_list72 shadow_0">
                      <div class="jobs-like bookmark">
                        <label class="label bg-warning">88 %</label>
                      </div>
                      <div class="_jb_list72_flex">
                        <div class="_jb_list72_first">
                          <div class="_jb_list72_yhumb">
                            <img src="../assets/img/c-8.png" class="img-fluid" alt="">
                          </div>
                        </div>
                        <div class="_jb_list72_last">
                          <h4 class="_jb_title"><a href="job-detail.html">WordPress Developer</a></h4>
                          <div class="_times_jb">$40k - 60k</div>
                          <div class="_jb_types fulltime_lite">Full Time</div>
                        </div>
                      </div>
                      <div class="_jb_list72_foot">
                        <div class="_times_jb">6 hour ago</div>
                      </div>
                    </div>

                    <!-- Single Job -->
                    <div class="_jb_list72 shadow_0">
                      <div class="jobs-like bookmark">
                        <label class="label bg-warning">85 %</label>
                      </div>
                      <div class="_jb_list72_flex">
                        <div class="_jb_list72_first">
                          <div class="_jb_list72_yhumb">
                            <img src="../assets/img/c-9.png" class="img-fluid" alt="">
                          </div>
                        </div>
                        <div class="_jb_list72_last">
                          <h4 class="_jb_title"><a href="job-detail.html">PHP Developer</a></h4>
                          <div class="_times_jb">$25k - 40k</div>
                          <div class="_jb_types remote">Remote</div>
                        </div>
                      </div>
                      <div class="_jb_list72_foot">
                        <div class="_times_jb">3 hour ago</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">

                  <div class="_job_detail_box light">

                    <div class="_job_details_single">
                      <div class="_jb_details01">

                        <div class="_jb_details01_flex">
                          <div class="_jb_details01_authors">
                            <img src="../assets/img/c-7.png" class="img-fluid" alt="">
                          </div>
                          <div class="_jb_details01_authors_caption">
                            <h4 class="jbs_title">Full-Stack Web Designer<img src="../assets/img/verify.svg"
                                class="ml-1" width="12" alt=""></h4>
                            <ul class="jbx_info_list">
                              <li><span><i class="ti-briefcase"></i>InVision</span></li>
                              <li><span><i class="ti-credit-card"></i>$35k-50k PA</span></li>
                              <li><span><i class="ti-location-pin"></i>Canada, USA</span></li>
                            </ul>
                            <ul class="jbx_info_list">
                              <li>
                                <div class="jb_types fulltime">Full Time</div>
                              </li>
                              <li>
                                <div class="jb_types urgent">Sponsored</div>
                              </li>
                              <li>
                                <div class="jb_types remote">Remote</div>
                              </li>
                            </ul>
                          </div>
                        </div>

                        <div class="_jb_details01_last">
                          <ul class="_flex_btn">
                            <li><a href="#" class="_saveed_jb"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#" class="_applied_jb dark-btn">Apply Job</a></li>
                          </ul>
                        </div>

                      </div>
                    </div>

                    <div class="_job_detail_box_body">

                      <div class="_job_detail_single">
                        <h4>Job Summary</h4>
                        <p>We are one of the leading manufacturers and exporters of finished leather goods from
                          Calcutta, India for the last 20 years. We are a 100% EOU and manufacture leather goods for
                          global brands worldwide. We maintain strict quality parameters and ensure total employee
                          retention and satisfaction.</p>
                      </div>

                      <div class="_job_detail_single">
                        <h4>Job Duties:</h4>
                        <p>We're looking for someone with the creative spark, eye for illustration and design, passion
                          for graphics and ability to produce high quality design collaterals end-to-end.</p>
                        <ul>
                          <li>Draft mockups of website designs, brochures, iconography, and any other marketing
                            materials required</li>
                          <li>Collaborate with marketing teams and management to discuss which mockups are effective,
                            and use their feedback to develop final drafts</li>
                          <li>Revise the work of previous designers to create a unified aesthetic for our brand
                            materials</li>
                          <li>Work on multiple projects at once, and consistently meet draft deadlines</li>
                          <li>Communicate frequently with clients to update them on the progress of the project and to
                            answer any questions they might have</li>
                          <li>Work on multiple projects at once, and consistently meet draft deadlines</li>
                          <li>can start the part time job/internship between 4th Mar'21 and 8th Apr'21</li>
                          <li>have already graduated or are currently in any year of study</li>
                          <li>Revise the work of previous designers to create a unified aesthetic for our brand
                            materials</li>
                          <li>Other duties as requested</li>
                        </ul>
                      </div>

                      <div class="_job_detail_single">
                        <h4>Skill &amp; Experience</h4>
                        <ul>
                          <li>Need 3+ EXPERIENCE IN Web Designing</li>
                          <li>Understanding of key Design Principal</li>
                          <li>Proficiency With HTML, CSS, Bootstrap</li>
                          <li>Experience With Responsive &amp; Adaptive Design</li>
                          <li>Wordpress: 1 year (Required)</li>
                          <li>web designing: 1 year (Preferred)</li>
                          <li>total work: 2 years (Required)</li>
                        </ul>
                      </div>

                      <div class="_job_detail_single flexeo">
                        <div class="_job_detail_single_flex">
                        </div>

                        <div class="_exlio_buttons">
                          <ul class="bottoms_applies">
                            <li><a href="#" class="_saveed_jb">Save Job</a></li>
                            <li><a href="#" class="_applied_jb">Apply Job</a></li>
                          </ul>
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