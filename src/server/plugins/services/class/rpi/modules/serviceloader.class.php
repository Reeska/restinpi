<?php
    namespace rpi\modules;

    use \rpi\core\services\Services;
    use \rpi\core\services\ServiceFactory;

    class ServiceLoader {
        public static function load ($services) {
            $servman = Services::i();
            
            foreach($services as $s) {
                $servman->register(ServiceFactory::fromJSON($s));
            }
        }        
    }