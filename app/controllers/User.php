<?php

    namespace App\controllers;

    class User extends \app\core\Controller {
        public function index() {

            if($_COOKIE['log'] != '')
                $this->view('user/index', $_COOKIE['log']);
            else
                $this->view('user/log');
        }

        public function reg() {

            $data = [];

            if(isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['login'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);

                $isValid = $user->validUser();
                if($isValid == 'done')
                    $user->setUser();
                else
                    $data['message'] = $isValid;
            }
            $this->view('user/reg', $data);
        }

        public function log() {

            $data = [];

            if(isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $data['message'] = $user->logIn($_POST['login'], $_POST['pass']);
                $this->view('user/log', $data);
            }
            else
                $this->view('user/log');
        }

        public function exit() {

            $user = $this->model('UserModel');

            if(isset($_POST['exit'])) {
                $user->logOut();
                exit();
            }
            else
                $this->view('user/log');
        }
    }