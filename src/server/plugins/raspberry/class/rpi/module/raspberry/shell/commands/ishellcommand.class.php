<?php
    namespace rpi\module\raspberry\shell\commands;
    use rpi\module\raspberry\shell\ShellParsedCommand;
    
    interface IShellCommand {
        public function name();
        public function execute(ShellParsedCommand $args);   
    }