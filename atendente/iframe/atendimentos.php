<?
	//~ tipo
	//~ nome
	//~ sobrenome
	//~ email
	//~ senha
?>
<h1>Listar Atendimentos</h1>
<br />
<ul id='historico_atendentes'>
	<?$COK = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE raiz = '$ATEN[raiz]'");
	while($ATDY = mysql_fetch_array($COK, MYSQL_ASSOC)){?>
		<li class='list_atendentes' onclick="Hist_A('<?=$ATDY[email]?>');"><?=$ATDY[nome]?></li>
	<?}?>
</ul>
<script>
$('.list_atendentes').click(function(){
	$('.list_atendentes').css({"background-color":"#fff","text-align":"left"});
	$(this).css({"background-color":"#ddd","text-align":"right"});
});
function Hist_A(e){
	$('#historico_msgs').html("<div style='background:url(imagens/sh.png) top left repeat;position:absolute;top:0;left:0;width:100%;height:100%;'><img src='imagens/loader.gif' style='position:absolute;top:50%;left:50%;width:40px;margin:-20px 0 0 -20px;' /></div>");

	$.post('./historico.php',{e:e,r:'<?=$ATEN[raiz]?>'},function(retorno){
		$('#historico_msgs').html(retorno);
	});
}
</script>
<div id='historico_msgs'>
</div>