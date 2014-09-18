<?php
    namespace rpi\core\services;
    
    class ServiceWeb extends Service {
        public function __construct($name, $url) {
            parent::__construct($name, '', $url);
        }
        
        /**
         * @override
         */
        public function enabled() {
            return url_exists($this->url);
        }
    }