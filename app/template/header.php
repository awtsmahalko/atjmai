<div class="header <?= $route_settings[$views_file]['header'] ?>">
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
              <li class="active"><a href="/atjmai/app/">Home</a></li>
              <li><a href="/atjmai/app/post">Post</a></li>
              <li><a href="#">Jobs<span class="submenu-indicator"></span></a>
                <ul class="nav-dropdown nav-submenu">
                  <li><a href="/atjmai/app/job-listing">Listing</a></li>
                  <li><a href="/atjmai/app/job-match">Matching</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav-menu nav-menu-social align-to-right">
              <li class="add-listing dark-bg">
                <a href="/atjmai/app/profile">
                  <i class="ti-user mr-1"></i> <?= $_SESSION['user']['fullname'] ?>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>