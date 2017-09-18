<?
//echo "<div style='width:100%;height:100%;padding:0;margin:0;background:#F37828 url(/imagens/erro.jpg) no-repeat center center;'><a href='htpp://facebook.com/Atendimento.pro' style='font:12px Arial,sans-serif;color:#FFF;position:absolute;top:75%;right:25%;'>Para informa&ccedil;&otilde;es, entre em contato pelo Facebook ou pelo Fale Conosco do nosso site.</a></div>";
//die();

require "../setup/need.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Atendimento.pro - Seu atendimento On-line</title>
<meta name="Generator" content="EditPlus" />
<meta name="Author" content="Gabriel Oliveira Prates" />
<meta name="Keywords" content="Atendimento.pro, atendimento online, atendimento grátis" />
<meta name="Description" content="Atendimento.pro - Seu atendimento On-line" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/jquery.custom.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<?if($_SESSION["LOGADO_AT"]=='YES'){?>
<link href='/css/light.css' rel='stylesheet' type='text/css' />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37731002-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?}else{?>
<link href='/css/login.css' rel='stylesheet' type='text/css' />
<?}?>
</head>
<body>
<?
if(!$c){
	if($_SESSION["LOGADO_AT"]=='YES'){$c='home';}else{$c='login';}
}
if($c=='sair'){
	if($c && file_exists("$c.php")){include "$c.php";}else{$c='erro404';include "$c.php";}
}
if($c && file_exists("inc/$c.php")){include "inc/$c.php";}else{$c='erro404';include "inc/$c.php";}?>
</body>
</html>