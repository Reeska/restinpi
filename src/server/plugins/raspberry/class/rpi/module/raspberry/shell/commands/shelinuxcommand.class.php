<?php
    namespace rpi\module\raspberry\shell\commands;
    use rpi\module\raspberry\shell\ShellParsedCommand;
    use rpi\module\raspberry\shell\ShellResult;
    use rpi\core\Config;
    
    class ShelinuxCommand implements IShellCommand {
        private $config;
        private $aliases = [
            'll' => 'ls -l'
        ];
        
        public function __construct(Config $config) {
            $this->config = $config;
        }
        
        /**
         * Service command name.
         * @return String
         */
        public function name() { return "bash"; }
        
        /**
         * Execute bash command
         * @return ShellResult
         */
        public function execute(ShellParsedCommand $args) {
        	/**
        	 * Check if bash is enabled
        	 */
        	if (!$this->config->shell) {
        		return new ShellResult(-1, "Command line disabled.");
        	}
        	
            $cmd = $this->makeCommand($args);
            
            exec($cmd, $output, $ret);
            $output = htmlentities(implode("\n", $output));

            if ($ret != 0)
                $output .= '(Error: '. $cmd .')';

            return new ShellResult($ret, $output);
        }   
        
        /**
         * Make a bash command
         * 
         * @return String
         */        
        public function makeCommand(ShellParsedCommand $args) {
            $cmd = $args->name;
            
            if (array_key_exists($args->name, $this->aliases)) {
                $cmd = $this->aliases[$args->name];
            }
            
            $cmd .= ' '. implode(' ', $args->args);
            
            return $cmd;
        }
    }