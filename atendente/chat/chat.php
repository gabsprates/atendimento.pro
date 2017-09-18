<?require"../../setup/need.php";

$idc = $_POST[idc];
$usc = $_POST[usc];

$CON = mysql_query("SELECT * FROM {$DB_PRENOM}_chat WHERE id = '$idc' AND usuario = '$usc' LIMIT 1");
$TEXT = mysql_fetch_array($CON, MYSQL_ASSOC);

if($_POST[acao]=='inserir'){
	$INS_id = mysql_query("INSERT INTO {$DB_PRENOM}_mensagens (id) VALUES ('');");
	$INS_ID = mysql_insert_id();

	$texto = utf8_decode($_POST[msg]);

	mysql_query("UPDATE {$DB_PRENOM}_mensagens SET datahora = NOW() WHERE id = '$INS_ID';");

	mysql_query("UPDATE {$DB_PRENOM}_mensagens SET texto = '$texto' WHERE id = '$INS_ID';");

	mysql_query("UPDATE {$DB_PRENOM}_mensagens SET status = '', quem = 'atendente', raiz = '$idc' WHERE id = '$INS_ID';");

	mysql_query("UPDATE {$DB_PRENOM}_chat SET status = 'andamento' WHERE id = '$TEXT[id]';");?>
	
	<li class='atendente'><span><?=date('d/m/Y H:i:s').' - '.$TEXT[atendente_nome].' ( Atendente )</span><br />'.str_replace('\"','"',str_replace("\'","'",$texto))?></li>

<?}elseif($_POST[acao]=='atualizar'){
	$con = mysql_query("SELECT * FROM {$DB_PRENOM}_mensagens WHERE raiz = '$idc' ORDER BY datahora ASC");
	while($texts = mysql_fetch_array($con, MYSQL_ASSOC)){
		if($texts[quem]=='cliente'){$QUEM = $TEXT[cliente_nome];}elseif($texts[quem]=='atendente'){$QUEM = $TEXT[atendente_nome].' ( Atendente )';}?>
		<li class='<?=$texts[quem]?>'><span><?=date("d/m/Y H:i:s", strtotime($texts[datahora])).' - '.$QUEM."</span><br />".$texts[texto]?></li>
	<?}
}
//~ TABELA atendimento_mensagens
//~ id
//~ datahora
//~ raiz
//~ status
//~ quem
//~ texto

//~ Tabela 'atendimento_chat'
//~ id
//~ datahora
//~ usuario
//~ cliente_email
//~ cliente_nome
//~ atendente_nome
//~ atendente_email
?>