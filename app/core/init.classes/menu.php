<?php
class Menus
{
    public function sidebar($name, $url, $icons, $current_path)
    {

        $path = HTACCESS_APP . $url;
        $active = $current_path == $url ? "active" : "";

        echo "<li class='$active'><a href='$path'><i class='$icons'></i>$name</a></li>";
    }

    public function navbar($name, $url, $current_path)
    {

        $path = HTACCESS_APP . $url;
        $active = $current_path == $url ? "active" : "";

        echo "<li class='$active'><a href='$path'>$name</a></li>";
    }

    public function navbar_parent($name, $childs)
    {
        $child = "";
        foreach ($childs as $row) {
            $child .= '<li><a href="' . HTACCESS_APP . $row[1] . '">' . $row[0] . '</a></li>';
        }
        echo '<li><a href="#">' . $name . '<span class="submenu-indicator"></span></a>
          <ul class="nav-dropdown nav-submenu">' . $child . '</ul>
        </li>';
    }

    public function profile()
    {
        $profile = $_SESSION['user']['category'] == 'S' ? "profile" : "company-profile";
        echo '<ul class="nav-menu nav-menu-social align-to-right">
         <li class="add-listing dark-bg">
           <a href="' . HTACCESS_APP . $profile . '">
             <i class="ti-user mr-1"></i>
             ' . $_SESSION['user']['fullname'] . '
           </a>
         </li>
       </ul>';
    }
}
