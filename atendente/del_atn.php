<?require "../setup/need.php";

mysql_query("DELETE FROM {$DB_PRENOM}_atendente WHERE id = '$_POST[w]'");
echo"
<script>
	$('.retorno').addClass('sucesso').html('Deletado!').fadeIn();
	$('#atnd_".$_POST[w].", #adit_form, #editar_atn').fadeOut();
</script>";
?>
