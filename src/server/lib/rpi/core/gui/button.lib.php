<?php
	namespace rpi\core\gui;
	use rpi\core\Content;
	
	class Button extends Content {
	    private $name, $action, $image;
	    
		public function __construct($name, $action, $image) {
			parent::__construct('<img src="'. $image .'" class="rpi_button" data-action="'. $action .'" title="'. $name .'" alt="'. $name .'">');
			
			$this->name = $name;
			$this->action = $action;
			$this->image = $image;
		}
		
		public function jsonSerialize() {
		    return [
		        'name' => $this->name,
		        'action' => $this->action,
		        'image' => $this->image
            ];
		}
	}
