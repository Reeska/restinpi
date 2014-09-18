<?php
use t411\T411;

$tor = T411::i();

print "[connection...]\n";

if (!$tor->connected()) {
    print "[not connected]\n"; 
    
    $auth = $tor->auth($config->user, $config->pass);
    
    var_dump($auth);
    
    if (!$auth)
        print "[not authed]\n";
    else {
        print "[connected]\n";
        var_dump($tor->profile());
    }
}