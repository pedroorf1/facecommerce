<?php
@require_once "sessao.php";
@require_once "cabecalho.php";
echo "<div class='container'>";//Inicio do container

	$tipodePesquisa;
	$GLOBALS['pagina_atual']='';
	$GLOBALS['numeroRegitros']=0;
	$qtd_paginas=0;
	$qtd_registro_por_paginas=30;
	$id_de_controle=0;
	

	if(isset($_POST['pesquisar'])){

		$tipodePesquisa="todos";
		$textoPesquisa=substituir_especiais($_POST['pesquisar']);

		if(isset($_GET['pg'])){

		$pagina_atual=$_GET['pg'];

		}
	}

	if(isset($_GET['ptxt'])){

		$tipodePesquisa="todos";
		$textoPesquisa=$_GET['ptxt'];

		if(isset($_GET['pg'])){

		$pagina_atual=$_GET['pg'];

		}
	
	}

	if($pagina_atual==''){
	$pagina_atual=1;
	}

	if($pagina_atual>1){
		$GLOBALS['inciopg'] = $qtd_registro_por_paginas*($pagina_atual-1);
		$GLOBALS['fimpg'] = $qtd_registro_por_paginas*$pagina_atual;

	}else{
		$GLOBALS['inciopg'] = 1;
		$GLOBALS['fimpg'] = $qtd_registro_por_paginas*$pagina_atual;
	}
	

	//prepaprando para exibiri produtos

		
		if(($textoPesquisa)!=''){

			$temPesq = true;
			$pes = strtolower(substituir_especiais($textoPesquisa));
			$pes = explode(" ",$pes);
			$tamanho = count($pes);
		
		}

		$primeira = $pes[0];

		@require_once "connect.php";
			$pesquisa = $_con->prepare("SELECT * FROM localcom_produtos WHERE localcom_produto_ativo=1 order by localcom_valor ASC");
			$pesquisa->execute();

			//exibindo
			
			// criando nova lista com as ocorrencias
			$lista = array();
			//preenchendo a lista
			while($_exibir = $pesquisa->fetch(PDO::FETCH_ASSOC)){
			
			
				$iii=0;
				for($iii;$iii<=$tamanho-1;$iii++){

					$palavra = strtolower($pes[$iii]);
					$conteudo = strtolower($_exibir['localcom_produto']);

					if (strstr($conteudo,$palavra)==true) {

						$lista[] = $_exibir;


						}

				}
			}

	

$numero_registros_array = count($lista);

if($numero_registros_array>100){
	$numero_registros_array=100;
}

if($numero_registros_array<1){
echo "<div class='avisos_menor'>".substituir_especiais("Não foram econtradas ocorrências para sua pesquisa. Tente novas combinações de palavras.")."</div>";
}else{

echo "<div class='avisos'>".substituir_especiais("Para um melhor desempenho de nossa plataforma em seu dispositivo, limitamos o número de produtos da pesquisa em 100.")."</div>";

}


	for($_linha=0;$_linha<$numero_registros_array;$_linha++){

		
		echo "<a href='visitarproduto?item=".$lista[$_linha]['localcom_produto_id']."'>";

				echo "<div class='linha_tabela hoverable valign-wrapper'>";

						echo "<img class='imglistaPesqProd' src='".str_replace("../../site/imgprodutos/","imgprodutos/thumbs/",$lista[$_linha]['localcom_img0'])."'/>";

						echo "<div class='menosicone upper truncate valign'>".$lista[$_linha]['localcom_produto']."<br>";
						
						echo "R$ ".corrigeCasasDecimais($lista[$_linha]['localcom_valor'])."</div>";
				
				echo "<div>".$lista[$_linha]['localcom_novousado']."</div>";

									

									echo "<div class='valign right'><i><img src='Carbon/play_32.png'></i></div>";

								echo "</div>";
		echo "</a>";
								
								





	}



$qtd_paginas = $numeroRegitros/$qtd_registro_por_paginas;
	
	if($numeroRegitros>0){
			if(($numeroRegitros%$qtd_registro_por_paginas)>0 and $qtd_paginas>1){
				$qtd_paginas+=1;	
			}
			if($qtd_paginas<=1){
				$qtd_paginas=1;
			}
		}

// echo "\n".$numeroRegitros;
// echo "\n".$qtd_paginas;
// echo "\n".$qtd_registro_por_paginas;

//paginas
for($ooo=1;$ooo<=$qtd_paginas;$ooo++){
	if($pagina_atual==$ooo){
		echo "<a href='pesquisar?pg=$ooo&ptxt=$textoPesquisa' class='orange-text'>".$ooo."</a> ";
	}else{
		echo "<a href='pesquisar?pg=$ooo&ptxt=$textoPesquisa'>".$ooo."</a> ";		
	}

}


require "rodape.php";
?>