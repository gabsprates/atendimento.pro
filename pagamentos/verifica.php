<?
// session_start(); header("content-type: text/html;  charset=iso-8859-1",true); 
//  require('../setup/conec.php'); 

// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $headers .= 'From: contato@atendimento.pro' . "\r\n";

// $meses['01'] = "Janeiro";
// $meses['02'] = "Fevereiro";
// $meses['03'] = "Março";
// $meses['04'] = "Abril";
// $meses['05'] = "Maio";
// $meses['06'] = "Junho";
// $meses['07'] = "Julho";
// $meses['08'] = "Agosto";
// $meses['09'] = "Setembro";
// $meses['10'] = "Outubro";
// $meses['11'] = "Novembro";
// $meses['12'] = "Dezembro";

// $dia = date('d');
// $mes = $meses[date('m')];
// $ano = date('Y');

// $COBRANCA_TITULO = "Atendimento.pro - Fatura $mes";
// $COBRANCA2_TITULO = "Atendimento.pro - 2ª via Cobrança $mes";
// $SUSPENSAO_TITULO = "Atendimento.pro - Aviso de suspensão de serviço";

// // Emitindo Faturas de clientes / mensal / semestral /anual

// 	$Usuario = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE status='ativo' AND id=''");
// 	while($p = mysql_fetch_array($Usuario,MYSQL_ASSOC)){
// 		if(date('d', strtotime($p[data]))==date("d")){
// 			if($p[periodo] == 'mensal' || ($p[periodo] == 'anual' && date('m', strtotime($p[data]))==date("m")) || ($p[periodo]) == 'semestral' && ((date('m', strtotime($p[data]))==date("m")) || ((date('m', strtotime($p[data]))+6)==date("m")) || ((date('m', strtotime($p[data]))-6)==date("m")))){
			
// 					$Conx = mysql_query("SELECT * FROM {$DB_PRENOM}_faturas WHERE pedido='$p[id]' AND cadastro='".date('Y-m-d')."'");
// 				if(!is_array(mysql_fetch_array($Conx,MYSQL_ASSOC))) {
// 					mysql_query("INSERT INTO {$DB_PRENOM}_faturas (cadastro, cliente, pedido, preco, status) VALUES ('".date('Y-m-d')."', '$v[id]', '$p[id]', '$p[preco]', 'aguardando')");
// 					$transacao = mysql_insert_id();
// 					$boleto = "http://hos.tf/fatura/".($transacao*555);


// 					$COBRANCA_MSG = "
// <div style='font-family:arial;font-size:12px;width:500px;'>

// 	<div style='clear:both'>
// 		<a href='http://hostfacil.co/'><img src='http://hos.tf/imagens/logo.png' width='200' /></a>
// 		<br/><Br/>
// 		<h1>Cobrança Hospedagem</h1>
// 	</div>
	
// 	<div style='clear:both'>
// 	<br/>
// 	$dia de $mes de $ano<br/>
// 	<br/>
// 	<b>$v[nome]</b>,<br/>
// 	<br/>
// 	Segue abaixo a fatura para pagamento da hospedagem do seu site ($p[dominio]), sob administração da Atendimento.pro.<br/><br/>
	
// 		<a href=\"$boleto\"><b>GERAR FATURA</b></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
// 		( link: $boleto )

// 	<br/><br/>
// 	Mantenha sempre os pagamentos de sua hospedagem em dia para o pleno funcionamento da mesma.<br/><br/>
// 	A HostFácil agradece a sua parceria e confiança. Um abraço!<br/>
// 	<br/><br/>
// 	Atenciosamente,
// 	<br/>
// 	Equipe <b>Atendimento.pro</b><br/>
// 	contato@atendimento.pro<br/>
// 	<a href='http://www.atendimento.pro/'>www.atendimento.pro</a>
// 	</div>
// </div>
// ";

// //					mail($v[email], $COBRANCA_TITULO, $COBRANCA_MSG, $headers);
// 				}
// 			}
			
// 		}
// 	}

// die();
// // Emitindo 2ª via

// 	$Conex = mysql_query("SELECT * FROM {$DB_PRENOM}_faturas WHERE TO_DAYS(cadastro) < TO_DAYS(NOW())-9 AND (status = 'aguardando' OR status = 'emitido')");
// 	while($v = mysql_fetch_array($Conex,MYSQL_ASSOC)){
		
// 	$Pedido = mysql_query("SELECT * FROM {$DB_PRENOM}_pedidos WHERE id='$v[pedido]'");
// 	$p = mysql_fetch_array($Pedido,MYSQL_ASSOC);

// 	$Conex2 = mysql_query("SELECT * FROM {$DB_PRENOM}_clientes WHERE id='$v[cliente]'");
// 	$Usuario = mysql_fetch_array($Conex2,MYSQL_ASSOC);

// 		mysql_query("UPDATE {$DB_PRENOM}_faturas SET cadastro='".date('Y-m-d')."', status='2via' WHERE id='$v[id]'");
// 		$transacao = $v[id];
// 		$boleto = "http://hos.tf/fatura/".($transacao*555);


// $COBRANCA2_MSG = "
// <div style='font-family:arial;font-size:12px;width:500px;'>

// 	<div style='clear:both'>
// 		<a href='http://hostfacil.co/'><img src='http://hos.tf/imagens/logo.png' width='200' /></a>
// 		<br/><Br/>
// 		<h1>Reemissão de Cobrança</h1>
// 	</div>
	
// 	<div style='clear:both'>
// 	<br/>
// 	$dia de $mes de $ano<br/>
// 	<br/>
// 	<b>$Usuario[nome]</b>,<br/>
// 	<br/>
// 	Até o momento não registramos em nosso sistema o pagamento de hospedagem ({$p[dominio]}) referente ao mês de $mes.<Br/>
// 	Segue abaixo 2ª via da fatura para pagamento da hospedagem do seu site.<br/><br/>

// 		<a href=\"$boleto\"><b>GERAR FATURA</b></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
// 		( link: $boleto )<br/>


// 	<br/>
// 	Mantenha sempre os pagamentos de sua hospedagem em dia para o pleno funcionamento da mesma.<br/><br/>
// 	A HostFácil agradece a sua parceria e confiança. Um abraço!<br/>
// 	<br/><br/>
// 	Atenciosamente,
// 	<br/>
// 	Equipe <b>HostFácil</b><br/>
// 	suporte@hostfacil.co<br/>
// 	<a href='http://www.hostfacil.co/'>www.hostfacil.co</a>

// 	</div>
// </div>
// ";
// 			mail($Usuario[email], $COBRANCA2_TITULO, $COBRANCA2_MSG, $headers);
// 	}

// // Aviso de Suspensão de Serviço

// 	$Conex = mysql_query("SELECT * FROM {$DB_PRENOM}_faturas WHERE TO_DAYS(cadastro) < TO_DAYS(NOW())-9 AND status = '2via'");
// 	while($v = mysql_fetch_array($Conex,MYSQL_ASSOC)){ 
// 		mysql_query("UPDATE {$DB_PRENOM}_faturas SET cadastro='".date('Y-m-d')."', status='suspenso' WHERE id='$v[id]'");
// 		mysql_query("UPDATE {$DB_PRENOM}_faturas SET cadastro='".date('Y-m-d')."', status='suspenso' WHERE id='$v[id]'");

// 		$Pedido = mysql_query("SELECT * FROM {$DB_PRENOM}_pedidos WHERE id='$v[pedido]'");
// 		$p = mysql_fetch_array($Pedido,MYSQL_ASSOC);


// 		$Conex2 = mysql_query("SELECT * FROM {$DB_PRENOM}_clientes WHERE id='$v[cliente]'");
// 		$Usuario = mysql_fetch_array($Conex2,MYSQL_ASSOC);


// $SUSPENSAO_MSG = "
// <div style='font-family:arial;font-size:12px;width:500px;'>

// 	<div style='clear:both'>
// 		<a href='http://hostfacil.co/'><img src='http://hos.tf/imagens/logo.png' width='200' /></a>
// 		<br/><Br/>
// 		<h1>Suspensão de Serviço</h1>
// 	</div>
	
// 	<div style='clear:both'>
// 	<br/>
// 	$dia de $mes de $ano<br/>
// 	<br/>
// 	<b>$Usuario[nome] ({$p[dominio]})</b>,<br/>
// 	<br/>
// 	Até o momento não registramos em nosso sistema o pagamento de hospedagem (do domínio {$p[dominio]}) referente ao mês de $mes.<Br/>
// 	Por este motivo informamos que o serviço de hospedagem do seu site será suspenso até confirmação do pagamento do mesmo.<br/><br/>
// 	A HostFácil agradece a sua compreensão...<br/>
// 	<br/><br/>
// 	Atenciosamente,
// 	<br/>
// 	Equipe <b>HostFácil</b><br/>
// 	suporte@hostfacil.co<br/>
// 	<a href='http://www.hostfacil.co/'>www.hostfacil.co</a>

// 	</div>
// </div>
// ";
// 			mail($Usuario[email], $SUSPENSAO_TITULO, $SUSPENSAO_MSG, $headers.'Bcc: financeiro@hostfacil.co');
// 	}



// // Enviando 2ª via p/ clientes que não emitiram pagamento

// 	$Conex = mysql_query("SELECT * FROM {$DB_PRENOM}_faturas WHERE TO_DAYS(cadastro) = TO_DAYS(NOW())-1 AND status = 'aguardando'");
// 	while($v = mysql_fetch_array($Conex,MYSQL_ASSOC)){

// 	$Conex3 = mysql_query("SELECT * FROM {$DB_PRENOM}_pedidos WHERE id='$v[pedido]'");
// 	$Pedido = mysql_fetch_array($Conex3,MYSQL_ASSOC);

// 	$Conex2 = mysql_query("SELECT * FROM {$DB_PRENOM}_clientes WHERE id='$v[cliente]'");
// 	$Usuario = mysql_fetch_array($Conex2,MYSQL_ASSOC);
	
// 	if($Pedido[status]=='pendente'){

// 		//mysql_query("UPDATE {$DB_PRENOM}_faturas SET cadastro='".date('Y-m-d')."', status='2via' WHERE id='$v[id]'");
// 		$transacao = $v[id];
// 		$boleto = "http://hos.tf/fatura/".($transacao*555);


// $CUTUCA_MSG = "
// <div style='font-family:arial;font-size:12px;width:500px;'>

// 	<div style='clear:both'>
// 		<a href='http://hostfacil.co/'><img src='http://hos.tf/imagens/logo.png' width='200' /></a>
// 		<br/><Br/>
// 		<h1>Bem vindo a HostFácil!</h1>
// 	</div>
	
// 	<div style='clear:both'>
// 	<br/>
// 	$dia de $mes de $ano<br/>
// 	<br/>
// 	Olá,
// 	<b>$Usuario[nome]</b>,<br/>
// 	<br/>
// 	Verificamos no sistema que você fez sua assinatura em nosso servidor, mas não optou por uma forma de pagamento.<br/>
// 	Caso tenha alguma dúvida, ou dificuldade, não hesite em nos perguntar. Nossa equipe terá muita satisfação em ajuda-lo<br/><br/>
// 	Para emitir a sua fatura, clique no link abaixo:<br/><br/>

// 		<a href=\"$boleto\"><b>GERAR FATURA</b></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
// 		( link: $boleto )<br/>


// 	<br/>
// 	A HostFácil agradece a sua parceria e confiança. Um abraço!<br/>
// 	<br/><br/>
// 	Atenciosamente,
// 	<br/>
// 	Equipe <b>HostFácil</b><br/>
// 	suporte@hostfacil.co<br/>
// 	<a href='http://www.hostfacil.co/'>www.hostfacil.co</a>

// 	</div>
// </div>
// ";
// 			mail($Usuario[email], 'Conclusão de Cadastro', $CUTUCA_MSG, $headers."\r\n Bcc: suporte@hostfacil.co");
// 	}
// 	}
?>
