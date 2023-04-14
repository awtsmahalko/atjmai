<?php

/**
 * This is for router uri
 */
class Router
{
  private $routes = [];
  public $request_path = '';
  public $route;

  public function dispatch($path, $param)
  {
    switch ($path) {
      case 'candidate-detail':
        if (count($param) > 1 && $param[1] > 0) {
          $route = ['header' => 'header-light', 'file' => 'candidate_detail.php', 'id' => $param[1]];
        } else {
          $route = ['header' => 'header-light', 'file' => '404.php'];
        }
        break;
      case 'colleges':
        $route = ['header' => 'header-light', 'file' => 'colleges.php'];
        break;
      case 'dashboard':
        $route = ['header' => 'header-transparent dark-text', 'file' => 'dashboard.php'];
        break;
      case 'education':
        $route = ['header' => 'header-light', 'file' => 'education.php'];
        break;
      case 'posts':
        $route = ['header' => 'header-light', 'file' => 'posts.php'];
        break;
      case 'post-detail':
        if (count($param) > 1 && $param[1] > 0) {
          $route = ['header' => 'header-light', 'file' => 'post_detail.php', 'id' => $param[1]];
        } else {
          $route = ['header' => 'header-light', 'file' => '404.php'];
        }
        break;
      case 'profile':
        if ($_SESSION['user']['category'] == 'S') {
          $route = ['header' => 'header-light', 'file' => 'profile.php'];
        }
        if ($_SESSION['user']['category'] == 'A') {
          $route = ['header' => 'header-light', 'file' => 'admin_profile.php'];
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
        $route = ['header' => 'header-light header-fixed', 'file' => 'job_match.php'];
        break;
      case 'job-match-candidate':
        if (count($param) > 1 && $param[1] > 0) {
          $route = ['header' => 'header-light', 'file' => 'job_match_candidate.php', 'id' => $param[1]];
        } else {
          $route = ['header' => 'header-light', 'file' => '404.php'];
        }
        break;
      case 'job-preferences':
        $route = ['header' => 'header-light', 'file' => 'job_preferences.php'];
        break;
      case 'job-detail':
        if (count($param) > 1 && $param[1] > 0) {
          $route = ['header' => 'header-light', 'file' => 'job_detail.php', 'id' => $param[1]];
        } else {
          $route = ['header' => 'header-light', 'file' => '404.php'];
        }
        break;
      case 'programs':
        $route = ['header' => 'header-light', 'file' => 'course.php'];
        break;
      case 'report-alumni':
        $route = ['header' => 'header-light', 'file' => 'report_alumni.php'];
        break;
      case 'report-employer':
        $route = ['header' => 'header-light', 'file' => 'report_employer.php'];
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
