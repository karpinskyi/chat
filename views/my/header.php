<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
<link href="<?php echo $this->teample_file; ?>css/style.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


</head>
<body>

	<div class = "header">
	
	<span><a href="<?php echo SITE_PATH_BRAUZER; ?>home">Главная</a></span> <span><a href="<?php echo SITE_PATH_BRAUZER; ?>chat/kiev">Чат Киев</a></span> <span><a href="<?php echo SITE_PATH_BRAUZER; ?>chat/odessa">Чат Одесса</a></span> <span><a href="<?php echo SITE_PATH_BRAUZER; ?>chat/lviv">Чат Львов</a></span>
	<span><a onclick="in_channel();" style="cursor:pointer;">Канал:</a><input id="channel" placeholder="Введите № канала"></span>
	<span ><a onclick="in_nik();" style="cursor:pointer;">Приватный:</a><input id="nik" placeholder="Введите ник"></span>
	<!--<span><form>Приватный чат.(Введите ник)<input > ok</form></span> -->
	<span class="login"><?php $this->form_user(); ?> </span>
	
	
	</div>
	
	<script>
	function in_nik(){
	document.location.href ='<?php echo SITE_PATH_BRAUZER; ?>chat/private/'+document.getElementById('nik').value;
	}
	function in_channel(){
	document.location.href ='<?php echo SITE_PATH_BRAUZER; ?>chat/channel/'+document.getElementById('channel').value;
	}
	
	</script>
	
	<div class="content">