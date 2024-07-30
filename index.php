<?php

require_once 'vendor/autoload.php';

$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri, PHP_URL_PATH);

if (str_ends_with($requestPath, '/') && strlen($requestPath) > 1) {
  $realPath = rtrim($requestPath, '/');
  location($realPath);
}

if ($requestPath === '/') {
  return render('index');
} elseif ($requestPath === '/domains') {
  $domains = new Dominium\Controllers\DomainController();
  return $domains->index();
} elseif (preg_match('#^/domains/([^/]+)$#', $requestPath, $data)) {
  $domain = new Dominium\Controllers\DomainController();
  return $domain->show($data[1]);
} elseif (preg_match('#^/domains/([^/]+)/edit$#', $requestPath, $data)) {
  $domain = new Dominium\Controllers\DomainController();
  return $domain->edit($data[1]);
} elseif ($requestPath === '/networks') {
  return;
} elseif ($requestPath === '/volumes') {
  return;
} elseif ($requestPath === '/pools') {
  return;
} elseif ($requestPath === '/info') {
  if (ini_get('display_errors')) {
    return phpinfo();
  }
  return http_response_code(404);
} else {
  return http_response_code(404);
}
