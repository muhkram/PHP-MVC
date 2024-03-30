<?php

namespace MA\PHPMVC\MVC;

abstract class Controller
{
    protected $template = '';

    protected function view(string $view, array $data = [])
    {
        return View::render($view, $data, $this->template);
    }

    protected function model(string $modelName)
    {
        $modelClass = "\\MA\\PHPMVC\\Models\\" . $modelName;

        $this->checkModelClass($modelClass);

        return new $modelClass;
    }

    private function checkModelClass(string $modelClass)
    {
        if (!class_exists($modelClass)) {
            throw new \Exception(sprintf('{ %s } this model class not found', $modelClass));
        }
    }
}
