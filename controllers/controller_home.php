<?php


Class Controller_Home Extends Controller_Base {


	


	public function run() {
	
		
			
			
			
			
					// отображение
		
		$this->header();
		
		//include $this->teample . 'variable'. $this->mapcontroller .'.php';
		
		include $this->teample . 'home.php';
		
		
		$this->footer();
	
	}

}