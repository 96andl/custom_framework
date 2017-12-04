<?php
    class Task
    {
        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public $description;
        public $status = false;

        public function __construct()
        {

        }

        public function getDescription()
        {
            return $this->description;
        }
    }