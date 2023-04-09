<?php

/**
 * This is for router uri
 */
class Router
{
  private $routes = [];
  public $request_path = '';
  public $route;

  public function dispatch($path)
  {
    switch ($path) {
      case 'colleges':
        $route = ['header' => 'header-light', 'file' => 'colleges.php'];
        break;
      case 'dashboard':
        $route = ['header' => 'header-transparent dark-text', 'file' => 'dashboard.php'];
        break;
      case 'education':
        $route = ['header' => 'header-light', 'file' => 'education.php'];
        break;
      case 'profile':
        if ($_SESSION['user']['category'] == 'S') {
          $route = ['header' => 'header-light', 'file' => 'profile.php'];
        }
        if ($_SESSION['user']['category'] == 'E') {
          $route = ['header' => 'header-light', 'file' => 'company_profile.php'];
        }
        break;
      case 'skills':
        $route = ['header' => 'header-light', 'file' => 'skills.php'];
        break;
      case 'messages':
        $route = ['header' => 'header-light', 'file' => 'messages.php'];
        break;
      case 'create-post':
        $route = ['header' => 'header-light', 'file' => 'create_post.php'];
        break;
      case 'create-job':
        $route = ['header' => 'header-light', 'file' => 'create_job.php'];
        break;
      case 'job-matching':
        $route = ['header' => 'header-light', 'file' => 'job_match.php'];
        break;
      case 'job-preferences':
        $route = ['header' => 'header-light', 'file' => 'job_preferences.php'];
        break;
      case 'programs':
        $route = ['header' => 'header-light', 'file' => 'course.php'];
        break;
      case 'work-experience':
        $route = ['header' => 'header-light', 'file' => 'work_experience.php'];
        break;
      default:
        $route = ['header' => 'header-light', 'file' => '404.php'];
        break;
    }
    $route['path'] = $path;
    return $this->route = $route;
  }

  public static function sidebar($uri, $text, $icons, $current_path)
  {
    $path = '/atjmai/app/' . $uri;
    $active = $current_path == $uri ? "active" : "";

    return "<li class='$active'><a href='$path'><i class='$icons'></i>$text</a></li>";
  }
}
