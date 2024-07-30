<?php
@require "cabecalho.php";

if(isset($logado) and $logado==true){

?>
<div class='corpo'>
<br>
	
	<center>
				
		<h2>CADASTRO DE BLOCOS DE PROGRAMAÇÃO</h2>
			
	<?php
		echo "<div id='img_carregando'><center><img src='../imgsite/carregando.gif' width='150px'></center></div>";
	?>
				<form  action="" method="post"  enctype="multipart/form-data" autocomplete="off" id='formForm'>

				<input class="formCampo" type="text" name="bnome" size="80" required="yes" placeholder="Titulo do PDF"><br><br>
				
				Selecione um arquivo PDF para inserir no mural.<br>
				<input  name="pdf" type="file"><br>
				<input  type="submit" name="btCadastra_bloco" value="Inserir Bloco">
		
				</form>
				
	</center>

<?php

	echo "<br><br><center><a href='http://localhost/robotica/administracao/' class='adm'  alt='Voltar a adminstração' title='Voltar a adminstração'>
	<img src='../Carbon/apps_32.png' alt='Voltar a adminstração' title='Voltar a adminstração'>
	</a></center>";


echo "</div>";



//INSERINDO BLOCO


		if(isset($_POST['btCadastra_bloco']) and isset($_FILES['pdf'])){

			$fotoCerragada = false;

				$titulo = substituir_especiais(strtoupper($_POST['bnome']));
				$doc = $_FILES['pdf'];
				
				$diretorio = "../documentosmural/";

					//INSERINDO PDF NO REPOSITORIO
					if($nome_do_arquivo = pdf_no_bd($doc,$diretorio)){

							@require "connect.php";
											$sql = $_con->query("insert into postes(id,titulo,documento)
											values('','$titulo','$nome_do_arquivo')")or die("Erro ao Cadastrar, entre em contato com o suporte.");

					}

				//INSERIR OS DADOS NO BD





		}




}else{

	echo "Somente um administrador deste serviço pode acessar este conteúdo!.";
}

@require "rodape.php";
?>