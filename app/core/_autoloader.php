<?php

$pre_class = "init.classes/";
$init_classes = array(
    'Components'        => $pre_class . 'components.php',
    'Connection'        => $pre_class . 'connection.php',
    'Controller'        => $pre_class . 'controller.php',
    'Router'            => $pre_class . 'router.php',
);

$core_classes = array_merge($classes,$init_classes);
