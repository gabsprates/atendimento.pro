<?require "../setup/need.php";

$botao = $_POST[v];
$posicao = $_POST[p];

$usro = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id = '$_POST[u]'");
$USRO = mysql_fetch_array($usro, MYSQL_ASSOC);

$BTN = explode('|',$USRO[botao]);

if($botao==' Insira a url da imagem'){
	$botao=$BTN[0];
}

$src = $BTN[0];
//$position = $BTN[1];

$SRC = str_replace($src,$botao,$src);
//$POSITION = str_replace($position,$posicao,$position);

$btn = $SRC."|".$posicao;

mysql_query("UPDATE {$DB_PRENOM}_usuarios SET botao = '$btn' WHERE id = '$_POST[u]'");
echo"
<script>
	\$('.retorno').addClass('sucesso').html('Dados alterados com sucesso!').fadeIn();

	\$('#btn_site').fadeOut(function(){\$(this).attr('src', '".$botao."').fadeIn();});
</script>";
?>
