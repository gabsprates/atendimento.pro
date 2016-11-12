<?
$u = base64_decode($_GET['usi011194']);
$e = base64_decode($_GET['941110isu']);

$con = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$u' AND email = '$e' AND status = 'aguardando'");
if(mysql_num_rows($con)>0){
	mysql_query("UPDATE {$DB_PRENOM}_usuarios SET status = 'ativofree' WHERE id = '$u';");

	$conx = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE raiz = '$u' AND email = '$e' LIMIT 1");
	$eita = mysql_fetch_array($conx, MYSQL_ASSOC);

	$_SESSION['LOGADO_AT'] = 'YES';
	$_SESSION['PEGAA'] = $eita[id];
	mysql_query("UPDATE {$DB_PRENOM}_atendente SET status = 'online' WHERE id = '$eita[id]'");
	echo "<h1 class='verif bold'>Cadastrado com sucesso!</h1><br /><p>Aguarde at&eacute; ser redirecionado.</p><script>location.href='/atendente/'</script>";
}else{
	echo "<h1 class='verif bold'>Usuário já cadastrado!</h1><br /><p>Aguarde at&eacute; ser redirecionado.</p><script>location.href='/atendente/'</script>";
}
?>
