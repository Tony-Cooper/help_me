<?php

    namespace App\controllers;

    class About extends \app\core\Controller {
        public function index() {
            $this->view('about/index');
        }
    }