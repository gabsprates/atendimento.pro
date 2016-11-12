<?require "../setup/need.php";

if($_POST[cliente])
	$_SESSION["CLIENTE"]='no';

if($_POST[acao]=='ok'){
	mysql_query("UPDATE {$DB_PRENOM}_chat SET status = 'ok' WHERE id = '$_POST[i]' AND usuario = '$_POST[s]'");
}elseif($_POST[acao]=='andamento'){
	mysql_query("UPDATE {$DB_PRENOM}_chat SET status = 'andamento' WHERE id = '$_POST[i]' AND usuario = '$_POST[s]'");
}elseif($_POST[acao]=='fincli'){
	mysql_query("UPDATE {$DB_PRENOM}_chat SET status = 'fincli' WHERE id = '$_POST[i]' AND usuario = '$_POST[s]'");
}
?>
