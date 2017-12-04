<?php
    /**
     * Created by PhpStorm.
     * User: andr
     * Date: 02.12.17
     * Time: 17:47
     */

    namespace App\Core;

    /**
     * Request presentation for application
     * Class Request
     * @package App\Core
     */
    class Request
    {
        /**
         * get current uri
         * @return string
         */
        public static function uri() {
            return trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/');
        }

        /**
         * get current request method
         * @return mixed
         */
        public static function method() {
            return $_SERVER['REQUEST_METHOD'];
        }
    }