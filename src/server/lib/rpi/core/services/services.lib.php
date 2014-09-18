<?php
    namespace rpi\core\services;

    class Services {
        private $list;
        private static $_i;
        
        /**
         * @return Services
         */
        public static function i() {
            return empty(self::$_i) ? (self::$_i = new Services()) : self::$_i;
        }
        
        /**
         * @param Service $s service to register
         * @return Services
         */
        public function register(Service $s) {
            $this->list[$s->name] = $s;
            return $this;
        }
        
		/**
		 * @return Service[]
		 */
        public function services() {
            return $this->list;
        }
        
		/**
		 * @return boolean
		 */
        public function has($name) {
            return array_key_exists($name, $this->list);
        }
        
		/**
		 * @return Service
		 */
        public function get($name) {
            if (!$this->has($name))
                return null;
                
            return $this->list[$name];
        }
    }