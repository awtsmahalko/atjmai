<?php

/**
 * This is for controller used in ajax
 */
class Controller
{
  public function dispatch($uri)
  {
    switch ($uri) {
      case 'add_alumni_education':
        $class_name = 'AlumniEducations';
        $method_name = 'add';
        break;
      case 'add_alumni_work':
        $class_name = 'AlumniWorkExperiences';
        $method_name = 'add';
        break;
      case 'add_college':
        $class_name = 'Colleges';
        $method_name = 'add';
        break;
      case 'add_course':
        $class_name = 'Courses';
        $method_name = 'add';
        break;
      case 'add_job':
        $class_name = 'Jobs';
        $method_name = 'add';
        break;
      case 'alumni_profile':
        $class_name = 'Alumni';
        $method_name = 'profile';
        break;
      case 'alumni_skills':
        $class_name = 'AlumniSkills';
        $method_name = 'data';
        break;
      case 'delete_alumni_education':
        $class_name = 'AlumniEducations';
        $method_name = 'destroy';
        break;
      case 'delete_alumni_work':
        $class_name = 'AlumniWorkExperiences';
        $method_name = 'destroy';
        break;
      case 'delete_college':
        $class_name = 'Colleges';
        $method_name = 'destroy';
        break;
      case 'delete_course':
        $class_name = 'Courses';
        $method_name = 'destroy';
        break;
      case 'employer_profile':
        $class_name = 'Employers';
        $method_name = 'profile';
        break;
      case 'get_alumni_data':
        $class_name = 'AlumniEducations';
        $method_name = 'data';
        break;
      case 'get_colleges_data':
        $class_name = 'Colleges';
        $method_name = 'data';
        break;
      case 'get_courses_data':
        $class_name = 'Courses';
        $method_name = 'data';
        break;
      case 'get_work_experience_data':
        $class_name = 'AlumniWorkExperiences';
        $method_name = 'data';
        break;
      case 'update_alumni_profile':
        $class_name = 'Alumni';
        $method_name = 'update_profile';
        break;
      case 'update_alumni_work':
        $class_name = 'AlumniWorkExperiences';
        $method_name = 'edit';
        break;
      case 'update_alumni_skills':
        $class_name = 'AlumniSkills';
        $method_name = 'edit';
        break;
      case 'update_college':
        $class_name = 'Colleges';
        $method_name = 'edit';
        break;
      case 'update_course':
        $class_name = 'Courses';
        $method_name = 'edit';
        break;
      case 'update_employer_profile':
        $class_name = 'Employers';
        $method_name = 'update_profile';
        break;
      case 'update_alumni_education':
        $class_name = 'AlumniEducations';
        $method_name = 'edit';
        break;
      case 'signup':
        $class_name = 'Authentication';
        $method_name = 'signup';
        break;
      case 'login':
        $class_name = 'Authentication';
        $method_name = 'login';
        break;
      default:
        echo "Invalid URI";
        return;
    }

    $controller = new $class_name();
    echo $controller->$method_name();
  }
}
