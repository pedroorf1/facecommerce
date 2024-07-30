<?php
@include_once "sessao.php";
@include_once "cabecalho.php";

echo "<div class='center'>";//corpo da pagina

		echo "<div id='capa' class='lapela'>";

	echo 	"<img src='capa/1.jpg?v=<?php echo date('i:s');?'>
				
				<div class='corPadrao-1 fonteDestaque_2'>Marketing é tudo! Divulgue seus produtos aqui.</div>
			
			";

		echo "</div>";

		echo "<div class='container'>";//Inicio do container

		@include_once "connect.php";

		$_pesquisa = $_con->prepare("SELECT * FROM localcom_produtos as p,localcom_usuario as u WHERE (p.localcom_produto_ativo=1) and (u.localcom_us_ativado=1) and (p.localcom_quantidade-p.localcom_quantidade_vendida>0) ORDER BY localcom_produto_id DESC");

		$_pesquisa->execute();

		$num_linhas = $_pesquisa->rowCount();

		echo "<div class='center'><div class='row'>";//exibir produtos novos
		echo "<div class='col l9 s12 m12'>";//div coluna de produtos

		$_id_de_controle=0;
		$_contador=0;

				while($lis = $_pesquisa->fetch(PDO::FETCH_ASSOC)) {

					if($_id_de_controle!=$lis['localcom_produto_id']){
					echo "<div class='col s12 m12 l4 hoverable center' id='amostra'><a href='visitarproduto?item=".$lis['localcom_produto_id']."'>";

							echo "<div class='titulos'><div class='txt_produto'>".substituir_especiais($lis['localcom_produto'])."</div></div>";

							$_imagem = str_replace("../../site/imgprodutos/","/imgprodutos/thumbs/",$lis['localcom_img0']);

							echo "<img class='img_titulo_prod_capa' src='".$_imagem."'>";

					echo "</a></div>";
					$_id_de_controle=$lis['localcom_produto_id'];

							if($_contador==30){
								break;

							}else{
								$_contador++;
							}

					}



				}
			
			echo "</div>";//fim da div coluna de produtos	
						

			@require_once "lateral.php";


								    	
			echo "</div>";//fim do corpo da pagina
		echo "</div></div>";//fim exibir produtos novos

		




@include_once "rodape.php";
?>