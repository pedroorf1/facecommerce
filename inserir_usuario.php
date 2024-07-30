<?php
@require_once "sessao.php";
@require_once "cabecalho.php";

echo "<center>";
try{

	@require "connect.php";


	

		if(isset($_POST['snome'])){
			

		    $nome 				= trim(substituir_especiais(ucfirst(ucwords($_POST['pnome']))));
			$snome 				= trim(substituir_especiais(ucfirst(ucwords($_POST['snome']))));
			$endereco 			= substituir_especiais($_POST['endereco']);
			$numero 			= trim(substituir_especiais($_POST['numero']));
			$cidade 			= trim(substituir_especiais(ucwords($_POST['cidade'])));
			$estado 			= trim(substituir_especiais(ucwords($_POST['estado'])));
			$cep 				= trim(substituir_especiais($_POST['cep']));
			$cpf 				= trim(substituir_especiais($_POST['cpf']));
			$sexo 				= trim(substituir_especiais(ucwords($_POST['sexo'])));
			$celular 			= trim(substituir_especiais($_POST['celular']));
			$datanascimento 	= trim($_POST['data_nasc']);
			$email 				= trim($_POST['email']);
			$login 				= trim(substituir_especiais($_POST['login_cad']));
			$senha1 			= trim(substituir_especiais($_POST['senha_cad']));
			$senha2 			= trim(substituir_especiais($_POST['senha2_cad']));
			$dataAtual 			= date('Y-m-d');
			

				if(($senha1==$senha2)){

										$Senha_hash = gerarSenhaCry($senha1,$senha2);
										$data_nasc_modificada = muda_data_sql($datanascimento);
										
											$dataAtual = str_replace("-","/",$dataAtual);
											$codigo_de_ativacao = md5($email.$login.$cpf);

							if($_con->query("insert into localcom_usuario(
								localcom_us_nome,
								localcom_us_sobrenone,
								localcom_us_login,
								localcom_us_senha,
								localcom_us_cpf,
								localcom_us_endereco,
								localcom_us_numero,
								localcom_us_cidade,
								localcom_us_estado,
								localcom_us_cep,
								localcom_us_telefone,
								localcom_us_email,
								localcom_us_data,
								localcom_us_sexo,
								localcom_us_datacad,
								localcom_us_ativacao
								)value(
								'$nome',
								'$snome',
								'$login',
								'$Senha_hash',
								'$cpf',
								'$endereco',
								'$numero',
								'$cidade',
								'$estado',
								'$cep',
								'$celular',
								'$email',
								'$data_nasc_modificada',
								'$sexo',
								'$dataAtual',
								'$codigo_de_ativacao'
								)
								")){
								$conteudo = "<div style='background-color:#42a5f5;color:white;width:99%;'>
								<div style='width:99%;'><center>
								<img src='https://www.facecomerce.com/imgsite/logo.png'><br>

								<span>
								<p>Bem-vindo(a) ao facecomerce.</p>

								<p>Click no link abaixo para ativar sua conta</p>
								<div style='color:red;background-color:white;border-radius:10px 10px 10px 10px; box-shadow:2px 4px 3px gray;padding: 2% 2%;margin-left:20px;'>
								<p><a href='https://www.facecomerce.com/ativar_user.php?A=".$login."&B=".$codigo_de_ativacao."'>Ativar conta</a><br>
								Ou copie e cole o codig a baixo no seu navegador<br>
								https://www.facecomerce.com/ativar_user.php?A=".$login."&B=".$codigo_de_ativacao."

								</p>
								</div>
								</span>
								<br><br><br><br>

								</center>
								</div>


								<br></div>";
								enviarEmail("facecomerce.com<ativaruser@facecomerce.com>",$email,"FACECOMERCE - Ativação de sua conta",$conteudo,"OK");


								echo "<div class='row'><div calss='panel col s12 m12 l12 centered'>PARABÉNS! Seu Cadasto foi realizado com sucesso, acesse seu email para ativar sua conta.</div></div>";

								sleep(4);

											?>

											 <script type='text/javascript'>
											 	window.location.href="/";
											 </script>	

											<?php


							}

			}else{

				echo "senha invalida.<br>";
			}

		}

}catch(Exception $e){

			echo "Erro de dados.<br>";
 }



echo "</center>";
require "rodape.php";
?>