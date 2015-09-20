<?php 

Class Model_Login Extends Model_Base {

	public $user;
	public $password;
	public $session;
	public $user_session;
	public $user_id;
	public $uner_name;
	
	public function password() {
		$this->table = 'users';
		$this->in = array ('login' => $this->user, 'password' => $this->password);
		$this->out = array('id','user_name'); // добавлять сюда
		$this->read();
	
		if ($this->result['search'] == '1') {
												// и добавлять сюда
			$this->user_id = $this->result[0]['id'];
			$this->user_name = $this->result[0]['user_name'];
			$this->session = rand(1000000000000000,9999999999999999);
			
			$this->in = array ('id' => $this->user_id, 'session'=>$this->session);
			$this->record();
				
			if ($this->result['update'] == 'ok') {return true;}
		} 
		
		return false;
		
	}
	
	public function session() {
		$this->table = 'users';
		$this->in = array ('login' => $this->user, 'session' => $this->user_session);
		$this->out = array('id','user_name');  // добавлять сюда
		$this->read();
		
		if ($this->result['search'] == '1') {
												// и добавлять сюда
			$this->user_id = $this->result[0]['id'];
			$this->user_name = $this->result[0]['user_name'];
			$this->session = rand(1000000000000000,9999999999999999);
			
			$this->in = array ('id' => $this->user_id, 'session'=>$this->session);
			$this->record();
			
			if ($this->result['update'] == 'ok') {return true;}
		} 
		
		return false;
	}
	




}


?>