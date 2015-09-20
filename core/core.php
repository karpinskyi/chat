<?php  


function __autoload ($ClassName) {
	$filename = strtolower($ClassName) . '.php';
	$expArr = explode('_', $ClassName);
	if(empty($expArr[1])) {
		$folder = 'classes';
	} else {
		switch(strtolower($expArr[0])){
			case 'controller':
				$folder = 'controllers';
				break;
			case 'model':
				$folder = 'models';
				break;
			default:
				$folder = 'classes';
				break;
		}
	}
	
	$file = SITE_PATH . $folder . DS . $filename;
	
	if (file_exists($file) == false) {
	echo '<b><h2>Ошибка соединения. Попробуйте перезагрузить страницу.</h2></b><br>
	file not found: ' . $file . ' <br>';
	//exit;
	return false;
	}
	
	include ($file);
}



?>