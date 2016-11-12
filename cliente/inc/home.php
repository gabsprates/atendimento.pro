<div id='mensagens' class='cliente'>
	<div id='fincli'><img src='/imagens/check.png' class='on' title='Finalizar' onclick="Cok('<?=$_SESSION[RC]?>', '<?=$_SESSION['IOF']?>');" /></div>
	<li id='li'><span><?=date("d/m/Y H:i:s");?> - Atendente</span><br />Ol&aacute;! Em que posso ajud&aacute;-lo?</li>
	<ul></ul>
</div>
<div id='textarea' class='cliente'>
	<form onsubmit="return Cht_I();">
		<input id='msg' name='msg' />
		<input type='submit' value='enviar >' id='submit' />	
	</form>
</div>
