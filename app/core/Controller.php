<?php

    namespace app\core;

    class Controller {
        protected function model($model) {
            require_once 'app/models/' . $model . '.php';
            $cmodel = 'app\\models\\' . $model;
            return new $cmodel();
        }

        protected function view($view, $data=[], $info=[]) {
            require_once 'app/views/' . $view . '.php';
        }
    }