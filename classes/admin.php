<?php 

Class Admin {

	public function admin() {
	
		if (empty($_SESSION['user_id'])) {return false;}
		foreach ($GLOBALS['admin'] as $value) {
			if ($value == $_SESSION['user_id']) {return true;}
		}
		return false;
	
	}

}


?>