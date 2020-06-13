<?php

    namespace App\models;

    class DB {
        private static $_db = null;

        public static function getInstance() {
            if(self::$_db == null)
                self::$_db = new \PDO('mysql:host=localhost;dbname=cooldb', 'root', 'root', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
            return self::$_db;
        }

        private function __construct() {}
        private function __clone() {}
        private function __wakeup() {}

    }