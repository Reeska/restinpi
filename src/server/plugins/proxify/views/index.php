<?php
	function b64_encode($s) {
	    return str_replace(array('+', '/'), array(',', '-'), base64_encode($s));
	}
	
	function b64_decode($s) {
	    return base64_decode(str_replace(array(',', '-'), array('+', '/'), $s));
	}

	if (!empty($_GET['url'])) :
        $url = b64_decode($_GET['url']);
        
        if (!empty($_GET['res']))
        	$url .= $_GET['res'];
	
        /*********************************************************
         * Content-Type
         *********************************************************/
        $image = preg_match('/(jpg|png|jpeg|gif)$/', $url);
        $js = preg_match('/\.js$/', $url);
        $css = preg_match('/\.css$/', $url);
         
        if ($image) header("Content-Type: image/jpg");    
        if ($js) header("Content-Type: application/javascript");
        if ($css) header("Content-Type: text/css");
		
		/*********************************************************
		 * Proxy data
		 *********************************************************/
		$proxy = full_url();
		$proxyserv = 'http://'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/rpi/p/';
		
		/*********************************************************
		 * Query
		 *********************************************************/
		$server = parse_url($url);
		$hostproxify = $proxyserv . b64_encode($server['scheme'].'://'.$server['host']);
		$url = html_entity_decode($url);
		
		if (!($content = http_proxy_query($url)))  {
			var_dump($_GET['url']);
			var_dump($url);
			var_dump($content);
		}
		
		$rewrite = !$image;
		
		/*********************************************************
		 * Rewrite image & script urls
		 *********************************************************/
		if ($rewrite) {
			/*
			 * src="http://.." format
			 */
			$content = preg_replace_callback(
				'#(src|href|action)=("|\')?((http|ftp|//)s?([^"\'>]+))("|\')?#', function($m) use ($proxyserv) {
					return $m[1] . '="' . $proxyserv .b64_encode($m[3]) . '"';
				}, $content);
			
			$content = preg_replace_callback(
				'#url\(("|\')?((http|ftp|//)s?([^"\']+))("|\')?\)#', function($m) use ($proxyserv) {
					return 'url("'. $proxyserv . b64_encode($m[2]) . '")';
				}, $content);
				
			/*
			 * src="/..." or href="/..." or url('/...') format
			 */
			$content = preg_replace('#(src|href|action)=(["\'])/([^/]|["\'])#', '$1=$2' . $hostproxify . '/$3', $content);
			/*$content = preg_replace_callback('#(src|href|action)=(["\'])([^"\'>]+["\'])#', function($m) use ($hostproxify) {
    			    if (preg_match('#^(http|ftp|//)#', $m[3]))
    			        return $m[0];
			    
			        return $m[1] . '=' . $m[2] . $hostproxify . '/' . $m[3];
			    }, $content);*/
			$content = preg_replace('#url\(("|\')?/([^/]|["\'])#', 'url($1' . $hostproxify . '/$2', $content);
		}
		
		/*
		 * replace real host by proxify host
		 */
		//if (isset($server['host']))
		//	$content = preg_replace('#'.$server['host'].'#', $hostproxify, $content);
		
		/*********************************************************
		 * Display content
		 *********************************************************/
		
		echo $content;
        exit;
	endif;
	
    $js[] = 'assets/j/jquery.min.js';
    $js[] = 'ext/proxify/assets/j/encode.js';
