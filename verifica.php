<?
header("content-type: text/html;  charset=iso-8859-1",true); 
require('setup/conec.php');

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: suporte@atendimento.pro' . "\r\n";

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


/*------------------------- USUÁRIOS FREE -----------------------*/
$Usuario = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE status='ativofree'");
while($p = mysql_fetch_array($Usuario,MYSQL_ASSOC)){
	if( date("Y-m-d", strtotime($p[data])) == date("Y-m-d",strtotime("-7 days")) ){
		$daTA = date("Y-m-d");

		mysql_query("UPDATE {$DB_PRENOM}_usuarios SET status='suspenso', expira='$daTA' WHERE id='$p[id]'");
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET status='desligado' WHERE raiz='$p[id]'");
		
		$IDES = ($p[id])*712;
		$Id_c = base64_encode(base64_encode($IDES));

		$COBRANCA_MSG = "
<div style='font-family:arial;font-size:12px;width:500px;text-align:center;border-radius: 10px;border:2px dashed #e2e2e2;overflow: hidden;padding: 0px 15px 20px;'>

	<div style='background-color: #efefef;width:100%;clear:both;display:block;padding: 12px 15px 8px;margin: 0 0 15px -15px;border-bottom: 2px solid #e2e2e2;'>
		<a href='$CLIENTE_URL'><img src='$CLIENTE_URL/imagens/logo.png' width='200' /></a>
	</div>
	
	<div style='clear:both'>
	<h1>Cobrança Plano de Atendimento</h1>
	<br/>
	$dia de $mes de $ano<br/>
	<br/>
	<b>Olá $p[nome] $p[sobrenome]</b>,<br/>
	<br/>
	Hoje faz 1 semana que você está conosco. Obrigado! Gostaríamos de pedir sua opinião sobre como podemos melhorar o sistema, respondendo este e-mail ou no Fale Conosco do nosso site.<br />
	Hoje também expira a sua utilização grátis do sistema, para utilizá-lo novamente, clique no link abaixo para efetuar o  pagamento do plano de atendimento online do seu site ($p[site]).<br/><br/>
	
		<a href=\"$CLIENTE_URL/atendente/\"><b>GERAR FATURA</b></a> (Faça seu login)

	<br/><br/>
	Mantenha sempre os pagamentos em dia para o pleno funcionamento da seu sistema.<br/><br/>
	O Atendimento.pro agradece a sua parceria e confiança. Um abraço!<br/>
	<br/><br/>
	Atenciosamente,
	<br/>
	Equipe <b>Atendimento.pro</b><br/>
	$CLIENTE_EMAIL<br/>
	<a href='$CLIENTE_URL'>www.atendimento.pro</a>
	</div>
</div>
";

					mail($p[email], "Cobrança Atendimento.pro", $COBRANCA_MSG, $headers);
	}
}

/*------------------------- USUÁRIOS FREE -----------------------*/


/*------------------------ AGUARDANDO -----------------------*/
$Usuario = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE status LIKE 'agd%'");
while($p = mysql_fetch_array($Usuario,MYSQL_ASSOC)){
	$nistatus = explode("_",$p[status]);
	if($nistatus[1]>3){
		$daTA = date("Y-m-d");
		mysql_query("UPDATE {$DB_PRENOM}_usuarios SET status='suspenso', expira='$daTA' WHERE id='$p[id]'");
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET status='desligado' WHERE raiz='$p[id]'");
	}else{
		$nistatus[1]++;
		$stts = $nistatus[0].'_'.$nistatus[1];
		mysql_query("UPDATE {$DB_PRENOM}_usuarios SET status='$stts' WHERE id='$p[id]'");
	}
}
/*------------------------ AGUARDANDO -----------------------*/




/*------------------------- COBRANÇAS -----------------------*/
/*------------------------- COBRANÇAS -----------------------*/
/*------------------------- COBRANÇAS -----------------------*/


$Usuario = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE status='ativo'");

/*------------------------- MENSAL -----------------------*/
while($p = mysql_fetch_array($Usuario,MYSQL_ASSOC)){
	if ( (date("Y-m-d", strtotime($p[expira]))==date("Y-m-d")) && $p[periodo]=='mensal' ) {
		$daTA = date("Y-m-d", strtotime("+1 month"));

		mysql_query("UPDATE {$DB_PRENOM}_usuarios SET status='suspenso', expira='$daTA' WHERE id='$p[id]'");
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET status='desligado' WHERE raiz='$p[id]'");
		
		$IDES = ($p[id])*712;
		$Id_c = base64_encode(base64_encode($IDES));

		$COBRANCA_MSG = "
<div style='font-family:arial;font-size:12px;width:500px;text-align:center;border-radius: 10px;border:2px dashed #e2e2e2;overflow: hidden;padding: 0px 15px 20px;'>

	<div style='background-color: #efefef;width:100%;clear:both;display:block;padding: 12px 15px 8px;margin: 0 0 15px -15px;border-bottom: 2px solid #e2e2e2;'>
		<a href='$CLIENTE_URL'><img src='$CLIENTE_URL/imagens/logo.png' width='200' /></a>
	</div>
	
	<div style='clear:both'>
	<h1>Cobrança Plano de Atendimento</h1>
	<br/>
	$dia de $mes de $ano<br/>
	<br/>
	<b>Olá $p[nome] $p[sobrenome]</b>,<br/>
	<br/>
	Hoje completam mais 1 mês que você está conosco. Obrigado! <br />
	Gostaríamos de informar que sua licença expirou, para utilizar o sistema novamente, clique no link abaixo para efetuar o  pagamento do plano de atendimento online do seu site ($p[site]).<br/><br/>
	
		<a href=\"$CLIENTE_URL/atendente/\"><b>GERAR FATURA</b></a> (Faça seu login)

	<br/><br/>
	Mantenha sempre os pagamentos em dia para o pleno funcionamento da seu sistema.<br/><br/>
	O Atendimento.pro agradece a sua parceria e confiança. Um abraço!<br/>
	<br/><br/>
	Atenciosamente,
	<br/>
	Equipe <b>Atendimento.pro</b><br/>
	$CLIENTE_EMAIL<br/>
	<a href='$CLIENTE_URL'>www.atendimento.pro</a>
	</div>
</div>
";
		mail($p[email], "Cobrança Atendimento.pro", $COBRANCA_MSG, $headers);
	}







/*------------------------- SEMESTRAL -----------------------*/
	if ( (date("Y-m-d", strtotime($p[expira]))==date("Y-m-d")) && $p[periodo]=='semestral' ) {
		$daTA = date("Y-m-d", strtotime("+6 months"));
		
		mysql_query("UPDATE {$DB_PRENOM}_usuarios SET status='suspenso', expira='$daTA' WHERE id='$p[id]'");
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET status='desligado' WHERE raiz='$p[id]'");
		
		$IDES = ($p[id])*712;
		$Id_c = base64_encode(base64_encode($IDES));

		$COBRANCA_MSG = "
<div style='font-family:arial;font-size:12px;width:500px;text-align:center;border-radius: 10px;border:2px dashed #e2e2e2;overflow: hidden;padding: 0px 15px 20px;'>

	<div style='background-color: #efefef;width:100%;clear:both;display:block;padding: 12px 15px 8px;margin: 0 0 15px -15px;border-bottom: 2px solid #e2e2e2;'>
		<a href='$CLIENTE_URL'><img src='$CLIENTE_URL/imagens/logo.png' width='200' /></a>
	</div>
	
	<div style='clear:both'>
	<h1>Cobrança Plano de Atendimento</h1>
	<br/>
	$dia de $mes de $ano<br/>
	<br/>
	<b>Olá $p[nome] $p[sobrenome]</b>,<br/>
	<br/>
	Hoje completam mais 6 meses que você está conosco. Obrigado! <br />
	Gostaríamos de informar que sua licença expirou, para utilizar o sistema novamente, clique no link abaixo para efetuar o  pagamento do plano de atendimento online do seu site ($p[site]).<br/><br/>
	
		<a href=\"$CLIENTE_URL/atendente/\"><b>GERAR FATURA</b></a> (Faça seu login)

	<br/><br/>
	Mantenha sempre os pagamentos em dia para o pleno funcionamento da seu sistema.<br/><br/>
	O Atendimento.pro agradece a sua parceria e confiança. Um abraço!<br/>
	<br/><br/>
	Atenciosamente,
	<br/>
	Equipe <b>Atendimento.pro</b><br/>
	$CLIENTE_EMAIL<br/>
	<a href='$CLIENTE_URL'>www.atendimento.pro</a>
	</div>
</div>
";
		mail($p[email], "Cobrança Atendimento.pro", $COBRANCA_MSG, $headers);
	}







/*------------------------- ANUAL -----------------------*/
	if ( (date("Y-m-d", strtotime($p[expira]))==date("Y-m-d")) && $p[periodo]=='anual' ) {
		$daTA = date("Y-m-d", strtotime("+1 year"));
		
		mysql_query("UPDATE {$DB_PRENOM}_usuarios SET status='suspenso', expira='$daTA' WHERE id='$p[id]'");
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET status='desligado' WHERE raiz='$p[id]'");
		
		$IDES = ($p[id])*712;
		$Id_c = base64_encode(base64_encode($IDES));

		$COBRANCA_MSG = "
<div style='font-family:arial;font-size:12px;width:500px;text-align:center;border-radius: 10px;border:2px dashed #e2e2e2;overflow: hidden;padding: 0px 15px 20px;'>

	<div style='background-color: #efefef;width:100%;clear:both;display:block;padding: 12px 15px 8px;margin: 0 0 15px -15px;border-bottom: 2px solid #e2e2e2;'>
		<a href='$CLIENTE_URL'><img src='$CLIENTE_URL/imagens/logo.png' width='200' /></a>
	</div>
	
	<div style='clear:both'>
	<h1>Cobrança Plano de Atendimento</h1>
	<br/>
	$dia de $mes de $ano<br/>
	<br/>
	<b>Olá $p[nome] $p[sobrenome]</b>,<br/>
	<br/>
	Hoje completam mais 1 ano que você está conosco. Obrigado! <br />
	Gostaríamos de informar que sua licença expirou, para utilizar o sistema novamente, clique no link abaixo para efetuar o  pagamento do plano de atendimento online do seu site ($p[site]).<br/><br/>
	
		<a href=\"$CLIENTE_URL/atendente/\"><b>GERAR FATURA</b></a> (Faça seu login)

	<br/><br/>
	Mantenha sempre os pagamentos em dia para o pleno funcionamento da seu sistema.<br/><br/>
	O Atendimento.pro agradece a sua parceria e confiança. Um abraço!<br/>
	<br/><br/>
	Atenciosamente,
	<br/>
	Equipe <b>Atendimento.pro</b><br/>
	$CLIENTE_EMAIL<br/>
	<a href='$CLIENTE_URL'>www.atendimento.pro</a>
	</div>
</div>
";
		mail($p[email], "Cobrança Atendimento.pro", $COBRANCA_MSG, $headers);
	}
}

?>
