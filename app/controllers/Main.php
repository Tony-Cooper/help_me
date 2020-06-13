<?php

    namespace app\controllers;

    class Main extends \app\core\Controller {
        public function index() {
            if($_COOKIE['log'] != '') {
                $links = $this->model('Links');

                $this->view('main/index', $links->getLinks());

            }

            else
                $this->view('user/log', "Для того чтобы воспользоваться сервисом, сначала необходимо 
                зарегистрироваться");
        }

        public function addLink() {
            $links = $this->model('Links');
            $result = $links->validLink($_POST['short'], $_POST['long']);
            if($result != 'success') {

                $info['error'] = $result;
                $this->view('main/index', $links->getLinks(), $info);
            } else {
                $result = $links->setLink($_POST['long'], $_POST['short']);
                if($result = 'done') {
                    $info['success'] = 'Ссылка успешно добавлена!';
                    $this->view('main/index', $links->getLinks(), $info);
                }
            }
        }
    }