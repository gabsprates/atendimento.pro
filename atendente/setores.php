<?require"../setup/need.php";

if($_POST[setor]==''){
	echo "<script>$('.retorno').addClass('erro').html('Preencha os dados corretamente!');</script>";
}else{
	$INS_id = mysql_query("INSERT INTO {$DB_PRENOM}_setores (id) VALUES ('');");
	$INS_ID = mysql_insert_id();
	
	$setor = utf8_decode($_POST[setor]);
	
	$PEGA_NUM = mysql_fetch_array(mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE raiz = '$_POST[u]' ORDER BY num DESC LIMIT 1"),MYSQL_ASSOC);
	$num = $PEGA_NUM[num]+1;

	mysql_query("UPDATE {$DB_PRENOM}_setores SET setor = '$setor', num = $num, raiz = '$_POST[u]' WHERE id = '$INS_ID';");
	
	echo "<script>$('.retorno').addClass('sucesso').html('Cadastrado com sucesso!');</script>";

//----------------------------------------

	$SETS = mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE raiz = '$_POST[u]' ORDER BY num ASC");
	$num_rows = mysql_num_rows($SETS);
	$nst = 1;
	$list_st = "";
	while($SET = mysql_fetch_array($SETS, MYSQL_ASSOC)){
		$nST = ($nst<10) ? "0".$nst : $nst;
		$del="";
		if($num_rows>1){
			$del = "<img src='/atendente/imagens/cl.png' width='15' class='right pointer' onclick=Del_setor('$SET[id]','$SET[raiz]'); />";
		}
		$list_st .= "<li><span>".$nST."</span> - ".$SET[setor]."".$del."</li>";
		$nst++;
	}
	echo "<script>$('#lista_setores ul').html(\"{$list_st}\");</script>";
}?>
