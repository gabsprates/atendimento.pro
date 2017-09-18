<?require "../setup/need.php";

$COT = mysql_query("SELECT * FROM {$DB_PRENOM}_chat WHERE atendente_email = '$_POST[e]' && usuario = '$_POST[r]'");
	while($ETN = mysql_fetch_array($COT, MYSQL_ASSOC)){?>
	<li><?=$ETN[cliente_nome].' ('.$ETN[cliente_email].')';?>
		<br />Atendido por: <?=$ETN[atendente_nome].' ('.$ETN[atendente_email].')';?>
		<br />No dia: <?=date("d/m/Y", strtotime($ETN[datahora]))?>, às <?=date("H:i:s", strtotime($ETN[datahora]))?>
	</li>[ <a class='pointer' onclick="Chat_H('<?=$ETN[id]?>', '<?=$ETN[usuario]?>', '<?=$ETN[cliente_nome]?>')">ver conversa</a> ]<br /><br />
<?}?>
