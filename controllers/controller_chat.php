<?php


Class Controller_Chat Extends Controller_Base {

	public $flowl; // channel или nik
	public $arr_channel; // массив данных канала  	array('id','name','password','arr_nik','date');
	public $arr_nik; // массив данных ника 			array('id','user_name','login');


	public function run() {
	$results=false;
	$this->channelinputpasswords(); // если пришла форма с паролем для скрытой комнаты. заносим пользователя в разрешенные
	
	if(!empty($_SESSION['flowl'])) {unset($_SESSION['flowl']);}

		// отображение
		
		$this->header();
		
		$flow=$this->channel();
		 $this->flowl = $flow;
		 
		if($flow == 'channel') {// определение канала или ника
			
			if ($this->arr_channel['password'] == '0') { // открытый канал
			
				// ищем все сообщения этого канала и отображаем 
				$this->notification('это открытый канал');
				
				$_SESSION['arr_channel'] = $this->arr_channel;
				$_SESSION['flowl'] = $flow;
				include $this->teample . 'chat.php'; // запускаем аякс на этот канал
			
			} else { // закрытый канал
			
				if ($this->session()) {
					
					$this->notification('это закрытый канал ');
					$niks = explode (",", $this->arr_channel['arr_nik']);
					
					foreach ($niks as $value) {
						if ($value == $_SESSION['user_id'] or $this->admins->admin()) { // выводим сообщения
						$this->notification('это закрытый канал. вам разрешен доступ');
						$_SESSION['arr_channel'] = $this->arr_channel;
						$_SESSION['flowl'] = $flow;
						
						if ($this->arr_channel != '0') {
							
							$modelarrchanell = new Model_Stand;
							$modelarrchanell->table= 'users';
							$strnikrepl = str_replace(',',';',$this->arr_channel['arr_nik']);
							$modelarrchanell->in=array('id'=>$strnikrepl);
							$modelarrchanell->out=array('login','id');
							$modelarrchanell->read();
							$results=$modelarrchanell->result;
							if($results['search'] != '0') {
								unset($results['search']);
								$strnikrep ='';
								foreach($results as $values) {
									$strnikrep = $strnikrep . $values['login']. ', ';
								}
								$this->notification('Пользователи канала:' . $strnikrep);
							}
							
						} 
						
						include $this->teample . 'chat.php'; // запускаем аякс на этот канал
						break;
						} 
					} 
					if ($value != $_SESSION['user_id'] and !$this->admins->admin()) { 
						$this->notification('это закрытый канал. вам закрыт доступ');
						include $this->teample . 'passwordchannel.php'; // форма ввода пароля к каналу.
					}
				
				} else { $this->notification('у вас нет доступа'); }
			}
			
		} 
		
		if ($flow == 'nik') {
		
			if ($this->session()) { 
				
				if($this->arr_nik['id'] != $_SESSION['user_id']) {
			
					$_SESSION['arr_nik'] = $this->arr_nik;
					$_SESSION['flowl'] = $flow;
					include $this->teample . 'chat.php'; // запускаем аякс на этот канал
			
				} else { $this->notification('Вы не можете общаться сами с собой'); }

				
			}  else { $this->notification('у вас нет доступа'); }
		
		} 
		
		if ($flow == false) {  $this->notification('неправильный канал'); }
		
		
		
		
		$this->footer();
	
	}
	
	
	
	public function channel()  { // определяем канал или ник

		if (empty($this->data[0])) {$this->notification('Вы не указали комнату'); return false;}
		
		if ($this->data[0] == 'channel') { // поиск по id канала: http/site/hcat/cannel/123
		
			if (empty($this->data[1])) {$this->notification('Вы не указали канал'); return false;} 

			$channel = new Model_Searchchannel;
			if (!$channel->searchid($this->data[1])) { $this->notification('указан неверный канал'); return false;}
			$this->arr_channel = $channel->result['0']; // array('id','name','password','arr_nik','date');
			return 'channel'; 


		}
		
		if ($this->data[0] == 'private') { // ищем оп нику сообщения 
		
			if (empty($this->data[1])) {$this->notification('не определена комната'); return false;}
			
			$nik = new Model_Searchchannel;
			if (!$nik->searchnik($this->data['1'])) {$this->notification('ник не найден'); return false;}
			$this->arr_nik = $nik->result['0']; // array('id','user_name','login');
			return 'nik';
			
		}
		
		foreach ($GLOBALS['rezerv_channel'] as $key=>$value) {
			if ($key == $this->data[0]) { 
				$channel = new Model_Searchchannel;
				if (!$channel->searchid($value)) { $this->notification('указан неверный канал'); return false;}
				$this->arr_channel = $channel->result['0']; // array('id','name','password','arr_nik','date');
				return 'channel'; 
			}
		}
	
		$this->notification('не определена комната'); return false;
	
	}
	
	
	public function channelinputpasswords() { // проверка пароля пользователя на вход в комнату
			
			if (empty($_SESSION['user_id'])) {return;}
			if (empty($_POST['pc']) or empty($_POST['ch'])) {return;}
			if ($_POST['pc'] == '0') {return;}
			$ch = new Model_Ch;
			if (!$ch->renikchannel($_POST['pc'],$_POST['ch'])) {return;}
			$str_nik=$ch->result['0']['arr_nik'];
			if ($str_nik == '0' or $str_nik =='') {return;}
			$arr_nik= explode(',', $str_nik);
			
			foreach ($arr_nik as $value) {
				if ($value == $_SESSION['user_id']) {
					return; break;
				}
			}
			$str_nik = $str_nik .','. $_SESSION['user_id'];
			$ch->newnikchannel($str_nik,$_POST['ch']);

			
	
	}
	

}