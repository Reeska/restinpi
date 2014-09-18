<?php
    /****************************************************
     * Shutdown RPI
     ****************************************************/
     
     exec("sudo halt", $output, $code);
     
     WS_print(array('msg' => empty($code) ? 'success' : 'failure'));	