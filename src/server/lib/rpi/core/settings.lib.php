<?php
    namespace rpi\core;
    
    class Settings {
        private $filename;
        
        public function __construct($filename) {
            $this->filename = $filename;
        }
        
        public function read() {
            if (!is_file($this->filename))
                return new \stdClass();
            
            return json_decode(file_get_contents($this->filename));
        }        
        
        public function write($data) {
            file_put_contents($this->filename, json_encode($data));    
        }
    }