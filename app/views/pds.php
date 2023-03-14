<?php
$user_data = Users::dataOf($_REQUEST['id']);
?>
<div class="row">
    <div class="col-lg-2 pd-right-none no-pd">
    </div>
    <div class="col-lg-8 no-pd">
      <div class="user-data full-width">
        <div class="user-profile">
          <div class="username-dt">
            <div class="usr-pic">
              <img src="../images/users/<?=$user_data['user_img']?>" alt="" style="height: 100% !important;">
            </div>
          </div>
          <div class="user-specs">
            <h3><?= $user_data['user_fname'] . " " . $user_data['user_lname'] ?></h3>
            <span><?= $user_data['user_category'] == 1 ? "Teacher" : "Student"; ?></span>
          </div>
        </div>
      </div>
        <div class="user-profile-ov st2">
            <h3>Personal Information</h3>
            <div class="row">
                <div class="col-sm-3"><h4>Fullname : </h4></div>
                <div class="col-sm-9"><?=$user_data['user_fname'].' '.$user_data['user_mname']. ' '.$user_data['user_lname']?></div>

                <div class="col-sm-3"><h4>Address : </h4></div>
                <div class="col-sm-9"><?=$user_data['user_address']?></div>

                <div class="col-sm-3"><h4>Email Address : </h4></div>
                <div class="col-sm-9"><?=$user_data['user_email']?></div>

                <div class="col-sm-3"><h4>Contact Number : </h4></div>
                <div class="col-sm-9"><?=$user_data['user_mobile']?></div>

                <div class="col-sm-3"><h4>Date of Birth : </h4></div>
                <div class="col-sm-9"><?=$user_data['user_dob']?></div>

                <div class="col-sm-3"><h4>Place of Birth : </h4></div>
                <div class="col-sm-9"><?=$user_data['user_pob']?></div>

                <div class="col-sm-3"><h4>Gender : </h4></div>
                <div class="col-sm-9"><?=$user_data['user_gender']?></div>

                <div class="col-sm-3"><h4>Nationality : </h4></div>
                <div class="col-sm-9"><?=$user_data['nationality']?></div>

                <div class="col-sm-3"><h4>Civil Status : </h4></div>
                <div class="col-sm-9"><?=$user_data['user_civil_status']?></div>
            </div>
        </div>
        <?php if($user_data['user_category'] == 1){ ?>
        <div class="user-profile-ov st2">
            <h3>Educational Background</h3>
            <div class="row">
                <div class="col-sm-3"><h4>Highest Attainment </h4></div>
                <div class="col-sm-9"><?=$user_data['educ_highest']?></div>

                <div class="col-sm-3"><h4>Degree Earned : </h4></div>
                <div class="col-sm-9"><?=$user_data['educ_degree']?></div>

                <div class="col-sm-3"><h4>School/University : </h4></div>
                <div class="col-sm-9"><?=$user_data['educ_school']?></div>

                <div class="col-sm-3"><h4>Year Graduated : </h4></div>
                <div class="col-sm-9"><?=$user_data['educ_year']?></div>
            </div>
        </div>
        <div class="user-profile-ov st2">
            <h3>Experience</h3>
            <div class="row">
                <div class="col-sm-3"><h4>Institution/Company </h4></div>
                <div class="col-sm-9"><?=$user_data['exp_company']?></div>

                <div class="col-sm-3"><h4>Position : </h4></div>
                <div class="col-sm-9"><?=$user_data['exp_position']?></div>

                <div class="col-sm-3"><h4>Duration : </h4></div>
                <div class="col-sm-9"><?=$user_data['exp_duration']?></div>

                <div class="col-sm-3"><h4>Summary of Responsibilities : </h4></div>
                <div class="col-sm-9"><?=$user_data['exp_responsibility']?></div>
            </div>
        </div>
        <div class="user-profile-ov st2">
            <h3>Skills and Expertise</h3>
            <div class="row">
                <div class="col-sm-3"><h4>Skills/Expertise </h4></div>
                <div class="col-sm-9"><?=$user_data['skills']?></div>

                <div class="col-sm-3"><h4>Certifications : </h4></div>
                <div class="col-sm-9"><?=$user_data['certifications']?></div>
            </div>
        </div>
        <div class="user-profile-ov st2">
            <h3>Availability</h3>
            <div class="row">
                <div class="col-sm-3"><h4>Days and Time </h4></div>
                <div class="col-sm-9"><?=$user_data['availability']?></div>

                <div class="col-sm-3"><h4>Method : </h4></div>
                <div class="col-sm-9"><?=$user_data['tutor_method']?></div>
            </div>
        </div>
        <div class="user-profile-ov st2">
            <h3>References</h3>
            <div class="row">
                <div class="col-sm-3"><h4>Name </h4></div>
                <div class="col-sm-9"><?=$user_data['ref_name']?></div>

                <div class="col-sm-3"><h4>Relationship : </h4></div>
                <div class="col-sm-9"><?=$user_data['ref_relation']?></div>

                <div class="col-sm-3"><h4>Contact Information : </h4></div>
                <div class="col-sm-9"><?=$user_data['ref_contact']?></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="col-lg-2 pd-right-none no-pd">
    </div>
</div>
<style>
.pds_profile {
    float: left;
    width: 100%;
    background-color: #fff;
    text-align: center;
    border-left: 1px solid #e4e4e4;
    border-right: 1px solid #e4e4e4;
    border-bottom: 1px solid #e4e4e4;
    margin-bottom: 30px;
}
</style>