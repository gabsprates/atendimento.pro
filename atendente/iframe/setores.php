<h1>Cadastro de SETORES</h1>
<br />
<?$TUIO = mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE raiz = '$ATEN[raiz]' ORDER BY num ASC");
$limite = mysql_num_rows($TUIO);
$TIPO_U = mysql_fetch_array(mysql_query("SELECT tipo FROM {$DB_PRENOM}_usuarios WHERE id = '$ATEN[raiz]'"), MYSQL_ASSOC);
$TIPO_U = $TIPO_U[tipo];

$FORM = "
<div class='left'>
	<form class='cadastro' id='form_set' onsubmit='return Setores_a();'>
		<input name='u' type='hidden' value='$ATEN[raiz]' />
		<p><span>Nome do SETOR:</span><input name='setor' /></p>

		<p><input value='criar >' type='submit' /></p>
	</form>
	<div class='both'></div>
	<div class='retorno'></div>
</div>";

echo $FORM;
?>
<div id='lista_setores'>
	<h1>Setores</h1>
	<ul>
		<?$nst = 1;
		while($SET = mysql_fetch_array($TUIO, MYSQL_ASSOC)){?>
		<li><span><?echo ($nst<10) ? "0".$nst : $nst; echo "</span> - ".$SET[setor];?> <?if(mysql_num_rows($TUIO)>1){?><img src='/atendente/imagens/cl.png' width='15' class='right pointer' onclick="Del_setor('<?=$SET[id]?>','<?=$SET[raiz]?>');" /><?}?></li>
		<?$nst++;}?>
	</ul>
</div>
<style type='text/css'>
#lista_setores{
	width:250px;
	float:left;
	margin:0 0 0 50px;
	height:350px;
	padding:0 20px 0 0;
	overflow:auto;
}
#lista_setores li{
	padding:6px 4px 6px 0;
	font-size:14px;
	float:left;
	width:100%;
}
#lista_setores li:hover{
	padding:6px 4px 6px 5px;
	background-color:#fff;
}
#lista_setores li span{
	font-weight:bold;
}
</style>

