<div class="dashboard-navbar overlio-top">
    <div class="d-user-avater">
        <img src="../assets/img/users/default_male.png" class="img-fluid rounded" alt="">
        <h4 id="profile-fullname"><?=$_SESSION['user']['fullname']?></h4>
        <span id="profile-email"><?=$_SESSION['user']['email']?></span>
    </div>
    <div class="d-navigation">
        <ul id="metismenu">
            <li class="active"><a href="<?=Router::uri('profile')?>"><i class="ti-user"></i>My Profile</a></li>
            <li><a href="<?=Router::uri('skills')?>"><i class="fa fa-gears"></i>Skills</a></li>
            <li><a href="<?=Router::uri('messages')?>"><i class="ti-email"></i>Messages</a></li>
            <li><a href="<?=Router::uri('jobs')?>"><i class="fa fa-briefcase"></i>Jobs</a></li>
            <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="ti-power-off"></i>Log Out</a></li>
        </ul>
    </div>
</div>