<?php

function render($template, $context = null) {
  $body = "src/templates/$template.php";
  include 'src/templates/layout.php';
}

enum Redirect: int {
  case MultipleChoices = 300;
  case MovedPermanently = 301;
  case Found = 302;
  case SeeOther = 303;
  case NotModified = 304;
  case TemporaryRedirect = 307;
  case PermanentRedirect = 308;
}

function location($uri, $statusCode = Redirect::MovedPermanently) {
  return header("Location: {$uri}", True, $statusCode);
}
