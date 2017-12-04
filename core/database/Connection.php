<?php

    class Connection
    {
        /**
         * @return PDO
         */
        public static function make($config)
        {
            try {
//                return $pdo = new PDO('mysql:host=127.0.0.1;dbname=mytodo', 'root', 'secret');
                return new PDO(
                    $config['connection'].';'.'dbname='.$config['name'],
                    $config['username'],
                    $config['password'],
                    $config['options']
                );
            } catch (PDOException $e) {
                die($e->getMessage());
            }

        }
    }