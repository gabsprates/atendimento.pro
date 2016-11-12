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
<?$TUIO = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE raiz = '$ATEN[raiz]'");
$limite = mysql_num_rows($TUIO);
$TIPO_U = mysql_fetch_array(mysql_query("SELECT tipo FROM {$DB_PRENOM}_usuarios WHERE id = '$ATEN[raiz]'"), MYSQL_ASSOC);
$SETORES = mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE raiz = '$ATEN[raiz]'");
$TIPO_U = $TIPO_U[tipo];

$ver = 'sim';
$FORM = "";

if($TIPO_U=='simples' AND $limite>=1){$FORM = "<h2>Limite de atendentes atingido!</h2>";$ver = 'nao';}
if($TIPO_U=='medio' AND $limite>=3){$FORM = "<h2>Limite de atendentes atingido!</h2>";$ver = 'nao';}
if($TIPO_U=='master' AND $limite>=5){$FORM = "<h2>Limite de atendentes atingido!</h2>";$ver = 'nao';}

echo $FORM;
if($ver=='sim'){?>
<form class='cadastro' onsubmit='return Cadastro_a();'>
	<input name='u' type='hidden' value='<?=$ATEN[raiz]?>' />
	<p><span>Nome:</span><input name='nome' /></p>
	<p><span>Sobrenome:</span><input name='sobrenome' /></p>
	<p><span>Tipo:</span>
		<select name='tipo'>
			<option value='root'>Administrador</option>
			<option value='atendente' selected>Atendente</option>
		</select>
	</p>
	<p><span>Setor:</span>
		<select name='setor'>
			<?while($TUS = mysql_fetch_array($SETORES, MYSQL_ASSOC)) {?>
			<option value='<?=$TUS[num]?>'><?=$TUS[setor]?></option>
			<?}?>
		</select>
	</p>
	<p><span>E-mail:</span><input name='email' /></p>
	<p><span>Senha:</span><input type='password' name='senha' /></p>

	<p><input value='criar >' type='submit' /></p>
</form>
<div class='both'></div>
<div class='retorno'></div>
<?}?>