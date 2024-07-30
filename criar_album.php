<?php
@require "cabecalho.php";

if(isset($logado) and $logado==true){

?>
<div class='corpo'>
<br>
	
	<center>
				
		<h2>CRIAR ALBUM DE FOTOS</h2>
	<?php

		//echo substituir_especiais(strtoupper("fúria"));		


		echo "<div id='img_carregando'><center><img src='../imgsite/carregando.gif' width='150px'></center></div>";
	?>
				<form  action="" method="post"  enctype="multipart/form-data" autocomplete="off" id='formForm'>

				<input class="formCampo" type="text" name="titulo" size="80" required="yes" placeholder="DESCRIÇÃO DO ALBUM"><br><br>
				<label>Selecione as fotos a serem enviadas.</label>
				<input  name="fotos[]" type=file required multiple /><br><br>
				<input  type="submit" name="btCadastra_bloco" value="Criar Album">
				</form>
				
	</center>

<?php



				
echo "</div>";

//INSERINDO BLOCO


if(isset($_POST['btCadastra_bloco'])){

			$fotosCarregadas=0;
			$videoCerragada=false;
			$separador = "-kkkk-";
			$nome_para_bd = "";

				//contando numero de arquivos
						
						$numeroDeARquivos =  count($_FILES['fotos']['name']);

				//fim da contagem


				$pastaImg = "../albuns/";
				$pastaThumbs = "../albuns/thumbs/";

				//===================================================================================================
				


							extract($_FILES);
							$arq = $_FILES['fotos'];


								foreach (array($arq) as $resultado) {
										
												reset($resultado);

														for($i = 0;$i < $numeroDeARquivos ;$i++){

										$iiii = $resultado['name'][$i];

										$extensao = pathinfo($iiii,PATHINFO_EXTENSION);


																		$arquivo = $resultado['tmp_name'][$i];
																		$fotoNome = $resultado['name'][$i];
																		$mdname = uniqid(md5($resultado['name'][$i]),true).".".$extensao;
																		$diretorio = $pastaImg.$mdname;
																		$peso = $resultado['size'][$i];

														//REDIMENSIONADO FOTOS PARA MAXIMO DE 880 DE LAGURA OU 630 DE ALTURA
														  

														//-------------------------------------------------



												if($extensao=='jpg' or $extensao=='jpeg'  or $extensao=='bmp' or $extensao=='png' or $extensao=='gif' ){
																						

														$nomefotos[$i] = $diretorio;

														if(move_uploaded_file($arquivo, $diretorio)){
														$fotosCarregadas++;

														redimensionar_carregarFotos($diretorio,$pastaImg,$extensao,$mdname,800,630);

														// echo "<br><img src='".$diretorio."' width='50%'>";

														redimensionar_carregarFotos($diretorio,$pastaThumbs,$extensao,$mdname,150,150);

														$nome_para_bd .=$mdname.$separador;  


														}else{echo "Não foi possivel carregar seus arquivos<br>";}

												}else{
													echo "O Arquivo ".$resultado['name'][$i]." Formato Inválido!<br>";
													

												}


												//inserindo dados no bd
												

								
										}
								}//FIM FOREAC



												if($fotosCarregadas>0){

													//preparando a data

															$data = date('d/m/Y');
															$dataSql = muda_data_sql($data);
															$titulo_do_album = tratar_erros_uppercase(strtoupper(substituir_especiais($_POST['titulo'])));


													@require "connect.php";

													if($_con->query("INSERT INTO album(id,titulo,fotos,data) values('','$titulo_do_album','$nome_para_bd','$dataSql')")){

														echo "<br><br>Dados cadastrados com sucesso<br><br>";

													}
													



												}



								echo "<br>".$fotosCarregadas." fotos carregadas para o album ".strtoupper($_POST['titulo']).".<br>";
								echo "<br><br>".$nome_para_bd.".<br>";						

  }

}else{

	echo "Somente um administrador deste serviço pode acessar este conteúdo!.";
}


	echo "<br><br><center><a href='/robotica/administracao/' class='adm'  alt='Voltar a adminstração' title='Voltar a adminstração'>
	<img src='../Carbon/apps_32.png' alt='Voltar a adminstração' title='Voltar a adminstração'>
	</a></center>";


@require "rodape.php";
?>