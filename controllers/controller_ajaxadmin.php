<?php 


Class Controller_Ajaxadmin Extends Controller_Base {


	
	public function run() { 	
	
		if (empty($_GET['id']) or empty($_GET['type']) or empty($_GET['edit'])) {exit;}
		if(!$this->admins->admin()) {exit;}
		
	
		if ($_GET['type']=='message' and $_GET['edit']=='dell') {
		
			$model = new Model_Ajaxadmin;
			$model->table = 'message';
			$model->in = array('id'=>$_GET['id']);
			$model->delete();
		
		}
		
		if ($_GET['type']=='channel' and $_GET['edit']=='dell') {
		
			$model = new Model_Ajaxadmin;
			
			$model->table = 'message';
			$model->in = array('channel'=>$_GET['id']);
			$model->deleteall();		
			
			$model->table = 'channel';
			$model->in = array('id'=>$_GET['id']);
			$model->delete();			
			
			echo 'document.location.href ="' . SITE_PATH_BRAUZER . '";';
		
		}
		
		if ($_GET['edit']=='delluserchannel') {?> 
		
			delus = <?php echo $_GET['id']; ?>;
			schan = <?php echo $_GET['type']; ?>;
			
				//alert(schan);
				//alert(delus);
		
			$('#deluserchannel_'+schan+'_'+delus).attr('style','display:none;');
		
		<?php 
		
			$model = new Model_Ajaxadmin;
			
			$model->table = 'channel';
			$model->in = array('id'=>$_GET['type']);
			$model->out=array('arr_nik');
			$model->read();
			if($model->result['0']['arr_nik'] == '0') {exit;}
			$read_str = explode(',',$model->result['0']['arr_nik']);
			
			$newstrusers = '';$zpt='';
			foreach($read_str as $userinstr) {
				if($userinstr == $_GET['id']) {continue;}
				$newstrusers = $newstrusers . $zpt . $userinstr; $zpt=',';
			}
			if ($newstrusers == '') {$newstrusers = '1';}// тогда записываем сюда админа admin
			
			$model->table = 'channel';
			$model->in = array('id'=>$_GET['type'], 'arr_nik'=>$newstrusers);
			$model->record();
		
		
		} 
		
		
		
		
	//	echo 'alert('.$_GET['id'].');';
	
	}



}