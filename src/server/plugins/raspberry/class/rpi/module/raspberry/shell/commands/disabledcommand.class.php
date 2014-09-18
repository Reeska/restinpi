<?php
    namespace rpi\module\raspberry\shell\commands;
    use rpi\module\raspberry\shell\ShellParsedCommand;
    use rpi\module\raspberry\shell\ShellResult;
    use rpi\core\Config;    
    
    class DisabledCommand implements IShellCommand {
        private $config;
        
    	public function name() { return "disabled"; }
    	
        public function __construct(Config $config) {
            $this->config = $config;
        }
    	
        public function execute(ShellParsedCommand $args) {
            $this->config->shell = false;
            
            return new ShellResult(0, "Bash disabled");
        }   
    }    