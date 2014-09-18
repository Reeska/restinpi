<?php
namespace rpi\cpu;

class ProcessorInfos {
    public $users;
    public $uptime;
    public $load;
    public $temperature;
    
    public function __construct() {
        $this->extract();
    }
    
    public function extract() {
        $up = exec("uptime");

       	/**
         * 14:26:17 up 1 day,  1:37,  0 users,  load average: 0.47, 0.17, 0.09
         * 00:01:35 up 4 days, 4:31, 0 users, load average: 0.72, 0.56, 0.32
         */             
        if (!preg_match('/^((.*?), (.*?)), (.*?), (.*)$/u', $up, $matches))
        	return "Uptime : $up";
        
       	list($nil, $uptime, $nil, $nil, $user, $load) = $matches;
        
		$this->users = intval($user);
		$this->uptime = end(explode('up', $uptime));
		$this->load = str_replace("load average:", "", $load);
        $this->temperature = round(exec('sh '. MOD_DIR . "/cpu/scripts/cputemp"), 2);    	
    }
}