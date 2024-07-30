<?php
@session_start();
@$_SESSION['LOGIN']='';
@$_SESSION['NOME']='';
@$_SESSION['EMAIL']='';
@$_SESSION['CEP']='';
@$_SESSION['ID']='';
@$_SESSION['ID_PROD']='';
@$_SESSION['DEBUG']='';

@include_once "cabecalho.php";

if(isset($_POST['login_for'])){
				$login_ = substituir_especiais($_POST['login_for']);
				$senha = substituir_especiais($_POST['senhaaa_for']);


				@include_once 'connect.php';

				$_pesquisandoUsuario=$_con->prepare("SELECT * FROM localcom_usuario WHERE localcom_us_login=:logg");
				$_pesquisandoUsuario->bindValue(":logg",$login_);
				$_pesquisandoUsuario->execute();


				$pesq = $_pesquisandoUsuario->rowCount();
				$linha = $_pesquisandoUsuario->fetch(PDO::FETCH_ASSOC);

				if($pesq>0){
						
							if($linha['localcom_us_ativado']==1){
								$hash = $linha['localcom_us_senha'];

								if(crypt($senha,$hash)===$hash){

									$_SESSION['LOGIN']=$linha['localcom_us_login'];
								 	$_SESSION['NOME']=$linha['localcom_us_nome'];
								 	$_SESSION['EMAIL']=$linha['localcom_us_email'];
								 	$_SESSION['ID']=$linha['localcom_us_id'];
								 	$_SESSION['CEP']=$linha['localcom_us_cep'];
								 ?>

								 <script type='text/javascript'>
								 	window.location.href="/";
								 </script>	

								 <?php

								}
					

						}else{



										if($linha['localcom_us_ativado']==3){
											
											echo "<div class='avisos'>Este usuario foi bloqueado por uso indevido do sistema. Envie um email com seus dados de acesso(não mande sua senha, apenas seu login e email cadastrado) para sac@facecomerce.com<br></div>";
										}else{
												echo "<div class='avisos'>Este usuario não está ativado. Envie um email com seus dados de acesso(não mande sua senha, apenas seu login e email cadastrado) para sac@facecomerce.com</div>";									
										}

							
								}

				 	}else{

				 		echo "<div class='avisos'>Erro ao logar, verifique seus dados!</div>";
				 	}
				 	

}


@include_once "rodape.php";
?>