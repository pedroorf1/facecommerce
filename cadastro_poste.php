<?php
@require "cabecalho.php";

if(isset($logado) and $logado==true){

?>
<div class='corpo'>
<br>
	
	<center>
				
		<h2>INSERIR INFORNAÇÃO NO MURAL</h2>
			
	<?php
		echo "<div id='img_carregando'><center><img src='../imgsite/carregando.gif' width='150px'></center></div>";
	?>

				<form  action="" method="post"  enctype="multipart/form-data" autocomplete="off" id='formForm'>

				<input class="formCampo" type="text" name="bnome" size="80" required="yes" placeholder="Titulo do recado"><br><br>
				<textarea class="formCampo" name="bdescricao" cols="80" rows="10" required="yes" placeholder="Escreva seu recado aqui"></textarea><br><br>
				<input  type="submit" name="btCadastra_bloco" value="Inserir Bloco">
		
				</form>
				
	</center>

<?php

	echo "<br><br><center><a href='/robotica/administracao/' class='adm'  alt='Voltar a adminstração' title='Voltar a adminstração'>
	<img src='../Carbon/apps_32.png' alt='Voltar a adminstração' title='Voltar a adminstração'>
	</a></center>";


echo "</div>";



//INSERINDO BLOCO


		if(isset($_POST['btCadastra_bloco'])){

			
				$titulo 	   = substituir_especiais(strtoupper($_POST['bnome']));
				$descricao	   = substituir_especiais(ucfirst($_POST['bdescricao']));


				@require "connect.php";
								
								if($sql = $_con->query("insert into postes(id,titulo,descricao)
								values('','$titulo','$descricao')")or die("Erro ao Cadastrar, entre em contato com o suporte.")){

									echo "<center><p>Recado cadastrado!</p></center>";
								}else{

									echo "<center><p>Erro ao cadastrar recado!</p></center>";
								}



		}




}else{

	echo "Somente um administrador deste serviço pode acessar este conteúdo!.";
}

@require "rodape.php";
?>