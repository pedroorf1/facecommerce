<?php
@require_once "sessao.php";
@require_once "cabecalho.php";

if($logado==true){

						// INSERINDO PRODUTO//
	if(isset($_POST['keypassCadProd']) && $_POST['keypassCadProd']=='put'){

						$INFORMACAO = "<i class='material-icons'>warning</i>&nbsp;";

						$iduser = $_SESSION['ID'];

						$tipo = substituir_especiais($_POST['tipo_prod']);
						$nome = strtoupper($_POST['titulo']);
						$marca = strtoupper($_POST['marca']);
						$modelo = strtoupper($_POST['modelo']);
						$valor = (float)str_replace(",",".",$_POST['valor']);
						$descricao = ucfirst(nl2br(strtolower(substituir_especiais($_POST['descricao']))));

							$descricao = str_replace("\\","`",$descricao);

						$novousado = $_POST['novousado'];
						$quantidade = (int)$_POST['quantidade'];
						$destaque = "";
											
						$altura = (float)$_POST['altura'];
						$largura = (float)$_POST['largura'];
						$comprimento = (float)$_POST['comprimento'];
						$peso = (float)$_POST['peso'];

						isset($_POST['pac'])?$pac=1:$pac=0;
						isset($_POST['sedex'])?$sedex=1:$sedex =0;
						isset($_POST['sedexac'])?$sedexac=1:$sedexac=0;
						isset($_POST['sedex10'])?$sedex10 = 1:$sedex10 =0;
						isset($_POST['acombinar'])?$acombinar = 1:$acombinar =0;
						

						$foto_capa = $_FILES['foto_capa'];

						$fotos = $_FILES['fotos'];

						$data = date('d/m/Y');
						$dataSql = muda_data_sql($data);
						$idUser = (int)$_SESSION['ID'];

						// verificando dados
									$podeCadastrarProduto = array(false,false,false,false,false,false,false);

									if(isset($tipo)){
										$podeCadastrarProduto[0] = true;
									}else{
										$podeCadastrarProduto[0] = false;
									}


									if($nome!=''){
										$nome =  substituir_especiais($nome);
										$podeCadastrarProduto[1] = true;
									}else{
										$podeCadastrarProduto[1] = false;
									}


									if($marca!=''){
										$marca = strtoupper(substituir_especiais($marca));
										$podeCadastrarProduto[2] = true;
									}else{
										$podeCadastrarProduto[2] = false;
									}


									if($modelo!=''){
										$modelo = substituir_especiais($modelo);
										$podeCadastrarProduto[3] = true;
									}else{
										$podeCadastrarProduto[3] = false;
									}


									if($descricao!=''){
										$descricao = substituir_especiais($descricao);
										$podeCadastrarProduto[4] = true;
									}else{
										$podeCadastrarProduto[4] = false;
									}

									if($quantidade>0){
										$podeCadastrarProduto[5] = true;
									}else{
										$podeCadastrarProduto[5] = false;
									}


									if($fotos['name']!=0){
										$podeCadastrarProduto[6] = true;
									}else{
										$podeCadastrarProduto[6] = false;
									}


									// VERIFICANDO SE PODER CADASTRAR
							
							$tamanho = (count($podeCadastrarProduto));
							
								$liberadoParaCadastro=true;


								foreach (array($podeCadastrarProduto) as $value) {
											$numeroDeRegistro = count($value);
											
										reset($value);

										for($i = 0;$i<$tamanho;$i++){
															
										
													if($value[$i]==false){
														$liberadoParaCadastro=false;
														//echo "<br>".$value[$i]." Cadastro não permitido! - ".$i;
														$i++;
													}else{


														//echo "<br>".$value[$i]." Pode cadastrar! - ".$i;
													}

										}
									}



						// CADASTRANDO

//INSERINDO AS FOTOS=================================================================
	$pastaImgProdutos    = "imgprodutos/";
		
		$fotosCarregadas=0;
		$nomefotos = array('','','','','');

			extract($_FILES);

				//FOTO CAPA
				$nomefotos[0]=fotomaior_no_bd($foto_capa,$pastaImgProdutos,"880","880",true);
					if($nomefotos[0]!=''){
						$fotosCarregadas=1;
					}


				//FOTOS PROMOCIONAIS
				$qtdArquivoFotos = (count($_FILES['fotos']['name']));//CONTA QUANTAS
				if($qtdArquivoFotos>4){$qtdArquivoFotos=4;}

				if($qtdArquivoFotos>0){

										$foto_nova = Array(
															"name"=>"",
															"type"=>"",
															"tmp_name"=>"",
															"error"=>"",
															"size"=>0,
																	);

							foreach(array($fotos) as $resultado) {
							
								reset($resultado);

								for($i = 0;$i < $qtdArquivoFotos ;$i++){
									//construindo a nova foto
									$foto_nova['name']=$resultado['name'][$i];
									$foto_nova['type']=$resultado['type'][$i];
									$foto_nova['tmp_name']=$resultado['tmp_name'][$i];
									$foto_nova['error']=$resultado['error'][$i];
									$foto_nova['size']=$resultado['size'][$i];

		$nomefotos[$i+1]=fotomaior_no_bd($foto_nova,$pastaImgProdutos,"880","880",false);
		$fotosCarregadas++;
										
									}
							}//foreach		

				}


//==================================================================================

						//INSERINDO DADOS NA TABELA PRODUTOS

								// echo "<hr>Fotos Carregadas: ".$fotosCarregadas."<hr>";

		if($fotosCarregadas>0){

			@require_once "connect.php";

			//TESTANDO O ARRAY DE NOMES ANTES DE INSERIR NO DATABASE

			reset($nomefotos);

													
			//AGORA INSERIR OS DADOS

if($yes = $_con->query("INSERT INTO localcom_produtos(
											localcom_iduser,
											localcom_produto,
											localcom_descricao,
											localcom_marca,
											localcom_modelo,
											localcom_valor,
											localcom_novousado,
											localcom_tipo,
											localcom_data,
											localcom_quantidade,
											localcom_niveldestaque,
											localcom_img0,
											localcom_img1,
											localcom_img2,
											localcom_img3,
											localcom_img4,
											localcom_produto_ativo,
											localcom_altura,
											localcom_largura,
											localcom_comprimento,
											localcom_peso,
											localcom_pac,
											localcom_sedex,
											localcom_sedexAc,
											localcom_sedex10,
											localcom_acombinar) 

												VALUES
												
													('$idUser',
													'$nome',
													'$descricao',
													'$marca',
													'$modelo',
													'$valor',
													'$novousado',
													'$tipo',
													'$dataSql',
													'$quantidade',
													'$destaque',
													'$nomefotos[0]',
													'$nomefotos[1]',
													'$nomefotos[2]',
													'$nomefotos[3]',
													'$nomefotos[4]',
													'',
													'$altura',
													'$largura',
													'$comprimento',
													'$peso',
													'$pac',
													'$sedex',
													'$sedexac',
													'$sedex10',
													'$acombinar')")){

														$INFORMACAO .= "
														Seu produto: ".$nome." foi cadastrado  com sucesso. ".$fotosCarregadas." fotos foram carregadas para seu anuncio.";
														}else{

															//printf("Errormessage: %s\n", mysqli_error($_con));
															$INFORMACAO .= "Hove um erro, seu produto não foi cadastrado!";
															}
											

											}

						}else{
							$INFORMACAO .= "Você não tem permissão de fazer essa ação!";
						}

$_SESSION['CAD_PROD']=$INFORMACAO;

						 ?>

						 <script type='text/javascript'>
						 	window.location.href="cadastrarProduto.php";
						 </script>	

						 <?php

}
require "rodape.php";
?>