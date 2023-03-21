<?php
class Router {
  private $routes = [];
  public $request_path = '';
  public $route;

  public function set($path,$settings) {
    $this->routes[] = [
      'path' => $path,
      'settings' => $settings,
    ];
  }

  public function dispatch() {
    foreach ($this->routes as $route) {
      if ($route['path'] === $this->request_path) {
        return $this->route = $route;
      }
    }
    return $this->route = ['path' => '404', 'file' => '404'];
  }

  public static function uri($uri)
  {
    return '/atjmai/app/'.$uri;
  }
}