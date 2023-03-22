<?php
class Controller {
  public function dispatch($uri) {
    switch ($uri) {
      case 'signup':
        $class_name = 'Authentication';
        $method_name = 'signup';
        break;
      case 'login':
        $class_name = 'Authentication';
        $method_name = 'login';
        break;
      case 'update_profile':
        $class_name = 'Alumni';
        $method_name = 'update_profile';
        break;
      case 'profile':
        $class_name = 'Alumni';
        $method_name = 'profile';
        break;
      case 'alumni_skills':
        $class_name = 'Alumni';
        $method_name = 'skills';
        break;
      default:
        echo "Invalid URI";
        return;
    }

    $controller = new $class_name();
    echo $controller->$method_name();
  }
}
