<div class="dashboard-navbar overlio-top">
    <div class="d-user-avater">
        <img src="../assets/img/users/default_male.png" class="img-fluid rounded" alt="">
        <h4 id="profile-fullname"><?=$_SESSION['user']['fullname']?></h4>
        <span id="profile-email"><?=$_SESSION['user']['email']?></span>
    </div>
    <div class="d-navigation">
        <ul id="metismenu">
            <?=Router::sidebar('profile','My Profile','ti-user',$router->route['path'])?>
            <?=Router::sidebar('skills','Skills','fa fa-gears',$router->route['path'])?>
            <?=Router::sidebar('messages','Messages','ti-email',$router->route['path'])?>
            <?=Router::sidebar('jobs','Jobs','fa fa-briefcase',$router->route['path'])?>
            <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="ti-power-off"></i>Log Out</a></li>
        </ul>
    </div>
</div>