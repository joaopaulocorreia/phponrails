<?php

use Core\Controller;

class LoginController extends Controller
{
  protected $layout = "layouts/login.html";

  /*protected $afterAction = ['closeSession'];*/

  public function index(array $params)
  {
    return $this->render("login/index.html", ["params" => $params]);
  }

  public function create(array $params)
  {
    /*header("Location: ?controller=Login&action=index");*/

    return $this->render("login/index.html", ["params" => $params]);
  }
}
