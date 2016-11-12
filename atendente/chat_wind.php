<?
$IdMsg = "mensagens_$_POST[i]_$_POST[s]";
$IdTex = "textarea_$_POST[i]_$_POST[s]";
?>
<div id='<?=$IdMsg?>' scrollh='0' scrollhref='0'>
	<li id='li'><span><?=date("d/m/Y H:i:s");?> - Atendente</span><br />Ol&aacute;! Em que posso ajud&aacute;-lo?</li>
	<ul><h1>Aguarde...</h1></ul>
</div>
<div id='<?=$IdTex?>'>
	<form onsubmit="return Cht_I('<?=$_POST[i].'_'.$_POST[s]?>');">
		<input type='hidden' name='idc' value='<?=$_POST[i]?>' />
		<input type='hidden' name='usc' value='<?=$_POST[s]?>' />
		<input name='msg' id='msg' />
		<input type='submit' value='enviar >' id='submit' />	
	</form>
</div>

<script>
$("#<?=$IdMsg?>").scroll(function(){
	$("#<?=$IdMsg?>").attr('scrollh', $("#<?=$IdMsg?>").scrollTop());
});

setInterval(function(){Atualiza('<?=$_POST[i].'_'.$_POST[s]?>')}, 2500);
</script>

<style type="text/css">
#li{list-style:none;}
#<?=$IdMsg?>{
	width:100%;
	height: 370px;
	overflow: auto;
}
#<?=$IdTex?>{
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
