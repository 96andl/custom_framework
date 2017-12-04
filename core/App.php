<?php
    /**
     * Created by PhpStorm.
     * User: andr
     * Date: 03.12.17
     * Time: 11:04
     */
    namespace App\Core;

    use Exception;

    /**
     * Container for application
     * Class App
     * @package App\Core
     */
    class App
    {

        protected static $registry = [];

        /**
         * put object into container
         * @param $key
         * @param $value
         */
        public static function bind($key, $value)
        {
            static::$registry[ $key ] = $value;
        }

        /**
         * Get object from container
         * @param $key
         * @return mixed
         * @throws Exception
         */
        public static function get($key)
        {
            if(!array_key_exists($key,static::$registry))
                throw new Exception("No key at container");
            return static::$registry[$key]; 

        }
    }