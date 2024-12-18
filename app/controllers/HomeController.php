<?php

use Core\Controller;

class HomeController extends Controller
{
  public function index()
  {
    return 'okokok DENTRO DO CONTROLLER';
  }

  public function show(array $params)
  {
    return $params['id'] . 'OKOKOK';
  }

  public function create()
  {
    return $this->render('home/create.html', ["name" => 'João Paulo']);
  }

  public function before_action(string $actionName)
  {
    return $actionName;
  }
}
