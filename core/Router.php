<?php

    namespace App\Core;

    use Exception;

    /**
     * Simple Router class for routing in application
     * Class Router
     * @package App\Core
     */
    class Router
    {
        /**
         * routes array
         * @var array
         */
        protected $routes = [
            'GET'  => [],
            'POST' => [],
        ];

        /**
         * Load file with routing
         * @param $file
         * @return Router
         */
        public static function load($file)
        {

            $router = new self;

            require $file;

            return $router;
        }

        /**
         * handler for url with REQUEST_METHOD == GET
         * @param $uri
         * @param $controller
         */
        public function get($uri, $controller)
        {
            $this->routes['GET'][ $uri ] = $controller;
        }

        /**
         * handler for url with REQUEST_METHOD == POST
         * @param $uri
         * @param $controller
         */
        public function post($uri, $controller)
        {
            $this->routes['POST'][ $uri ] = $controller;
        }

        /**
         * Direct application for controller which associate with current url
         * @param $uri
         * @param $requestType
         * @return mixed
         * @throws Exception
         */
        public function direct($uri, $requestType)
        {
            if (array_key_exists($uri, $this->routes[ $requestType ])) {
                return $this->callAction(
                    ...explode('@', $this->routes[ $requestType ][ $uri ])
                );
            }

            throw new Exception('No route defined for this URI');
        }

        /**
         * Call action on controller
         * @param $controller
         * @param $action
         * @return mixed
         * @throws Exception
         */
        private function callAction($controller, $action)
        {
            $controller = "\\App\\Controllers\\{$controller}";
            $controller = new $controller;
            if (!method_exists($controller, $action))
                throw new Exception("Controller $controller doesn't exists or method $action doesn't exists");

            return $controller->$action();
        }

    }