<?
header("content-type: text/html;  charset=iso-8859-1",true); 
include "setup/conec.php";
$EMAILS = Array();

if($_GET['para']=='clientes'){
	$li=0;
	$CONS = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE status LIKE 'ativo%'");
	while($USRS = mysql_fetch_array($CONS,MYSQL_ASSOC)){
		$EMAILS[$li++] = $USRS[email];
	}
}else{
	$EMAILS = explode("\n",file_get_contents("lista.txt"));
}

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: contato@atendimento.pro" . "\r\n";

$meses['01'] = "Janeiro";
$meses['02'] = "Fevereiro";
$meses['03'] = "Março";
$meses['04'] = "Abril";
$meses['05'] = "Maio";
$meses['06'] = "Junho";
$meses['07'] = "Julho";
$meses['08'] = "Agosto";
$meses['09'] = "Setembro";
$meses['10'] = "Outubro";
$meses['11'] = "Novembro";
$meses['12'] = "Dezembro";

$dia = date('d');
$mes = $meses[date('m')];
$ano = date('Y');

$MSG = "
<div style='width:400px;'>
	$dia de $mes de $ano<br/><br/>

	<a href='http://www.facebook.com/Atendimento.pro' target='_blank'><img src='http://atendimento.pro/{$_GET[imagem]}.jpg' /></a>
	
	<br/><br/>
	Atenciosamente,
	<br/>
	Equipe <b>Atendimento.pro</b><br/>
	contato@atendimento.pro<br/>
	<a href='http://www.atendimento.pro/'>www.atendimento.pro</a>
</div>
";

if($_GET[enviar]=='sim'){
	foreach($EMAILS as $n=>$email){
		if(mail($email, "Atendimento On-line para o seu site", $MSG, $headers))
			echo "$n - $email <b style='color:#090;'>[ok]</b><br />";
		else
			echo "$n - $email <b style='color:#900;'>[fail]</b><br />";
		//echo $MSG."<br /><hr /><br />";
	}
}?>
