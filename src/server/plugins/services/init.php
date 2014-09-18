<?php
use rpi\modules\ServiceLoader;
use rpi\core\Pages;
use rpi\core\gui\ModuleButton;

ServiceLoader::load($config->services);

Pages::i()->get('index')
	->addContent('action', [
	    new ModuleButton('services', 'Fix NAT', 'fixnat', 'net.png'), 
    ]);