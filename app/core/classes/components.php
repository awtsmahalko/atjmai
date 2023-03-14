<?php
class Components extends Connection
{
    public static function medium($values = '')
    {
        $option = '';
        $lists = [
            'English', 'Visaya', 'Filipino'
        ];

        foreach ($lists as $list) {
            $selected = $list == $values ? "selected":"";
            $option .= "<option $selected>$list</option>";
        }

        return $option;
    }

    public static function subscription($values = '')
    {
        $option = '';
        $lists = [
            'Free', 'Paid'
        ];

        foreach ($lists as $list) {
            $selected = $list == $values ? "selected":"";
            $option .= "<option $selected>$list</option>";
        }

        return $option;
    }

    public static function topTutors()
    {
        $Tutorials = new Tutorials();
        $self = new static;

        $result = $self->select("tbl_tutorials_details AS d, tbl_tutorials AS h", "AVG(rating) as rate,h.tutor_id", "h.tutorial_id = d.tutorial_id GROUP BY h.tutor_id ORDER BY rate DESC LIMIT 5");
        $top = '';

        while ($row = $result->fetch_assoc()) {
            $tutor_data = Users::dataOf($row['tutor_id']);
            $rates = '';
            for ($rating=1; $rating < 6; $rating++) {
                $check_uncheked = $row['rate'] >= $rating ? "checked-star" : "unchecked-star";
                $rates .= '<span class="fa fa-star '.$check_uncheked.'" style="float:left;"></span>';
            }

            $top .= '<div class="job-details" style="width:60% !important;cursor:pointer;" onclick="viewProfile('.$row['tutor_id'].')">
               <h3>'.$tutor_data['user_lname'].', '.$tutor_data['user_lname'][0].'</h3>
               <p>'.$tutor_data['user_mobile'].'</p>
           </div>
           <div class="hr-rate" style="width:40% !important"><div>'.$rates.'</div></div>';
        }

        // SELECT AVG(rating) as rate FROM `tbl_tutorials_details` AS d, tbl_tutorials AS h WHERE h.tutorial_id = d.tutorial_id GROUP BY h.tutor_id ORDER BY rate DESC LIMIT 5
        echo '<div class="widget widget-jobs">
            <div class="sd-title">
                <h3>Top 5 Tutors</h3>
                <i class="la la-ellipsis-v"></i>
            </div>
            <div class="jobs-list">
                <div class="job-info" style="">'.$top.'</div>
            </div>
        </div>';
    }

    public static function suggestions()
    {
        echo '<div class="suggestions full-width">
        <div class="sd-title">
          <h3>Suggestions</h3>
          <i class="la la-ellipsis-v"></i>
        </div>
        <div class="suggestions-list">
          <div class="suggestion-usd" style="display:none">
            <img src="../images/resources/s1.png" alt="">
            <div class="sgt-text">
              <h4>Jessica William</h4>
              <span>Graphic Designer</span>
            </div>
            <span>
              <i class="la la-plus"></i>
            </span>
          </div>
          <div class="view-more">
            <a href="#" title="">View More</a>
          </div>
        </div>
      </div>';
    }

    public static function noActiveTutorial($redirect='')
    {
        return '<div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                    <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>No Active Tutorial</h3>
                <label class="badge badge-danger" style="font-size: 14px;">Add tutorial first</label>
                <span></span>
                <div class="sign_link">
                    <h6>
                        <a href="index.php?q=tutorials&redirect='.$redirect.'" title="">Add Tutorial</a>
                    </h6>
                </div>
            </div>
        </div>';
    }

    public static function tutorialIsOngoing()
    {
        return '<div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                    <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>Ongoing Tutorial</h3>
                <label class="badge badge-warning" style="font-size: 14px;">Unable to apply</label>
                <span></span>
            </div>
        </div>';
    }

    public static function confirmApplication($post_id,$postby_id,$tutorial_id = 0)
    {
        return '<div class="widget widget-about bid-place">
            <form action="controller/ajax.php?q=Posts&m=apply" method="post">
                <input type="hidden" name="post_id" value="'.$post_id.'">
                <input type="hidden" name="post_by" value="'.$postby_id.'">
                <input type="hidden" name="tutorial_id" value="'.$tutorial_id.'">
                <button type="submit" class="btn btn-primary">Confirm Application</button>
            </form>
        </div>';
    }

    public static function alreadyApplied($tutor = false)
    {
        $pot = $tutor ? "Tutor" : "Post";
        $text = $tutor ? " to tutor" : "";
        return '<div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                    <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>'.$pot.'</h3>
                <label class="badge badge-success" style="font-size: 14px;">Already applied '.$text.'</label>
                <span></span>
            </div>
        </div>';
    }

    public static function deadlineIsOver()
    {
        return '<div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                    <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>Unavailable</h3>
                <label class="badge badge-danger" style="font-size: 14px;">Deadline is over</label>
                <span></span>
            </div>
        </div>';
    }

    public static function unavailableTutor()
    {
        return '<div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                    <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>Unavailable</h3>
                <label class="badge badge-danger" style="font-size: 14px;">Tutor is temporarily unavailable</label>
                <span></span>
            </div>
        </div>';
    }

    public static function exceedsTutorialLimit()
    {
        return '<div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                    <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>Unavailable</h3>
                <label class="badge badge-danger" style="font-size: 14px;">Tutorial already reached its limit</label>
                <span></span>
            </div>
        </div>';
    }

    public static function unavailableStudent($status = 0,$text = 'Student is unavailable',$link='')
    {
        if($status == 1){
            $text = 'You have an active tutorial';
            $link = '<div class="sign_link">
                    <h6>
                        <a href="index.php?q=tutorials" title="">View Tutorial</a>
                    </h6>
                </div>';
        }
        return '<div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                    <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>Unavailable</h3>
                <label class="badge badge-danger" style="font-size: 14px;">'.$text.'</label>
                <span></span>
                '. $link.'
            </div>
        </div>';
    }
}
