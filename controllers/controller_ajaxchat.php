<?php   

Class Controller_Ajaxchat Extends Controller_Base {

		public $arr_message_out='';
		
		public function run() {
		
		if (empty($_SESSION['flowl'])) {echo 'Неправильное соединение'; exit;}
		
		if ($_SESSION['flowl'] == 'channel') {
		
			$model = new Model_Channel;
			$model->messageout($_SESSION['arr_channel']['id']);
			$this->arr_message_out = $model->result; // array('date','message','user_login','to_user_login');
			unset($this->arr_message_out['search']);
			
			
			include $this->teample . 'ajaxchat.php';
		
		}
		

		
			if ($_SESSION['flowl'] == 'nik'){

			$model = new Model_Channel;
			$model->privatemessage($_SESSION['arr_nik']['id']);
			
						$this->arr_message_out = $model->result; // array('date','message','user_login','to_user_login');
			unset($this->arr_message_out['search']);
			
			
			include $this->teample . 'ajaxchat.php';
				 // массив данных ника 			array('id','user_name','login');
			
			
			//	print_r($_SESSION['arr_nik']);	

			}	
		
		}


}


?>