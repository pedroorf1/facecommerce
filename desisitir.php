<?php
session_start();
if($_SESSION['ID']!=''){
@require "connect.php";

#$_id_produto = (int)$_POST['item'];

	
	$_con->query("SELECT localcom_vendas * WHERE id_comprador='".$_SESSION['ID']."'"));





/*	if($_con->query("UPDATE localcom_vendas SET localcom_produto_ativo=0 WHERE localcom_produto_id='$_id_produto'")){
		echo "Seu produto foi desativado e não aparecerá mais nas pesquisas no facecomerce.";
	}else{
		echo "O produto não foi desativado. Entre em contato pelo suporte@facecomerce.com.";
	}
*/	
}

?>