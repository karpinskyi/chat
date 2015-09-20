<?php 

Class Model_Ch Extends Model_Base {

	
	
	public function renikchannel($pc,$ch) {
	
		$this->table='channel';
		
		$this->in = array('id'=>$ch,'password'=>$pc);
		$this->out = array('arr_nik');
		$this->read();
		if ($this->result['search'] != '1') {return false;}
		return true;
	
	}
	
	public function newnikchannel($str_nik,$ch) {
	
		$this->table='channel';
		$this->in=array('id'=>$ch,'arr_nik'=>$str_nik);
		$this->record();
	
	}

}

