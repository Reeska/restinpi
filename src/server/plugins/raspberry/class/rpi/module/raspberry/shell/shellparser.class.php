<?php
    namespace rpi\module\raspberry\shell;
    
    class ShellParser {
        public function parse($cmd) {
            $parts = explode(' ', $cmd);
            $name = array_shift($parts);
            
            return new ShellParsedCommand($cmd, $name, $parts);
        }   
    }