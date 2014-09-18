<?php
	namespace rpi\core\gui;
	
	class ModuleButton extends Button {
		public function __construct($module, $name, $action, $image) {
			parent::__construct($name, 'ws/'.$module.'/'.$action, MOD_ROOT.'/'.$module.'/assets/i/'.$image);
		}
	}
