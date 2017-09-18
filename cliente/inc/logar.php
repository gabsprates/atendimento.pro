<?
$usr = (base64_decode(base64_decode($_POST[u])))/712;
$cliente_email = $_POST['cliente_email'];
$cliente_nome = $_POST['cliente_nome'];
$setor = $_POST['setor'];

$atend = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE raiz = '$usr' AND status='online' AND setor='$setor' ORDER BY RAND() LIMIT 1");
//if($cliente_email=='gabsprates@gmail.com'){echo $_SERVER['HTTP_REFERER'];}//"SELECT * FROM {$DB_PRENOM}_atendente WHERE raiz = '$usr' AND status='online' AND setor='$setor' ORDER BY RAND() LIMIT 1";}
$atendx = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE raiz = '$usr' AND status='ocupado' AND setor='$setor' ORDER BY RAND() LIMIT 1");
if(mysql_num_rows($atend)>0){
	$Atende = mysql_fetch_array($atend, MYSQL_ASSOC);

	mysql_query("INSERT INTO {$DB_PRENOM}_chat (id, datahora, usuario, status, cliente_email, cliente_nome, atendente_nome, atendente_email) VALUES (NULL, NOW(), '$usr', 'pendente', '$cliente_email', '$cliente_nome', '$Atende[nome]', '$Atende[email]');");
	$_SESSION["CLIENTE"] = "YES";
	$_SESSION["RC"] = mysql_insert_id();
	$_SESSION["IOF"] = $usr;
	echo "<script>location.href='/cliente/';</script>";
	
}elseif(mysql_num_rows($atend)<=0 && mysql_num_rows($atendx)>0){
	$Atende = mysql_fetch_array($atendx, MYSQL_ASSOC);

//	mysql_query("UPDATE {$DB_PRENOM}_atendente SET status = 'ocupado' WHERE id = '$Atende[id]'");
	
	mysql_query("INSERT INTO {$DB_PRENOM}_chat (id, datahora, usuario, status, cliente_email, cliente_nome, atendente_nome, atendente_email) VALUES (NULL, NOW(), '$usr', 'pendente' '$cliente_email', '$cliente_nome', '$Atende[nome]', '$Atende[email]');");
	$_SESSION["CLIENTE"] = "YES";
	$_SESSION["RC"] = mysql_insert_id();
	$_SESSION["IOF"] = $usr;
	echo "<script>location.href='/cliente/';</script>";

}else{
	echo "<h1>Não foi possível estabelecer conexão. Tente mais tarde.</h1>";
}

//~ Tabela 'atendimento_chat'
//~ id
//~ datahora
//~ usuario
//~ cliente_email
//~ cliente_nome
//~ atendente_nome
//~ atendente_email
?>
