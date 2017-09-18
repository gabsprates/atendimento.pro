<?require"setup/need.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Atendimento.pro - O sistema de atendimento que seu site precisa!</title>
<meta name="Generator" content="EditPlus" />
<meta name="Author" content="Gabriel Oliveira Prates" />
<meta name="Keywords" content="Atendimento.pro, atendimento online, atendimento gr�tis" />
<meta name="Description" content="Atendimento.pro - Seu atendimento On-line" />
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="./js/js.js"></script>
<script type="text/javascript" src="./js/shadowbox.js"></script>
<script type="text/javascript" src="http://www.atendimento.pro/chat/TWpZek5EUT0=/"></script>
<link href='./js/shadowbox.css' rel='stylesheet' type='text/css' />
<link href='./style2.css' rel='stylesheet' type='text/css' />
</head>
<body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37731002-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<div id='topo'>
	<div class='w990px center'>
		<a id='logo' href='./'><img src='./imagens/logo.png' /></a>
		<div class='right'>
			<a href='./atendente/' class='box'>Login</a>
			<a href='./cadastro/' class='box'>Cadastre-se</a>
		</div>
	</div>
</div>
<div id='menu_top'>
	<ul class='center w990px'>
		<li><a href='./'>In�cio</a></li>
		<li><a href='./cadastro/'>Cadastre-se aqui</a></li>
		<li><a href='./atendente/'>J� � cadastrado?</a></li>
		<li><a href='./recursos/'>Recursos</a></li>
		<li><a href='./planos/'>Planos</a></li>
		<li><a href='./contatos/'>Fale conosco</a></li>
	</ul>
</div>

<div class='both'></div>

<div id='tudo'>

	<div id='aqui' class='box'>
		<?if($b && file_exists("inc/$b.php")){include "inc/$b.php";}else{$b='home';include "inc/$b.php";}?>
	</div>

	<div class='both'></div>

	<p class='align_center'><br /><br />
	<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FAtendimento.pro&amp;width=990&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=443336989033838" scrolling="no" frameborder="0" style="border:1px solid #3b5998;border-radius: 6px; overflow:hidden; width:990px; height:258px;margin-bottom: 40px;" allowTransparency="true"></iframe>
	<br /><br /><img src='./imagens/pags.png' /></p>

</div>

<div class='both'></div>
<?if($_GET[secreto]){?>
<ul class='center left'>
	<li><a href='./'>In�cio</a></li>
	<li><a href='./cadastro/'>Cadastre-se aqui</a></li>
	<li><a href='./atendente/'>J� � cadastrado?</a></li>
	<li><a href='./recursos/'>Recursos</a></li>
	<li><a href='./planos/'>Planos</a></li>
	<li><a href='./contatos/'>Fale conosco</a></li>
</ul>


<?}?>

<div class='both'></div>
<p id="atende_pro">
	<a href="http://www.atendimento.pro/" target="_blank">Atendimento.pro &nbsp;&nbsp; | &nbsp;&nbsp; Todos os direitos reservados &copy; 2013 </a>
</p>

</p>
</body>
</html>
