<?

if($c=="enviar"){
	if(!$_POST[email]){ ?><script>alert('O campo e-mail � obrigat�rio!'); window.history.back();</script><? } else
	if(!$_POST[nome]){ ?><script>alert('O campo nome � obrigat�rio!'); window.history.back(); </script><? } else
	if(strtoupper($_POST[cod])!=str_replace('DBXT2','',$_SESSION['cod'])){?>
		<script>alert('C�digo de confirma��o incorreto!'); window.history.back(); </script>
	<?}else{
		$headers = "Reply-To: $_POST[email]";

		mail("contato@atendimento.pro", 'FALE CONOSCO '.date('H:i:s - d/m/Y'), "ENVIADO PELO WEBSITE\n\nNome: $_POST[nome]\nE-mail: $_POST[email]\nCidade: $_POST[cidade]\nAssunto: $_POST[assunto]\n\n$_POST[msg]",$headers);?>
		<script>alert('E-mail enviado com �xito! Retornaremos o mais breve poss�vel.'); location.href='/';</script>
		<img src='/verificod.php' />
	<?}
}?>
<form action="/contatos/enviar/" name="FF" method="POST">
<h1>Fale Conosco</h1>
<br />
<div class='left cadastro'>
	<p><span>Nome: </span><input type='text' name='nome' /></p>
	<p><span>E-mail: </span><input type='text' name='email' /></p>
	<p><span>Cidade: </span><input type='text' name='cidade' /></p>
	<p><span>Assunto: </span>
		<select name='assunto'>
		<?$Assuntos = array('duvidas'=>'D�vidas', 'sugestoes'=>'Sugest�es', 'financeiro'=>'Financeiro', 'suporte'=>'Suporte T�cnico');
		foreach($Assuntos as $add=>$ass){
			if($add=='duvidas'){$select=" selected";}else{$select='';}
			echo "<option value='$add'".$select.">$ass</option>";
		}?>
		</select>
	</p>
	<p class='c_textarea'><span>Mensagem: </span>
		<textarea name='msg'></textarea>
	</p>
	<br />
	<p><span style='background-color:#FFF;'><img style='margin:1px 30px 0 0;' src='/verificod.php' /></span>
		<input name='cod' class='left clinput' value=' Digite o c�digo de confirma��o' />
	</p>
	<br /><br />
	<p><span><input type='submit' value='Enviar >' /></span> Campos de preenchimento obrigat�rio</p>
</div>
</form>
<img src='/imagens/pessoa.png' class='right' />