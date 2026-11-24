<?php
// Router for PHP's local development server (npm run dev).
if (PHP_SAPI !== 'cli-server') {
    http_response_code(404);
    exit;
}

$root = dirname(__DIR__);
$request_path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');
$request_path = str_replace('\\', '/', $request_path);
if (strpos($request_path, "\0") !== false || preg_match('#(?:^|/)(?:\.[^/]*|db-backups|PaxHeaders|scripts)(?:/|$)#i', $request_path)) {
    http_response_code(404);
    exit;
}

// PHP's built-in server does not supply Apache's REQUEST_SCHEME variable.
$_SERVER['REQUEST_SCHEME'] = 'http';
$file = realpath($root . $request_path);
if ($file && stripos(str_replace('\\', '/', $file), str_replace('\\', '/', $root) . '/') === 0 && is_file($file)) {
    return false;
}

$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = $root . '/index.php';
require $root . '/index.php';
