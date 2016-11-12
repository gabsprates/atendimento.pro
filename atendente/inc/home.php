<?
$aten = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE id = '$_SESSION[PEGAA]'");
$ATEN = mysql_fetch_array($aten, MYSQL_ASSOC);

$usro = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$ATEN[raiz]'");
$USRO = mysql_fetch_array($usro, MYSQL_ASSOC);

$_SESSION['TIPO_USR'] = $USRO[tipo];

if($USRO[status]=='suspenso' || $USRO[status]=='cinco_dias'){
	echo "<script>location.href='/pagamentos/'</script>";
}

$ta_acabando = ""; 
if($USRO[status]=='ativofree'){
	if(date("d", strtotime($USRO[data]))==date("d", strtotime("+2 days"))){
		$ta_acabando = "2 dias";
	}elseif(date("d", strtotime($USRO[data]))==date("d", strtotime("+1 days"))){
		$ta_acabando = "1 dia";
	}
}
if($USRO[status]=='ativo' && $USRO[periodo]=='mensal'){
	if(date("d", strtotime($USRO[expira]))==date("d", strtotime("+2 days"))){
		$ta_acabando = "2 dias";
	}elseif(date("d", strtotime($USRO[expira]))==date("d", strtotime("+1 days"))){
		$ta_acabando = "1 dia";
	}
}

$ta_acabando_aguardando = "";
if($USRO[status]=='agd_1' || $USRO[status]=='agd_2' || $USRO[status]=='agd_3' || $USRO[status]=='agd_4' || $USRO[status]=='agd_5'){
	$ta_acabando_aguardando = "em analise";
}

?>
<div id='topo'>
	<img src='../logos/<?=$USRO[logo];?>' id='logo' />
	<div id='info'>
		<p><strong>Nome: </strong><?=$ATEN[nome].' '.$ATEN[sobrenome]?></p>
		<p><strong>E-mail: </strong><?=$ATEN[email]?></p>
		<p><strong>Site: </strong><a href='http://<?=$USRO[site]?>' target='_blank' class='underline'><?=$USRO[site]?></a></p>
		<p><strong><a href='sair/' class='underline'>[ sair ]</a></strong> (Clique aqui sempre que for sair)</p>
	</div>

	<div id='code'>
		<div id='inicio'>
			<h1><?=date("d/m/Y")?> <div id='relo'></div></h1>
		</div>
		<p class='bold'>Para instalar o Antendimento em seu site, cole este código em seu HTML:</p>
		<?
			$IDES = ($USRO[id])*712;
			$Id_c = base64_encode(base64_encode($IDES));
			$_SESSION['ID_USER'] = $Id_c;
		?>
		<textarea readonly="true" onclick="this.select();">&lt;script type="text/javascript" src="http://www.atendimento.pro/chat/<?=$Id_c?>/"&gt;&lt;/script&gt;</textarea>
	</div>

</div>

<div id='im'>
	<div class='caixinha'>
		<h1><span><img src="imagens/mais.jpg"></span>INÍCIO</h1>
		<ul>
			<li><a href='home'>Home</a></li>
		</ul>
	</div>
	<?if($ATEN[tipo]=='root'){?>
	<div class='caixinha'>
		<h1><span><img src="imagens/mais.jpg"></span>ATENDENTES</h1>
		<ul>
			<li><a href='atende_cad'>Criar novo</a></li>
			<li><a href='listar_atn'>Listar atendentes</a></li>
			<li><a href='setores'>Setores de Atendimento</a></li>
		</ul>
	</div>
	
	<div class='caixinha'>
		<h1><span><img src="imagens/mais.jpg"></span>HISTÓRICO</h1>
		<ul>
			<li><a href='atendimentos'>Listar Atendimentos</a></li>
		</ul>
	</div>
	
	<div class='caixinha'>
		<h1><span><img src="imagens/mais.jpg"></span>DADOS DE USUÁRIO</h1>
		<ul>
			<li><a href='dados_user'>Editar dados de cadastro</a></li>
		</ul>
	</div>

	<div class='caixinha'>
		<h1><span><img src="imagens/mais.jpg"></span>PERSONALIZE</h1>
		<ul>
			<li><a href='botao'>Alterar botão</a></li>
		</ul>
	</div>

	<?}?>
	<div class='caixinha'>
		<h1><span><img src="imagens/mais.jpg"></span>AJUDA</h1>
		<ul>
			<li><a href='ajuda'>Clique aqui e saiba mais</a></li>
		</ul>
	</div>
</div>

<div id='ic'><?include"iframe/home.php";?></div>

<?echo "<script>$('#ic').height(document.body.clientHeight-240);</script>";?>

<?if($ta_acabando!=''){?>
	<div id='prazo'>
		<h1>Dentro de <span><?=$ta_acabando?></span> sua licença expirará.</h1>
	</div>
<?}?>

<?if($ta_acabando_aguardando!=''){?>
	<div id='prazo'>
		<h1>Seu pagamento está em análise.</h1>
	</div>
<?}?>

<div id='barra_bottom'>
<ul class='listar_chats' id='l023'>
<h1>Aguarde...</h1>
</ul>
<script>
Atlza();
function Atlza(){
	var email = '<?=$ATEN[email]?>';
	var raiz = '<?=$ATEN[raiz]?>';
	$.post('iframe/chats.php',{email: email, raiz: raiz, status:"!= 'ok'"}, function(retorno){
		$("#l023").html(retorno);
	});
	setTimeout("Atlza()",5000);
}
</script>

</div>
<style type='text/css'>
#barra_bottom{
	width:100%;
	border-top: 2px solid #2b9;
	padding:10px 0;
	float:left;
	position:absolute;
	bottom:0;
	left:0;
	background: #FFF;
}
#barra_bottom > ul{padding:0 15px;}
#barra_bottom > ul li{margin-bottom:0;}
</style>

<div id="alert"></div><!-- alert -->

<script>
var atual = new Date();
atual.setHours(<?=date("H,i,s"); ?>);
function Hora(){
	var hora = atual.getHours();
	var minuto = atual.getMinutes();
	var segundo = atual.getSeconds();
	if(hora<10){hora = '0'+hora;}
	if(minuto<10){minuto = '0'+minuto;}
	if(segundo<10){segundo = '0'+segundo;}
	var horAgora = hora+":"+minuto+":"+segundo;
	$('#relo').html(horAgora);
	setTimeout("Hora()",1000);
	atual.setSeconds(segundo+1);
}
</script>
