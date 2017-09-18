<?
	//~ tipo
	//~ nome
	//~ sobrenome
	//~ email
	//~ senha
?>
<h1>Listar Atendentes</h1>
<br />
<?$TIPO = array('root'=>'<b>Administrador</b>','atendente'=>'Atendente');?>
<ul id='historico_atendentes'>
	<?$con = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE raiz = '$ATEN[raiz]'");
	while($atd = mysql_fetch_array($con, MYSQL_ASSOC)){
		$TUS = mysql_fetch_array(mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE id = '$atd[setor]'"), MYSQL_ASSOC);?>
	<li class='list_atendentes' id='atnd_<?=$atd[id]?>' onclick="Edit_A('<?=$atd[email]."','".$atd[id]?>');"><?=$atd[nome].' '.$atd[sobrenome]?></li>
	<?}
/*
 (<?=$atd[email]?>) - <?=$TIPO[$atd[tipo]]?> - Setor: <?if($atd[setor]!=0){echo $TUS[setor];}else{echo'Geral';}?>
*/
	?>
</ul>

<script>
$('.list_atendentes').click(function(){
	$('.list_atendentes').css({"background-color":"#fff","text-align":"left"});
	$(this).css({"background-color":"#ddd","text-align":"right"});
});
function Edit_A(e,u){
	$('#editar_atn').html("<div style='background:url(imagens/sh.png) top left repeat;position:absolute;top:0;left:0;width:100%;height:100%;'><img src='imagens/loader.gif' style='position:absolute;top:50%;left:50%;width:40px;margin:-20px 0 0 -20px;' /></div>");

	$.post('./editar_atn.php',{e:e,u:u},function(retorno){
		$('#editar_atn').html(retorno);
	});
}
</script>
<div id='editar_atn'>
</div>