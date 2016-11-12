<?
$verif_c = mysql_num_rows(mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE cpf='$_POST[cpf]'"));
$verif_e = mysql_num_rows(mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE email='$_POST[email]'"));
$verif_s = mysql_num_rows(mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE site='$_POST[site]'"));

if($verif_c > 0){
	echo "<h1 class='verif bold'>CPF j&aacute; est&aacute; cadastrado.</h1>";
}elseif($verif_e > 0){
	echo "<h1 class='verif bold'>E-mail j&aacute; est&aacute; cadastrado.</h1>";
}elseif($verif_s > 0){
	echo "<h1 class='verif bold'>Site j&aacute; est&aacute; cadastrado.</h1>";
}else{
	$INS_id = mysql_query("INSERT INTO {$DB_PRENOM}_usuarios (id) VALUES ('');");
	$INS_ID = mysql_insert_id();
	
	$data = date("Y-m-d");
	
	if($_FILES["logo"]['tmp_name'] && ($_FILES["logo"]['type']=="image/gif" || $_FILES["logo"]["type"]=="image/jpeg"
|| $_FILES["logo"]["type"]=="image/png" || $_FILES["logo"]["type"]=="image/pjpeg")){
	
		$arquivoNome = $_FILES["logo"]['name'];
		$arquivoExtensao = strtolower(end(explode('.',$arquivoNome)));
		
		$novoArquivo = rand(0,999)+date("hisy");

		while(file_exists("logos/$novoArquivo.$arquivoExtensao")){ $novoArquivo++; }

		$arquivoFinal = "$novoArquivo.$arquivoExtensao";

		move_uploaded_file($_FILES["logo"]['tmp_name'], "logos/$arquivoFinal");

	}
	
	mysql_query("UPDATE {$DB_PRENOM}_usuarios SET data = '$data' WHERE id = '$INS_ID';");
	if($_POST[nome]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET nome = '$_POST[nome]' WHERE id = '$INS_ID';");}
	
	if($_POST[sobrenome]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET sobrenome = '$_POST[sobrenome]' WHERE id = '$INS_ID';");}
	
	if($_POST[cpf]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET cpf = '$_POST[cpf]' WHERE id = '$INS_ID';");}
	
	if($_POST[site]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET site = '$_POST[site]' WHERE id = '$INS_ID';");}
	
	if($_POST[email]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET email = '$_POST[email]' WHERE id = '$INS_ID';");}
	
	if($_POST[senha]){
		$senha = md5($_POST[senha]);
		mysql_query("UPDATE {$DB_PRENOM}_usuarios SET senha = '$senha' WHERE id = '$INS_ID';");
	}
	
	if($_POST[telefone]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET telefone = '$_POST[telefone]' WHERE id = '$INS_ID';");}
	
	if($_POST[endereco]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET endereco = '$_POST[endereco]' WHERE id = '$INS_ID';");}
	if($_POST[bairro]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET bairro = '$_POST[bairro]' WHERE id = '$INS_ID';");}
	if($_POST[numero]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET numero = '$_POST[numero]' WHERE id = '$INS_ID';");}
	if($_POST[complemento]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET complemento = '$_POST[complemento]' WHERE id = '$INS_ID';");}
	if($_POST[cidade]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET cidade = '$_POST[cidade]' WHERE id = '$INS_ID';");}
	if($_POST[estado]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET estado = '$_POST[estado]' WHERE id = '$INS_ID';");}
	if($_POST[cep]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET cep = '$_POST[cep]' WHERE id = '$INS_ID';");}
	
	if($_POST[tipo]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET tipo = '$_POST[tipo]' WHERE id = '$INS_ID';");}
	if($_POST[periodo]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET periodo = '$_POST[periodo]' WHERE id = '$INS_ID';");}

	if($_FILES[logo]){mysql_query("UPDATE {$DB_PRENOM}_usuarios SET logo = '$arquivoFinal' WHERE id = '$INS_ID';");}

	mysql_query("UPDATE {$DB_PRENOM}_usuarios SET status = 'aguardando', botao = 'http://atendimento.pro/botoes/chat_on.png|bottom-right' WHERE id = '$INS_ID';");
	
	/*-----------------------------------------------------*/

	mysql_query("INSERT INTO {$DB_PRENOM}_atendente (id, raiz, status, tipo, setor, nome, sobrenome, email, senha) VALUES (NULL, '$INS_ID', 'desligado', 'root', '0', '$_POST[nome]', '$_POST[sobrenome]', '$_POST[email]', '$senha');");

	/*-----------------------------------------------------*/

	mysql_query("INSERT INTO {$DB_PRENOM}_setores (id, raiz, num, setor) VALUES (NULL, '$INS_ID', '0', 'Geral');");

	/*-----------------------------------------------------*/
	
	// E-MAIL CLIENTE
	
	$endereco = "$_POST[endereco] $_POST[numero] ($_POST[complemento]) , $_POST[bairro] - $_POST[cidade] ($_POST[estado]) - $_POST[cep]";
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: cadastro@atendimento.pro" . "\r\n";

	
	$dia = date('d');
	$mes = $MESES[date('m')];
	$ano = date('Y');
	
	$MSG = "
<div style='font-family:arial;font-size:12px;width:500px;text-align:center;border-radius: 10px;border:2px dashed #e2e2e2;overflow: hidden;padding: 0px 15px 20px;'>

	<div style='background-color: #efefef;width:100%;clear:both;display:block;padding: 12px 15px 8px;margin: 0 0 15px -15px;border-bottom: 2px solid #e2e2e2;'>
		<a href='$CLIENTE_URL'><img src='$CLIENTE_URL/imagens/logo.png' width='200' /></a>
	</div>
	
	<div style='clear:both;padding:0 12px;'>
		<h1>Dados do Usuário</h1>
		<br/>
		$dia de $mes de $ano<br/>
		<br/>
		<b>Olá $_POST[nome] $_POST[sobrenome]</b>,<br/>
		<br/><br/>
		Clique no link a seguir para ativar o seu cadastro:<br />
		<a href=\"$CLIENTE_URL/atendente/atv/?usi011194=".base64_encode($INS_ID)."&941110isu=".base64_encode($_POST[email])."\">Ativar Cadastro</a><br /><br />
		
		Você poderá acessar sua conta pelo link abaixo:<br />
		<a href=\"$CLIENTE_URL/atendente/\">$CLIENTE_URL/atendente/</a>
		<br/>
		Seguem abaixo os dados de acesso a sua conta do $CLIENTE_NOME:<br /><br />
		
		<b>Nome: </b>$_POST[nome] $_POST[sobrenome]<br />
		<b>E-mail: </b>$_POST[email]<br />
		<b>CPF: </b>$_POST[cpf]<br />
		<b>Senha: </b>$_POST[senha]<br />
		<b>Endereço: </b>$endereco<br />
		<b>Telefone: </b>$_POST[telefone]<br />
		<b>Site: </b>$_POST[site]
	</div>

	<div style='display:block;background-color:#262626;color:#fff;padding:12px;margin:25px 0 0;'>
		Atenciosamente,
		<br/>
		Equipe <b>$CLIENTE_NOME</b><br/>
		$CLIENTE_EMAIL<br/>
		<a style='color:#fff;' href='$CLIENTE_URL'>$CLIENTE_URL</a>
	</div>
</div>
";

	mail($_POST[email], "Dados de Cadastro - Atendimento.pro", $MSG, $headers);


	// E-MAIL ATENDE.PRO
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: $EMAIL_CADASTRO" . "\r\n";

	
	$dia = date('d');
	$mes = $MESES[date('m')];
	$ano = date('Y');
	
	$MSG = "
<div style='font-family:arial;font-size:12px;width:500px;'>

	<div style='clear:both'>
		<h1>Novo cadastro</h1>
	</div>
	
	<div style='clear:both'>
	<br/>
	$dia de $mes de $ano<br/>
	<br/>
	<b>Nome: </b>$_POST[nome] $_POST[sobrenome]<br />
	<b>E-mail: </b>$_POST[email]<br />
	<b>CPF: </b>$_POST[cpf]<br />
	<b>Senha: </b>$_POST[senha]<br />
	<b>Endereço: </b>$endereco<br />
	<b>Telefone: </b>$_POST[telefone]<br />
	<b>Período: </b>$_POST[periodo]<br />
	<b>Tipo: </b>$_POST[tipo]<br />
	<b>Site: </b>$_POST[site]
	
	<br /><br />
	Atenciosamente,
	<br/>
	Equipe <b>$CLIENTE_NOME</b><br/>
	atende.pro@gmail.com<br/>
	<a href='$CLIENTE_URL'>www.atendimento.pro</a>
	</div>
</div>
";

	mail($EMAIL_CADASTRO, "Novo cadastro - Atendimento.pro", $MSG, $headers);

	/*-----------------------------------------------------*/

	echo "<h1 class='verif bold'>Cadastrado com sucesso!</h1><br />
	<h2>Você receberá um e-mail para ativar sua conta.</h2><br />
	<a style='font-size:20px;' href='/atendente/'>clique aqui</a> para ir para tela de login.";
}
?>
