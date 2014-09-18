<?php
    use rpi\module\raspberry\shell\Shell;
    use rpi\module\raspberry\shell\commands\ShelinuxCommand;

    $shell  = new Shell(new ShelinuxCommand($config));
    
    use rpi\module\raspberry\shell\commands\AddServiceCommand;
    use rpi\module\raspberry\shell\commands\DisabledCommand;
    
    $shell->register(new AddServiceCommand);
    $shell->register(new DisabledCommand($config));