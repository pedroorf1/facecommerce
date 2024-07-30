<?php

@require("connect.php");
	
	if(isset($_POST["CONFIRMACAO_PAGAMENTO"])){
		$CONFIRMACAO =(int) trim($_POST["CONFIRMACAO_PAGAMENTO"]);
		$VENDA = (int)trim($_POST["ID_VENDA"]);

		$_pesquisa = $_con->prepare("SELECT * FROM localcom_vendas as v, localcom_produtos as p WHERE venda_id='$VENDA' and p.localcom_produto_id=v.id_produto");
		$_pesquisa->execute();
		$_compra = $_pesquisa->fetch(PDO::FETCH_ASSOC);

		$comp_id = $_compra['id_comprador'];
		$buscar_comprador = $_con->query("SELECT * FROM localcom_usuario WHERE localcom_us_id='$comp_id'");
		$comprador = $buscar_comprador->fetch(PDO::FETCH_ASSOC);
		$email_comprador = $comprador['localcom_us_email'];

		if($CONFIRMACAO==1){
			if($_con->query("UPDATE localcom_vendas SET prod_pago=1 WHERE venda_id=$VENDA")){
									$_p = $_compra['localcom_produto'];

									if($_con->query("INSERT INTO localcom_notificacoes(id_anuncio,id_do_notificado,notificacao) VALUES('$id_compra','$_vendedor_id','O vendedor confirmou o pagamento do produto $_p')"))
									{

										notificar_atividade($email_comprador,'O vendedor confirmou o pagamento do produto '.$_p);									
										?>

										 <script type='text/javascript'>
										 	window.location.href="";
										 </script>	

										 <?php

									}



				echo "Confirmação completada.";
			}			
		}			





	}

?>