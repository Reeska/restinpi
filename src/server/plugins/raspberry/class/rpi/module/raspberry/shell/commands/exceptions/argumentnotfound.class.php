<?php
    namespace rpi\module\raspberry\shell\commands\exceptions;

    class ArgumentNotFound extends \Exception {
        public function __construct($name) {
            parent::__construct("Argument `". $name . "` required !");
        }
    }