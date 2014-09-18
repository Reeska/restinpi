<?php
   namespace rpi\core;

    class Pages {
        private $models = array();
        private $list = array();
        private static $_i;
        
        /**
         * @return Pages
         */
        public static function i() {
            return empty(self::$_i) ? (self::$_i = new Pages()) : self::$_i;
        }
        
        /**
         * Return page's model (static shortcut)
         * @return Model
         */        
        public static function g($page) {
            return self::i()->get($page);
        }
        
        /**
         * Return page's model
         * @return Model
         */
        public function get($page) {
            if (!array_key_exists($page, $this->models))
                $this->models[$page] = new Model($page);
            return $this->models[$page];
        }
        
        public function register($module, $name, $label) {
            return $this->list[] = new Page($label, VIEW_ROOT.'/'.$module.'/'.$name);
        }
        
        public function pages() {
            return $this->list;
        }
    }