<?php
    namespace rpi\core;
    
    class Content implements \JsonSerializable {
        private $content;
        
        public function __construct($content) {
            $this->content = $content;
        }
        
        public function __toString() {
            $c = $this->content;
			
			if (is_callable($c)) return $c();
			return $c;
        }
        
        public function jsonSerialize() {
            $c = $this->content;
            
            if (is_callable($c))
                $c = $c();
                
            if (is_array($this->content))
                return $this->content;
            
            return $c;
        }
    }