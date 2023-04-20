<div class="dashboard-navbar overlio-top">
    <div class="d-user-avater">
        <img src="<?= BASE_URL ?>/assets/img/users/<?= $_SESSION['user']['img'] ?>" class="img-fluid rounded" alt="">
        <h4 id="profile-fullname">
            <?= $_SESSION['user']['fullname'] ?>
        </h4>
        <span id="profile-email">
            <?= $_SESSION['user']['email'] ?>
        </span>
    </div>
    <div class="d-navigation">
        <ul id="metismenu">
            <?php
            $Menus = new Menus;
            $Menus->sidebar('Dashboard', 'dashboard', 'ti-dashboard', $router->route['path']);
            $Menus->sidebar('My Profile', 'profile', 'ti-user', $router->route['path']);

            // Alumni
            // $Menus->sidebar('Education', 'education', 'fa fa-graduation-cap', $router->route['path'], 'S');
            // $Menus->sidebar('Work Experience', 'work-experience', 'fa fa-briefcase', $router->route['path'], 'S');
            // $Menus->sidebar('Skills', 'skills', 'fa fa-gears', $router->route['path'], 'S');
            // $Menus->sidebar('Job Preferences', 'job-preferences', 'fa fa-briefcase', $router->route['path'], 'S');
            // $Menus->sidebar('Resume', 'resume', 'fa fa-file', $router->route['path'], 'S');
            // $Menus->sidebar('Jobs', 'jobs', 'fa fa-briefcase', $router->route['path']);

            if ($_SESSION['user']['category'] == 'S') {
                // Alumni
                $Menus->sidebar_parent('Master Data', 'fa fa-file-o', array(
                    array("Education", "education", 'fa fa-graduation-cap'),
                    array("Work Experience", "work-experience", 'fa fa-briefcase'),
                    array("Skills", "skills", 'fa fa-gears'),
                    array("Job Preferences", "job-preferences", 'fa fa-file'),
                ));

                $Menus->sidebar_parent('Jobs', 'ti-briefcase', array(
                    array("Job Status", "jobs", 'fa fa-info-circle'),
                    array("Job Matching", "job-matching", 'fa fa-search'),
                ));
            }
            if ($_SESSION['user']['category'] == 'E') {
                // Employers
                $Menus->sidebar_parent('Jobs', 'fa fa-briefcase', array(
                    array("Manage Jobs", "jobs", 'fa fa-tasks'),
                    array("Post a Job", "create-job", 'fa fa-check-circle'),
                ));
            }

            if ($_SESSION['user']['category'] == 'A') {
                // Admin
                $Menus->sidebar_parent('Master Data', 'fa fa-file-o', array(
                    array("Colleges", "colleges"),
                    array("Programs", "programs"),
                    array("Industries", "industries"),
                    array("Skills", "skills"),
                ));
                $Menus->sidebar_parent('Report', 'fa fa-print', array(
                    array("Alumni Report", "report-alumni"),
                    array("Employer Report", "report-employer"),
                    array("Employment Rate Report", "report-employment"),
                    array("Job Posting Report", "report-job-post"),
                ));
            }
            // ALL USERS
            $Menus->sidebar('Posts', 'posts', 'ti-announcement', $router->route['path']);
            $Menus->sidebar('Messages', 'messages', 'ti-email', $router->route['path']);
            $Menus->sidebar('Notifications', 'notification', 'ti-bell', $router->route['path']);
            ?>
            <li onclick="log_out()"><a href="#"><i class="ti-power-off"></i>Log Out</a></li>
        </ul>
    </div>
</div>