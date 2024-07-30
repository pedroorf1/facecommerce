<?php
@require_once "sessao.php";
@require "cabecalho.php";
echo "<div class='container'>";//Inicio do container

if($logado){
echo "<div class='row col m12 l12 s12 left-align'>";//primeira linha

@require "connect.php";
$_usuario = $_SESSION['ID'];


//ativando produto

echo "<div class='col s12 m12 l12 card-panel'>";

if(isset($_GET['item'])){
	$CO = (int)$_GET['item'];

	if($_con->query("UPDATE localcom_produtos SET localcom_produto_ativo=1 WHERE localcom_produto_id='$CO'")){

		echo "<div class='avisos_menor'>".substituir_especiais("Seu produto foi ativado com sucesso e já está disponivel para visualização e venda detro de nosso sistema.")."</>";

	}
}


echo "</div>";
//opção para buscar compra
echo "<div class='col s12 m12 l12 card-panel'>

<form method='post' action='ativarprodutos'>
<input type='search' name='bcc' id='buscar_compra' placeholder='Buscar produto'>
<label for='buscar_compra'>Buscar produtos</label>
</form>
</div>"; 

echo "<div class='avisos'>LISTA DE PRODUTOS PARA ATIVAR</div>";

$_buscando_compras = $_con->query("SELECT * FROM localcom_produtos WHERE localcom_iduser='$_usuario' and localcom_produto_ativo=0");
	
	$temPesq = false;

	if(isset($_POST['bcc'])){

		$temPesq = true;
		$pes = substituir_especiais($_POST['bcc']);
		$pes = explode(" ",$pes);
		$tamanho = count($pes);
		//echo $tamanho;

	}

//exibindo

	while($_exibir = $_buscando_compras->fetch(PDO::FETCH_ASSOC)){

		if($temPesq){

			for($i=0;$i<$tamanho;$i++){

				if(preg_match("/".$pes[$i]."/i",$_exibir['localcom_produto'])){
					
					echo "<a href='ativarprodutos?item=".$_exibir['localcom_produto_id']."'>
					<div class='linha_tabela hoverable valign-wrapper'>";
					echo "<div class='menosicone upper truncate valign'>";
					echo $_exibir['localcom_produto']."</div><div class='valign right'><i><img src='/Carbon/play_32.png'></i>";
					echo "</div></div>
					</a>";

				}
				

			}

			




		}else{

			echo "<a href='ativarprodutos?item=".$_exibir['localcom_produto_id']."'><div class='linha_tabela hoverable valign-wrapper'>
			
			<div class='menosicone upper truncate valign'>";
			echo $_exibir['localcom_produto']."</div><div class='valign right'><i><img src='/Carbon/play_32.png'></i>";
			echo "</div></div></a>";			
		}



	}




echo "</div>";
}//fim do bloc de verificação se esta logado
@require "rodape.php";
?>