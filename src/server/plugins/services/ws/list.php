<?php
    use rpi\core\services\Services;
    
    $servman = Services::i();
    $services = $servman->services();
    $response = [];
    
    foreach ($services as $s) {
        $response[] = $s->toArray();
    }
    
    WS_print($response);