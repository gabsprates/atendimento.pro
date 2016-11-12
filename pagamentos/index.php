<?require "../setup/need.php";
if($_SESSION["LOGADO_AT"]!='YES'){echo "<script>location.href='/atendente/'</script>";}

$con = mysql_query("SELECT * FROM {$DB_PRENOM}_atendente WHERE id = '$_SESSION[PEGAA]'");
$eita = mysql_fetch_array($con, MYSQL_ASSOC);

$Usuario = mysql_query("SELECT * FROM {$DB_PRENOM}_usuarios WHERE id='$eita[raiz]'");
$p = mysql_fetch_array($Usuario,MYSQL_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Atendimento.pro - Pagamentos</title>
<meta name="Generator" content="EditPlus" />
<meta name="Author" content="Gabriel Oliveira Prates" />
<meta name="Keywords" content="Atendimento.pro, atendimento online, atendimento grátis" />
<meta name="Description" content="Atendimento.pro - Seu atendimento On-line" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<link href='/css/light.css' rel='stylesheet' type='text/css' />
</head>
<body>
<style type="text/css">
input[type=text]{
	display:block;
}
</style>
<?
$TEL = explode(" ", $p[telefone]);
$DDD = substr($TEL[0], 1, 2);
$TELEFONE = str_replace("-","",$TEL[1]);

$preco_float = $PLANOS[$p[tipo]][$p[periodo]];
$porcentagem = $p[desconto]/100.00;
$PRECO_PLANO = ($preco_float) - ($preco_float*$porcentagem);
?>
<form action="https://pagseguro.uol.com.br/security/webpagamentos/webpagto.aspx" method="post" name="formula" />

    <input type="hidden" name="email_cobranca" value="gabsprates@gmail.com">
    <input type="hidden" name="tipo" value="CP" />
    <input type="hidden" name="moeda" value="BRL" />
    <input type="hidden" name="ref_transacao" value="<?=$p[id]?>" />

    <input type="hidden" name="item_id_1" value="1" />
    <input type="hidden" name="item_descr_1" value="Atendimento.pro - Plano <?=$PLANOS[$p[tipo]][nome].' '.$p[site]?>" />
    <input type="hidden" name="item_quant_1" value="1" />
    <input type="hidden" name="item_valor_1" value="<?=number_format($PRECO_PLANO,2,'.','');?>" />
    <input type="hidden" name="item_frete_1" value="0" />

    <input type="hidden" name="cliente_nome" value="<?=$p[nome].' '.$p[sobrenome]?>" />

    <input type="hidden" name="cliente_cep" value="<?=$p[cep]?>" />
    <input type="hidden" name="cliente_end" value="<?=$p[endereco]?>" />
    <input type="hidden" name="cliente_num" value="<?=$p[numero]?>" />
    <input type="hidden" name="cliente_compl" value="<?=$p[complemento]?>" />
    <input type="hidden" name="cliente_bairro" value="<?=$p[bairro]?>" />
    <input type="hidden" name="cliente_cidade" value="<?=$p[cidade]?>" />
    <input type="hidden" name="cliente_uf" value="<?=$p[estado]?>" />
    <input type="hidden" name="cliente_pais" value="BRA" />
    <input type="hidden" name="cliente_ddd" value="<?=$DDD?>" />

    <input type="hidden" name="cliente_tel" value="<?=$TELEFONE?>" />
    <input type="hidden" name="cliente_email" value="<?=$p[email]?>" />

    <input type="submit" name="ok" value="Clique aqui caso você não seja redirecionado automáticamente para o PagSeguro." style='background:#fff;border:2px solid #900;cursor:pointer;color:#c00;font-size:17px;' />
    <script>document.formula.submit();</script>
</form>

</body>
</html>
