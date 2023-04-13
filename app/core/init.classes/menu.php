<?php
class Menus
{
    public function sidebar($name, $url, $icons, $current_path, $allowed = '')
    {

        $path = $this->uri($url);
        $active = $current_path == $url ? "active" : "";
        $sidebar = "<li class='$active'><a href='" . $this->uri($url) . "'><i class='$icons'></i>$name</a></li>";
        echo $allowed == '' ? $sidebar : ($allowed == $_SESSION['user']['category'] ? $sidebar : '');
    }

    public function sidebar_parent($name, $icons, $childs)
    {
        $child = "";
        foreach ($childs as $row) {
            $child .= '<li><a href="' . $this->uri($row[1]) . '">' . $row[0] . '</a></li>';
        }
        echo '<li><a href="javascript:void(0);" class="has-arrow"><i class="' . $icons . '"></i>' . $name . '</a>
          <ul>' . $child . '</ul>
        </li>';
    }

    public function navbar($name, $url, $current_path)
    {

        $path = $this->uri($url);
        $active = $current_path == $url ? "active" : "";

        echo "<li class='$active'><a href='$path'>$name</a></li>";
    }

    public function navbar_parent($name, $childs)
    {
        $child = "";
        foreach ($childs as $row) {
            $child .= '<li><a href="' . $this->uri($row[1]) . '">' . $row[0] . '</a></li>';
        }
        echo '<li><a href="#">' . $name . '<span class="submenu-indicator"></span></a>
          <ul class="nav-dropdown nav-submenu">' . $child . '</ul>
        </li>';
    }

    public function profile()
    {
        echo '<ul class="nav-menu nav-menu-social align-to-right">
         <li>
           <a href="' . $this->uri('notifications') . '">
             <i class="ti-bell mr-1"></i>
           </a>
         </li>
         <li>
           <a href="' . $this->uri('messages') . '">
             <i class="ti-email mr-1"></i>
           </a>
         </li>
        <li class="add-listing dark-bg">
           <a href="' . $this->uri('profile') . '">
             <i class="ti-user mr-1"></i>
             ' . $_SESSION['user']['fullname'] . '
           </a>
         </li>
         <li>
           <a href="' . $this->uri('auth/logout.php') . '">
             <i class="ti-switch-off mr-1"></i>
           </a>
         </li>
       </ul>';
    }

    public function uri($url)
    {
        return HTACCESS_APP . $url;
    }
}
