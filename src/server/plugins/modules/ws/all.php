<?php
    use rpi\core\Config;

    $modules = Config::modules();
    $ws = [];
    
    foreach($modules as $name => $mod) {
        $wsdir = MOD_DIR.'/'.$name.'/ws';
        
        if (!is_dir($wsdir))
            continue;
            
        $d = @opendir($wsdir);
        
        while ($f = readdir($d)) {
            if ($f[0] == '.') continue;
            $ws[] = $name.'/'.str_replace('.php', '', $f);
        }
        
        closedir($d);
    }

    WS_print($ws);