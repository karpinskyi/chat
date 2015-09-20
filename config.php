<?php  

// для подключения к бд
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'chat');

define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам


//define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

$sitePath = realpath(dirname(__FILE__) . DS) . DS;
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

$sitePathBr = 'http://localhost/chat/';
define ('SITE_PATH_BRAUZER',$sitePathBr); // путь к корневой папке в браузере

define ('TEMPLEATE', 'my'); // папка с шаблоном

$GLOBALS['start'] = 'home'; // стартовый контроллер

$GLOBALS['rezerv_channel']=array('kiev'=>'10','odessa'=>'11','lviv'=>'12',); // зарезервированные комнаты

$GLOBALS['admin'] = array('1'); // пользователи - администраторы(id), но id=1 всегда должен быль администратор




?>