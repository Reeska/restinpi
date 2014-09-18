<?php
    use rpi\core\Pages;
    
    $page = @$_GET['page'] ?: 'index';
    $zone = @$_GET['zone'];

    $model = Pages::i()->get($page);
    
    $contents = $model->getContents($zone);
    
    WS_print(array_values($contents));