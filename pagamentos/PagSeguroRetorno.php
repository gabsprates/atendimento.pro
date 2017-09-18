<?header('Content-Type: text/html; charset=ISO-8859-1');

/* Edite este arquivo e insira suas configurações */
include './PagSeguroRetornoConfig.php'; 

/* Não é necessário alterar nada desta linha para baixo */
include './PagSeguroRetornoFuncoes.php';
define('TOKEN', $retorno_token);

if ($_SERVER['REQUEST_METHOD'] == 'POST') echo "string";


if (count($_POST) > 0) {
	
	$npi = new PagSeguroNpi();
	$result = $npi->notificationPost();
	
	$transacaoID = isset($_POST['TransacaoID']) ? $_POST['TransacaoID'] : '';
	
	if ($result == "VERIFICADO") {
	
		// Recebendo Dados
		$VendedorEmail  = $_POST['VendedorEmail'];
		$TransacaoID = $_POST['TransacaoID'];
		$Referencia = $_POST['Referencia'];
		$Extras = MoedaBR($_POST['Extras']);
		$TipoFrete = $_POST['TipoFrete'];
		$ValorFrete = MoedaBR($_POST['ValorFrete']);
		$DataTransacao = ConverterData($_POST['DataTransacao']);
		$Anotacao = $_POST['Anotacao'];
		$TipoPagamento = $_POST['TipoPagamento'];
		$StatusTransacao = $_POST['StatusTransacao'];

		$CliNome = $_POST['CliNome'];
		$CliEmail = $_POST['CliEmail'];
		$CliEndereco = $_POST['CliEndereco'];
		$CliNumero = $_POST['CliNumero'];
		$CliComplemento = $_POST['CliComplemento'];
		$CliBairro = $_POST['CliBairro'];
		$CliCidade = $_POST['CliCidade'];
		$CliEstado = $_POST['CliEstado'];
		$CliCEP = $_POST['CliCEP'];
		$CliTelefone = $_POST['CliTelefone'];

		$NumItens = $_POST['NumItens'];


/*
Completo: Pagamento completo
Aguardando Pagto: Aguardando pagamento do cliente
Aprovado: Pagamento aprovado, aguardando compensação
Em Análise: Pagamento aprovado, em análise pelo PagSeguro
Cancelado: Pagamento cancelado pelo PagSeguro
*/

		$Dados_user = mysql_fetch_array(mysql_query("SELECT * FROM atendimento_usuarios WHERE id='$Referencia'"),MYSQL_ASSOC);
		if($Dados_user[periodo]=='mensal'){
			$daTA = date("Y-m-d", strtotime("+1 month"));
		}elseif($Dados_user[periodo]=='semestral'){
			$daTA = date("Y-m-d", strtotime("+6 months"));
		}elseif($Dados_user[periodo]=='anual'){
			$daTA = date("Y-m-d", strtotime("+1 year"));
		}

		if($StatusTransacao=='Aprovado'){
			mysql_query("UPDATE atendimento_usuarios SET status='ativo', expira='$daTA' WHERE id='$Referencia'");
		}elseif($StatusTransacao=='Cancelado'){
			mysql_query("UPDATE atendimento_usuarios SET status='suspenso' WHERE id='$Referencia'");
			mysql_query("UPDATE atendimento_atendente SET status='desligado' WHERE raiz='$Referencia'");
		}elseif($StatusTransacao=='Aguardando Pagto' || $StatusTransacao=='Em Análise'){
			mysql_query("UPDATE atendimento_usuarios SET status='agd_1' WHERE id='$Referencia'");
			mysql_query("UPDATE atendimento_atendente SET status='desligado' WHERE raiz='$Referencia'");
		}
	}
} else {
	echo "<script>location.href='$retorno_site';</script>";
}
?>
