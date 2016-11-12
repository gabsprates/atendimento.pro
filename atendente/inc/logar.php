<?
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$con = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE email = '$email'");
$eita = mysql_fetch_array($con, MYSQL_ASSOC);

if(mysql_num_rows($con)!=0){
	if($eita[senha]!=$senha){
		echo "<h1>senha incorreta! <a style='font-size:20px;' href='/atendente/'>clique aqui</a> para voltar ao login.</h1>";
	}else{
		$cont = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$eita[raiz]'");
		$eitay = mysql_fetch_array($cont, MYSQL_ASSOC);

		if($eitay[status]=='aguardando'){
			echo "<script>location.href='/atendente/atv/?usi011194=".base64_encode($eitay[id])."&941110isu=".base64_encode($eitay[email])."';</script>";
		}elseif($eitay[status]=='suspenso'){
			$_SESSION['LOGADO_AT'] = 'YES';
			$_SESSION['PEGAA'] = $eita[id];
			echo "<h1>bem vindo!</h1><script>location.href='/pagamentos/'</script>";
		}elseif($eitay[status]=='cinco_dias'){
			$_SESSION['LOGADO_AT'] = 'YES';
			$_SESSION['PEGAA'] = $eita[id];
			echo "<h1>Sua conta está congelada até que o pagamento seja liberado.<br /><br />Att,<br />Atendimento.pro</h1><br /><p>Caso ainda não tenha efetuado o pagamento, <a href='/pagamentos/'>clique aqui para fazê-lo</a>.</p>";
		}else{
			$_SESSION['LOGADO_AT'] = 'YES';
			$_SESSION['PEGAA'] = $eita[id];
			mysql_query("UPDATE {$DB_PRENOM}_atendente SET status = 'online' WHERE id = '$eita[id]'");
			echo "<h1>bem vindo!</h1><script>location.href='/atendente/'</script>";
		}
	}
}else{
	echo "<h1>nenhum usuário cadastrado com esse e-mail. <a style='font-size:20px;' href='/atendente/'>clique aqui</a> para voltar ao login.</h1>";
}
?>
