<?php

/**
 * This is for controller used in ajax
 */
class Controller
{
  public function dispatch($uri)
  {
    switch ($uri) {
      case 'signup':
        $class_name = 'Authentication';
        $method_name = 'signup';
        break;
      case 'login':
        $class_name = 'Authentication';
        $method_name = 'login';
        break;
      case 'add_alumni_education':
        $class_name = 'AlumniEducations';
        $method_name = 'add';
        break;
      case 'alumni_profile':
        $class_name = 'Alumni';
        $method_name = 'profile';
        break;
      case 'get_alumni_data':
        $class_name = 'AlumniEducations';
        $method_name = 'data';
        break;
      case 'update_alumni_profile':
        $class_name = 'Alumni';
        $method_name = 'update_profile';
        break;
      case 'update_alumni_skills':
        $class_name = 'AlumniSkills';
        $method_name = 'edit';
        break;
      case 'alumni_skills':
        $class_name = 'AlumniSkills';
        $method_name = 'data';
        break;
      case 'delete_alumni_education':
        $class_name = 'AlumniEducations';
        $method_name = 'destroy';
        break;
      case 'employer_profile':
        $class_name = 'Employers';
        $method_name = 'profile';
        break;
      case 'update_employer_profile':
        $class_name = 'Employers';
        $method_name = 'update_profile';
        break;
      default:
        echo "Invalid URI";
        return;
    }

    $controller = new $class_name();
    echo $controller->$method_name();
  }
}
