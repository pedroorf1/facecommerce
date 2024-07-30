<?php
@require_once "sessao.php";
@require "connect.php";

if(($_SESSION='ID')!=''){

	if(isset($_GET['id_referente']) and $_GET['id_referente']!=''){

		$_ref = (int)$_GET['id_referente'];
		
		$_verificar = $_con->prepare("SELECT * FROM localcom_usuario as user,localcom_vendas as vend WHERE user.localcom_us_id='$_ref' and (vend.id_vendedor='$_ref' or vend.id_comprador='$_ref')");
		$_verificar->execute();

		$_lis = $_verificar->fetch(PDO::FETCH_ASSOC);

		var_dump($_lis);


	}

}

?>