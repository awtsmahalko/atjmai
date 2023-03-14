<?php
include '../core/config.php';
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$data = "";
echo "data: " . $data . "\n\n";
flush();
