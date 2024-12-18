<?php

require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('app/views');
$twig = new Twig\Environment($loader, ["debug" => true, "strict_variables" => true]);

// CORE
require 'core/Controller.php';

// APPLICATION
require 'app/controllers/HomeController.php';
require 'app/controllers/LoginController.php';

$output = '';

if ($_REQUEST) {
  $controllerName = $_REQUEST['controller'] . "Controller";
  $action = $_REQUEST['action'];

  if (class_exists($controllerName)) {
    try {
      $controller = new $controllerName($twig);

      if (method_exists($controller, $action)) {
        $output = call_user_func([$controller, $action], $_REQUEST);
      } else {
        $output = "Action <b>{$action}</b> not found";
      }
    } catch (Exception $e) {
      $output = $e->getMessage() . '<br>' . $e->getTraceAsString();
    }
  } else {
    $output = "Class <b>{$controllerName}</b> not found";
  }
}

echo $output;
