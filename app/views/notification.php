<div class="row">
  <div class="col-lg-9 col-md-8 no-pd">
    <div class="main-ws-sec">
    <div class="msgs-list">
      <div class="msg-title">
        <h3>Notification</h3>
      </div>
      <div class="messages-list">
        <?php
        $Posts = new Posts();
        $Posts->notifCheck();
        $loop_notif = $Posts->notification();
        ?>
        <ul>
          <?php 
          foreach($loop_notif as $row){
          ?>
          <li>
            <div class="usr-msg-details">
              <div class="usr-ms-img" onclick="viewProfile(<?=$row['applied_by']?>)">
                <img src="../images/users/<?=$row['user_img']?>" alt="" style="width: 50px;height: 50px;border-radius: 50%;">
              </div>
              <div class="usr-mg-info">
                <h3><?=$row['user_fullname']?></h3>
                <p><?=$row['message']?></p>
              </div>
              <span class="posted_time" style="top: 0px !important;"><?=$row['time_ago']?></span>
              <?=$row['actions']?>
            </div>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
    </div>
  </div>
  <div class="col-lg-3 pd-right-none no-pd">
    <div class="right-sidebar">
      <div class="widget widget-about">
        <div class="sign_link">
          <img src="../images/cpsu-tutor-logo.png" alt="">
        </div>
        <h3>Notification</h3>
        <span>View Latest Notifications</span>
      </div>
      <?=Components::topTutors()?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-2 col-md-12 no-pdd">
  </div>
  <div class="col-lg-8 col-md-12 pd-right-none pd-left-none">

  </div>
</div>
<script>
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

</script>