<?php
    class Database  
    {
        public static $host = "blog-php_db_1";
        public static $port = "3306";
        public static $dbName = "BlogPHP";
        public static $username = "root";
        public static $password = "root";

        private static function connect()
        {
            $pdo = new PDO("mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbName . ";charset=utf8", self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        
        public static function query($query, $params = array())
        {
            $statement = self::connect()->prepare($query);
            $statement->execute($params);
            if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
            }
        }
    }
    