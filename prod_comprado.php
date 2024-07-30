<?php
@include_once "sessao.php";
@require_once "cabecalho.php";

echo "<div class='row col m12 l12 s12 left-align'>";//primeira linha
//===============================================================================
//


		echo	"<div class='col s12 center card-panel' id='avisos'>
					<img src='imgsite/loading_windows.gif'>
				</div>";


//
//===============================================================================

			
			$data = muda_data_sql_2(date('d/m/Y'));


if((isset($_GET['compra'])) and $logado){


@require "connect.php";

$id_compra =$_GET['compra'];

echo "<input type='hidden' name='compra_identificador' value=".$id_compra.">";

$comprador = $_SESSION['ID'];

		$_pesquisa = $_con->prepare("SELECT * FROM localcom_vendas as v, localcom_produtos as p WHERE venda_id='$id_compra' and p.localcom_produto_id=v.id_produto");
		$_pesquisa->execute();

		$_compra = $_pesquisa->fetch(PDO::FETCH_ASSOC);

		$numeroDeResgtrosDaPesquisa = $_pesquisa->rowCount();
		$vend_id = $_compra['id_vendedor'];
		$buscar_vendedor = $_con->query("SELECT * FROM localcom_usuario WHERE localcom_us_id='$vend_id'");
		$vendendor = $buscar_vendedor->fetch(PDO::FETCH_ASSOC);
		$email_vendedor = $vendendor['localcom_us_email'];

		$_p = $_compra['localcom_produto'];



$_passes = array(
'comprovante_pgto'=>0,
'pagamento_confirmado'=>0,
'foto_produto'=>0,
'comprovante_postado'=>0,
'foto_recebido_ok'=>0
);

echo "<div class='col s12'>";//Exibir

		if($_compra['comprovante_pgto']!=''){$_passes['comprovante_pgto']=1;}
		if($_compra['prod_pago']==1){$_passes['pagamento_confirmado']=1;}
		if($_compra['foto_produto_antes_de_postar']!=''){$_passes['foto_produto']=1;}
		if($_compra['comprovante_postado']!=''){$_passes['comprovante_postado']=1;}
		if($_compra['foto_produto_recebido']!=''){$_passes['foto_recebido_ok']=1;}

//se for o vendedor
if($comprador === $_compra['id_comprador']){

	echo "<center><div class='avisos upper'>".$_compra['localcom_produto']."<br> 
	Data da compra: ".muda_data_php($_compra['data_venda'])."</div></center>";

	echo "<center><div class='avisos upper'>Caso deseje por qualquer motivo desistir da compra, entre e já tenha efetuado pagamento, entre emm cotado com o vendedor para negociar a devolução de seu dinheiro.<br>
	<div class='btn' id='desistirdacompra'>Desistir da Compra</div></center>

	</div>";


	//enviar comprante de pagamento	===================================================	
		if($_compra['comprovante_pgto']==''){

		echo "<div class='avisos_menor'>".substituir_especiais("Um comprovante de pagamento precisa ser postado!")."</div>";

		echo "<fieldset class='col s12 m12 l12 truncate'>
			<legend>Enviar comprovante de depósito</legend>

				<form name='comprovante_pagamento' method='post' action='#' enctype='multipart/form-data' class='col s12 m12 l12' />
				<input type='file' name='comprovante' class='col s12 truncate'  accept='image/png,image/jpeg' />
				</form>
		</fieldset>
		<br>
		<div class='btn' id='enviar_compravante'>Enviar Comprovante</div>";

		}


		if($_compra['comprovante_pgto']!=''){
			
			//=========================================
			echo "
			<div class='center margens_ col s12'>
			<fieldset>
				<legend>COMPROVANTE DE PAGAMENTO</legend>";
			echo "<img src='".str_replace("site/","",$_compra['comprovante_pgto'])."' class='responsive-img'>
			</fieldset>
			</div>";

				if($_compra['prod_pago']!=1){
				echo "<div class='center avisos_menor'><span class='center'>O pagamento ainda precisa ser confirmado pelo vendedor</span></div>";	
				}
				
			//===========================================


			if($_compra['prod_pago']==1){
				echo "<div class='center avisos_menor'><span>O pagamento já foi aprovado pelo vendedor.<br></span></div><br>";	
			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!=''){
				echo "

				<div class='center margens_ col s12'>
				<fieldset>
				<legend>FOTO DO PRODUTO ANTES DE SER POSTADO</legend>

				<img src='".str_replace("site/","",$_compra['foto_produto_antes_de_postar'])."' class='responsive-img'>
					
				</fieldset>
				</div>";	
			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']==''){
				echo "

				<div class='center avisos_menor'>
				
				<span>Aguardando foto da postagem</span>
					
				
				</div>";	
			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']==''){
				echo "

				<div class='center avisos_menor'>
				
				<span>Aguardando comprovante da postagem do produto.</span>
					
				
				</div>";	
			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']!=''){
				echo "

				<div class='center margens_ col s12'>
				<fieldset>
				<legend>FOTO DO NUMERO DE RASTREIO(COMPROVANTE DA POSTAGEM DO PRODUTO PARA O ENVIO)</legend>

				<img src='".str_replace("site/","",$_compra['comprovante_postado'])."' class='responsive-img'>
					
				</fieldset>
				</div>";	
			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']!='' and $_compra['prod_reccebido']!=1){
				echo "

				<div class='center avisos_menor'>
				
				<span>SOBRE O RECEBIMENTO DO PRODUTO.</span></div>

				<form name='confirmar_recebimento_do_produto' action='' method='post'>

				<legend>Você recebeu o produto?</legend>
				<select name='recebidook'>
					
					<option value='1'>Sim</option>
					<option value='0'>Não</option>
				</select>

				<legend>O produto estava de acordo com o anuncio?</legend>
				<select name='produtook'>
					<option value='1'>Sim</option>
					<option value='0'>Não</option>
				</select>
				<legend>Data do recebimento do produto.</legend>
				<input type='Date' name='data'>

				<span id='recebido' class='btn'>ENVIAR CONFIRMAÇÃO</span>
				</form>";	
			}				

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']!='' and $_compra['prod_reccebido']==1){

				echo "<fieldset>
					<legend>PRODUTO RECEBIDO</legend>
					Data do Recebimeto:".str_replace("site/","",$_compra['data_entrega'])."<br>";

					if($_compra['produto_ok']==1){
						echo "Produto recebido e em comformidade com o anúncio<br>";

					}else{
						echo "Produto recebido, mas não esta em comformidade com o anúncio<br>";
					}


					if($_compra['qualificacao_vendedor']<1){

						echo "<div class='center avisos_menor'>
						
						<span>Qualifique o vendedor.</span></div>

						<form name='qualificando_vendedor' action='' method='post'>
						<select name='qualificar_vemd'>
							<option value=2>Positiva</option>
							<option value=1>Negativa</option>
						</select>
						<span id='bt_qualificar_vendedor' class='btn'>QUALIFICAR</span>
						</form>
						</fieldset>";

					}else{
						if($_compra['qualificacao_vendedor']==2){
							echo "<div class='center avisos_menor'>Você qualificou o vendedor POSITIVAMENTE</div>";
						}
						if($_compra['qualificacao_vendedor']==1){
							echo "<div class='center avisos_menor'>Você qualificou o vendedor NEGATIVAMENTE</div>";
						}

					}

	
			
		}

}


//=====================assets comprovante======================================
		if(isset($_FILES['comprovante']) and ($_FILES['comprovante']['name'])!='' and $logado){

			if($_arq = fotomaior_no_bd($_FILES['comprovante'],"comprovantes/","800","800",false));

			if($_con->query("UPDATE localcom_vendas SET comprovante_pgto='$_arq' WHERE venda_id='$id_compra'")){
				echo "Comprovante Inserido com êxito!";

									

									if($_con->query("INSERT INTO localcom_notificacoes(id_anuncio,id_notificar,notificacao,data) VALUES('$id_compra','$vend_id','O comprador postou o comprovante de deposito na venda do seu produto $_p','$data')"))

									{

										notificar_atividade($email_vendedor,'O comprador postou o comprovante de deposito na venda do seu produto '.$_p);

									
										?>

										 <script type='text/javascript'>
										 	window.location.href="";
										 </script>	

										 <?php

									}

						}				


			}




//=====================assets RECEBIMENTO======================================
		if(isset($_POST['recebidook']) and $logado){

			$_se_recebido = (int)trim($_POST['recebidook']);
			$_se_ok = (int)trim($_POST['produtook']);
			$_data_ = $_POST['data'];
						
							if($_con->query("UPDATE localcom_vendas SET prod_reccebido='$_se_recebido',produto_ok='$_se_ok',data_entrega='$_data_' WHERE venda_id='$id_compra'")){
								echo "Atulização realizada com sucesso";

									

									if($_con->query("INSERT INTO localcom_notificacoes(id_anuncio,id_notificar,notificacao,data) VALUES('$id_compra','$vend_id','Houve atualização no estatus de sua venda - $_p','$data')"))
									{
										notificar_atividade($email_vendedor,'Houve atualização no estatus de sua venda - '.$_p);
									
										?>

										 <script type='text/javascript'>
										 	window.location.href="";
										 </script>	

										 <?php

									}



							}


		}

//============================================================================	
	
//=====================assets QUALIFICANDO O VENDEDOR======================================
		if(isset($_POST['qualificar_vemd']) and $logado){

			$_qual_vendedor = (int)trim($_POST['qualificar_vemd']);

						
							if($_con->query("UPDATE localcom_vendas SET qualificacao_vendedor='$_qual_vendedor' WHERE venda_id='$id_compra'")){
								echo "Atulização realizada com sucesso";

									

									if($_con->query("INSERT INTO localcom_notificacoes(id_anuncio,id_notificar,notificacao,data) VALUES('$id_compra','$vend_id','Você foi qualificado na venda do produto $_p','$data')"))
									{

										notificar_atividade($email_vendedor,'Você foi qualificado na venda do produto '.$_p);									
										?>

										 <script type='text/javascript'>
										 	window.location.href="";
										 </script>	

										 <?php

									}


							}


				}
	}			

//============================================================================	

echo "</div>";//Exibir

}


//============================================================================
	echo "</div>";//fim da primeira linha

@require "rodape.php";
?>