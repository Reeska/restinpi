<?php
    namespace rpi\core;

    class Model {
        private $zones = array();
        private $name;
        
        public function __construct($name) {
            $this->name = $name;
        }
     
        private function nextOrder($zone, $order) {
            if (!array_key_exists($zone, $this->zones) || !array_key_exists($order, $this->zones[$zone]))
                return $order;
                
            return $this->nextOrder($zone, $order + 1);
        }
     
        /**
         * Add a content to this zone with order $order.
         * @param string $zone zone where to display.
         * @param Content|function|string content to display.
         * @param int $order rank
         * @return Model
         */
        public function addContent($zone, $content, $order=null) {
            if (!is_array($content)) {
                $content = $order === null ? [$content] : [$order => $content];
            }
            
            foreach($content as $order => $c) {
                if (is_callable($c)) {
                    $c = new Content($c);
                }
                $order = $order === null ? @count($this->zones[$zone]) : $this->nextOrder($zone, $order);   
                $this->zones[$zone][$order] = $c;
            }
            
            ksort($this->zones[$zone]);
            
            return $this;
        }
        
        private $hzones = [];
        
        /**
         * @return Zone
         */
        public function getZone($name) {
            if (!array_key_exists($name, $this->hzones))
                $this->hzones[$name] = new Zone($this, $name);
            
            return $this->hzones[$name];
        }
        
        public function getContents($zone) {
            if (array_key_exists($zone, $this->zones))
                return $this->zones[$zone];
            return array();
        }
        
        public function __get($name) {
            return $this->getContents($name);
        }
        
        public function __set($name, $value) {
            $this->addContent($name, $value);
        }
        
        public function __isset($name) {
            return in_array($name, ['name']);
        }
    }