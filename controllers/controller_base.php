<?php 

Abstract Class Controller_Base {

	//public $admins;
	public $data;          // входные данные

	public $arr_get;
	
	public $teample;// = SITE_PATH . 'views' . DS . TEMPLEATE . DS;
	public $teample_file;// = SITE_PATH_BRAUZER  . 'views' . DS . TEMPLEATE . DS;
	
	//public $user_login; 	$_SESSION['user']
	//public $user_id;		$_SESSION['user_id']
	//public $user_name;	$_SESSION['user_name']
	
	public $message = ''; // сообщение
	
	public function __construct() {
	
	$this->teample = SITE_PATH . 'views' . DS . TEMPLEATE . DS;
	$this->teample_file = SITE_PATH_BRAUZER  . 'views' . DS . TEMPLEATE . DS;
	
	$this->admins = new Admin;// класс для проверки на администратора в разных частях сайта
	
	
		if (!empty($_GET)) {
			$this->arr_get = $_GET;
			session_start();			
			$this->login();
			//$this->session();
			
		}
		
		if (!empty($_POST['run_post'])) {
			$this->runpost();
		}
		
	}
	
	public function login() {
		if (!empty($_POST['user'])){
		if ($_POST['user'] == 'unset_login') {
			$this->unset_login();
			return;
		}}

		if ((!empty($_POST['user'])) and (!empty($_POST['password'])) and empty($GLOBALS['verefy_post'])) {
		$GLOBALS['verefy_post'] = '1';
			$login = new Model_Login;
			$login->user = $_POST['user'];
			$login->password = $_POST['password'];
			if($login->password()) { 
				$_SESSION['user_session'] = $login->session; // добавлять сюда
				$_SESSION['user'] = $_POST['user'];
				$_SESSION['user_id'] = $login->user_id;
				$_SESSION['user_name'] = $login->user_name;
				setcookie("user_session",$login->session, time() + 60*60*24*365, "/");
				setcookie("user",$_POST['user'], time() + 60*60*24*365, "/");
				$GLOBALS['funcunsetlogin'] = '1';
				return;
			} else {
				$this->unset_login();
				return;
			}
		}
	}
	
	
	public function session(){ //    echo $_COOKIE['user_session']; //echo $_SESSION['user_session'];
		if ((!empty($_SESSION['user_session'])) and (!empty($_SESSION['user'])) and (!empty($_SESSION['user_id'])) and (!empty($_SESSION['user_name']))) { // добавлять сюда
			return true;
		}
		
		if ((!empty($_COOKIE['user_session'])) and (!empty($_COOKIE['user'])) and empty($GLOBALS['verefy_coocie'])) { //echo 'hjjhhjghv';
		$GLOBALS['verefy_coocie'] = '1';
			$login_c = new Model_Login;
			$login_c->user = $_COOKIE['user'];
			$login_c->user_session = $_COOKIE['user_session'];
			if($login_c->session()) {  
				$_SESSION['user_session'] = $login_c->session; // добавлять сюда
				$_SESSION['user'] = $_COOKIE['user'];
				$_SESSION['user_id'] = $login_c->user_id;
				$_SESSION['user_name'] = $login_c->user_name;
				setcookie("user_session",$login_c->session, time() + 60*60*24*365, "/");
				setcookie("user",$_COOKIE['user'], time() + 60*60*24*365, "/");
				$GLOBALS['funcunsetlogin'] = '1';
				return true;
			} 
		}
		
		$this->unset_login();
		return false;
	}
	
	public function unset_login() { 


		
		$GLOBALS['verefy_post'] = '1';
	/*	if (!empty($_SESSION['user_session'])) {unset($_SESSION['user_session']);} // и добавлять сюда
		if (!empty($_SESSION['user'])) {unset($_SESSION['user']);}
		if (!empty($_SESSION['user_id'])) {unset($_SESSION['user_id']);}
		if (!empty($_SESSION['user_name'])) {unset($_SESSION['user_name']);} */
		session_unset();
		
	if (empty($GLOBALS['funcunsetlogin'])) {
		$GLOBALS['funcunsetlogin'] = '1';	
		setcookie("user_session", "", 1, "/");
		setcookie("user", "", 1, "/");
		}
		$GLOBALS['verefy_coocie'] = '1';
	}
		
	public function runpost() {}	
		
		
	// --------------------------------------  ОТОБРАЖЕНИЕ
	
	public function form_user() {
		if ($this->session()) { 
			$user_name = $_SESSION['user_name'];
			include $this->teample . 'user_name.php';
			
			} 
		else { 
			include $this->teample . 'user_form.php';
			}
	}
	
	public function header() {
		include $this->teample . 'header.php';
	}
	
	public function footer() {
		include $this->teample . 'footer.php';
	}
	
	public function notification($message) {
	
		include $this->teample . 'notification.php';
	
	}
	
	
}



?>