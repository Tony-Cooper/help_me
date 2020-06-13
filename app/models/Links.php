<?php

    namespace App\models;

    require 'DB.php';

    class Links {
        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstance();
        }

        public function getLinks() {
            $current_user = $_COOKIE['log'];
            $links = $this->_db->query("SELECT * FROM links WHERE Login = '$current_user'");
            return $result = $links->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function validLink($short, $long) {
            $links = $this->_db->query("SELECT * FROM links WHERE ShortLink = '$short'");
            $result = $links->fetch(\PDO::FETCH_ASSOC);
            if($short == '')
                return 'Введите желаемое сокращение';
            else if($long == '')
                return 'Введите ссылку которую нужно сократить';
            else if(!filter_var($long, FILTER_VALIDATE_URL))
                return 'Нужно указать корректрую ссылку';
            else if($result != '')
                return 'К сожалению, такое сокращение уже занято';
            else
                return 'success';
        }

        public function setLink($long, $short) {
            $short_path = 'http://176.37.246.42/s/' . $short;
            $sql = 'INSERT INTO links(login, LongLink, ShortLink) VALUES(:login, :long, :short)';
            $query = $this->_db->prepare($sql);
            $query->execute(['login' => $_COOKIE['log'], 'long' => $long, 'short' => $short_path]);
            return 'done';
        }
    }