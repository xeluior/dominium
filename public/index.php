<?php

function render($template, $context = null) {
  $body = "../src/templates/$template.php";
  include '../src/templates/layout.php';
}

$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri, PHP_URL_PATH);

switch ($requestPath) {
case '/':
  $conn = libvirt_connect('qemu:///session', True);
  $domains = libvirt_list_domains($conn);

  render('domains', $domains);
  break;
default:
  break;
}
