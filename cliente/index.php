<?require "../setup/need.php";
if($d){
	$IOF = base64_decode(base64_decode($d));
	$IOF = $IOF/712;
	$CONX = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$IOF'");
	$CLINT = mysql_fetch_array($CONX, MYSQL_ASSOC);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Atendimento.pro - Seu atendimento On-line</title>
<meta name="Generator" content="EditPlus" />
<meta name="Author" content="Gabriel Oliveira Prates" />
<meta name="Keywords" content="Atendimento.pro, atendimento online, atendimento grátis" />
<meta name="Description" content="Atendimento.pro - Seu atendimento On-line" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="./chat/chat.js"></script>
<?if($_SESSION["CLIENTE"]=='YES'){?>
<link href='/css/cliente.css' rel='stylesheet' type='text/css' />
<?}else{?>
<link href='/css/login.css' rel='stylesheet' type='text/css' />
<?}?>
</head>
<body>
<?
if(!$c){
	if($_SESSION["CLIENTE"]=='YES'){$c='home';}else{$c='login';}
}

if($c && file_exists("inc/$c.php")){include "inc/$c.php";}else{$c='erro404';include "inc/$c.php";}?>
<div id='bopim_cli'>
	<a href='http://atendimento.pro/' target='_blank' class='left'><img src="/imagens/desenvolvido_por.png" width='185'></a>
</div>
</body>
</html>
