<!DOCTYPE html>
<html>
	<head>
		<title>REST in PI</title>
        <base href="<?php echo BASEURL ?>/"/>
		<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
        
        <?php
        if (isset($css))        
            foreach($css as $c)        
                echo '<link href="'. $c .'" type="text/css" rel="stylesheet" />';        
        ?>        
        
        <script src="assets/j/jquery.min.js"></script>
        <script src="assets/j/jquery-ui/ui/minified/jquery-ui.min.js"></script>
        <script src="assets/j/jquery-ui/ui/jquery.switchButton.js"></script>
        
        <link href="assets/j/jquery-ui/themes/base/jquery-ui.css" rel="stylesheet"/>
        <link href="assets/j/jquery-ui/themes/base/jquery.switchButton.css" rel="stylesheet"/>
        
        <?php
        
        if (isset($js))
            foreach($js as $c)
                echo '<script src="'. $c .'"></script>';
        
        ?>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>    
        <div id="menu">
            
        </div>