<?php
    use rpi\core\Pages;
    use rpi\core\Content;
    use t411\T411;
    
    define('T411_SHARE_RATIO_GOAL', 1);
    define('T411_SHARE_WEAK_RATIO', 0.75);
	
    $tor        = T411::i();
	
	/**
	 * Add contents
	 */
    $model      = Pages::g("index");
    /*$model->addContent('info', [
        999 => function() use($tor, $config) {
            /**
             * Zone T411 info ratio
             * /
            if ($tor->connected()) {
                $p = $tor->profile();
            	$ratio = ($p->uploaded / $p->downloaded);
        		$torrent = '% <span class="label label-' . ($ratio < 0.75 ? 'danger' : 'success') .'">'. round($ratio, 4). '</span>';
        	} else {
                $torrent = '<span class="label label-danger">Non connecté.</span>';
        	}    
            
            return 'T411 : '. $torrent;
        }
    ]);*/
    
    /**
     * Get T411 stats
     */
     
    /*
     * User logged, get ratio
     */
    if ($tor->connected()) {
        $ratio      = $tor->ratio();
    	
        $info   = [
            'label' => 'T411', 'value' => $ratio, 'max' => T411_SHARE_RATIO_GOAL, 'error' => $ratio < T411_SHARE_WEAK_RATIO
        ];
    } 
    /*
     * User not logged
     */
    else {
        $info   = [
            'label' => 'T411', 'value' => 'Non connecté', 'error' => true, 'msg' => $tor->getLastError()
        ];
    }
    
    $model->addContent('info', [
       999 => $info
    ]);
    
    /**
     * Declare pages
     */
    Pages::i()->register('t411', 'search', 'T411');