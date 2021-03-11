<?php



/*
$server_protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
$base_path = $server_protocol . $_SERVER['SERVER_NAME'];
*/

$base_path = 'http://gotwork.test';


define('BASE_PATH', $base_path.'/');

define('ASSETS_BACKEND', BASE_PATH.'assets/backend/');

// Uploaded Images
define('UPLOADS', BASE_PATH.'uploads/images/');