<?

include_once "db.php";

$CLIENTE_NOME = 'Atendimento On-line';
$CLIENTE_URL = 'http://www.atendimento.pro';
$CLIENTE_EMAIL = 'contato@atendimento.pro';
$EMAIL_CADASTRO = 'cadastro@atendimento.pro';


$db = mysql_connect($host, $user, $senha);
$sdb = mysql_select_db($banco, $db);


$PLANOS = array(
	'simples'=>Array("nome"=>"Simples","mensal"=>"4.99","semestral"=>"25.00","anual"=>"50.00"),
	'medio'=>Array("nome"=>"Médio","mensal"=>"9.99","semestral"=>"50.00","anual"=>"100.00"),
	'master'=>Array("nome"=>"Master","mensal"=>"14.99","semestral"=>"80.00","anual"=>"160.00"),
	'full'=>Array("nome"=>"Master Full","mensal"=>"19.99","semestral"=>"100.00","anual"=>"200.00")
);


?>
