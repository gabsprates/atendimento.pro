<ul class='listar_chats' id='l01'>
<?
$email = $ATEN[email];
$raiz = $ATEN[raiz];

/*
$con = mysql_query("SELECT * FROM {$DB_PRENOM}_chat WHERE usuario ='$raiz' AND atendente_email ='$email' ORDER BY datahora DESC");
while($chats = mysql_fetch_array($con, MYSQL_ASSOC)){
	if($chats[status]=='pendente'){?>
		<li class='pointer' onclick="Chat('<?=$chats[id]?>', '<?=$chats[usuario]?>');"><?=$chats[cliente_nome]?></li>
	<?}else{?>
		<li><?=$chats[cliente_nome]?></li>
	<?}?>
<?}
*/
?>
<h1>Aguarde...</h1>
</ul>
<script>
var bInt = setInterval(Atlz, 5000);
function Atlz(){
	clearInterval(bInt);
	bInt = setInterval(Atlz,5000);
	
	var email = '<?=$email?>';
	var raiz = '<?=$raiz?>';
	$.post('iframe/chats.php',{email: email, raiz: raiz}, function(retorno){
		$("#l01").html(retorno);
	});
}
</script>
