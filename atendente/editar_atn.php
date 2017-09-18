<?require "../setup/need.php";

$COT = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE email = '$_POST[e]' && id = '$_POST[u]'");
while($ETN = mysql_fetch_array($COT, MYSQL_ASSOC)){?>

<h1>Editar Atendente</h1>
<br />
<?$SETORES = mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE raiz = '$ETN[raiz]'");?>
<form class='cadastro left' id='adit_form'>
	<input name='u' type='hidden' value='<?=$ETN[id]?>' />
	<p><span>Nome:</span><input name='nome' value='<?=$ETN[nome]?>' /></p>
	<p><span>Sobrenome:</span><input name='sobrenome' value='<?=$ETN[sobrenome]?>' /></p>
	<?if($_SESSION['TIPO_USR']=='simples'){?>
	<p><span>Tipo:</span><input value='Administrador' disabled /></p>
	<?}else{?>
	<p><span>Tipo:</span>
		<select name='tipo'>
			<option value='root'<?if($ETN[tipo]=='root'){echo" selected";}?>>Administrador</option>
			<option value='atendente'<?if($ETN[tipo]=='atendente'){echo" selected";}?>>Atendente</option>
		</select>
	</p>
	<?}?>
	<p><span>Setor:</span>
		<select name='setor'>
			<? while($TUS = mysql_fetch_array($SETORES, MYSQL_ASSOC)) {?>
			<option value='<?=$TUS[num]?>'<?if($ETN[setor]==$TUS[num]){echo" selected";}?>><?=$TUS[setor]?></option>
			<?}?>
		</select>
	</p>
	<p><span>E-mail:</span><input name='email' value='<?=$ETN[email]?>' /></p>
	<p><span>Nova Senha:</span><input name='senha' type='password' value='' /></p>
</form>

<div class="both"><br /></div>

<?if($_SESSION['TIPO_USR']!='simples' && $ETN[tipo]!='root'){?><a id='del_atnd' onclick="Del_A('<?=$ETN[id]?>');return false;">excluir Atendente</a><?}?>
<div class='both'></div>
<div class='retorno'></div>
<script>
function Del_A(ia){
	$.post('del_atn.php',{w:ia},function(retorno){
		$('.retorno').html(retorno);
	});
}
$('input').blur(function(){
	if(this.value!=this.defaultValue){
		Save_a($(this).attr('name'), this.value);
	}	
	this.defaultValue=this.value;
});
$('select').change(function(){
	if(this.value!=this.defaultValue){
		Save_a($(this).attr('name'), this.value);
	}	
	this.defaultValue=this.value;
});
</script>
<?}?>
