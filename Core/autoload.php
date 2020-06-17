<?php 

function my_autoloader($class) {
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	$class = str_replace('/', DIRECTORY_SEPARATOR, $class);

	$class = ucfirst($class.".php");
	$ch1 = 'src'.DIRECTORY_SEPARATOR.$class;
	$ch2 = 'src'.DIRECTORY_SEPARATOR.'Controller'.DIRECTORY_SEPARATOR.$class;
	$ch3 = 'src'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR. $class;
	$ch4 = 'src'.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR. $class;

	if (file_exists($class)) {
		include $class;
	} elseif (file_exists($ch1)) {
		include $ch1;
	} elseif (file_exists($ch2)) {
		include $ch2;
	} elseif (file_exists($ch3)) {
		include $ch3;
	} elseif (file_exists($ch4)) {
		include $ch4;
	}
}

spl_autoload_register('my_autoloader');
