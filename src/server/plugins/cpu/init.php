<?php
    use rpi\core\Pages;
    use rpi\core\Content; 
	use rpi\core\gui\ModuleButton;
	use rpi\cpu\ProcessorInfos;
	use rpi\hardware\disk\DiskInfos;
	
	define('CPU_TEMP_MAX', 90);

	/**
	 * Vars
	 */
    $model = Pages::i()->get("index");
    $procinfo = new ProcessorInfos;
	$sdcard = DiskInfos::getInfo('/media/sdcard');
	
	/**
	 * Info processing
	 */
	$infos = [
            ['label' => 'Uptime', 'value' => $procinfo->uptime],
            ['label' => 'Users', 'value' => $procinfo->users, 'error' => $procinfo->users > 1],
            ['label' => 'Load', 'value' => $procinfo->load, 'error' => floatval($procinfo->load) > 1],
            ['label' => 'CPU', 
                'value' => $procinfo->temperature, 
                'unit' => '°C', 
                'min' => 0, 
                'max' => CPU_TEMP_MAX, 
                'warning' => $procinfo->temperature >= CPU_TEMP_MAX / 2,
                'error' => $procinfo->temperature >= CPU_TEMP_MAX
            ]
        ];
		
	if (!empty($sdcard)) {
		$used = $sdcard->used();
		
		$infos[] = 			
			['label' => 'HDD', 
				'value' => $used->valueForUnit(),
				'unit' => $used->unit(),
				'min' => 0,
				'max' => $sdcard->size()->valueForUnit()
			];
	}
	
	/**
	 * Add model
	 */
    $model
        ->addContent('old.info', [
            50 => 'Uptime : <span class="label label-default">'. $procinfo->uptime .'</span>',
            51 => 'Users : <span class="label label-'. ($procinfo->users > 1 ? 'danger' : 'success') .'">'. $procinfo->users .'</span>',
            52 => 'Load : <span class="label label-'. (floatval($procinfo->load) > 1 ? 'danger' : 'success') .'">'. $procinfo->load .'</span>',
            53 => 'CPU : <span class="label label-'. ($procinfo->temperature > 60 ? 'danger' : 'success') .'">'. $procinfo->temperature . ' °C</span>',
        ])
        ->addContent('info', $infos)
		->addContent('action', [
		    new ModuleButton('cpu', 'Off', 'shutdown', 'power.png'), 
		    new ModuleButton('cpu', 'Reboot', 'reboot', 'refresh.png')
        ]);