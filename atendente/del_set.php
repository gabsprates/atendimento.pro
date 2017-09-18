<?require"../setup/need.php";

$raiz = $_POST[u];
$qual = $_POST[i];

$num = mysql_fetch_array(mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE id = '$qual'"));
$num1 = $num[num];
$NUM = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE setor = '$num1' AND raiz = '$raiz'");
if(mysql_num_rows($NUM)>0){
	$PEGA_S = mysql_fetch_array(mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE raiz = '$raiz' AND num != '$num1' ORDER BY num ASC LIMIT 1"),MYSQL_ASSOC);
	$substituto = $PEGA_S[num];
echo "<b> - $substituto</b>";
	mysql_query("UPDATE {$DB_PRENOM}_atendente SET setor = '$substituto' WHERE setor='$num1' && raiz='$raiz'");
}

mysql_query("DELETE FROM {$DB_PRENOM}_setores WHERE id='{$_POST[i]}'");
echo "<script>$('.retorno').addClass('sucesso').html('Deletado com sucesso!');</script>";

//----------------------------------------

$SETS = mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE raiz = '$raiz' ORDER BY num ASC");
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
?>
