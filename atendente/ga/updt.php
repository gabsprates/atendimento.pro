<?
require('../../setup/conec.php');

$Usuario = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios");
while($p = mysql_fetch_array($Usuario,MYSQL_ASSOC)){
	if ( (date("m-d", strtotime("+6 months", strtotime($p[expira])))==date("m-d")) && $p[periodo]=='semestral' ) {
		echo date("m-d", strtotime("+6 months", strtotime($p[expira])))."<br />";
	}
}

?>
