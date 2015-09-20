<?php


Class Model_Searchchannel Extends Model_Base {

	public function searchid($channel) {
	
		$this->table = 'channel';
		$this->in = array( 'id'=>$channel);
		$this->out = array('id','name','password','arr_nik','date');
		$this->read();
		if ($this->result['search'] != '1') {return false;}
				
		return true;
	}
	
	public function searchnik($nik) {
	
		$this->table = 'users';
		$this->in = array('login'=>$nik);
		$this->out = array('id','user_name','login');
		$this->read();
		if ($this->result['search'] != '1') {return false;}
		
		return true;
	
	}
	
}