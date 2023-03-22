<?php

$requestPath = str_replace(HTACCESS_APP, "", $_SERVER['REQUEST_URI']);
$request_path = $requestPath != '' ? $requestPath : 'dashboard';

$router = new Router();
$router->dispatch($request_path);
