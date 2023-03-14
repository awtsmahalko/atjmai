<?php
$PostNotif = new Posts();
$notif_counter = $PostNotif->notifCounter();
$notif_message = $notif_counter > 0 ? "<span class='msg-notifc' style='top:0'>$notif_counter</span>":'';

$Messages = new Messages();
$count_unread = $Messages->getUnreadMessagesCounter($_SESSION['user']['id']);
$message_counter = $count_unread > 0 ? "<span class='msg-notifc' style='top:0'>$count_unread</span>":'';
?>
<header>
  <div class="container">
    <div class="header-data">
      <div class="logo">
        <a href="index.php" title="">
          <img src="../images/cpsu-logo-.png" alt="">
        </a>
      </div>
      <div class="search-bar">
        <form>
          <label style="color: #fff;font-size: 28px;font-weight: bold;padding-top: 5px;">CPSU TUTOR FINDER</label>
        </form>
      </div>
      <nav>
        <ul>
          <li>
            <a href="index.php" title="">
              <span>
                <img src="../images/icon1.png" alt="">
              </span> Home </a>
          </li>
        <?php if($_SESSION['user']['category'] == 1) { ?>
          <li>
            <a href="index.php?q=student" title="">
              <span>
                <img src="../images/icon4.png" alt="">
              </span> Students </a>
          </li>
          <li>
            <a href="index.php?q=tutorials" title="">
              <span>
                <img src="../images/icon5.png" alt="">
              </span> Tutorials </a>
          </li>
        <?php }else{ ?>
          <li>
            <a href="index.php?q=tutor" title="">
              <span>
                <img src="../images/icon5.png" alt="">
              </span> Tutors </a>
          </li>
          <li>
            <a href="index.php?q=tutorials" title="">
              <span>
                <img src="../images/icon5.png" alt="">
              </span> Tutorials </a>
          </li>
        <?php } ?>
          <li>
            <a href="index.php?q=messages" title="" class="not-box-openm">
              <span>
                <img src="../images/icon6.png" alt="">
              </span> Messages <?=$message_counter?></a>
          </li>
          <li>
            <a href="index.php?q=notification" title="">
              <span>
                <img src="../images/icon7.png" alt="">
              </span> Notification <?=$notif_message?></a>
          </li>
          <li>
            <a href="index.php?q=tnc" title="">
              <span class="fa fa-gears"></span><br> Terms & Condition</a>
          </li>
        </ul>
      </nav>
      <div class="menu-btn">
        <a href="#" title="">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      <div class="user-account">
        <div class="user-info">
          <img src="../images/users/<?=$_SESSION['user']['img']?>" alt="" style="width: 30px;height: 30px;border-radius: 50%;">
          <a href="#" title=""><?= $_SESSION['user']['fname']; ?></a>
          <i class="la la-sort-down"></i>
        </div>
        <div class="user-account-settingss" id="users">
          <h3>Setting</h3>
          <ul class="us-links">
            <li>
              <a href="index.php?q=account-settings" title="">Account Setting</a>
            </li>
          </ul>
          <h3 class="tc">
            <a href="auth/logout.php" title="">Logout</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
</header>