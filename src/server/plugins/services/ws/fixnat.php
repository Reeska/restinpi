<?php
exec('sh '. MOD_DIR.'/services/scripts/fixNAT.sh', $output, $ret);

if ($ret != 0) {
    http_response_code(400);
    WS_print(['error' => $output]);
}

WS_print(true);