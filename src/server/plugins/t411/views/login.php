<?php
use t411\T411;

$tor = T411::i();

if (isset($_GET['logout'])) {
    $tor->logout();
}

if ($tor->connected()) {
    $_SESSION['_notices'] = ['Déjà connecté'];
    
    location(BASEURL.'/view/t411/search');
}

if (isset($_POST['user'])) {
    if (!$tor->auth($_POST['user'], $_POST['pass']))
        $notices[] = 'Erreur de connexion';
    else {
        location(BASEURL.'/view/t411/search');
    }
}