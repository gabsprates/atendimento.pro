<?
if(!$c){$c='simples';}
if(!$d){$d='mensal';}
?>
<div class='cadastro left w100pc'>
<form method='post' action='/recebe/' enctype="multipart/form-data">
	<h1 class='dias30'>1 semana grátis!</h1>
	<div id='p1'>
		<div class='left'>
			<h1>Qual plano é melhor para você?</h1>
			<select name='tipo' id='plano_'>
				<option value='simples'<?if($c=='simples'){echo " selected";}?>>Simples (1 usuário)</option>
				<option value='medio'<?if($c=='medio'){echo " selected";}?>>Médio (3 usuário)</option>
				<option value='master'<?if($c=='master'){echo " selected";}?>>Master (5 usuário)</option>
				<option value='full'<?if($c=='full'){echo " selected";}?>>Master Full (sem limites de usuários)</option>
			</select>
			<p id='pxm_' style='display:none;'><span><input type='button' value='Próximo >' onclick="$('#p1').slideUp();$('#p2').slideDown();" /></span></p>
		</div>

		<ul class='right'>
			<h1>Escolha o período:</h1>
			<li id='simples'>
				<p class='preco' periodo='mensal'><span>R$ 4.99</span> mensal</p>
				<p class='preco' periodo='semestral'><span>R$ 25.00</span> semestral</p>
				<p class='preco' periodo='anual'><span>R$ 50.00</span> anual</p>
			</li>

			<li id='medio'>
				<p class='preco' periodo='mensal'><span>R$ 9.99</span> mensais</p>
				<p class='preco' periodo='semestral'><span>R$ 50.00</span> semestral</p>
				<p class='preco' periodo='anual'><span>R$ 100.00</span> anual</p>
			</li>

			<li id='master'>
				<p class='preco' periodo='mensal'><span>R$ 14.99</span> mensais</p>
				<p class='preco' periodo='semestral'><span>R$ 75.00</span> semestral</p>
				<p class='preco' periodo='anual'><span>R$ 150.00</span> anual</p>
			</li>

			<li id='full'>
				<p class='preco' periodo='mensal'><span>R$ 19.99</span> mensais</p>
				<p class='preco' periodo='semestral'><span>R$ 100.00</span> semestral</p>
				<p class='preco' periodo='anual'><span>R$ 200.00</span> anual</p>
			</li>
		</ul>
		<script>
		var qual = "<?=$c?>";
		$("#"+qual).slideDown();

		$('#plano_').change(function(){
			qual = $(this).val();
			$("#p1 ul li").slideUp();
			$("#"+qual).slideDown();

			$('.preco').css('background-color','#fff');
			$('input[name=periodo]').val('');
			$('#pxm_').fadeOut();
		});
		</script>
	</div>

	<div id='p2' style='display:none;'>
		<h1>Dados de cadastro:</h1>
		<input name='periodo' value='<?=$d?>' type='hidden' />
		<p><span><input type='button' value='< Voltar' onclick="$('#p2').slideUp();$('#p1').slideDown();" /></span></p>
		<div class='both'><br /></div>
		<p><span>Nome</span><input type='text' name='nome' /></p>
		<p><span>Sobrenome</span><input type='text' name='sobrenome' /></p>
		<p><span>CPF</span><input type='text' name='cpf' /></p>
		<p><span>Site (URL)</span><input type='text' value='ex.: www.atendimento.pro' placeholder="ex.: www.atendimento.pro" name='site' class='clinput' /></p>
		<p><span>E-mail</span><input type='text' name='email' /></p>
		<p><span>Senha</span><input type='password' name='senha' /></p>
		<p><span>Telefone</span><input type='text' name='telefone' /></p>
		<p><span>CEP</span><input type='text' name='cep' class='pointer' onblur="getEndereco($('input[name=cep]').val());" /></p>
		<p class='none'><span>Cidade</span><input type='text' name='cidade' /></p>
		<p class='none'><span>Estado</span>
			<select name='estado'>
				<?foreach($ESTADOS as $est=>$Est){?>
					<option value="<?=$est;?>"> <?=$est;?></option>
				<?}?>
			</select>
		</p>
		<p class='none'><span>Bairro</span><input type='text' name='bairro' /></p>
		<p class='none'><span>Endereço</span><input type='text' name='endereco' /></p>
		<p class='none'><span>N°</span><input type='text' name='numero' /></p>
		<p class='none'><span>Complemento</span><input type='text' name='complemento' /></p>
		<p><span>Logotipo</span><input type='file' name='logo' style=' padding: 0 10px 0 0; line-height: 1; height: 21px; ' /></p>
		<br />
		<p><span><input type='submit' onclick='return Verifica();' value='Enviar' /></span>Campos de preenchimento obrigatório</p>
	</div>
</form>
</div>
<script>
$('.preco').click(function(){
	var period = $(this).attr('periodo');
	$('.preco').css('background-color','#fff');
	$('input[name=periodo]').val(period);
	$(this).css('background-color','#ccc');
	$('#pxm_').fadeIn();
});

<?if($d){?>
$('.preco[periodo=<?=$d?>]').css('background-color','#ccc');
$('#pxm_').fadeIn();
<?}?>

$("input[name=cep]").mask('99999-999');
$("input[name=cpf]").mask("999.999.999-99").validacpf();
$("input[name=telefone]").mask("(99) 9999-9999");
</script>
