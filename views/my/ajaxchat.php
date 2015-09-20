<?php 



//print_r($this->arr_message_out);


$admdell=''; $adms=$this->admins->admin();
echo '<table>';
foreach ($this->arr_message_out as $value) {
if($adms) {$admdell='<td><a onclick="delletmess('.$value['id'].');" style="cursor:pointer;color:red;">X</a></td>';}
	$to_user_l = $value['to_user_login'];
	if (!$to_user_l) {$to_user_l='';}

	echo '<tr>'.$admdell.'<td style="width:50px;font-size:9px;font-weight:700;">'. date("Y-m-d H:i:s",$value['date']) . ' </td><td>' . $value['user_login'] . ': </td><td>' . $to_user_l . '</td><td>' . $value['message'].'</td></tr>';
}
echo '</table>';



?>