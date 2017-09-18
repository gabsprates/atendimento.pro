<?require "../../setup/need.php";

if($_SESSION["LOGADO_AT"]){
	$url = $_POST[lk];
	$aten = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE id = '$_SESSION[PEGAA]'");
	$ATEN = mysql_fetch_array($aten, MYSQL_ASSOC);
	if($url && file_exists("$url.php")){include "$url.php";}else{$url='home';include "$url.php";}
}?>
