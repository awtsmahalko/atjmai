<div class="row">
  <div class="col-lg-3 col-md-4 pd-left-none no-pd">
    <div class="main-left-sidebar no-margin">
      <div class="user-data full-width">
        <div class="user-profile">
          <div class="username-dt">
            <div class="usr-pic">
              <img src="../images/users/<?=$_SESSION['user']['img']?>" alt="" style="height: 100% !important;">
            </div>
          </div>
          <div class="user-specs">
            <h3><?= $_SESSION['user']['fname'] . " " . $_SESSION['user']['lname'] ?></h3>
            <span><?= $_SESSION['user']['category'] == 1 ? "Teacher" : "Student"; ?></span>
          </div>
        </div>
        <ul class="user-fw-status">
          <!--              <li>
            <h4>Following</h4>
            <span>34</span>
          </li>
          <li>
            <h4>Followers</h4>
            <span>155</span>
          </li> -->
          <li>
            <a href="index.php?q=pds&id=<?=$_SESSION['user']['id']?>" title="">View Profile</a>
          </li>
        </ul>
      </div>
      <?=Components::suggestions()?>
    </div>
  </div>
  <div class="col-lg-6 col-md-8 no-pd">
    <div class="main-ws-sec">
      <div class="post-topbar">
        <div class="user-picy">
          <img src="../images/users/<?=$_SESSION['user']['img']?>" alt="" style="width: 50px;height: 50px;border-radius: 50%;">
        </div>
        <div class="post-st">
          <ul>
            <li>
              <a class="post_project" href="#" title="">Post</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="posts-section">
        <?php
        $Posts = new Posts;
        $loop_posts = $Posts::lists();
        if (count($loop_posts) > 0) {
          $labels_category = ['Admin', 'Teacher', 'Student'];
          foreach ($loop_posts as $rowPost) {
        ?>
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
                <div class="ed-opts">
                    <?php if($Posts->hasApply($rowPost['post_id'],$_SESSION['user']['id']) > 0){ ?>
                      <label class="badge badge-success">Already Applied</label>
                    <?php }else if(date('Y-m-d') > $rowPost['deadline'] && $rowPost['deadline'] != NULL && $rowPost['post_category'] == 2){ ?> 
                      <label class="badge badge-danger">Deadline over</label>
                    <?php }else{ ?>
                    <a href="#" title="" class="ed-opts-open">
                      <i class="la la-ellipsis-v"></i>
                    </a>
                    <ul class="ed-options">
                      <?php if($rowPost['postby']['user_category'] != $_SESSION['user']['category']) { ?>
                      <li>
                        <a href="index.php?q=viewpost&post_id=<?=$rowPost['post_id']?>" title="">Apply</a>
                      </li>
                      <?php } ?>
                      <?php if($rowPost['postby']['user_id'] == $_SESSION['user']['id']) { ?>
                      <li>
                        <a href="index.php?q=viewpost&post_id=<?=$rowPost['post_id']?>" title="">View</a>
                      </li>
                      <?php } ?>
                      <li>
                        <a href="#" title="">Hide</a>
                      </li>
                    </ul>
                  <?php } ?>
                </div>
              </div>
              <div class="epi-sec">
                <ul class="descp">
                  <li>
                    <img src="../images/icon8.png" alt="">
                    <span><?= $labels_category[$rowPost['postby']['user_category']] ?></span>
                  </li>
                </ul>
              </div>
              <div class="job_descp">
                <p><?= $rowPost['message'] ?></p>
                <?php if($rowPost['post_category'] ==2) { ?>
                <h3>Subjects</h3>
                <ul class="skill-tags">
                  <?php
                  $exploded_subjects = explode(",", $rowPost['subjects']);
                  foreach($exploded_subjects as $subject_id){
                    echo "<li><a href='#' title=''>" . Subjects::name($subject_id) . "</a></li>";
                  }
                  ?>
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
                <ul class="like-com">
                  <li><a href="index.php?q=viewpost&post_id=<?=$rowPost['post_id']?>" class="com"><i class="fa fa-comment-alt"></i> Comment <?=count($Posts::list_comment($rowPost['post_id']))?></a></li>
                </ul>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </div>
  <div class="col-lg-3 pd-right-none no-pd">
    <div class="right-sidebar">
      <div class="widget widget-about">
        <div class="sign_link">
          <img src="../images/cpsu-tutor-logo.png" alt="">
        </div>
        <h3>Newsfeed</h3>
        <span>View Latest Posts</span>
      </div>
      <?=Components::topTutors()?>
    </div>
  </div>
</div>

<div class="post-popup pst-pj">
  <div class="post-project">
    <h3>Post</h3>
    <div class="post-project-fields">
      <form action="controller/ajax.php?q=Posts&m=add" method="POST">
        <div class="row">
        <?php if($_SESSION['user']['category'] == 2){ ?>
          <div class="cp-field" style="margin: 0px !important;">
              <h5>Subjects</h5>
              <div class="cpp-fiel">
                  <select class="form-control select2" name="subjects[]" id="subject" style="width:100%;" required multiple>
                      <?= Subjects::options() ?>
                  </select>
              </div>
          </div>
          <div class="cp-field">
              <h5>Prefered Language</h5>
              <div class="cpp-fiel">
                  <select class="form-control select2" name="language" id="language" style="width:100%;">
                      <?= Components::medium() ?>
                  </select>
              </div>
          </div>
          <div class="cp-field">
              <h5>Deadline</h5>
              <div class="cpp-fiel">
                <input type="date" name="deadline" class="form-control" required>
              </div>
          </div>
        <?php } ?>
          <div class="cp-field" style="margin-top: 0px !important;">
              <h5>Message</h5>
              <div class="cpp-fiel">
                <textarea name="message" rows="2" placeholder="Message" required></textarea>
              </div>
          </div>
          <div class="col-lg-12">
            <ul>
              <li>
                <button class="active" type="submit" value="post">Post</button>
              </li>
              <li>
                <a href="index.php" title="">Cancel</a>
              </li>
            </ul>
          </div>
        </div>
      </form>
    </div>
    <a href="#" title="">
      <i class="la la-times-circle-o"></i>
    </a>
  </div>
</div>

<script type="text/javascript">
    $(".select2").select2();
</script>