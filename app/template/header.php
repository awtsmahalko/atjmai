<div class="header <?= $router->route['header'] ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <nav id="navigation" class="navigation navigation-landscape">
          <div class="nav-header">
            <a class="nav-brand" href="#">
              <img src="../assets/img/logo1.png" class="logo" alt="" />
            </a>
            <div class="nav-toggle"></div>
          </div>
          <div class="nav-menus-wrapper">
            <ul class="nav-menu">
              <?php
              $Menus = new Menus;
              $Menus->navbar('Home', 'dashboard', $router->route['path']);
              $Menus->navbar('Post', 'post', $router->route['path']);
              $Menus->navbar_parent("Jobs", array(
                array('Listing', 'job-listing'),
                array('Matching', 'job-matching'),
              ));
              ?>
            </ul>
            <?php $Menus->profile() ?>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>