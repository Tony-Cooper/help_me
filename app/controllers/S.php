<?php

    namespace App\controllers;

    class S extends \app\core\Controller {

        public function redirect($path) {
            $redirect = $this->model('RedirectModel');
            $err = $redirect->changeUrl($path);

            if($err != '')
                $this->view('error/404', $path);
        }
    }