<?
$IdMsg = "mensagens_$_POST[i]_$_POST[s]";
$IdTex = "textarea_$_POST[i]_$_POST[s]";
?>
<div id='<?=$IdMsg?>'><ul><h1>Aguarde...</h1></ul></div>

<div id='<?=$IdTex?>'>
		<input type='hidden' name='idc' value='<?=$_POST[i]?>' />
		<input type='hidden' name='usc' value='<?=$_POST[s]?>' />
</div>

<script>setInterval(function(){
	var idc = $("#<?=$IdTex?> input[name='idc']").val();
	var usc = $("#<?=$IdTex?> input[name='usc']").val();
	$.post('./chat/chat.php',{idc:idc, usc:usc, acao : 'atualizar'}, function(retorno){
		$("#<?=$IdMsg?> ul").html(retorno);
	});
}, 2500);</script>

<style type="text/css">
#<?=$IdMsg?>{
	width:100%;
	height: 390px;
	overflow: auto;
}
#<?=$IdTex?>{
	display: none;
	width:100%;
	height: 26px;
	border-top:2px solid #333;
}
#<?=$IdTex?> #msg{
	padding:2px;
	width:68%;
	height:20px;
	float:left;
	border:1px solid #333;
}
#<?=$IdTex?> #submit{
	width:30%;
	height:20px;
	cursor:pointer;
	float:right;
}
#<?=$IdMsg?> li{
	padding:5px;
	color:#333;
	font-size:12px;
	margin:8px 0;
	line-height:1.2;
}
#<?=$IdMsg?> li span{
	display:block;
	margin:0 5px 0 0;
	font-weight:bold;
	float:left;
}
#<?=$IdMsg?> li.cliente{
	color:#900;
}
#<?=$IdMsg?> li.atendente{
	color:#333;
}
</style>
