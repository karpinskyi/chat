<?php  

Abstract Class Model_Base { //  create, read, update, delete — «создание, чтение, обновление, удаление»
	
	public $host;public $name;public $user;public $pass;
	
	public $mysqli; // подключение (для пользования классом)
	public $query = '';  // запрос sql (генерируется классом)
	
	public $select = '*';
	public $from;
	public $where = ''; 	
	public $order_by;
	public $limit = '';
	
	//--------------------ВХОДЯЩИЕ ПАРАМЕТРЫ
	public $table='none'; // в какой таблице ищем            *обязательный*
	public $in = 'none'; // массив $key=>строка $=>условие 
	public $out = 'none'; // массив что получим на выходе
	public $sorting = 'date'; // сортировка по дате
	public $sorting_up = 'down'; // сначала последнeе
	public $page = 'none'; // массив [№страницы], [сколько записей на странице]
	
	//--------------------РЕЗУЛЬТАТ
	public $result ; // результат (массив)

	public function __construct() {
		global $db_mysqli;
		global $db_connect;
		/* проверка подключения */
		if ($db_connect != 1) {
		
			$this->host=DB_HOST;
			$this->name=DB_NAME;
			$this->user=DB_USER;
			$this->pass=DB_PASS;	
			
			$this->mysqli =new mysqli($this->host, $this->user, $this->pass, $this->name);
			$db_mysqli = $this->mysqli;
			$db_connect = 1;
		
		/* проверка подключения */
		if (mysqli_connect_errno()) {
			printf("Не удалось подключиться: %s\n", mysqli_connect_error());
			exit();
		}
		$this->mysqli->set_charset("utf8");
		} else { 
			$this->mysqli = $db_mysqli;
		}
		
	}

	
	public function read() { // -------------- ЧТЕНИЕ
		//$this->query = 'SELECT id, foto, price, type_price, area, header, vip, agenty, map_x, map_y, map FROM estate WHERE id = "1" ORDER BY id DESC';
		
		// -------------SELECT
		if ($this->out != 'none') {
		$a=0; $select='';
		foreach ($this->out as $val) {
			$a=$a+1;
			if (count($this->out)== $a) {$select = $select . $val; continue;}
			$select = $select . $val . ', ';
		}
		
		$this->select = $select;
		}
		
		// -------------FROM
		if ($this->table == 'none') { echo 'В запросе отсутствует таблица'; exit; }
		$this->from = $this->table;	
		
		$this->query = "SELECT " . $this->select . " FROM " . $this->from;

		// -------------WHERE
		
		if ($this->in != 'none') {
			$where = '';
			
			foreach ($this->in as $key => $value) {
			$line[] = $key;
			$condition[] = $value;
			}
		
			foreach ($line as $key => $value) {
			$sign = '=';
			$arr = explode("*", $value);
			if (!empty($arr[1])) {
			if ('min' == $arr[1]) {$sign = '>=';$value=$arr[0];} 
			if ('max' == $arr[1]) {$sign = '<=';$value=$arr[0];}
			}
			
			$zn = $condition[$key]; 
			$sk1='"'; $sk2='"';
			$arrth = explode(";", $zn); // разделитель для одинаковых ключей (дом,квартира,участок - это ключи)
			if (!empty($arrth[1])) { $sign = 'IN'; $sk1='('; $sk2=')';
				foreach ($arrth as $keyth => $valth) { 
					if ($keyth == 0) {
						$zn='"' . $valth . '"';
					} else {
						$zn = $zn . ', "' . $valth . '"' ;
					}
				}
			}
			
			if ($key == '0') {$where=$where . $value . ' '.$sign.' '. $sk1 . $zn . $sk2; continue;}
			$where=$where . ' AND ' . $value . ' '.$sign.' '. $sk1 . $zn . $sk2;
			
			
			
			}
			$this->where = $where;
			
			$this->query = $this->query . " WHERE " . $this->where;
		}
		
		// -------------ORDER BY
		if ($this->sorting_up == 'up') $this->order_by=$this->sorting;
		if ($this->sorting_up == 'down') $this->order_by=$this->sorting . ' DESC';
		
		$this->query = $this->query . " ORDER BY " . $this->order_by;
		
		// ------------LIMIT
		if ($this->page != 'none') {
			$this->limit = (($this->page[0])-1)*($this->page[1]) . ', ' . $this->page[1];
			$this->query = $this->query . " LIMIT " . $this->limit;
		}
		
//echo '<br>'.$this->query.'<br>';
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

	public function record() { // $in - массив $key=>строка $=>значение //->result = id
	
		if ($this->table == 'none') { echo 'В запросе отсутствует таблица'; exit; }
		$this->from = $this->table;
		
	if (!empty($this->in['id'])){
		$ver=$this->mysqli->query("SELECT id FROM " . $this->table . " WHERE id='" . $this->in['id'] . "'");
		if($ver->num_rows) { // Это редактирование
			$ver->close();
			
			foreach ($this->in as $key=>$value) {
				$line[]=$key;
				$condition[]=$value;
			}

			$str=''; $con='';
			foreach ($line as $key=>$value) {
				if ($key == (count($line)-1)) {
					$str = $str . $value . '="'.$this->mysqli->real_escape_string($condition[$key]).'"';
					continue;
				}
				$str = $str . $value . '="'.$this->mysqli->real_escape_string($condition[$key]).'", ';
			}
		
			$this->query = 'UPDATE ' . $this->from . ' SET ' . $str . ' WHERE id="' . $this->in['id'] . '"';
			//echo $this->query;
		
			if ($this->mysqli->query($this->query)) {
				$this->result['string'] = $this->mysqli->affected_rows;
				$this->result['id'] = $this->in['id'];
				$this->result['record'] = 'ok';
				$this->result['update'] = 'ok';
			} else {
				$this->result['string'] = $this->mysqli->affected_rows;
				$this->result['id'] = $this->in['id'];
				$this->result['record'] = 'error';
				$this->result['update'] = 'error';
			}
			
				return;
		}
		$ver->close();
	}

			foreach ($this->in as $key=>$value) {
			$line[]=$key;
			$condition[]=$value;
		}

		$str=''; $con='';
		foreach ($line as $key=>$value) {
			if ($key == (count($line)-1)) {
				$str = $str . $value;
				$con= $con . '"' . $condition[$key] . '"';
				continue;
			}
			$str = $str . $value . ', ';
			$con= $con . '"' . $this->mysqli->real_escape_string($condition[$key]) . '", ';
		}
		
		$this->query = 'INSERT INTO ' . $this->from . ' (' . $str . ') VALUES (' . $con . ')';
		//echo $this->query;
		
		if ($this->mysqli->query($this->query)) {
			$this->result['string'] = $this->mysqli->affected_rows;
			$this->result['id'] = $this->mysqli->insert_id;
			$this->result['record'] = 'ok';
		} else {
			$this->result['string'] = $this->mysqli->affected_rows;
			$this->result['id'] = $this->mysqli->insert_id;
			$this->result['record'] = 'error';
		}
	}
	
public function delete() {
	if ($this->table == 'none') { echo 'В запросе отсутствует таблица'; exit; }
	$this->from = $this->table;
	
			$this->query = 'DELETE FROM ' . $this->from . ' WHERE id="' . $this->in['id'] . '"';
		//echo $this->query;
		
		if ($this->mysqli->query($this->query)) {
			$this->result['id'] = $this->in['id'];
			$this->result['delete'] = 'ok';
		} else {
			$this->result['id'] = $this->in['id'];
			$this->result['delete'] = 'error';
		}

}


public function deleteall() {
	if ($this->table == 'none') { echo 'В запросе отсутствует таблица'; exit; }
	$this->from = $this->table;
	
		foreach($this->in as $key=>$value) {
			
			$this->query = 'DELETE FROM ' . $this->from . ' WHERE '. $key .'="' . $value . '"';
			$this->mysqli->query($this->query);

		}
			
			
		//echo $this->query;
		


}
	
		
}
	
	
	
	
		
	
	



?>