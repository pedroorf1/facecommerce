<?php
@require_once "sessao.php";
@require "cabecalho.php";


echo "<div class='col s12 m6 l12 center'>";//corpo da pagina

if($logado){
	
	
	@require "connect.php";

	$_verificar = $_con->prepare("SELECT * FROM localcom_vendas WHERE id_vendedor=".$_SESSION['ID']." or id_comprador=".$_SESSION['ID']."");
	$_verificar->execute();
	// $_lis = $_verificar->fetch(PDO::FETCH_ASSOC);

	$positiva_comprador=0;
	$positiva_vendedor=0;
	$negativa_comprador=0;
	$negativa_vendedor=0;
	$contador_vendedor=0;
	$contador_comprador=0;

	while($linha = $_verificar->fetch(PDO::FETCH_ASSOC)) {

			if($linha['qualificacao_vendedor']!=0){

				$contador_vendedor+=1;
				
				if($linha['qualificacao_vendedor']==1){
					$negativa_vendedor+=1;
				}

				if($linha['qualificacao_vendedor']==2){
					$positiva_vendedor+=1;
				}

			}


			if($linha['qualificacao_comprador']!=0){

				$contador_comprador+=1;

				if($linha['qualificacao_comprador']==1){
					$negativa_comprador+=1;
				}

				if($linha['qualificacao_comprador']==2){
					$positiva_comprador+=1;
				}

			}


	}//fim do foreac

	echo "<hr> VENDEDOR:<br>POSITIVA:".$positiva_vendedor."<br>NEGATIVA:".$negativa_vendedor."<br> De ".$contador_vendedor." Qualificação(ões).<br>";
	echo "<hr> COMPRADOR:<br>POSITIVA:".$positiva_comprador."<br>NEGATIVA:".$negativa_comprador."<br> De ".$contador_comprador." Qualificação(ões).<hr>";
}

echo "</div>";//fim do corpo da pagina
@require "rodape.php";
?>