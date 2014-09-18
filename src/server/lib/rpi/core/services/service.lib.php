<?php
    namespace rpi\core\services;
    
    class Service {
        private $name;
        private $cmd;
        private $url;
        
        public function __construct($name, $cmd, $url) {
            $this->name = $name;
            $this->cmd = $cmd;
            $this->url = $url;
        }
        
        /**
         * Indicate if service is enabled
         */
        public function enabled() {
            $enabled = true;
            
            if (!empty($this->cmd)) {
                $result = exec("sudo service ". $this->cmd . " status", $output, $code);
                $enabled &= empty($code) && !preg_match('/not/', $result);
            }
            
            if (!empty($this->url)) {
                $enabled &= url_exists($this->url);
            }
            
            return $enabled;
        }
        
        public function start() {
            exec("sudo service ". $this->cmd . " start", $output, $code);
            return empty($code);
        }
        
        public function stop() {
            exec("sudo service ". $this->cmd . " stop", $output, $code);
            return empty($code);           
        }
        
        public function __get($name) {
            return $this->{$name};
        }
        
        public function __isset($name) {
            return in_array($name, ['name', 'cmd', 'url']);
        }        
        
        public function __toString() {
            return $this->name;
        }
        
        public function toArray() {
            return [
                'name' => $this->name,
                'cmd' => $this->cmd,
                'url' => $this->url,
                'enabled' => $this->enabled()
            ];
        }
    }