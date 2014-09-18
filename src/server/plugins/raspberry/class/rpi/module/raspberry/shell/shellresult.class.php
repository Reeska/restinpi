<?php
    namespace rpi\module\raspberry\shell;
    
    class ShellResult {
        public $ret, $output;
        
        public function __construct($return, $output) {
            $this->ret = $return;
            $this->output = $output;
        }
    }