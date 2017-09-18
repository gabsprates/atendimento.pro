<?require"setup/need.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Atendimento.pro - O sistema de atendimento que seu site precisa!</title>
<meta name="Generator" content="EditPlus" />
<meta name="Author" content="Gabriel Oliveira Prates" />
<meta name="Keywords" content="Atendimento.pro, atendimento online, atendimento grátis" />
<meta name="Description" content="Atendimento.pro - Seu atendimento On-line" />
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="/js/js.js"></script>
<script type="text/javascript" src="/js/shadowbox.js"></script>
<script type="text/javascript" src="http://www.atendimento.pro/chat/TWpZek5EUT0=/"></script>
<link href='/js/shadowbox.css' rel='stylesheet' type='text/css' />
<link href='/style.css' rel='stylesheet' type='text/css' />
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
		<a id='logo' href='/'><img src='/imagens/logo.png' /></a>
		<div class='right'>
			<a href='/atendente/' class='box'>Login</a>
			<a href='/cadastro/' class='box'>Cadastre-se</a>
		</div>
	</div>
</div>
<div id='menu_top'>
	<ul class='center w990px'>
		<li><a href='/'>Início</a></li>
		<li><a href='/cadastro/'>Cadastre-se aqui</a></li>
		<li><a href='/atendente/'>Já é cadastrado?</a></li>
		<li><a href='/recursos/'>Recursos</a></li>
		<li><a href='/planos/'>Planos</a></li>
		<li><a href='/contatos/'>Fale conosco</a></li>
	</ul>
</div>

<div class='both'></div>

<div id='tudo'>

	<div id='aqui' class='box'>
		<?if($b && file_exists("inc/$b.php")){include "inc/$b.php";}else{$b='home';include "inc/$b.php";}?>
	</div>
	
	<div id='sidebar'>
		<!-- <div class='box'>
			<iframe height="250" width="100%" frameborder="0" scrolling="no" allowtransparency="true" src="http://www.facebook.com/connect/connect.php?id=135362233290900&amp;connections=8"></iframe>
		</div> -->
		<div class='box'>
			<img src='/imagens/pagseguro.png' width='233' />
		</div>
	</div>

</div>

<div class='both'></div>
<p id="atende_pro">
	<a href="http://www.atendimento.pro/" target="_blank">Atendimento.pro &nbsp;&nbsp; | &nbsp;&nbsp; Todos os direitos reservados &copy; 2013 </a>
</p>

</p>
</body>
</html>
