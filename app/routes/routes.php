<?php

$requestPath = str_replace('/atjmai/app/', "", $_SERVER['REQUEST_URI']);
$request_path = $requestPath != '' ? $requestPath : 'dashboard';

$router = new Router();
$router->request_path = $request_path;

$router->set('dashboard',[
    'header' => 'header-transparent dark-text',
    'file' => 'dashboard.php',
  ]
);

$router->set('profile',[
    'header' => 'header-light',
    'file' => "profile.php",
  ]
);

$router->set('skills',[
    'header' => 'header-transparent dark-text',
    'file' => 'skills.php',
  ]
);


$router->dispatch();

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
}
