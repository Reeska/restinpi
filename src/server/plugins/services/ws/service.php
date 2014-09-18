<?php
    /****************************************************
     * Webservice to control declared services
     ****************************************************/
     
    if (empty($_REQUEST))
        WS_print(array('msg' => "That's works !"));
        
    if (!isset($_REQUEST['action']))
        WS_print(array('error' => "action param missing"));
    
    if (!isset($_REQUEST['service']))
        WS_print(array('error' => "service param missing"));
        
    $action = $_REQUEST["action"];
    $service = $_REQUEST["service"];
    
    use rpi\core\services\Services;
    
    $servman = Services::i();
    
    /**
     * Check if exists
     */
    if (!$servman->has($service)) {
        http_response_code(400);
        WS_print(array('error' => 'not_exists'));
    }
    
    $service = $servman->get($service);
    
    /****************************************************
     * Operations
     ****************************************************/
     
    /**
     * Start/Stop
     */
    if ($action == "start") 
        $result = $service->start();
    elseif ($action == "stop")
        $result = $service->stop();
    else {
        http_response_code(400);
        WS_print(array('error' => 'unsupported_action'));
    }
    
    /**
     * Result
     */
    WS_print(array(
        'result' => ($result ? 'success' : 'fail'), 
        'started' => $service->enabled()
    ));
