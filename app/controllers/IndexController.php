<?php
    /**
     * Created by PhpStorm.
     * User: andr
     * Date: 04.12.17
     * Time: 19:58
     */

    namespace App\Controllers;

    class IndexController
    {
        public function show() {
            view('home');
        }
    }