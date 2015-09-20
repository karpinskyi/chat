<?php 


Class Model_Channel Extends Model_Base {

	public function messageout($channel) {
	


$this->table = 'message';
$this->in = array( 'channel'=>$channel);
$this->out = array('date','message','user_login','to_user_login','id');
//$run->sorting = 'date';
//$run->sorting_up = 'down';
//$run->page = array('1','10');
$this->read();

	
	}
	
	
	public function privatemessage($nik) {
	

		$this->query = 'SELECT * FROM message WHERE (user_id =' . $_SESSION['user_id'] . ' AND to_user_id='. $nik .') OR (user_id='.$nik.' AND to_user_id='.$_SESSION['user_id'].') ORDER BY date DESC';
		
		/* Посылаем запрос серверу */ 
		if ($result = $this->mysqli->query($this->query)) { 
		
			/* Выбираем результаты запроса: */ 
			while( $row = $result->fetch_assoc() ){  
				$ex[]=$row;
			}
				
			/* Освобождаем память */ 
			$result->close();	
			if (empty($ex)) {$ex['search']='0';}
			else {
			$ex['search']=count($ex);
			 }
		 }
		if (empty($ex)) { echo 'Ошибка чтения БД, отправлен неверный запрос';
		}  else {
		$this->result=$ex; // массив результатов	
		}
		



	}
	
}



?>