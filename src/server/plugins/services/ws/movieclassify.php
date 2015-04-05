<?php
$source = '/home/pi/videos/P2P';
$dest	= '/home/pi/videos/Series';

exec('sh '. MOD_DIR.'/services/scripts/movieclassify.sh '. $source . ' ' .$dest, $output, $ret);

if ($ret != 0) {
    http_response_code(400);
    WS_print(['error' => $output]);
}

WS_print(true);
