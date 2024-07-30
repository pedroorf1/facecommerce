<?php
@require "cabecalho.php";

if(isset($logado) and $logado==true){

?>
<div class='corpo'>
<br>
	
	<center>
				
		<h2>INSERIR VIDEO NO MURAL</h2>
	<?php

		//echo substituir_especiais(strtoupper("fúria"));		


		echo "<div id='img_carregando'><center><img src='../imgsite/carregando.gif' width='150px'></center></div>";
	?>
				<form  action="" method="post"  enctype="multipart/form-data" autocomplete="off" id='formForm'>
				<input type="hidden" value="upload" name="<?php echo ini_get('session.upload_progress.name'); ?>" />

				<input class="formCampo" type="text" name="bnome" size="80" required="yes" placeholder="Titulo do video"><br><br>
				<label>SELECIONE UM ARQUIVO DE VIDEO PARA ENVIAR</label>
				<input type="file" name='video' size="10" max="1"><br><br>
				<input  type="submit" name="btCadastra_bloco" value="Enviar">
				</form>
				
	</center>

<?php

	echo "<br><br><center><a href='/robotica/administracao/' class='adm'  alt='Voltar a adminstração' title='Voltar a adminstração'>
	<img src='../Carbon/apps_32.png' alt='Voltar a adminstração' title='Voltar a adminstração'>
	</a></center>";

				
echo "</div>";

//INSERINDO BLOCO


		if(isset($_POST['btCadastra_bloco'])){

			$videoCerragada=false;

			
				$titulo 	   = substituir_especiais(strtoupper($_POST['bnome']));
				$_Video 	   = $_FILES['video'];
				echo $titulo."<br>";

				$diretorio = "../videosmural/";

				//

				if($ok_video = uploade_video($_FILES['video'],$diretorio)){


					$source = $ok_video;
					$source = str_replace("..","",$source);

					$videoCerragada=true;
				}else{

					echo "Houve um problema ao carregar o arquivo de video, tente novamente<br>";
				}


				if($videoCerragada==true){

								@require "connect.php";

								$ok_video = str_replace($diretorio,"",$ok_video);
								
								if($sql = $_con->query("insert into postes(id,titulo,video)
								values('','$titulo','$ok_video')")or die("Erro ao Cadastrar, entre em contato com o suporte.")){

									
								}else{

									echo "<center><p>Erro ao inserir conteudo!</p></center>";
								}

				}




		}




}else{

	echo "Somente um administrador deste serviço pode acessar este conteúdo!.";
}

@require "rodape.php";
?>