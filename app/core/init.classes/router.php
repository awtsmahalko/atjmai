<?php
class Router {
  private $routes = [];
  public $request_path = '';
  public $route;

  public function dispatch($path) {
    switch ($path) {
      case 'dashboard':
        $route = ['header' => 'header-transparent dark-text','file' => 'dashboard.php'];
        break;
      case 'profile':
        $route = ['header' => 'header-light','file' => 'profile.php'];
        break;
      case 'skills':
        $route = ['header' => 'header-light','file' => 'skills.php'];
        break;
      case 'messages':
        $route = ['header' => 'header-light','file' => 'messages.php'];
        break;
      default:
        $route = ['header' => 'header-light','file' => '404.php'];
        break;
    }
    $route['path'] = $path;
    return $this->route = $route;
  }

  public static function sidebar($uri,$text,$icons,$current_path)
  {
    $path = '/atjmai/app/'.$uri;
    $active = $current_path == $uri ? "active":"";

    return "<li class='$active'><a href='$path'><i class='$icons'></i>$text</a></li>";
  }
}