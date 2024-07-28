<?php

require_once '../src/lib/index.php';

$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri, PHP_URL_PATH);

if (str_ends_with($requestPath, '/') && strlen($requestPath) > 1) {
  $realPath = rtrim($requestPath, '/');
  location($realPath);
}

switch ($requestPath) {
case '/':
  render('index');
  break;
case '/domains':
  require_once '../src/controllers/domains.php';
  $domains = new DomainController();
  return $domains->index();
case '/networks':
  break;
case '/volumes':
  break;
case '/pools':
  break;
default:
  break;
}
