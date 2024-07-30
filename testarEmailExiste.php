<?php

@require("connect.php");
	$podeTestar=false;
	// if(isset($_GET['login'])){
	// 	$login = $_GET['login'];
	// 	$podeTestar=true;

	// }else{
	// 	echo "Erro de Variavel de login";
	// }


	if(isset($_POST['mail'])){
		$mail = $_POST['mail'];
		$podeTestar=true;

	}else{
		echo "Erro de Variavel de mail";
	}
		
			

	if($podeTestar){

			$verificaEmail_a=$_con->prepare("select * from localcom_usuario where localcom_us_email=:mm");
			$verificaEmail_a->								  bindValue(":mm",$mail);
			$verificaEmail_a->												execute();
			$verificaEmail=								 $verificaEmail_a->rowCount();



			if($verificaEmail>0){
				echo 'não';
			}else{
				echo '';
			}
			


	}

?>