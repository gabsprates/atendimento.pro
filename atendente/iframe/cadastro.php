<?require"../../setup/need.php";

if($_POST[nome]=='' || $_POST[sobrenome]=='' || $_POST[email]=='' || $_POST[senha]=='' || $_POST[tipo]=='' || $_POST[u]==''){
	echo "<script>$('.retorno').addClass('erro').html('Preencha os dados corretamente!');</script>";
}else{
	$verif_e = mysql_num_rows(mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE email='$_POST[email]'"));

	if($verif_e > 0){
		echo "<script>$('.retorno').addClass('erro').html('E-mail já cadastrado!');</script>";
	}else{
		$INS_id = mysql_query("INSERT INTO {$DB_PRENOM}_atendente (id) VALUES ('');");
		$INS_ID = mysql_insert_id();
		
		$nome = utf8_decode($_POST[nome]);
		$sobrenome = utf8_decode($_POST[sobrenome]);
		
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET nome = '$nome' WHERE id = '$INS_ID';");
		
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET sobrenome = '$sobrenome' WHERE id = '$INS_ID';");
		
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET email = '$_POST[email]' WHERE id = '$INS_ID';");
		
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET tipo = '$_POST[tipo]' WHERE id = '$INS_ID';");
		
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET setor = '$_POST[setor]' WHERE id = '$INS_ID';");
		
		$senha = md5($_POST[senha]);
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET senha = '$senha' WHERE id = '$INS_ID';");
		
		mysql_query("UPDATE {$DB_PRENOM}_atendente SET status = 'desligado', raiz = '$_POST[u]' WHERE id = '$INS_ID';");
		
		echo "<script>$('.retorno').addClass('sucesso').html('Cadastrado com sucesso!');</script>";
	}
}?>
