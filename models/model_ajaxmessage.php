<?php 


Class Model_Ajaxmessage Extends Model_Base {


	public function messagerecordschannel($message) {
	
		$this->table = 'message';
		$this->in = $message;
		$this->record();
		
	}
	
	
	public function recordschannelnew($message) {
	
		$this->table = 'channel';
		$this->in = $message;
		$this->record();
		
		echo 'document.location.href ="' . SITE_PATH_BRAUZER . 'chat/channel/' . $this->result['id'] . '";';
		
	}
	


}





?>