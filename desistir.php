<?php
session_start();
if($_SESSION['ID']!=''){
@require "connect.php";

$id_compra = (int)$_POST['compra'];

	$lista=$_con->query("SELECT * FROM localcom_vendas WHERE venda_id=".$id_compra." AND id_comprador=".$_SESSION['ID']);

	$passou = $lista->fetch(PDO::FETCH_ASSOC);

	$num_linhas = $lista->rowCount();

	$item =$passou['id_produto'];

	if($num_linhas>0){


		$lista_2=$_con->query("SELECT * FROM localcom_produtos WHERE localcom_produto_id=".$item);

			$passou2 = $lista_2->fetch(PDO::FETCH_ASSOC);

			$quantidad_nova = $passou['localcom_quantidade_vendida	'] - $passou2['quantidade'];	

		$_con->query("UPDATE localcom_produtos SET localcom_quantidade_vendida=".$quantidad_nova." WHERE localcom_produto_id=".$item);
		
		$_con->query("DELETE FROM localcom_vendas WHERE venda_id=".$id_compra." AND id_comprador=".$_SESSION['ID']);

	}
	
}

?>