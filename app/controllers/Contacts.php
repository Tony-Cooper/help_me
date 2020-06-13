<?php

    namespace App\controllers;

    class Contacts extends \app\core\Controller {
        public function index() {

            $data = [];

            if(isset($_POST['name'])) {
                $mail = $this->model('ContactModel');
                $mail->setData($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);

                $isValid = $mail->validForm();
                if($isValid == 'done')
                    $data['message'] = $mail->sendMail();
                else
                    $data['message'] = $isValid;
            }
            $this->view('contacts/index', $data);
        }
    }