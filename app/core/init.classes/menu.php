<?php
class Menus
{
    public function sidebar($name, $url, $icons, $current_path)
    {

        $path = '/atjmai/app/' . $url;
        $active = $current_path == $url ? "active" : "";

        echo "<li class='$active'><a href='$path'><i class='$icons'></i>$name</a></li>";
    }

    public function navbar($name, $url, $current_path)
    {

        $path = '/atjmai/app/' . $url;
        $active = $current_path == $url ? "active" : "";

        echo "<li class='$active'><a href='$path'>$name</a></li>";
    }

    public function navbar_parent()
    {
        '<li><a href="#">Jobs<span class="submenu-indicator"></span></a>
          <ul class="nav-dropdown nav-submenu">
            <li><a href="/atjmai/app/job-listing">Listing</a></li>
            <li><a href="/atjmai/app/job-match">Matching</a></li>
          </ul>
        </li>';
    }
}
