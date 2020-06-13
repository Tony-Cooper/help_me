<?php

    namespace app\core;

    class App {

        protected $controller = 'Main';
        protected $method = 'index';

        public function __construct() {
            $url = $this->parseUrl();

            if(file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->controller = ucfirst($url[0]);
            }

            require_once 'app/controllers/' . $this->controller . '.php';

            $path = '\app\controllers\\' . $this->controller;
            $this->controller = new $path;

            if(isset($url[1]) && method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
            }

            if($path == '\app\controllers\S')
                $this->controller->redirect($url[1]);
            else
                call_user_func([$this->controller, $this->method]);

        }

        public function parseUrl() {
            if(isset($_GET['url'])) {
                return explode('/', filter_var(rtrim($_GET['url'],
                '/'), FILTER_SANITIZE_STRING));
            }
        }
    }