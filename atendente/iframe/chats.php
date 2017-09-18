<?require "../../setup/need.php";
$email = $_POST[email];
$raiz = $_POST[raiz];
if($_POST[status])
	$status = "AND status {$_POST[status]}";
else
	$status = "";

$con = mysql_query("SELECT * FROM {$DB_PRENOM}_chat WHERE usuario = '$raiz' AND atendente_email = '$email' {$status} ORDER BY datahora DESC");

if(mysql_num_rows($con)==0) echo "<h1>Nenhum atendimento pendente.</h1>";

while($chats = mysql_fetch_array($con, MYSQL_ASSOC)){
	if($chats[status]=='pendente'){?>
		<li class='pointer chats_<?=$chats[id].'_'.$chats[usuario]?>'><span style='width:85%;display:block;float:left;' onclick="Chat('<?=$chats[id]?>', '<?=$chats[usuario]?>', '<?=$chats[cliente_nome]?>');"><?=$chats[cliente_nome]?></span><img src='imagens/cok.png' title='Finalizar' onclick="Cok('<?=$chats[id]?>', '<?=$chats[usuario]?>');" /></li>
		<script>Alert('<?=$chats[id]?>', '<?=$chats[usuario]?>');</script>
	<?}elseif($chats[status]=='andamento'){?>
		<li class='pointer andamento chats_<?=$chats[id].'_'.$chats[usuario]?>'><span style='width:85%;display:block;float:left;' onclick="Chat('<?=$chats[id]?>', '<?=$chats[usuario]?>', '<?=$chats[cliente_nome]?>');"><?=$chats[cliente_nome]?></span><img src='imagens/cok.png' title='Finalizar' onclick="Cok('<?=$chats[id]?>', '<?=$chats[usuario]?>');" /></li>
		<script>Alert('<?=$chats[id]?>', '<?=$chats[usuario]?>');</script>
	<?}elseif($chats[status]=='fincli'){?>
		<li title='Finalizado pelo Cliente' class='pointer fincli chats_<?=$chats[id].'_'.$chats[usuario]?>'><span style='width:85%;display:block;float:left;' onclick="Chat('<?=$chats[id]?>', '<?=$chats[usuario]?>', '<?=$chats[cliente_nome]?>');"><?=$chats[cliente_nome]?></span><img src='imagens/cok.png' title='Finalizar' onclick="Cok('<?=$chats[id]?>', '<?=$chats[usuario]?>');" /></li>
	<?}else{?>
		<li><?=$chats[cliente_nome]?></li>
	<?}?>
<?}?>
