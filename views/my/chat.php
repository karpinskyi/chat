
<div class="chatinfo">
<?php 
if (!empty($this->flowl)) {
	if ($this->flowl == 'nik') { echo ' Чат с пользователем. nik:'.$this->arr_nik['login'].' <h3>Приват с:'.$this->arr_nik['user_name'].'</h3>';}
	if ($this->flowl == 'channel') {echo 'Канал №:'.$this->arr_channel['id'].' <h3>Комната:'.$this->arr_channel['name'].'</h3>';
	
		if($this->admins->admin()) {echo '<span style="color:red;">Вы администратор</span><br><br>Удалить канал:<a onclick="delletchan('.$this->arr_channel['id'].');" style="cursor:pointer;color:red;"> [x]</a><br>все сообщения удаляться!';
			if ($results != false) {echo '<br><br>удалить участников канала:';//print_r($results);
				foreach ($results as $deluser) {
					echo '<span id="deluserchannel_'.$this->arr_channel['id'].'_'.$deluser['id'].'">'.$deluser['login'] . ':<a style="color:red;cursor:pointer;" onclick="deluserchannel('.$this->arr_channel['id'].','.$deluser['id'].');">[x]</a></span> ';
				}
			}
		}
		
	}
}

?>


</div>

<div class="chat" id="chat">
Это чат


</div>




<?php	
			
		/*	echo $_SESSION['flowl'];
			
			if ($_SESSION['flowl'] == 'channel'){ 
			
				print_r($_SESSION['arr_channel']);
			
			}
			
			if ($_SESSION['flowl'] == 'nik'){

				print_r($_SESSION['arr_nik']);	

			}		*/
			
			echo '<script> site_path = "'. SITE_PATH_BRAUZER . '";
			
			
			</script>';

?>
<script>

function chats() {
			$.ajax({
				url: site_path+'ajaxchat',
				success: function(data) {
					$('#chat').html(data);
				}
			});
}

chats();

setInterval(function(){
	chats()
},3000);





$(window).resize(function(){
	rezine();
});

function rezine() {

	
	client_w = $(window).width();
	client_h = $(window).height();

	w_chat= client_w - 300;
	h_chat = client_h - 150;
	a='width:'+w_chat+'px;height:'+h_chat+'px;';
	$('.chat').attr('style',a);
}
	rezine();
</script>