<?php
@require_once "sessao.php";
@require "cabecalho.php";
echo "<div class='container'>";//Inicio do container

if($logado){
echo "<div class='row col m12 l12 s12 left-align'>";//primeira linha

@require "connect.php";
$_usuario = $_SESSION['ID'];

//opção para buscar compra
echo "<div class='col s12 m12 l12 card-panel'>

<form method='post' action='minhascompras'>
<input type='search' name='bcc' id='buscar_compra' placeholder='Buscar Compras'>
<label for='buscar_compra'>Buscar Compras</label>
</form>
</div>"; 

echo "<div class='avisos'>SUAS COMPRAS</div>";

$_buscando_compras = $_con->query("SELECT * FROM localcom_vendas as v,localcom_produtos as p WHERE v.id_produto=p.localcom_produto_id and id_comprador='$_usuario' ORDER BY data_venda DESC");
	
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
					
					echo "<a href='prod_comprado?compra=".$_exibir['venda_id']."'>
					<div class='linha_tabela hoverable valign-wrapper'>";
					echo "<div class='menosicone upper truncate valign'>";
					echo $_exibir['localcom_produto']."</div><div class='valign right'><i><img src='Carbon/play_32.png'></i>";
					echo "</div></div>
					</a>";

				}
				

			}

			




		}else{

			echo "<a href='prod_comprado?compra=".$_exibir['venda_id']."'><div class='linha_tabela hoverable valign-wrapper'>
			
			<div class='menosicone upper truncate valign'>";
			echo $_exibir['localcom_produto']."</div><div class='valign right'><i><img src='Carbon/play_32.png'></i>";
			echo "</div></div></a>";			
		}



	}




echo "</div>";
}//fim do bloc de verificação se esta logado
@require "rodape.php";
?>