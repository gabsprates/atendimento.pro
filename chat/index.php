<?
require "../setup/conec.php";

if($_SERVER['REQUEST_URI']){ 
	$URI = $_SERVER['REQUEST_URI'];	
	$quebra = explode('/',$URI);
	
	$a = $quebra[2];
	
	$ie = base64_decode(base64_decode($quebra[2]));
	$ie = $ie/712;

	$usro = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$ie'");
	$USRO = mysql_fetch_array($usro, MYSQL_ASSOC);

	$BTN = explode('|',$USRO[botao]);

	$src = $BTN[0];
	$posicao = $BTN[1];

	if($posicao=='top-right'){$posicao="position:fixed;right:5%;top:5%;cursor:pointer;z-index:5000;";}
	if($posicao=='top-left'){$posicao="position:fixed;left:5%;top:5%;cursor:pointer;z-index:5000;";}
	if($posicao=='bottom-right'){$posicao="position:fixed;right:5%;bottom:5%;cursor:pointer;z-index:5000;";}
	if($posicao=='bottom-left'){$posicao="position:fixed;left:5%;bottom:5%;cursor:pointer;z-index:5000;";}
	if($posicao=='aolongo'){$posicao="cursor:pointer;";}

	$CONX = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE raiz = '$ie' AND status='online'");
	if(mysql_num_rows($CONX)>0){
		$CLINT = mysql_fetch_array($CONX, MYSQL_ASSOC);
		?>
		var atendimento_pro_online = true;
		document.write("<a href='http://atendimento.pro/' target='_blank' style='display:none;'>Atendimento.pro - Sistema de atendimento online</a><img src='<?=$src?>' style='<?=$posicao?>' id='atendimento_pro_<?=substr($a,0,5);?>' onclick=\"window.open('http://atendimento.pro/cliente/login/<?=$a;?>','Atendimento Online','width=320,height=425');\" title=\"Clique aqui para ser atendido\" />");
		<?
	}
}?>
