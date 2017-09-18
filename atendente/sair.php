<?
mysql_query("UPDATE {$DB_PRENOM}_atendente SET status = 'desligado' WHERE id = '$_SESSION[PEGAA]'");
$_SESSION['LOGADO_AT']='NO';
$_SESSION['PEGAA'] = '';
session_destroy();
echo "<h1>até a próxima!</h1><script>location.href='/atendente/'</script>";
?>
