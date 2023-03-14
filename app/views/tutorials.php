<?php
$Tutorials = new Tutorials();
$tutorial_data = $Tutorials::active();
?>
<style>
.select2-container .select2-selection--single {
    height: 37px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 5px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 33px;
}
</style>
<div class="row">
    <?php
    if($tutorial_data['tutorial_id']>0){
        $tutions = $Tutorials->show_details($tutorial_data['tutorial_id']);
        $tutor_data = Users::dataOf($tutorial_data['tutor_id']);
        $readonly = $_SESSION['user']['category'] == 1 && $tutorial_data['tutorial_status'] == 'PENDING' ? "" : "readonly";
    ?>
    <div class="col-lg-12">
        <div class="filter-secs">
            <div class="filter-heading">
                <h3>Active tutorial (<?=$tutorial_data['tutorial_status']?>)</h3>
                <?php if($tutorial_data['tutorial_status'] == 'PENDING' && $_SESSION['user']['category'] == 1 && count($tutions) > 0){ ?>
                <button onclick="updateTutorialStatus(<?=$tutorial_data['tutorial_id']?>,'ONGOING','set as ongoing')" class="btn btn-warning" style="float: right;"><span class="fa fa-check-circle"></span> Set as Ongoing</button>
                <?php } ?>
                <?php if($tutorial_data['tutorial_status'] == 'ONGOING' && $_SESSION['user']['category'] == 1){ ?>
                <button onclick="updateTutorialStatus(<?=$tutorial_data['tutorial_id']?>,'FINISHED','finish tutorial')" class="btn btn-success" style="float: right;"><span class="fa fa-check-circle"></span> Finish Tutorial</button>
                <?php } ?>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-3">
                    <form id="frmUpdateTutorial">
                        <input type="hidden" class="form-control" name="tutorial_id" value="<?=$tutorial_data['tutorial_id']?>">
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Subject</h3>
                            </div>
                            <div>
                                <?php if($_SESSION['user']['category'] == 1 && $tutorial_data['tutorial_status'] == 'PENDING') { ?>
                                <select class="form-control select2" style="width: 100%;" name="subject" <?=$readonly?>>
                                    <option value="">Please Select</option>
                                    <?= Subjects::options(array($tutorial_data['subject_id'])) ?>
                                </select>
                                <?php }else{?>
                                    <input type="text" class="form-control" value="<?=Subjects::name($tutorial_data['subject_id'])?>" readonly>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Tution Limit</h3>
                            </div>
                            <div>
                                <input type="number" min="1" class="form-control" name="tution_limit" value="<?=$tutorial_data['tution_limit']?>" <?=$readonly?>>
                            </div>
                        </div>
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Date Start</h3>
                            </div>
                            <div>
                                <input type="date" class="form-control" name="date_start" value="<?=$tutorial_data['date_start']?>" <?=$readonly?>>
                            </div>
                        </div>
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Date End</h3>
                            </div>
                            <div>
                                <input type="date" class="form-control" name="date_end" value="<?=$tutorial_data['date_end']?>" <?=$readonly?>>
                            </div>
                        </div>
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Schedule</h3>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="schedule" placeholder="Every Monday" value="<?=$tutorial_data['schedule']?>" <?=$readonly?>>
                            </div>
                        </div>
                        <?php if($_SESSION['user']['category'] == 1 && $tutorial_data['tutorial_status'] == 'PENDING'){ ?>
                        <div class="widget widget-about bid-place">
                            <button type="submit" class="btn btn-success" id="btn-update">Update</button>
                        </div>
                        <?php  } ?>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div>
                      <div class="msg-title">
                        <h3>Tutor</h3>
                      </div>
                      <div class="messages-list">
                        <ul>
                        <li>
                            <div class="usr-msg-details">
                              <div class="usr-ms-img" onclick="viewProfile(<?=$tutor_data['user_id']?>)">
                                <img src="../images/users/<?=$tutor_data['user_img']?>" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
                              </div>
                              <div class="usr-mg-info">
                                <h3><?=$tutor_data['user_fname'].' '. $tutor_data['user_mname'].' '.$tutor_data['user_lname']?></h3>
                                <p>
                                    <span class="fa fa-phone"></span> <?=$tutor_data['user_mobile']?> &nbsp;
                                    <span class="fa fa-map-marker"></span> <?=$tutor_data['user_address']?>
                                </p>
                              </div>
                          </li>
                      </ul>
                      </div>
                      <div class="msg-title">
                        <h3>Tution List (<?=count($tutions)?>)</h3>
                      </div>
                      <div class="messages-list">
                        <?php if(count($tutions) > 0){ ?>
                        <ul>
                        <?php foreach($tutions as $tution){ ?>
                          <li>
                            <div class="usr-msg-details">
                              <div class="usr-ms-img" onclick="viewProfile(<?=$tution['tution']['user_id']?>)">
                                <img src="../images/users/<?=$tution['tution']['user_img']?>" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
                              </div>
                              <div class="usr-mg-info">
                                <h3><?=$tution['tution']['user_fname'].' '. $tution['tution']['user_mname'].' '.$tution['tution']['user_lname']?></h3>
                                <p>
                                    <span class="fa fa-phone"></span> <?=$tution['tution']['user_mobile']?> &nbsp;
                                    <span class="fa fa-map-marker"></span> <?=$tution['tution']['user_address']?>
                                </p>
                              </div>
                              <div style="float: right;position: inherit;">
                                <?=$Tutorials->details_action($tution)?>
                            </div>
                          </li>
                        <?php } ?>
                        </ul>
                        <?php }else{ ?>
                            <div class="usr-msg-details">
                                <p>No tution yet!</p>
                            </div>
                        <?php } ?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <?php if($_SESSION['user']['category'] == 1){ ?>
        <div class="col-lg-9">
            <div class="filter-secs">
                <div class="filter-heading">
                    <h3>No active tutorial</h3>
                </div>
                <form id="frmAddTutorial">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="filter-dd">
                                <div class="filter-ttl">
                                    <h3>Subject</h3>
                                </div>
                                <div>
                                    <select class="form-control select2" style="width: 100%;" name="subject">
                                        <option value="">Please Select</option>
                                        <?= Subjects::options() ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="filter-dd">
                                <div class="filter-ttl">
                                    <h3>Tution Limit</h3>
                                </div>
                                <div>
                                    <input type="number" min="1" class="form-control" name="tution_limit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="filter-dd">
                                <div class="filter-ttl">
                                    <h3>Date Start</h3>
                                </div>
                                <div>
                                    <input type="date" class="form-control" name="date_start">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="filter-dd">
                                <div class="filter-ttl">
                                    <h3>Date End</h3>
                                </div>
                                <div>
                                    <input type="date" class="form-control" name="date_end">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-12">
                            <div class="filter-dd">
                                <div class="filter-ttl">
                                    <h3>Schedule</h3>
                                </div>
                                <div>
                                    <input type="text" class="form-control" name="schedule" placeholder="Every Monday">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="paddy">
                            <div class="widget">
                                <button type="submit" class="btn btn-success" id="btn-add">Add Tutorial</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="right-sidebar">
                <div class="widget widget-about">
                    <div class="sign_link">
                      <img src="../images/cpsu-tutor-logo.png" alt="">
                    </div>
                    <h3>Tutorials</h3>
                    <span>View Tutorials List</span>
                </div>
                <?=Components::topTutors()?>
            </div>
        </div>
        <?php }else{ ?>
            <div class="right-sidebar">
                <div class="widget widget-about">
                    <div class="sign_link">
                        <img src="../images/cpsu-tutor-logo.png" alt="">
                    </div>
                    <h3>No Active Tutorial</h3>
                    <label class="badge badge-danger" style="font-size: 14px;">Apply to Tutorial first</label>
                    <span></span>
                    <div class="sign_link">
                        <h6>
                            <a href="index.php?q=tutor" title="">Find Tutor</a>
                        </h6>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<?php
$tutorials_finished = $Tutorials->show_finished();
if(count($tutorials_finished['tutorials']) > 0){
?>
<hr>
<div class="row">
    <span style="font-size: 25px;font-weight: bold;">Tutorial History</span>
</div>
<br>
<?php
foreach($tutorials_finished['tutorials'] as $tutorial){
?>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="filter-secs">
            <div class="filter-heading">
                <?php if($_SESSION['user']['category'] == 2){ ?>
                <div style="float: right;">
                    <!-- To display checked star rating icons -->
                    <?php
                    $rate_here = $Tutorials->rating($tutorial['tutorial_id'],$_SESSION['user']['id']);
                    for ($rating=1; $rating < 6; $rating++) {
                        $check_uncheked = $rate_here >= $rating ? "checked-star" : "unchecked-star";
                    ?>
                    <span onclick="rateMe(<?=$tutorial['tutorial_id']?>,<?=$rating?>)" class="fa fa-star <?=$check_uncheked?>" style="cursor: pointer;"></span>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-3">
                    <form id="frmUpdateTutorial">
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Subject</h3>
                            </div>
                            <div>
                                <input type="text" class="form-control" value="<?=Subjects::name($tutorial['subject_id'])?>" readonly>
                            </div>
                        </div>
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Tution Limit</h3>
                            </div>
                            <div>
                                <input type="number" min="1" class="form-control" name="tution_limit" value="<?=$tutorial['tution_limit']?>" readonly>
                            </div>
                        </div>
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Date Start</h3>
                            </div>
                            <div>
                                <input type="date" class="form-control" name="date_start" value="<?=$tutorial['date_start']?>" readonly>
                            </div>
                        </div>
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Date End</h3>
                            </div>
                            <div>
                                <input type="date" class="form-control" name="date_end" value="<?=$tutorial['date_end']?>" readonly>
                            </div>
                        </div>
                        <div class="filter-dd">
                            <div class="filter-ttl">
                                <h3>Schedule</h3>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="schedule" placeholder="Every Monday" value="<?=$tutorial['schedule']?>" readonly>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div>
                      <div class="msg-title">
                        <h3>Tutor</h3>
                      </div>
                      <div class="messages-list">
                        <ul>
                        <li>
                            <div class="usr-msg-details">
                              <div class="usr-ms-img" onclick="viewProfile(<?=$tutorial['tutor']['user_id']?>)">
                                <img src="../images/users/<?=$tutorial['tutor']['user_img']?>" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
                              </div>
                              <div class="usr-mg-info">
                                <h3><?=$tutorial['tutor']['user_fname'].' '. $tutorial['tutor']['user_mname'].' '.$tutorial['tutor']['user_lname']?></h3>
                                <p>
                                    <span class="fa fa-phone"></span> <?=$tutorial['tutor']['user_mobile']?> &nbsp;
                                    <span class="fa fa-map-marker"></span> <?=$tutorial['tutor']['user_address']?>
                                </p>
                              </div>
                          </li>
                      </ul>
                      </div>
                      <div class="msg-title">
                        <h3>Tution List (<?=count($tutorial['tutions'])?>)</h3>
                      </div>
                      <div class="messages-list">
                        <?php if(count($tutorial['tutions']) > 0){ ?>
                        <ul>
                        <?php foreach($tutorial['tutions'] as $tution){ ?>
                          <li>
                            <div class="usr-msg-details">
                              <div class="usr-ms-img" onclick="viewProfile(<?=$tution['tution']['user_id']?>)">
                                <img src="../images/users/<?=$tution['tution']['user_img']?>" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
                              </div>
                              <div class="usr-mg-info">
                                <h3><?=$tution['tution']['user_fname'].' '. $tution['tution']['user_mname'].' '.$tution['tution']['user_lname']?></h3>
                                <p>
                                    <span class="fa fa-phone"></span> <?=$tution['tution']['user_mobile']?> &nbsp;
                                    <span class="fa fa-map-marker"></span> <?=$tution['tution']['user_address']?>
                                </p>
                              </div>
                                <?php if($_SESSION['user']['category'] == 1){ ?>
                                <div style="float: right;">
                                    <!-- To display checked star rating icons -->
                                    <?php
                                    $rate_here = $Tutorials->rating($tutorial['tutorial_id'],$tution['tution']['user_id']);
                                    for ($rating=1; $rating < 6; $rating++) {
                                        $check_uncheked = $rate_here >= $rating ? "checked-star" : "unchecked-star";
                                    ?>
                                    <span class="fa fa-star <?=$check_uncheked?>"></span>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                          </li>
                        <?php } ?>
                        </ul>
                        <?php }else{ ?>
                            <div class="usr-msg-details">
                                <p>No tution yet!</p>
                            </div>
                        <?php } ?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php } ?>
<script type="text/javascript">
    var spinner = '<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>';
    $(".select2").select2();
    $("#frmAddTutorial").submit(function(e){
        e.preventDefault();
        var results = '';
        $.post("controller/ajax.php?q=Tutorials&m=add",$("#frmAddTutorial").serialize(),function(data,status){
            location.reload();
        });
    });

    $("#frmUpdateTutorial").submit(function(e){
        e.preventDefault();
        var results = '';
        $.post("controller/ajax.php?q=Tutorials&m=edit",$("#frmUpdateTutorial").serialize(),function(data,status){
            location.reload();
        });
    });

    function applyAction(apply_id,apply_status,label){
        var conf = confirm("Are you sure to "+label+"?");
        if(conf){
          $.post("controller/ajax.php?q=Posts&m=apply_action",{
            apply_id:apply_id,
            apply_status:apply_status
          },function(data,status){
            location.reload();
          });
        }
    }

    function updateTutorialStatus(tutorial_id,tutorial_status,label) {
        var conf = confirm("Are you sure "+label+"?");
        if(conf){
          $.post("controller/ajax.php?q=Tutorials&m=update_status",{
            tutorial_id:tutorial_id,
            tutorial_status:tutorial_status
          },function(data,status){
            location.reload();
          });
        }
    }

    function rateMe(tutorial_id,rate){
        $.post("controller/ajax.php?q=Tutorials&m=rate_me",{
            tutorial_id:tutorial_id,
            rate:rate
        },function(data,status){
            location.reload();
        });
    }
</script>