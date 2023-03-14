<?php
$user_data = Users::dataOf($_SESSION['user']['id']);
$Tutors = new Tutor();
$tutor_data = $Tutors->tutor_data($user_data['user_id']);

$upload_error = isset($_SESSION['upload']['error'])?$_SESSION['upload']['error']:'';
$tab = isset($_REQUEST['tab'])?$_REQUEST['tab']:'nav-acc';
$_SESSION['upload']['error'] = '';
?>
<div class="row">
  <div class="col-lg-3">
    <div class="acc-leftbar">
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link <?=$tab == 'nav-acc' ? 'active': '';?>" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true">
          <i class="la la-cogs"></i>Personal Information</a>
      <?php if($_SESSION['user']['category'] == 1){?>
        <a class="nav-item nav-link <?=$tab == 'nav-status' ? 'active': '';?>" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false">
          <i class="fa fa-graduation-cap"></i>Educational Background
        </a>
        <a class="nav-item nav-link <?=$tab == 'nav-experience' ? 'active': '';?>" id="nav-experience-tab" data-toggle="tab" href="#nav-experience" role="tab" aria-controls="nav-experience" aria-selected="false">
          <i class="fa fa-chalkboard"></i>Experience
        </a>
        <a class="nav-item nav-link <?=$tab == 'nav-skills' ? 'active': '';?>" id="nav-skills-tab" data-toggle="tab" href="#nav-skills" role="tab" aria-controls="nav-skills" aria-selected="false">
          <i class="fa fa-line-chart"></i>Skills and Expertise
        </a>
        <a class="nav-item nav-link <?=$tab == 'nav-avail' ? 'active': '';?>" id="nav-avail-tab" data-toggle="tab" href="#nav-avail" role="tab" aria-controls="nav-avail" aria-selected="false">
          <i class="fa fa-clock"></i> Availability
        </a>
        <a class="nav-item nav-link <?=$tab == 'nav-ref' ? 'active': '';?>" id="nav-ref-tab" data-toggle="tab" href="#nav-ref" role="tab" aria-controls="nav-ref" aria-selected="false">
          <i class="fa fa-users"></i> References
        </a>
      <?php } ?>
        <a class="nav-item nav-link <?=$tab == 'nav-photo' ? 'active': '';?>" id="nav-photo-tab" data-toggle="tab" href="#nav-photo" role="tab" aria-controls="nav-photo" aria-selected="false">
          <i class="la la-user"></i>Profile Picture</a>
        <a class="nav-item nav-link <?=$tab == 'nav-password' ? 'active': '';?>" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">
          <i class="fa fa-lock"></i>Change Password </a>
      </div>
    </div>
  </div>
  <div class="col-lg-9">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade <?=$tab == 'nav-acc' ? 'active show': '';?>" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
        <div class="acc-setting">
          <h3>Personal Information</h3>
          <form action="controller/ajax.php?q=Users&m=updateProfile" method="post">
            <input type="hidden" value="<?=$user_data['user_id']?>" name="user_id" required>
            <div class="row col-md-12 no-pdd">
              <div class="col-md-4">
                <div class="cp-field">
                  <h5>First Name</h5>
                  <div class="cpp-fiel">
                    <input type="text" value="<?=$user_data['user_fname']?>" name="user_fname" required>
                    <i class="fa fa-user"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cp-field">
                  <h5>Middle Name</h5>
                  <div class="cpp-fiel">
                    <input type="text" value="<?=$user_data['user_mname']?>" name="user_mname">
                    <i class="fa fa-user"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cp-field">
                  <h5>Last Name</h5>
                  <div class="cpp-fiel">
                    <input type="text" value="<?=$user_data['user_lname']?>" name="user_lname" required>
                    <i class="fa fa-user"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Address</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['user_address']?>" name="user_address" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12 no-pdd">
              <div class="col-md-6">
                <div class="cp-field">
                  <h5>Email Address</h5>
                  <div class="cpp-fiel">
                    <input type="email" value="<?=$user_data['user_email']?>" name="user_email" required>
                    <i class="fa fa-envelope"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="cp-field">
                  <h5>Contact Number</h5>
                  <div class="cpp-fiel">
                    <input type="text" value="<?=$user_data['user_mobile']?>" name="user_mobile" required>
                    <i class="fa fa-phone"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row col-md-12 no-pdd">
              <div class="col-md-4">
                <div class="cp-field">
                  <h5>Date of Birth</h5>
                  <div class="cpp-fiel">
                    <input type="date" value="<?=$user_data['user_dob']?>" name="user_dob" required>
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="cp-field">
                  <h5>Place of Birth</h5>
                  <div class="cpp-fiel">
                    <input type="text" value="<?=$user_data['user_pob']?>" name="user_pob" required>
                    <i class="fa fa-map-marker"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row col-md-12 no-pdd">
              <div class="col-md-4 padding-right-none">
                <div class="cp-field">
                  <h5>Gender</h5>
                  <div class="cpp-fiel">
                    <input type="text" value="<?=$user_data['user_gender']?>" name="user_gender" required>
                    <i class="fa fa-intersex"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cp-field">
                  <h5>Nationality</h5>
                  <div class="cpp-fiel">
                    <input type="text" value="<?=$user_data['nationality']?>" name="nationality" required>
                    <i class="fa fa-flag"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cp-field">
                  <h5>Civil Status</h5>
                  <div class="cpp-fiel">
                    <input type="text" value="<?=$user_data['user_civil_status']?>" name="user_civil_status" required>
                    <i class="fa fa-user"></i>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="save-stngs pd2">
              <ul>
                <li>
                  <button type="submit">Save Personal Information</button>
                </li>
              </ul>
            </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade <?=$tab == 'nav-status' ? 'active show': '';?>" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
        <div class="acc-setting">
          <h3>Educational Background</h3>
          <form action="controller/ajax.php?q=Users&m=updateBackground" method="post">
            <input type="hidden" value="<?=$user_data['user_id']?>" name="user_id" required>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Highest Educational Attainment</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['educ_highest']?>" name="educ_highest" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Degree Earned</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['educ_degree']?>" name="educ_degree" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>School/University</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['educ_school']?>" name="educ_school" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Year Graduated</h5>
                <div class="cpp-fiel">
                  <input type="number" min="1970" value="<?=$user_data['educ_year']?>" name="educ_year" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
              <div class="save-stngs pd2">
                <ul>
                  <li>
                    <button type="submit">Save Background</button>
                  </li>
                </ul>
              </div>
          </form>
          </div>
      </div>
      <div class="tab-pane fade <?=$tab == 'nav-experience' ? 'active show': '';?>" id="nav-experience" role="tabpanel" aria-labelledby="nav-experience-tab">
        <div class="acc-setting">
          <h3>Experience</h3>
          <form action="controller/ajax.php?q=Users&m=updateExperience" method="post">
            <input type="hidden" value="<?=$user_data['user_id']?>" name="user_id" required>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Institution/Company</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['exp_company']?>" name="exp_company" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Postion</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['exp_position']?>" name="exp_position" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Duration</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['exp_duration']?>" name="exp_duration" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Summary of Responsibilities</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['exp_responsibility']?>" name="exp_responsibility" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
              <div class="save-stngs pd2">
                <ul>
                  <li>
                    <button type="submit">Save Experience</button>
                  </li>
                </ul>
              </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade <?=$tab == 'nav-skills' ? 'active show': '';?>" id="nav-skills" role="tabpanel" aria-labelledby="nav-skills-tab">
        <div class="acc-setting">
          <h3>Skills and Expertise</h3>
          <form action="controller/ajax.php?q=Users&m=updateSkills" method="post">
            <input type="hidden" value="<?=$user_data['user_id']?>" name="user_id" required>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Skills/Expertise</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['skills']?>" name="skills" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Certifications</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['certifications']?>" name="certifications" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
              <div class="save-stngs pd2">
                <ul>
                  <li>
                    <button type="submit">Save Skills</button>
                  </li>
                </ul>
              </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade <?=$tab == 'nav-avail' ? 'active show': '';?>" id="nav-avail" role="tabpanel" aria-labelledby="nav-avail-tab">
        <div class="acc-setting">
          <h3>Availability</h3>
          <form action="controller/ajax.php?q=Users&m=updateAvailability" method="post">
            <input type="hidden" value="<?=$user_data['user_id']?>" name="user_id" required>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Days and Time Available for Tutoring:</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['availability']?>" name="availability" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Preferred Tutoring Method: (e.g. online, in-person, both)</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['tutor_method']?>" name="tutor_method" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
              <div class="save-stngs pd2">
                <ul>
                  <li>
                    <button type="submit">Save Availbility</button>
                  </li>
                </ul>
              </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade <?=$tab == 'nav-ref' ? 'active show': '';?>" id="nav-ref" role="tabpanel" aria-labelledby="nav-ref-tab">
        <div class="acc-setting">
          <h3>References</h3>
          <form action="controller/ajax.php?q=Users&m=updateReference" method="post">
            <input type="hidden" value="<?=$user_data['user_id']?>" name="user_id" required>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Name:</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['ref_name']?>" name="ref_name" required>
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Relationship</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['ref_relation']?>" name="ref_relation" required>
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="cp-field">
                <h5>Contact Information</h5>
                <div class="cpp-fiel">
                  <input type="text" value="<?=$user_data['ref_contact']?>" name="ref_contact" required>
                  <i class="fa fa-phone"></i>
                </div>
              </div>
            </div>
              <div class="save-stngs pd2">
                <ul>
                  <li>
                    <button type="submit">Save Reference</button>
                  </li>
                </ul>
              </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade <?=$tab == 'nav-photo' ? 'active show': '';?>" id="nav-photo" role="tabpanel" aria-labelledby="nav-photo-tab">
        <div class="acc-setting">
          <h3>Profile Picture</h3>
         <form action="controller/ajax.php?q=Users&m=change_profile" method="post" enctype="multipart/form-data">
            <div class="company_profile_info">
              <div class="company-up-info" style="padding: 30px 0 0px 0 !important;">
                  <img src="../images/users/<?=$user_data['user_img']?>" alt="" style="width:250px !important;height: 250px !important;border-radius: 50%;" id="preview">
                  <ul class="user-fw-status">
                    <li>
                      <?=$upload_error?>
                    </li>
                      <li>
                          <input type="file" style="padding: 0.375rem 0.75rem;line-height: 1.5;border: 1px solid #ced4da;border-radius: 0.25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" id="customFile" name="file" onchange="previewImage(this);" required />
                      </li>
                      <li>
                        <button type="submit" class="btn btn-success"><span class="fa fa-upload"></span> Change Profile</button>
                      </li>
                  </ul>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade <?=$tab == 'nav-password' ? 'active show': '';?>" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
        <div class="acc-setting">
          <h3>Account Setting</h3>
          <form action="">
            <div class="cp-field">
              <h5>Old Password</h5>
              <div class="cpp-fiel">
                <input type="text" name="old-password" placeholder="Old Password">
                <i class="fa fa-lock"></i>
              </div>
            </div>
            <div class="cp-field">
              <h5>New Password</h5>
              <div class="cpp-fiel">
                <input type="text" name="new-password" placeholder="New Password">
                <i class="fa fa-lock"></i>
              </div>
            </div>
            <div class="cp-field">
              <h5>Repeat Password</h5>
              <div class="cpp-fiel">
                <input type="text" name="repeat-password" placeholder="Repeat Password">
                <i class="fa fa-lock"></i>
              </div>
            </div>
            <div class="cp-field">
              <h5>
                <a href="#" title="">Forgot Password?</a>
              </h5>
            </div>
            <div class="save-stngs pd2">
              <ul>
                <li>
                  <button type="submit">Save Setting</button>
                </li>
              </ul>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(".select2").select2();
  function previewImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("preview").src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>