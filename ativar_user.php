<?php
@require_once "sessao.php";
@require "cabecalho.php";


echo "<div class='col s12 m6 l12 center'>";//corpo da pagina

if(isset($_GET['A']) && isset($_GET['B'])){
	$_A = $_GET['A']; $_B = $_GET['B'];
	$_A = substituir_especiais($_A);
	
	@require "connect.php";

	$_verificar = $_con->prepare("SELECT * FROM localcom_usuario WHERE localcom_us_login='$_A' and localcom_us_ativacao='$_B'");
	$_verificar->execute();
	$_lis = $_verificar->fetch(PDO::FETCH_ASSOC);

	$n = $_verificar->rowCount();

	if($n==1 and $_lis['localcom_us_ativado']==0){

	$_ativar = $_con->prepare("UPDATE localcom_usuario SET localcom_us_ativado=1 WHERE localcom_us_login='$_A' and localcom_us_ativacao='$_B'");
	$_ativar->execute();

	echo "<div class='avisos'>Bem-vindo ".$_lis['localcom_us_nome']."
			Você já esta ativado, faça login para usar nossos recursos.</div>";


	}

	if($n==0 and $_lis['localcom_us_ativado']==''){
		echo "<div class='avisos'>Este usuário não existe.</div>";

	}

		if($n==1 and $_lis['localcom_us_ativado']==1){
		echo "<div class='avisos'>Este usuário já está ativado.</div>";

	}

	if($n!=0 and $_lis['localcom_us_ativado']==3){
		echo "<div class='avisos'>Este usuário está bloqueado por uso indevido do sistema, entre em contato pelo sac@facecomerce.com.</div>";

	}




}

echo "</div>";//fim do corpo da pagina
@require "rodape.php";
?>