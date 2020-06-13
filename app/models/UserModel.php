<?php

    namespace App\models;

    require 'DB.php';

    class UserModel {
        private $login;
        private $email;
        private $pass;
        private $re_pass;
        private $_db = null;

        public function setData($login, $email, $pass, $re_pass) {
            $this->login = $login;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
        }

        public function validUser() {
            if(strlen($this->login) < 3)
                return "Имя не может быть короче 3 символов";
            else if(strlen($this->email) < 5)
                return "Email не может быть короче 5 символов";
            else if(strlen($this->pass < 6))
                return "Пароль не может быть короче 6 символов";
            else if($this->pass != $this->re_pass)
                return "Пароли не совпадают";
            else
                return "done";

        }

        public function setUser() {
            $this->_db = DB::getInstance();
            $sql = 'INSERT INTO users(login, email, pass) VALUES(:login, :email, :pass)';
            $query = $this->_db->prepare($sql);

            $pass =password_hash($this->pass, PASSWORD_DEFAULT);

            $query->execute(['login' => $this->login, 'email' => $this->email, 'pass' => $pass]);

            setcookie('log', $this->login, time() + 3600 * 24 * 7, '/');
            header('location: /user/index');
        }

        public function logOut() {
            setcookie('log', $this->login, time() - (3600 * 24 * 7), '/');
            unset($_COOKIE['log']);
            header('location: /user/index');
        }

        public function logIn($login, $pass) {
            $this->_db = DB::getInstance();
            $result = $this->_db->query("SELECT * FROM users WHERE login = '$login'");
            $user = $result->fetch(\PDO::FETCH_ASSOC);

            if($user['login'] == '')
                return 'Логин не найден';
            else if(password_verify($pass, $user['pass'])) {
                setcookie('log', $login, time() + 3600 * 24 * 7, '/');
                header('location: /user/index');
            }
            else
                return 'Неверный пароль';
        }
    
    }