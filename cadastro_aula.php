<?php
@require "cabecalho.php";

if(isset($logado) and $logado==true){

?>
<div class='corpo'>
<br>
	
	<center>
				
		<h2>CADASTRO AULAS</h2>
			
	<?php
		echo "<div id='img_carregando'><center><img src='../imgsite/carregando.gif' width='150px'></center></div>";
	?>
				<form  action="" method="post"  enctype="multipart/form-data" autocomplete="off" id='formForm'>

				<input class="formCampo" type="text" name="bnome" size="80" required="yes" placeholder="Titulo da aula"><br><br>
				<textarea class="formCampo" name="bdescricao" cols="80" rows="10" required="yes" placeholder="Metodologia"></textarea><br><br>

				Selecione uma foto do bloco.(jpg,png,gif ou bmp).<br>
				<input  name="imgss" type="file"><br>
				<input  type="submit" name="btCadastra_bloco" value="Inserir Bloco">
		
				</form>
				
	</center>

<?php

	echo "<br><br><center><a href='/site/administracao/' class='adm'  alt='Voltar a adminstração' title='Voltar a adminstração'>
	<img src='../Carbon/apps_32.png' alt='Voltar a adminstração' title='Voltar a adminstração'>
	</a></center>";


echo "</div>";



//INSERINDO BLOCO


		if(isset($_POST['btCadastra_bloco']) and isset($_FILES['imgss'])){

			$fotoCerragada = false;

				$titulo 	   = substituir_especiais(strtoupper($_POST['bnome']));
				$descricao	   = substituir_especiais(ucfirst($_POST['bdescricao']));

				$img = $_FILES['imgss'];
				
				$diretorio = "../imgsaulas/";



				if($ok_img = fotomaior_no_bd($_FILES['imgss'],$diretorio,1000,1000)){

					echo "<center><img src=".$ok_img."></center><br>";

					$ok_img = str_replace($diretorio,"",$ok_img);

					$fotoCerragada=true;
				}else{

					echo "Houve um problema ao carrgar o arquivo de imagem, ente novamente<br>";
				}


				//INSERIR OS DADOS NO BD

				@require "connect.php";
								$sql = $_con->query("insert into aulas(id,titulo,descricao,img)
								values('','$titulo','$descricao','$ok_img')")or die("Erro ao Cadastrar, entre em contato com o suporte.");


		}




}else{

	echo "Somente um administrador deste serviço pode acessar este conteúdo!.";
}

@require "rodape.php";
?>