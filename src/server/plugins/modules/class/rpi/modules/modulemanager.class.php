<?php
    namespace rpi\modules;
    
    class ModuleManager {
        private static $_i;
        
    	public static function i() {
			return empty(self::$_i) ?  (self::$_i = new ModuleManager): self::$_i;
		}	
        
        public function modules() {
            global $modules;
            return $modules;
        }
        
        public function load($package) {
            /**
             * copy package in module dir
             */
            $tmp_name = $package["tmp_name"];
            $name = $package["name"];
            $to = MOD_DIR."/". $name;
            
            if (!move_uploaded_file($tmp_name, $to))
                return 'UPLOAD_ERROR';
            
            /**
             * extract module
             */
            $zip = new \ZipArchive;
            
            if ($zip->open($to) === TRUE) {
                $zip->extractTo(MOD_DIR);
                $zip->close();
                
                @unlink($to);
                
                $this->refresh();
                return true;
            } 
            
            @unlink($to);
            return false;
        }
        
        public function refresh() {
            global $modules;
            $modules = array();
            $extdir = opendir(EXT_DIR);
            
            while(($dir = readdir($extdir)))
                if (!($dir == '.' || $dir == '..')) 
                    $modules[] = $dir;            
        }
    }