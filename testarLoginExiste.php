<?php

@require("connect.php");
	$podeTestar=false;
	// if(isset($_GET['login'])){
	// 	$login = $_GET['login'];
	// 	$podeTestar=true;

	// }else{
	// 	echo "Erro de Variavel de login";
	// }


	if(isset($_POST['login'])){
		$login = $_POST['login'];
		$podeTestar=true;

	}else{
		echo "Erro de Variavel de login";
	}
		
			

	if($podeTestar){

			$verificaLogin_a=$_con->prepare("select * from localcom_usuario where localcom_us_login=:lg");
			$verificaLogin_a->								  bindValue(":lg",$login);
			$verificaLogin_a->												execute();
			$verificaLogin=								 $verificaLogin_a->rowCount();


			if($verificaLogin>0){

				echo "não";

			}else{

				echo "";
			}

	}

?>