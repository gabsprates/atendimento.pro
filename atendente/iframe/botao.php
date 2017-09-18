<h1>Alterar botão do site</h1>
<script>var p = '';</script>
<?
$usro = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$ATEN[raiz]'");
$USRO = mysql_fetch_array($usro, MYSQL_ASSOC);

$BTN = explode('|',$USRO[botao]);

$src = $BTN[0];

?>

<style type='text/css'>
#altera_btn_a{
}
#posicao{margin:0 0 0 30px;float:left;}
#posicao h5{font-size:20px;}
#posicao span{
	font-size:15px;
	display:block;
	margin:12px 0;
	cursor:pointer;
}
#posicao span input{
	margin:2px 5px 0 0;
	float:left;
	
}

</style>
<div class='btn_atual'>
	<h2>Botão atual</h2>
	<img id='btn_site' src="<?=$src?>" />
	<div id='posicao'>
		<p style='font-size:12px;margin-bottom:10px;'>Você também pode personalizar o botão com seu CSS.<br />Para isso, use o ID <strong style='color:#900;'>#atendimento_pro_<?=substr($_SESSION['ID_USER'],0,5);?></strong></p>
		<h5>Posição:</h5>
		<span><input type='radio' name='pt' value='top-right'<?if($BTN[1]=='top-right') echo "checked"?> />Canto superior direito</span>
		<span><input type='radio' name='pt' value='top-left'<?if($BTN[1]=='top-left') echo "checked"?> />Canto superior esquerdo</span>
		<span><input type='radio' name='pt' value='bottom-right'<?if($BTN[1]=='bottom-right') echo "checked"?> />Canto inferior direito</span>
		<span><input type='radio' name='pt' value='bottom-left'<?if($BTN[1]=='bottom-left') echo "checked"?> />Canto inferior esquerdo</span>
		<span><input type='radio' name='pt' value='aolongo'<?if($BTN[1]=='aolongo') echo "checked"?> />Ao longo do conteúdo</span>
		<p id='aviso_aolongo' style='display:none;'>Com esta opção, você deverá colocar o código exatamente onde<br />quer que apareça o botão em seu site.</p>
		<input type='hidden' id='input_p' value='<?=$BTN[1]?>' name='posicao' />
	</div>
</div>

<div class='both'><br /><br /></div>

<div id='altera_btn_a' class='cadastro'>
	<input name='u' type='hidden' value='<?=$ATEN[raiz]?>' />
	<p>
		<span>Inserir novo (URL):</span>
		<input name='botao' class='clinput' value=" Insira a url da imagem" placeholder=" Insira a url da imagem" />
	</p>

	<p><input value='salvar >' id="btn_salvar" type='submit' onclick="Atl_btn();" /></p>
</div>

<div class='both'></div>
<div class='retorno'></div>

<script>
$('.clinput').focus(function(){
	if(this.value==this.defaultValue){this.value='';}
});
$('.clinput').blur(function(){
	if(this.value==''){this.value=this.defaultValue;}
});
$("#posicao span").click(function(){
	$(this).children().attr('checked',true);
	document.getElementById("input_p").value = $(this).children().val();
	if($(this).children().val()=='aolongo'){$("#aviso_aolongo").fadeIn();}else{$("#aviso_aolongo").fadeOut();}
});
</script>
