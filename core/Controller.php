<?php

namespace Core;

abstract class Controller
{
  private $twig;
  private $isContinue = true;

  protected $layout = 'layouts/application.html';

  protected $beforeAction = [];
  protected $afterAction = [];

  protected $output = '';

  public function __construct(\Twig\Environment $twig)
  {
    $this->twig = $twig;
  }

  public function render(string $viewName, array $params = []): string
  {
    $this->runHooks($this->beforeAction);

    $content = $this->twig->render($viewName, $params);
    $this->output = $this->twig->render($this->layout, ["content" => $content]);

    $this->runHooks($this->afterAction);

    return $this->output;
  }

  private function runHooks(array $methods): void
  {
    foreach ($methods as $method) $this->runHook($method);
  }

  private function runHook(string $method): void
  {
    if (method_exists($this, $method)) $this->$method();
  }
}
