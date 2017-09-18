<?header("content-type: text/html;  charset=iso-8859-1",true);
ob_start();
session_start();

require "conec.php";

if($_SERVER['REQUEST_URI']){ 
	$URI = $_SERVER['REQUEST_URI'];	
	$quebra = explode('/',$URI);
	$a = $quebra[0];
	$b = $quebra[1];
	$c = $quebra[2];
	$d = $quebra[3];
	$e = $quebra[4];
	$f = $quebra[5];
	$g = $quebra[6];
	$h = $quebra[7];
}

$MESES['01'] = "Janeiro";
$MESES['02'] = "Fevereiro";
$MESES['03'] = "Março";
$MESES['04'] = "Abril";
$MESES['05'] = "Maio";
$MESES['06'] = "Junho";
$MESES['07'] = "Julho";
$MESES['08'] = "Agosto";
$MESES['09'] = "Setembro";
$MESES['10'] = "Outubro";
$MESES['11'] = "Novembro";
$MESES['12'] = "Dezembro";

$ESTADOS = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");

function Normaliza($str){
    $str = strtr($str, 'àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ', 'aaaaaaaceeeeiiiinoooooouuuyyy');
    $str = strtr($str, 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÝÝŸ', 'AAAAAAACEEEEIIIINOOOOOOUUUYYY');
    $str = preg_replace("/([^a-zA-Z0-9.])/",'-',utf8_encode($str));
    while($i>0) $str = str_replace('--','-',$str,$i);
    if (substr($str, -1) == '-') $str = substr($str, 0, -1);
    return $str;
}

date_default_timezone_set('America/Sao_Paulo');
mysql_query("SET TIME_ZONE = '-03:00'");
?>
