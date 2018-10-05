<?php
$css = [
	'css/style.css',
	'bootstrap/css/bootstrap.min.css',
	'js/jquery-ui/jquery-ui.min.css',
	'sidebar-homepage/css/simple-sidebar.css',
	'js/jquery-ui/jquery-ui.structure.min.css',
	'js/jquery-ui/jquery-ui.theme.min.css',
];

foreach($css as $entry){
	echo '<link rel="stylesheet" href="'.$entry.'" type="text/css"/>';
}

$js = [
	'js/jquery.min.js',
	'js/jquery-ui/jquery-ui.min.js'
];
foreach ($js as $entry){
	echo '<script src="'.$entry.'"></script>';
}
