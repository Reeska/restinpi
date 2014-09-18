<?php
    namespace rpi\module\raspberry\shell;
    use rpi\module\raspberry\shell\commands\IShellCommand;
    
    class Shell {
        private $parser;
        private $commands = [];
        private $defaultc;
        
        public function __construct($default=null) {
            $this->parser = new ShellParser;
            $this->defaultc = $default;
        }
        
        public function register(IShellCommand $command) {
            $this->commands[$command->name()] = $command;
            return $this;
        }
        
        public function execute($cmd) {
            $parsed = $this->parser->parse($cmd);
            return $this->getCommandOrDefault($parsed->name)->execute($parsed);
        }
        
        public function getCommandOrDefault($name) {
            return $this->getCommand($name) ?: $this->defaultc;
        }
        
        public function getCommand($name) {
            if (array_key_exists($name, $this->commands))
                return $this->commands[$name];
            return null;
        }
    }