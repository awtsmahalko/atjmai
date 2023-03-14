<?php
$receiver_id = isset($_REQUEST['receiver_id']) ? $_REQUEST['receiver_id'] : 0;
$Messages = new Messages();
$chat_heads = $Messages->chat_heads($receiver_id);
?>
<?php
if(count($chat_heads)>0){
$chat_details = $Messages->chat_messages($receiver_id);
$chat_messages = $chat_details['messages'];
?>
<div class="row">
  <div class="col-lg-4 col-md-12 no-pdd">
    <div class="msgs-list">
      <div class="msg-title">
        <h3>Messages</h3>
        <ul>
          <li>
            <a href="#" title="">
              <i class="fa fa-cog"></i>
            </a>
          </li>
          <li>
            <a href="#" title="">
              <i class="fa fa-ellipsis-v"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="messages-list">
        <ul>
          <?php
          foreach($chat_heads as $row){
          ?>
          <li class="<?=$row['active']?>" onclick="window.location='index.php?q=messages&receiver_id=<?=$row['user']?>'">
            <div class="usr-msg-details">
              <div class="usr-ms-img">
                <img src="../images/users/<?=$row['user_data']['user_img']?>" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
                <span class="msg-status"></span>
              </div>
              <div class="usr-mg-info">
                <h3><?=$row['user_data']['user_fname']. ' ' .$row['user_data']['user_lname']?></h3>
                <p><?=$row['message_name']?></p>
              </div>
              <span class="posted_time"><?=$row['time_ago']?></span>
              <?=$row['unread'] > 0 ? "<span class='msg-notifc'>$row[unread]</span>":""?>
            </div>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <?php if($receiver_id > 0){ ?>
  <div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
    <div class="main-conversation-box">
      <div class="message-bar-head">
        <div class="usr-msg-details" onclick="viewProfile(<?=$receiver_id?>)" style="cursor: pointer;">
          <div class="usr-ms-img">
            <img src="../images/users/<?=Users::img($receiver_id)?>" alt="" class="mCS_img_loaded" style="width: 50px;height: 50px;border-radius: 50%;">
          </div>
          <div class="usr-mg-info">
            <h3><?=Users::name($receiver_id)?></h3>
            <p>Online</p>
          </div>
        </div>
        <a href="#" title="">
          <i class="fa fa-ellipsis-v"></i>
        </a>
      </div>
      <div class="messages-line mCustomScrollbar _mCS_1">
        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0">
          <div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
            <div style="margin-top: 100px;">
            <center>
              <p>Just started a conversation</p>
            </center>
          </div>
            <?php
              foreach($chat_messages as $row){
            ?>
            <?php if($row['receiver_id'] == $_SESSION['user']['id']){ ?>
            <div class="main-message-box st3">
              <div class="message-dt st3">
                <div class="message-inner-dt">
                  <p><?=$row['message_name']?></p>
                </div>
                <span><?=$row['time_ago'].$row['receiver_id']?></span>
              </div>
              <div class="messg-usr-img">
                <img src="../images/users/<?=Users::img($row['sender_id'])?>" alt="" class="mCS_img_loaded" style="width: 40px;height: 40px;border-radius: 50%;">
              </div>
            </div>
            <?php } ?>
            <?php if($row['sender_id'] == $_SESSION['user']['id']){ ?>
            <div class="main-message-box ta-right">
              <div class="message-dt" style="float: right;">
                <div class="message-inner-dt">
                  <p><?=$row['message_name']?></p>
                </div>
                <span><?=$row['time_ago'].$row['sender_id']?></span>
              </div>
              <div class="messg-usr-img">
                <img src="../images/users/<?=$_SESSION['user']['img']?>" alt="" class="mCS_img_loaded" style="width: 40px;height: 40px;border-radius: 50%;">
              </div>
            </div>
            <?php } ?>
          <?php } ?>
          </div>
          <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;">
            <div class="mCSB_draggerContainer">
              <div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 453px; max-height: 594px; top: 151px;">
                <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
              </div>
              <div class="mCSB_draggerRail"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="message-send-area">
        <form action="controller/ajax.php?q=Messages&m=add" method="POST">
          <div class="mf-field">
            <input type="hidden" value="<?=$receiver_id?>" name="receiver_id">
            <input type="text" name="message_name" id="message_name" placeholder="Type a message here" autofocus>
            <button type="submit"><span class="fa fa-send"></span> Send</button>
          </div>
          <ul>
            <li>
              <a href="#" title="">
                <i class="fa fa-smile"></i>
              </a>
            </li>
            <li>
              <a href="#" title="">
                <i class="fa fa-camera"></i>
              </a>
            </li>
            <li>
              <a href="#" title="">
                <i class="fa fa-paperclip"></i>
              </a>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
</div>
<?php }else{ ?>
  <div class="row">
    <div class="col-lg-3 pd-right-none no-pd"></div>
    <div class="col-lg-6 pd-right-none no-pd">
      <div class="right-sidebar">
        <div class="widget widget-about">
          <div class="sign_link">
            <img src="../images/cpsu-tutor-logo.png" alt="">
          </div>
          <h3>No Chat Conversation</h3>
          <span>Discover people to connect</span>
          <div class="sign_link">
            <h3>
              <a href="index.php" title="">News Feed</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 pd-right-none no-pd"></div>
  </div>
<?php } ?>
<script>
setTimeout(function() {
  if($("#message_name").val() == ''){
    // location.reload(); 
  }
}, 1000);
</script>