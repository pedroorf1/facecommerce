<?php

@require("connect.php");
	$podeTestar=false;

	if(isset($_POST["cpf"])){
		$cpf = trim($_POST["cpf"]);
		$podeTestar=true;

	}else{
		echo "Erro de Variavel de login";
	}
		
			

	if($podeTestar){

			$verificaLogin=$_con->query("SELECT * FROM localcom_usuario");
			
			$linhas = $verificaLogin->rowCount();
			while($sas = $verificaLogin->fetch(PDO::FETCH_ASSOC)){
				if($sas['localcom_us_cpf']==((string)$cpf)){

					echo "sim";
					break;
				}
			}


	}

?>