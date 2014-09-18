<?php
    namespace rpi\module\raspberry\shell;
    
    class ShellParsedCommand {
        public $raw;
        public $name;
        public $args;
        public $mapargs;
        
        public function __construct($raw, $name, $args) {
            $this->raw = $raw;
            $this->name = $name;
            $this->args = $args; 
            $this->mapargs = new ArgMap($args);
        }
    }
    
    class ArgMap {
        private $map = [];
        
        public function __construct($array, $separator=':') {
            $this->map = $this->buildMap($array, $separator);
        }
        
        private function buildMap($array, $separator) {
            $margs = [];
            
            foreach ($array as $a) {
                @list($key, $value) = explode(":", $a);
                
                $margs[$key] = $value;
            }
            
            return $margs;            
        }
        
        public function __get($name) {
            if ($this->has($name))
                return $this->map[$name];
            return null;
        }
        
        public function has($name) {
            return array_key_exists($name, $this->map);
        }
        
        public function getMap() {
            return $this->map;
        }
    }