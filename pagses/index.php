<?
require "../setup/conec.php";

if($_SERVER['REQUEST_URI']){ 
	$URI = $_SERVER['REQUEST_URI'];	
	$quebra = explode('/',$URI);
	
	$ie = base64_decode(base64_decode($quebra[2]));
	$ie = $ie/712;

	$usro = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$ie'");
	$USRO = mysql_fetch_array($usro, MYSQL_ASSOC);

	if($USRO[status]=='aguardando'){
		echo "<script>location.href='/atendente/atv/?usi011194=".base64_encode($USRO[id])."&941110isu=".base64_encode($USRO[email])."';</script>";
	}elseif($USRO[status]=='suspenso'){
		$_SESSION['LOGADO_AT'] = 'YES';
		$_SESSION['PEGAA'] = $USRO[id];
		echo "<h1>bem vindo!</h1><script>location.href='/pagamentos/'</script>";
	}else{
		$_SESSION['LOGADO_AT'] = 'YES';
		$_SESSION['PEGAA'] = $USRO[id];
		echo "<h1>bem vindo!</h1><script>location.href='/atendente/'</script>";
	}

}?>