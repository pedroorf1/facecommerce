<?php
@require_once "sessao.php";
@require_once "cabecalho.php";

echo "<div class='container'>";//Inicio do container

if($logado){
echo "<div class='row col m12 l12 s12'>";//primeira linha

if(isset($_POST['produto_valor']) and $_SESSION['ID_PROD']!=$_POST['IDPROD']){
	$_id_produto = $_POST['IDPROD'];
	$_valor_produto = $_POST['produto_valor'];
	$_valor_do_frete = $_POST['valor_frete'];
	$_quantidade = $_POST['qtd'];
	$_total_da_compra = $_POST['ttcompra'];
	$_comprador = $_SESSION["ID"];

	$_dataAtual = date('d/m/Y');;

	$_data_para_bd = muda_data_sql($_dataAtual);

	
	//Buscar vendedor
	
	@require "connect.php";
	$_buscandoInformacoes = $_con->query("SELECT * FROM localcom_produtos as p,localcom_usuario as u WHERE p.localcom_iduser=u.localcom_us_id and p.localcom_produto_id='$_id_produto' LIMIT 1");

	$_lista = $_buscandoInformacoes->fetch(PDO::FETCH_ASSOC);

	$estoque_inicial = $_lista['localcom_quantidade'];
	$vendidos = $_lista['localcom_quantidade_vendida'];

	$atualizar_vendidos = $vendidos+$_quantidade;

		if($_con->query("UPDATE localcom_produtos SET localcom_quantidade_vendida='$atualizar_vendidos' WHERE localcom_produto_id='$_id_produto'")){}



	$conteudo = "<div class='card col l12 m12 s12 hoverable'>";
	$conteudo.= "<p class='upper avisos'>".substituir_especiais("Você comprou o produto:\n ".$_lista['localcom_produto'])."</p>";

	$_vendedor_id = $_lista['localcom_us_id'];


	$conteudo.= "<fieldset>
		<legend>Dados do vendedor:</legend>

		<p>Vendedor: ".$_lista['localcom_us_nome']." ".$_lista['localcom_us_sobrenone']."</p>
		<p>E-mail: ".$_lista['localcom_us_email']."</p>

		<p>Telefone: ".$_lista['localcom_us_telefone']."</p>

		</fieldset>
		<fieldset>
		<legend>Dados da compra:</legend>

		<p>Quantidade: ".$_quantidade."</p>

		<p>Valor unitário: ".$_valor_produto."</p>

		<p>Valor geral do Frete: ".substPontoPorVirgula($_valor_do_frete)."</p>	

		<p class='avisos'><b>TOTAL DA COMPRA: ".substPontoPorVirgula($_total_da_compra)."</b></p>	

	</fieldset>";

	//inserir compra no bd
	
	$_cadastrar_compra = $_con->query("INSERT INTO localcom_vendas(
		id_vendedor,
		id_comprador,
		id_produto,
		valor_frete,
		quantidade,
		valor_unid_produto,
		valor_total_venda,
		data_venda
		) VALUES(
		'$_vendedor_id',
		'$_comprador',
		'$_id_produto',
		'$_valor_do_frete',
		'$_quantidade',
		'$_valor_produto',
		'$_total_da_compra',
		'$_data_para_bd'
		)");

	echo "<div class='avisos_menor upper'>

	<img src='Carbon/opts_32.png' class='icones' />

	".substituir_especiais("Compra realizada com sucesso!")."</div>";

	$conteudo.= "<p>".substituir_especiais("!Entre em contato com o vendedor por todos os meios que ele forneceu, faça sua verificação de veracidade. O facecomerce.com não se responsabiliza por eventuais problemas na negociação!")."</p>";

	echo $conteudo;

	$email = $_SESSION['EMAIL'];

	$cabecaloMail = "<!DOCTYPE html><html><head><title>facecomerce.com</title>
	 	<STYLE type='text/css'>  
  		<!--  

  		.avisos{
			width: 100%; /* Full width */
		    padding: 2% 2%;
		    background-color: #42a5f5;
		    color: white;
		    border-radius: 10px 10px 10px 10px;
		    box-shadow: 2px 3px 4px gray;

		}

		.avisos_menor{
			width: 100%; /* Full width */
		    padding: 1% 1%;
		    background-color: orange;
		    color: white;
		    font-weight: bold;
		    border-radius: 5px 5px 5px 5px;
		    box-shadow: 1px 2.5px 2px gray;

		} 

		.upper{
			text-transform: uppercase;
		}

  		-->  
  		</STYLE>


	</head><body>
	";

	$rodapeMail = "</body></html>";

	$conteudo = $cabecaloMail.$conteudo.$rodapeMail;

	enviarEmail("Dados se sua compra - facecomerce.com<comprarealizada@facecomerce.com>",$email,"FACECOMERCE - Dados de sua compra",$conteudo,"");
	 

	echo "<div class='avisos_menor red'>
	
	<img src='Carbon/mail_32.png' class='icones'/>
	
	".substituir_especiais("Um E-mail com os dados de sua compra foi enviado para sua caixa postal  (".$email.").")."</div>";

	$_SESSION['ID_PROD']=$_POST['IDPROD'];


	echo "</div>";
}// tem produto
else{

echo "<p class='avisos'>".substituir_especiais("Você já realizou esta compra!")."</p>";

}
echo "</div>";
}//fim do bloc de verificação se esta logado
@require "rodape.php";
?>