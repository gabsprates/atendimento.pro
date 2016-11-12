<?
	//~ id
	//~ raiz
	//~ tipo
	//~ nome
	//~ sobrenome
	//~ email
	//~ senha
?>
<h1>Cadastro de ATENDENTES</h1>
<br />
<?$con = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id='$ATEN[raiz]'");
$VS = mysql_fetch_array($con, MYSQL_ASSOC);?>
<form class='cadastro left' onsubmit="return false;">
	<input type='hidden' name='u' value='<?=$ATEN[raiz]?>' />
	<p><span>Nome:</span><input name='nome' value='<?=$VS[nome]?>' /></p>
	<p><span>Sobrenome:</span><input name='sobrenome' value='<?=$VS[sobrenome]?>' /></p>
	<p><span>E-mail:</span><input name='email' value='<?=$VS[email]?>' /></p>
	<p><span>CPF:</span><input name='cpf' value='<?=$VS[cpf]?>' /></p>
	<p><span>Site:</span><input name='site' value='<?=$VS[site]?>' /></p>
	<p><span>Telefone:</span><input name='telefone' value='<?=$VS[telefone]?>' /></p>
	<p><span>CEP:</span><input name='cep' value='<?=$VS[cep]?>' /></p>
	<p><span>Endereço:</span><input name='endereco' value='<?=$VS[endereco]?>' /></p>
	<p><span>Número:</span><input name='numero' value='<?=$VS[numero]?>' /></p>
	<p><span>Complemento:</span><input name='complemento' value='<?=$VS[complemento]?>' /></p>
	<p><span>Bairro:</span><input name='bairro' value='<?=$VS[bairro]?>' /></p>
	<p><span>Cidade:</span><input name='cidade' value='<?=$VS[cidade]?>' /></p>
	<p><span>Estado:</span>
		<select name='estado'>
			<?foreach($ESTADOS as $est=>$Est){?>
				<option value="<?=$est;?>"<?if($est==$VS['estado']){echo' selected';}?>> <?=$Est;?></option>
			<?}?>
		</select>
	</p>
<?/*<p><span>Senha:</span><input type='password' value='<?=$VS[nome]?>' name='senha' onblur="Save_i($(this).attr('name'), $(this).val(), '<?=$ATEN[raiz]?>');" /></p>*/?>
</form>
<div class='retorno left' style='margin:50px 0 0 20px;'></div>
<?/*

senha
cep
logo


if(this.value!=this.defaultValue){defaultValue=this.value;Save_i($(this).attr('name'), $(this).val());}

*/?>
<script>
$('input, select').blur(function(){
	if(this.value!=this.defaultValue){
		Save_i($(this).attr('name'), this.value);
	}	
	this.defaultValue=this.value;
});
$("input[name=cep]").mask('99999-999');
$("input[name=cpf]").mask("999.999.999-99").validacpf();
$("input[name=telefone]").mask("(99) 9999-9999");
</script>
