</div>


<div class="footer">
<?php if (!empty($_SESSION['user'])) { ?>
<div class="outform"> <input id="innik" placeholder="ник" >
<input id="in" placeholder="сообщение"><input type="button" value="Отправить" onclick="outmessage();" >
<span class="newchan"><input id="channels" placeholder="канал"><input id="passwch"  placeholder="пароль канала"><input type="button" value="Создать канал" onclick="channels();" ></span>
</div>
<?php }
if (!empty($this->flowl)) if ($this->flowl == 'nik') echo '<script>$("#innik").attr("type","hidden");</script>';
 ?>
</div>

<script>

function outmessage() {
	mymessage = document.getElementById('in').value;
	nikeys= document.getElementById('innik').value;
	$.ajax({
  dataType: 'script',
  url: '<?php echo SITE_PATH_BRAUZER; ?>ajaxoutmessage/message?message='+mymessage+'&name='+nikeys,
})
	
}

function channels() {
	mymessage = document.getElementById('channels').value;
	passwch = document.getElementById('passwch').value;
	$.ajax({
  dataType: 'script',
  url: '<?php echo SITE_PATH_BRAUZER; ?>ajaxoutmessage/channels?message='+mymessage+'&password='+passwch,
})
	
	
}

<?php if($this->admins->admin()) { ?>
function delletmess(idmess){
	$.ajax({
		dataType: 'script',
		url: '<?php echo SITE_PATH_BRAUZER; ?>ajaxadmin?type=message&edit=dell&id='+idmess,
	})
}

function delletchan(idchan){
	$.ajax({
		dataType: 'script',
		url: '<?php echo SITE_PATH_BRAUZER; ?>ajaxadmin?type=channel&edit=dell&id='+idchan,
	})
}

function deluserchannel(schan,delus) { //$this->arr_channel['id'],$deluser['id'] id="deluserchannel_$this->arr_channel['id']_$deluser['login']"


//alert('#deluserchannel_'+schan+'_'+delus);
	$.ajax({
		dataType: 'script',
		url: '<?php echo SITE_PATH_BRAUZER; ?>ajaxadmin?type='+schan+'&edit=delluserchannel&id='+delus,
	})
	

}
<?php } ?>

</script>

</body>
</html>