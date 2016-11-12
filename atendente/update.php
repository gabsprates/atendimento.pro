<?require "../setup/need.php";
mysql_query("UPDATE {$DB_PRENOM}_usuarios SET $_POST[name] = '".utf8_decode($_POST[value])."' WHERE id = '$_POST[u]'");
echo"
<script>
	$('.retorno').addClass('sucesso').html('Dados alterados com sucesso!').fadeIn();
	$('input[name=$_POST[name]], select[name=$_POST[name]]').parent().animate({'border':'1px solid #090'});
</script>";
?>
