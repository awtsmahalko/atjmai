<?php
$post_id = $_REQUEST['post_id'];

$labels_category = ['Admin', 'Teacher', 'Student'];

$Posts = new Posts;
$rowPost = $Posts::dataOf($post_id);
$rowPost['postby'] = Users::dataOf($rowPost['postby_id']);
?>
<div class="row">
  <div class="col-xl-9 col-lg-9 col-md-12">
    <div class="main-ws-sec">
      <div class="posts-section">
        <div class="post-bar">
          <div class="post_topbar">
            <div class="usy-dt" onclick="viewProfile(<?=$rowPost['postby']['user_id']?>)" style="cursor: pointer;">
              <img src="../images/users/<?=$rowPost['postby']['user_img']?>" alt="" style="width: 50px;height: 50px;border-radius: 50%;">
              <div class="usy-name">
                <h3><?= $rowPost['postby']['user_fname'] . " " . $rowPost['postby']['user_lname'] ?></h3>
                <span>
                  <img src="../images/clock.png" alt=""><?= $Posts->time_ago($rowPost['date_added']) ?></span>
              </div>
            </div>
          </div>
          <div class="epi-sec">
            <ul class="descp">
              <li>
                <img src="../images/icon8.png" alt="">
                <span><?= $labels_category[$rowPost['postby']['user_category']] ?></span>
              </li>
            </ul>
            <?php if($rowPost['postby_id'] != $_SESSION['user']['id']){ ?>
            <ul class="bk-links">
              <li><a href="controller/ajax.php?q=Messages&m=init&receiver_id=<?=$rowPost['postby_id']?>" title=""><i class="la la-envelope"></i></a></li>
            </ul>
            <?php } ?>
          </div>
          <div class="job_descp">
            <p><?= $rowPost['message'] ?></p>
            <?php if($rowPost['postby']['user_category'] == 2){ ?>
            <ul class="job-dt">
              <li>
                <a href="#" title=""><?= $rowPost['subscription'] ?></a>
              </li>
            </ul>
            <h3>Subjects</h3>
            <ul class="skill-tags">
              <?php
              $exploded_subjects = explode(",", $rowPost['subjects']);
              foreach($exploded_subjects as $subject_id){
                echo "<li><a href='#' title=''>" . Subjects::name($subject_id) . "</a></li>";
              }
              ?>
            </ul>
            <h3>Course</h3>
            <ul class="skill-tags">
              <li>
                <a href="#" title=""><?= Courses::name($rowPost['course_id']) ?></a>
              </li>
            </ul>
            <h3>Language</h3>
            <ul class="skill-tags">
              <li>
                <a href="#" title=""><?= $rowPost['language'] ?></a>
              </li>
            </ul>
            <?php } ?>
          </div>
          <div class="job-status-bar">
            <div class="comment-section">
              <div class="comment-sec">
                <ul>
                  <?php
                    $comments = $Posts::list_comment($post_id);
                    foreach($comments as $rowComment){
                  ?>
                  <li>
                    <div class="comment-list">
                      <div class="cm_img">
                        <img src="../images/users/<?=$rowComment['commentor']['user_img']?>" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
                      </div>
                      <div class="comment">
                        <h3><?=$rowComment['commentor']['user_fname'].' '.$rowComment['commentor']['user_lname']?></h3>
                        <span>
                          <img src="images/clock.png" alt=""><?= $Posts->time_ago($rowComment['date_added']) ?></span>
                        <p><?=$rowComment['comment']?></p>
                      </div>
                    </div>
                  </li>
                <?php } ?>
                </ul>
              </div>
              <div class="post-comment">
                <div class="cm_img">
                  <img src="../images/users/<?=$_SESSION['user']['img']?>" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
                </div>
                <div class="comment_box">
                  <form action="controller/ajax.php?q=Posts&m=add_comment" method="POST">
                    <input type="hidden" value="<?=$post_id?>" name="post_id">
                    <input type="text" name="comment" placeholder="Post a comment" autofocus>
                    <button type="submit">Send</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-12">
    <div class="right-sidebar">
      <?php
      if($rowPost['post_category'] == 1){
        if($_SESSION['user']['category'] == 2) {
          echo Tutorials::checkPostStatusByTution($rowPost['postby_id'],$post_id);
        }
      }else{
        if($_SESSION['user']['category'] == 1) {
          echo Tutorials::checkPostStatus($rowPost['postby_id'],$post_id);
        }
      }
      ?>
      <div class="widget widget-jobs">
        <div class="sd-title">
          <h3>About the <?= $labels_category[$rowPost['postby']['user_category']] ?></h3>
        </div>
        <div class="sd-title">
          <h4>Contact</h4>
          <p><?= $rowPost['postby']['user_mobile'] ?></p>
        </div>
        <div class="sd-title">
          <h4>Email</h4>
          <p><?= $rowPost['postby']['user_email'] ?></p>
        </div>
        <div class="sd-title">
          <h4>Address</h4>
          <p></p>
        </div>
      </div>
    </div>
  </div>
</div>