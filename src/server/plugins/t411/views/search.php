<?php
use t411\T411;

$tor = T411::i();

/***********************************************************
 * CHECK LOGIN
 ***********************************************************/                                                                                                                                                                  

if (!$tor->connected())                                                                                                                                                                                                
	location(BASEURL .'/view/t411/login');

/***********************************************************
 * SEARCH CONFIG
 ***********************************************************/
 
/**
 * Search Limit : torrents by page
 */ 

if (isset($_GET['limit']))
    $config->search_limit = $_GET['limit'];

if ($config->has('search_limit'))
    $tor->limit($config->search_limit);

if (isset($_GET['order']) && isset($_GET['type'])) {
    $config->orderby = new \stdClass();
    $config->orderby->field = $_GET['order'];
    $config->orderby->type = $_GET['type'];
}

if ($config->has('orderby'))
    $tor->orderby($config->orderby->field, $config->orderby->type);

/**
 * torrent_dir
 */ 

if (isset($_GET['torrent_dir'])) {
    $config->torrent_dir= $_GET['torrent_dir'];
    refresh();
}

/***********************************************************
 * DOWNLOADS
 ***********************************************************/
 
if (isset($_GET['dl'])) {
    $success = $tor->download($_GET['dl'], (isset($_GET['transmission']) ? $config->torrent_dir : null));
    $notices[] = $success === true ? 'Transmis a transmission !' : 'Erreur : '. $success;
    
    $_SESSION['_notices'] = $notices;
    
    location((isset($_GET['redirect']) ? $_GET['redirect'] : BASEURL.'/view/t411/search'));
}

/**
 * Get profile
 */
$profile = $tor->profile();

/************************************************************************
 * Search Results
 ************************************************************************/
$list = array();
$curp = (isset($_GET['tpage']) ? $_GET['tpage'] : 1);

/**
 * load results
 */
if (isset($_GET['search'])) {
    $list = $tor->search($_GET['search'], $curp);
} elseif (isset($_GET['top'])) {
    $list = $tor->top($_GET['top'], $curp);
}

/**
 * Pagination
 */
$f = $e = 0;
if (!empty($list)) {
    $f = $curp - 5;
    if ($f < 1) $f = 1;
    $e = ($f + 10) - 1;
    if ($e > $list->pages) $e = $list->pages;
}

/**
 * Rendering
 **/
$render = [
    'tor' => $tor, 
    'profile' => $profile,
    'results' => [
        'list' => $list,
        'page' => $curp,
        'pagin' => [
            'first' => $f,
            'last' => $e
        ]
    ]
];