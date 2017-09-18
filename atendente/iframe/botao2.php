<h1>Alterar botão do site</h1>

<?
$usro = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$ATEN[raiz]'");
$USRO = mysql_fetch_array($usro, MYSQL_ASSOC);

$BTN = explode('|',$USRO[botao]);

$src = $BTN[0];
?>

<div class='btn_atual'>
	<h2>Botão atual</h2>
	<img id='btn_site' src="<?=$src?>" />
</div>

<div class='both'><br /><br /></div>

<div class='cadastro left'>
	<input name='u' type='hidden' value='<?=$ATEN[raiz]?>' />
	<p><span>Inserir novo (URL):</span><input name='botao' class='clinput' value=" Insira a url da imagem" placeholder=" Insira a url da imagem" /></p>
	<p><span>Posição:</span>
		<select name='posicao'>
			<option value='top-right'>Canto superior direito</option>
			<option value='top-left'>Canto superior esquerdo</option>
			<option value='bottom-right' selected>Canto inferior direito</option>
			<option value='bottom-left'>Canto inferior esquerdo</option>
			<option value='aolongo'>Ao longo do conteúdo</option>
		</select>
	</p>

	<p><input value='salvar >' type='submit' onclick='Atl_btn();' /></p>
</div>

<div class='both'><p id='aviso_aolongo' style='display:none;'>Com esta opção, você deverá colocar o código exatamente onde<br />quer que apareça o botão em seu site.</p></div>
<div class='retorno'></div>

<script>
$('.clinput').focus(function(){
	if(this.value==this.defaultValue){this.value='';}
});
$('.clinput').blur(function(){
	if(this.value==''){this.value=this.defaultValue;}
});
$('select[name=posicao]').change(function(){
	if($(this).val()=='aolongo'){$("#aviso_aolongo").fadeIn();}else{$("#aviso_aolongo").fadeOut();}
});
</script>
