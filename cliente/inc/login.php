<?if($_SESSION["CLIENTE"] == "YES"){
?>
<script>location.href='/cliente/';</script>
<?
}
$usr = (base64_decode(base64_decode($d)))/712;
$SETORES = mysql_query("SELECT * FROM {$DB_PRENOM}_setores WHERE raiz = '$usr'");
?>
<fieldset>
	<legend>Entre em contato:</legend>
	<form action='/cliente/logar/' method='post'>
		<input type='hidden' name='u' value='<?=$d?>' />
		<p><span>Nome:</span><input name='cliente_nome' /></p>
		<p><span>E-mail:</span><input name='cliente_email' /></p>
		<? if(mysql_num_rows($SETORES)>1){ ?>
		<p><span>Setor:</span>
			<select name='setor'>
				<? while($TUS = mysql_fetch_array($SETORES, MYSQL_ASSOC)) {?>
				<option value='<?echo $TUS[num];if($TUS[num]==0){echo "' selected='selected";}?>' ><?=$TUS[setor]?></option>
				<?}?>
			</select>
		</p>
		<?}else{
			$TUS = mysql_fetch_array($SETORES, MYSQL_ASSOC);?>
			<input type='hidden' name='setor' value='<?=$TUS[num];?>' />
		<?}?>
		<p><input type='submit' value='entrar >' /></p>
	</form>
</fieldset>
