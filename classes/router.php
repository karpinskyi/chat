<?php 


Class router {

	public $controller;		// получаем контроллер
	public $data_controller;// получаем данные для контроллера


	public function run() {
	
		$this->url();
		$class = 'Controller_' . ucfirst($this->controller);
		$controller = new $class();
		$controller->data = $this->data_controller;
		$controller->run();
		
		
		//echo $class . '<br>';
		//print_r($this->data_controller);

	}
	
	private function url() {
		if (empty($_GET['route'])) {
			$this->controller = $GLOBALS['start'];
		} else {
			$url = trim($_GET['route'], '/\\');
			$data_arr = explode('/', $url);
			$this->controller = array_shift($data_arr);
			if (!empty($data_arr[0])) {$this->data_controller = $data_arr;}
		}
		
		$this->controller = strtolower($this->controller);
		
		if (!is_file(SITE_PATH . 'controllers' . DS . 'controller_' . $this->controller . '.php')) {
			$this->controller = $GLOBALS['start']; $this->data_controller = '';
		}
		
		/*if ($this->controller == 'map' and empty($this->data_controller['0'])) {
			if (empty($_SESSION['map'])) {
				$this->data_controller['0'] = 'geolocation';
			} else {
				// какойто код, например вытаскиваем из сессии координаты...
				$this->data_controller['1'] = $_SESSION['map'];
			}
		} */
	}
	

	
	

}




?>