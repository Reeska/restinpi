<?php
    define('TIME_BEGIN', microtime(true));

    /************************************************************************************
     * Search all modules
     ************************************************************************************/

    $extdir = opendir(MOD_DIR);
    $list = array();
    $modules = array();
    $extpaths = "";
    
    while(($dir = readdir($extdir))) {
        if ($dir == '.' || $dir == '..') continue;
        
        $modules[] = $dir;
        $list[] = MOD_DIR.'/'.$dir.'/class';
    }

    if (!empty($list)) {
        $extpaths = implode(PATH_SEPARATOR, $list). PATH_SEPARATOR;
    }
    
    /************************************************************************************
     * Configure autoload
     ************************************************************************************/

    set_include_path($extpaths . __DIR__.'/lib/' . PATH_SEPARATOR . get_include_path());
    spl_autoload_extensions('.class.php,.lib.php');
    spl_autoload_register();
    
    /************************************************************************************
     * Init module
     ************************************************************************************/    
     
    use rpi\core\Config;
     
    foreach($modules as $mod) {
        if (is_file(MOD_DIR.'/'.$mod.'/init.php')) {
            $config = Config::load($mod);
            require MOD_DIR.'/'.$mod.'/init.php';
        }
    }