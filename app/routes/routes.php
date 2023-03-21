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

$router->set('messages',[
    'header' => 'header-light',
    'file' => 'messages.php',
  ]
);



$router->dispatch();
