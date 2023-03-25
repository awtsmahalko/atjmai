<div class="dashboard-navbar overlio-top">
    <div class="d-user-avater">
        <img src="../assets/img/users/default_male.png" class="img-fluid rounded" alt="">
        <h4 id="profile-fullname"><?= $_SESSION['user']['fullname'] ?></h4>
        <span id="profile-email"><?= $_SESSION['user']['email'] ?></span>
    </div>
    <div class="d-navigation">
        <ul id="metismenu">
            <?php
            $Menus = new Menus;
            $Menus->sidebar('My Profile', 'profile', 'ti-user', $router->route['path']);
            $Menus->sidebar('Skills', 'skills', 'fa fa-gears', $router->route['path'], 'S');
            $Menus->sidebar('Messages', 'messages', 'ti-email', $router->route['path']);
            $Menus->sidebar('Notifications', 'notification', 'ti-bell', $router->route['path']);
            // $Menus->sidebar('Jobs', 'jobs', 'fa fa-briefcase', $router->route['path']);

            // $Menus->sidebar_parent('Jobs', 'fa fa-briefcase', array(
            //     array("Manage Jobs", "jobs"),
            //     array("Post a Job", "create-job"),
            // ));
            ?>
            <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="ti-power-off"></i>Log Out</a></li>
        </ul>
    </div>
</div>