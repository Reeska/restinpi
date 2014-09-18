<?php
    namespace rpi\module\raspberry\shell\commands;
    use rpi\module\raspberry\shell\ShellParsedCommand;
    use rpi\module\raspberry\shell\ShellResult;
    use rpi\module\raspberry\shell\commands\exceptions\ArgumentNotFound;
    
    abstract class AbstractShellCommand implements IShellCommand {
        public function required($name, $args) {
            foreach(preg_split("/\s*,\s*/", $name) as $n)
                $this->requiredOne($n, $args);
        }
        
        protected function requiredOne($name, $args) {
            if (!$args->mapargs->has($name))
                throw new ArgumentNotFound($name);            
        }
    }