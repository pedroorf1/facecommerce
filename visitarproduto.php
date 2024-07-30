<?php
@require_once "sessao.php";

if((isset($_GET['item']))){
		echo "<div class='row col m12 l12 s12 left-align'>";//primeira linha
		//buscar produto no bd, junto com o usuario.

		@include_once "connect.php";
		@include_once "funcoes.php";

		$vendedor=false;

		$id_prod =(int)$_GET['item'];


		$_pesquisa = $_con->prepare("SELECT * FROM localcom_produtos as p,localcom_usuario as u WHERE p.localcom_iduser=u.localcom_us_id and p.localcom_produto_id='$id_prod' and u.localcom_us_ativado=1 ");
		$_pesquisa->execute();
		$numeroDeResgtrosDaPesquisa = $_pesquisa->rowCount();

		$passando_informacoes = $_pesquisa->fetch(PDO::FETCH_ASSOC);

		$titulo= $passando_informacoes['localcom_produto'];

		$information= $passando_informacoes['localcom_descricao'];

		$imagemInicial = "<img src=".str_replace("../../site/imgprodutos/","/imgprodutos/",$passando_informacoes['localcom_img0'].">");

}

@include_once "cabecalho.php";

echo "<div class='container'>";//Inicio do container

if($numeroDeResgtrosDaPesquisa>0){
echo "<div class='row col m12 l12 s12 left-align'>";//primeira linha
//buscar produto no bd, junto com o usuario.

@include_once "connect.php";

$vendedor=false;

$id_prod =$_GET['item'];

$_pesquisa = $_con->prepare("SELECT * FROM localcom_produtos as p,localcom_usuario as u WHERE p.localcom_iduser=u.localcom_us_id and p.localcom_produto_id='$id_prod' and localcom_produto_ativo=1");
$_pesquisa->execute();

$numeroDeResgtrosDaPesquisa = $_pesquisa->rowCount();

		$_lis = $_pesquisa->fetch(PDO::FETCH_ASSOC);
		$quantidade_de_produtos_disponivel = ((int)$_lis['localcom_quantidade'])-((int)$_lis['localcom_quantidade_vendida']);

$id_vendendor = '';

	echo "<div class='row col m12 s12 l12'>";

	if($quantidade_de_produtos_disponivel>=1){
	
			$id_vendendor = $_lis['localcom_iduser'];
			
			echo "<input type='hidden' id='o_vendedor' value=".$id_vendendor.">";

		if($logado){

			echo "<input type='hidden' id='o_comprador' value=".$_SESSION['ID'].">";

			if($_lis['localcom_iduser']==$_SESSION['ID']){
					$vendedor=true;
			}
		}
					echo "<div class='borda-padrao col s12 m12 l12'>";
					
					echo "<div class='col l2 m0 s0' id='lateralEsquedaProduto'><center><article><img class='responsive-img circle' src=".str_replace("../../site/imgprodutos/","/imgprodutos/thumbs/",$_lis['localcom_img0'])."></article>";
					echo "</center></div>";	

					echo "<div class='borda-padrao col l10 m12 s12 fonte-destaque cor_destaque hoverable tituloNaCompra'><center>".$_lis['localcom_produto']."</center></div>";
					

					$_FOTOS="";
					$qtd_fotos=0;

							if($_lis['localcom_img0']!=""){
								$_FOTOS.="-CASA-".str_replace("../../site/imgprodutos/","imgprodutos/",$_lis['localcom_img0']);
								$qtd_fotos+=1;
							}
							if($_lis['localcom_img1']!=""){
								$_FOTOS.= "-CASA-".str_replace("../../site/imgprodutos/","imgprodutos/",$_lis['localcom_img1']);
								$qtd_fotos+=1;
							}
							if($_lis['localcom_img2']!=""){
								$_FOTOS.= "-CASA-".str_replace("../../site/imgprodutos/","imgprodutos/",$_lis['localcom_img2']);
								$qtd_fotos+=1;
							}
							if($_lis['localcom_img3']!=""){
								$_FOTOS.= "-CASA-".str_replace("../../site/imgprodutos/","imgprodutos/",$_lis['localcom_img3']);
								$qtd_fotos+=1;
							}
							if($_lis['localcom_img4']!=""){
								$_FOTOS.= "-CASA-".str_replace("../../site/imgprodutos/","imgprodutos/",$_lis['localcom_img4']);
								$qtd_fotos+=1;
							}

					echo "<input type='hidden' name='fftos' value=".$_FOTOS.">";
					echo "<input type='hidden' name='qtdfftos' value=".$qtd_fotos.">";

					echo "<div id='ALBUM_CAROUSEL' class='col s12 center'>";

						echo "<div id='proximo' class='valign-wrapper'></div>";

						echo "<div id='anterior' class='valign-wrapper'></div>";

					echo "<img src=".str_replace("../../site/imgprodutos/","/imgprodutos/",$_lis['localcom_img0'])." class='responsive-img' id='fotoexibida'>";
					echo "</div>";	

						echo "<div class='col s12 m12 l12 borda-padrao hoverable' id='desc-prod'>
									".$_lis['localcom_descricao']."</div>";

									
								echo "<div class='col l12 s12 m12 hoverable borda-padrao'>";

				echo "<fieldset class='orange borda-padrao'>
					<legend class='blue borda-padrao'>&nbsp;".substituir_especiais("QUALIFICAÇÕES DO VENDEDOR ")."&nbsp;</legend>
				";				


			// ================QUALIFICACAO=================================
			@require_once "connect.php";						
			$col = $_con->query("SELECT * FROM localcom_vendas WHERE id_vendedor=".$id_vendendor." or id_comprador=".$id_vendendor);

			$v_positivas = 0;
			$v_negativas = 0;
			$c_positivas = 0;
			$c_negativas = 0;

			while($_quals = $col->fetch(PDO::FETCH_ASSOC)){

				if($_quals['qualificacao_vendedor']==2){

					$v_positivas++;

				}


				if($_quals['qualificacao_vendedor']==1){

					$v_negativas++;

				}


				if($_quals['qualificacao_comprador']==2){

					$c_positivas++;

				}


				if($_quals['qualificacao_comprador']==1){

					$c_negativas++;

				}




			}

				echo "AO VENDER: ";
				echo $v_positivas."<img src='Carbon/up_16.png' class='green'>     ".$v_negativas." <img src='Carbon/down_16.png' class='red'><br>";
				

				echo "AO COMPRAR: ";
				echo $c_positivas."<img src='Carbon/up_16.png' class='green'>     ".$c_negativas." <img src='Carbon/down_16.png' class='red'><br>";
				

			
			echo "</fieldset>";	

			//=============================================================== 

	echo "<br><div class='avisos_menor hoverable'>".substituir_especiais(" DADOS PARA SUA COMPRA ")."</div>";



									echo "MARCA: ".$_lis['localcom_marca']."<br>";
									echo "MODELO: ".$_lis['localcom_modelo']."<br>";
									echo "VALOR EM R$: <span class='red-text'><b>".substPontoPorVirgula($_lis['localcom_valor'])."</b></span><br>";

									echo "QUANTIDADE DISPONIVEL: ".$quantidade_de_produtos_disponivel."<br>";
									
						echo "<br>";
						


				if($logado and $vendedor==false){

				    $pesquisar = $_con->query("SELECT * FROM localcom_favoritar WHERE userid=".$_SESSION['ID']." and idproduto=".$id_prod." LIMIT 1");
           				$num_linhas = $pesquisar->rowCount();

           				if($num_linhas<1){
							echo "<div id='favoritar' class='hoverable borda-padrao cor_destaque center col s12'>
							<img src='/Carbon/ic_star_black_48dp.png' class='responsive-img fffav'><br>".
							substituir_especiais(" Adicione este produto aos seus favoritos")."<br>
							</div>";
           				}else{
							echo "<div id='favoritar' class='hoverable borda-padrao cor_destaque center col s12'>
							<img src='/Carbon/ic_star_border_black_48dp.png' class='responsive-img fffav'><br>".
							substituir_especiais(" Este produto já está em seus favoritos")."<br>
							</div>";

           				}//======================================

           				//dados para calculos
           				//
           				//
           				

									echo "<input type='hidden' name='iddUS' value=".$_lis['localcom_us_id'].">";

									echo "<input type='hidden' name='iddPPP' value=".$_lis['localcom_produto_id'].">";


																																			
											echo "<select name='TPtransporte' class='input-field'>";
													
													
														echo "<option DISABLED value='nd'>TRANSPORTE";
																									

													if($_lis['localcom_pac']!='0'){
														echo "<option selected value='41106'>PAC";
													}
													if($_lis['localcom_sedex']!='0'){
														echo "<option value='40010'>SEDEX";
													}
													if($_lis['localcom_sedexAc']!='0'){
														echo "<option value='40045'>SEDEX A COBRAR";
													}
													if($_lis['localcom_sedex10']!='0'){
														echo "<option value='40215'>SEDEX 10";
													}
																							
											echo "</select>";

									
									echo "<form name='comprando' action='comprar' method='post'>

											VALOR DO FRETE ESCOLHIDO EM R$: <div class='avisos_menor left-align' name='frete_valor'></div><br>
											<input type='hidden' name='valor_frete' value=''>

											<input type='hidden' name='IDPROD' value=".$_lis['localcom_produto_id'].">

										<input type='hidden' name='produto_valor' value=".substPontoPorVirgula($_lis['localcom_valor']).">

											QUANTIDADE À COMPRAR: <input type='number' step=1 min=1 value=1 max=".$quantidade_de_produtos_disponivel." name='qtd'>
											<br>TOTAL DA COMPRA EM R$: <div class='col m12 s12 l12 TOTAL' name='tatalcompra'>total da compra</div><br>

											<input type='hidden' name='ttcompra' value=''>											

											</form>
											";
									
									
									echo "<br><div class='center'>
									<p style='color:red;'>".substituir_especiais("Ao clicar em comprar você está concordando com os termos e serviços do site facecomerce.com")."</p>

									<div  class='btn center' id='botao_comprar'>COMPRAR</div></div>";

				}//fim condição de logado e vendedor
				
				if(!$logado){
					echo "<fieldset class='red white-text borda-padrao'>
							<legend class='orange borda-padrao'>&nbsp; AVISO &nbsp;</legend>
							".substituir_especiais("O modo de compra só está disponivel para usuários logados no facecomerce!")."

						</fieldset><br>";
				}
				if($logado and $vendedor){
					echo "<fieldset class='red white-text borda-padrao'>
							<legend class='orange borda-padrao'>&nbsp; AVISO &nbsp;</legend>
							".substituir_especiais("Você pode desativar a venda deste produto quando desejar clicando no botão desativar!");
							echo "<a href='' id='desativaproduto' class='btn'>DESATIVAR</a>";
					echo "</fieldset><br>";
				}

    


           				//FAZER PERGURAS AO VENDEDOR
           				//
          
         echo "<div id='pergutas_repostas' class='s12 left-align'>";
         echo "<fieldset>
         	<legend>PERGUNTAS</legend>";

			if($logado){

        	
			        echo "<p class='avisos_menor red upper'>

			         	<img src='Carbon/del_24.png' class='icones'>

			         	".substituir_especiais("É expressamente proibido colocar meios de contatos ou quaisquer tentativas de expor estes. Tal comportamento implica em violação dos direitos do facecomerce.com e resulta em bloqueio total do usuário em nosso sistema.")."</p>
			         ";
			     }    	

         

         if($logado){
			//verificar se o vendedor é o usuario visitante
			$_list = $_pesquisa->fetch(PDO::FETCH_ASSOC);
			//
							echo "<input type='hidden' id='produto_id' value=".$id_prod.">";	
							
					if($vendedor==false){

				         	echo "Faça uma pergunta ao vendedor";

				         	echo "<input type='text' name='perguntando' id='perguntando' placeholder='faça uma pergunta'>";				
					}

         }

        $pergu = $_con->query("SELECT * FROM localcom_perguntas WHERE id_produto=".$id_prod." ORDER BY id DESC");
        $num_linhas_pergu = $pergu->rowCount();

        while ($lista_perguntas=$pergu->fetch(PDO::FETCH_ASSOC)) {

        	$novo = $_con->query("SELECT * FROM localcom_usuario WHERE localcom_us_id=".$lista_perguntas['id_usuario']);
        	$us=$novo->fetch(PDO::FETCH_ASSOC);


        	echo "<div class='borda-padrao col s12'>
        	<p>".$us['localcom_us_login']."</p>
        	<span>".$lista_perguntas['pergunta']."</span>";


        		if($lista_perguntas['resposta']!=''){
        			echo "<fieldset>
        			<legend>RESPOSTA DO VENDEDOR</legend>
        				".$lista_perguntas['resposta']."
        			</fieldset><br>";

        		}
        		if($lista_perguntas['resposta']=='' and $vendedor==true){

        		echo "<fieldset>
        				<legend>PERGUNTA EM ABERTO.</legend>
        				<input type='text' name='resposta'>
        				<input type='hidden' name='id_perg' value=".$lista_perguntas['id'].">
        			  </fieldset><br>";


        		}


        	echo "</div>";

        }

         echo "</fieldset><br></div><br></div><br></div><br></div><br>";//fim do div perguras e respostas
           	//===========================================================				

			
	echo "</div>";
		}//FIM DA PESQUISA.	

		


	}

	if($quantidade_de_produtos_disponivel<1 or $numeroDeResgtrosDaPesquisa<1){

		echo "<div class='avisos_menor'>".substituir_especiais("Este produto não está mais disponivel.")."</div>";
	}

	echo "</div></div></div>";


@require "rodape.php";
?>