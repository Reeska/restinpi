<?php
    namespace rpi\core;
    
    class Page {
        public $name;
        public $url;
        
        public function __construct($name, $url) {
            $this->name = $name;
            $this->url = $url;
        }
        
        public function __toString() {
            return '<a href="'. $this->url .'">'. $this->name .'</a>';
        }
    }