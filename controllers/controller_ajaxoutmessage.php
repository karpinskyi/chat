<?php 


Class Controller_Ajaxoutmessage Extends Controller_Base {

	public function run() { 
	
	if (empty($this->data['0'])) {exit;}
		if (!$this->session()) {exit;}
		if (empty($_GET['message'])) {exit;}
		if ($_GET['message'] == '') {exit;}
	
		
		
		if($this->data['0'] == 'message') {

			if(empty($_SESSION['flowl'])) {exit;}
		
			if ($_SESSION['flowl'] == 'channel'){ 
				echo 'document.getElementById("in").value = "";';	
				echo 'document.getElementById("innik").value = "";';
				if (empty($_GET['name'])) {$getnik = '0';} else { $getnik = $_GET['name'];}
				$message = array('channel'=>$_SESSION['arr_channel']['id'],'message'=>$_GET['message'], 'user_id'=>$_SESSION['user_id'],'to_user_id'=>'0','date'=>time(),	'user_login'=>$_SESSION['user'],'to_user_login'=>$getnik);
				$readmessage = new Model_Ajaxmessage;
				$readmessage->messagerecordschannel($message);
				//print_r($readmessage->result);
			}
			

			if ($_SESSION['flowl'] == 'nik'){
				echo 'document.getElementById("in").value = "";';
				$message = array('channel'=>'0','message'=>$_GET['message'], 'user_id'=>$_SESSION['user_id'],'to_user_id'=>$_SESSION['arr_nik']['id'],'date'=>time(),	'user_login'=>$_SESSION['user'],'to_user_login'=>$_SESSION['arr_nik']['login']);
				$readmessage = new Model_Ajaxmessage;
				$readmessage->messagerecordschannel($message);
				//echo 'alert('.$_SESSION['arr_nik']['id'].');';
			
			}
			
		}
		
		
		
		if($this->data['0'] == 'channels') {
		
			if (empty($_GET['password'])) {$passwords = '0';} else {$passwords = $_GET['password']; if($passwords == '') {$passwords = '0';}}
				echo 'document.getElementById("channels").value = "";';	
				echo 'document.getElementById("passwch").value = "";';	
				$message = array('password'=>$passwords,'name'=>$_GET['message'],'arr_nik'=>$_SESSION['user_id'],'date'=>time());
				$readmessage = new Model_Ajaxmessage;
				$readmessage->recordschannelnew($message);
			
		}
		
		
		
	
	}

}


?>