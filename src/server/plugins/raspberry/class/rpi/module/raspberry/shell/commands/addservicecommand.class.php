<?php
    namespace rpi\module\raspberry\shell\commands;
    use rpi\module\raspberry\shell\ShellParsedCommand;
    use rpi\module\raspberry\shell\ShellResult;
    use rpi\core\Config;    
    
    class AddServiceCommand extends AbstractShellCommand {
    	public function name() { return "addservice"; }
    	
        public function execute(ShellParsedCommand $args) {
            $this->required('name,cmd', $args);

            $opt = $args->mapargs;
            $cfg = Config::load('services');
            
            /*
             * Add service in config file
             */
            array_push(
                $cfg->services,
                array_merge(['type' => 'Service', 'url' => null], $opt->getMap())
            );
            
            $cfg->save(true);
            
            return new ShellResult(0, "Service added : ". $opt->name);
        }   
    }