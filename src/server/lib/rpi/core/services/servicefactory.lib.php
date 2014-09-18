<?php
    namespace rpi\core\services;

    class ServiceFactory {
        public static function newService($name, $cmd, $url) {
            return new Service($name, $cmd, $url);
        }
        
        public static function newServiceWeb($name, $url) {
            return new ServiceWeb($name, $url);
        }
        
        public static function fromJSON($s) {
            $url = self::translateURL($s->url);
            
            //if ($s->type == 'Service')
                $service = ServiceFactory::newService($s->name, @$s->cmd, $url);
            //elseif ($s->type == 'ServiceWeb')
            //    $service = ServiceFactory::newServiceWeb($s->name,  $url);      
                
            return $service;
        }
        
        private static $ph_basedomain = '{basedomain}';
        private static $ph_servername = '{servername}';
        
        public static function translateURL($url) {
            if (empty($url)) {
                return;
            }
            
            $havebase = stripos(self::$ph_basedomain, $url) != -1;
            $haveproto = preg_match('#^(http|ftp|svn)s?://#', $url);
            
            $url = str_replace(self::$ph_basedomain, $_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] == 80 ? '' : ':'.$_SERVER['SERVER_PORT']), $url);
            $url = str_replace(self::$ph_servername, $_SERVER['SERVER_NAME'], $url);
            
            if ($havebase && !$haveproto) {
                $url = 'http://'. $url;
            }
            
            return $url;
        }
    }
