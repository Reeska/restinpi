<?php
    use rpi\modules\ModuleManager;
    
    $modmanager = ModuleManager::i();
 
    if (isset($_FILES['package'])) {
        if (($code = $modmanager->load($_FILES['package'])) === true) {
            echo "<p>Installation success !</p>";
        } else
            echo "<p>Error : ". $code . "</p>";
    }
 
    $render = [
        'mods' => $modmanager->modules()
    ];