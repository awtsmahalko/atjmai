<?php

$requestPath = str_replace(HTACCESS_APP, "", $_SERVER['REQUEST_URI']);
$request_path = $requestPath != '' ? $requestPath : 'dashboard';

$route_param = explode("/", $request_path);
echo $route_param[0];
$router = new Router();
$router->dispatch($route_param[0], $route_param);
