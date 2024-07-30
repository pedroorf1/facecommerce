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

if((isset($_GET['venda'])) and $logado){


@require "connect.php";

$id_venda =$_GET['venda'];

$vendedor = $_SESSION['ID'];

		$_pesquisa = $_con->prepare("SELECT * FROM localcom_vendas as v, localcom_produtos as p WHERE venda_id='$id_venda' and p.localcom_produto_id=v.id_produto");
		$_pesquisa->execute();
		$_compra = $_pesquisa->fetch(PDO::FETCH_ASSOC);

		$comp_id = $_compra['id_comprador'];
		$buscar_comprador = $_con->query("SELECT * FROM localcom_usuario WHERE localcom_us_id='$comp_id'");
		$comprador = $buscar_comprador->fetch(PDO::FETCH_ASSOC);
		$email_comprador = $comprador['localcom_us_email'];

		$_p = $_compra['localcom_produto'];

		echo "<input type='hidden' id='ID_DA_VENDA' value=".$_compra['venda_id'].">";

$numeroDeResgtrosDaPesquisa = $_pesquisa->rowCount();

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
if($vendedor === $_compra['id_vendedor']){

	echo "<div class='avisos upper'>".$_compra['localcom_produto']."<br> 
	Data da compra: ".muda_data_php($_compra['data_venda'])."</div>";


	//enviar comprante de pagamento	===================================================	
		if($_compra['comprovante_pgto']==''){

		echo "<div class='avisos_menor'>".substituir_especiais("O comprador ainda não enviou um comprovante de pagamento!")."</div>";

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
				echo "<div class='center avisos_menor'>
				<span>".substituir_especiais("O comprador aguarda a confirmação do pagamento do produto.")."</span></div>";

				echo "<div class='center' ><span class='btn' id='btn_confirmar_pagamento'>CONFIRMAR PAGAMENTO?</span></div>";	


				}else{
				echo "<div class='center avisos_menor'>
				<span>".substituir_especiais("Você já confirmou o pagamento deste produto.")."</span></div>";

				}

				if($_compra['foto_produto_antes_de_postar']=='' and $_compra['comprovante_pgto']!='' and $_compra['prod_pago']==1){
				echo "<div class='center avisos_menor'>
				<span>".substituir_especiais("Aguardando a foto do produto pronto para postagem(Produto embalado)")."</span></div>";

						echo "
					<fieldset class='col s12 m12 l12 truncate'>
					<legend>Enviar foto do produto</legend>

						<form name='frm_fotoproduto' method='post' action='#' enctype='multipart/form-data' class='col s12 m12 l12' />
						<input type='file' name='fotoproduto' class='col s12 truncate'  accept='image/png,image/jpeg' />
						</form>

					</fieldset>
					<br>
					<div class='btn' id='enviar_foto_prod'>Produto Postado</div>";

				}

				
			//===========================================


			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!=''){
				echo "

				<div class='center margens_ col s12'>
				<fieldset>
				<legend>PRODUTO ANTES DE SER ENVIADO</legend>

				<img src='".str_replace("site/","",$_compra['foto_produto_antes_de_postar'])."' class='responsive-img'>
					
				</fieldset>
				</div>";	
			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']==''){
				echo "

				<div class='center avisos_menor'>
				
				<span>Aguardando foto do codigo de rastreio(foto do comprovante de envio).</span>
					
				
				</div>";

				echo "
					<fieldset class='col s12 m12 l12 truncate'>
					<legend>Enviar foto do numero de rastreio</legend>

						<form name='comprovante_rastreio' method='post' action='#' enctype='multipart/form-data' class='col s12 m12 l12' />
						<input type='file' name='fotorastreio_' class='col s12 truncate'  accept='image/png,image/jpeg' />
						</form>

					</fieldset>
					<br>
					<div class='btn' id='enviar_rastreio'>Produto Postado</div>";

			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']!=''){
				echo "

				<div class='center margens_ col s12'>
				<fieldset>
				<legend>NUMERO DE RASTREIO</legend>

				<img src='".str_replace("site/","",$_compra['comprovante_postado'])."' class='responsive-img'>
					
				</fieldset>
				</div>";	
			}


			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']!='' and $_compra['prod_reccebido']!=1){
				echo "
				<div class='center avisos_menor'>
				
				<span>Aguardando confirmação de recebimento do comprador.</span>
					
				
				</div>";	
			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']!='' and $_compra['prod_reccebido']==1){
				echo "
				<div class='center avisos_menor'>
				
				<span>O comprador comfirmou o recebimento com o 'OK' para seu produto.</span>
				<br>
				<span>O produto foi recebido em ".muda_data_php($_compra['data_entrega']).".</span>
					
				
				</div>";	
			}


			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']!='' and $_compra['prod_reccebido']==1  and $_compra['foto_produto_recebido']==''){
				echo "
				<div class='center avisos_menor'>
				
				<span>Aguardando a foto do produto recebido.</span>
					
				
				</div>";	
			}

			if($_compra['prod_pago']==1 and $_compra['foto_produto_antes_de_postar']!='' and $_compra['comprovante_postado']!='' and $_compra['prod_reccebido']==1  and $_compra['foto_produto_recebido']!=''){
				
				echo "
				<div class='center margens_ col s12'>
				<fieldset>
				<legend>NUMERO DE RASTREIO</legend>

				<img src='".str_replace("site/","",$_compra['foto_produto_recebido'])."' class='responsive-img'>
					
				</fieldset>
				</div>";	
			}
				



		}


//=====================assets comprovante======================================
		if(isset($_FILES['comprovante']) and ($_FILES['comprovante']['name'])!='' and $logado){

			if($_arq = fotomaior_no_bd($_FILES['comprovante'],"comprovantes/","800","800",false));

			if($_con->query("UPDATE localcom_vendas SET comprovante_pgto='$_arq' WHERE venda_id='$id_venda'")){
				echo "Comprovante Inserido com êxito!";


									if($_con->query("INSERT INTO localcom_notificacoes(id_anuncio,id_notificar,notificacao,data) VALUES('$id_venda','$_vendedor_id','Você foi qualificado na venda do produto $_p','$data')"))
									{

										notificar_atividade($email_comprador,'Você foi qualificado na venda do produto'.$_p);									
										?>

										 <script type='text/javascript'>
										 	window.location.href="";
										 </script>	

										 <?php

									}



			}


		}

//=====================assets rastreio======================================
		if(isset($_FILES['fotorastreio_']) and ($_FILES['fotorastreio_']['name'])!='' and $logado){

			if($_arq_r = fotomaior_no_bd($_FILES['fotorastreio_'],"comprovantes/","800","800",false));

			if($_con->query("UPDATE localcom_vendas SET comprovante_postado='$_arq_r' WHERE venda_id='$id_venda'")){
				echo "Foto rastreio postada com êxito!";

									if($_con->query("INSERT INTO localcom_notificacoes(id_anuncio,id_notificar,notificacao,data) VALUES('$id_venda','$_vendedor_id','O vendedor enviou o número de rastreio de sua compra -  $_p','$data')"))
									{

										notificar_atividade($email_comprador,'O vendedor enviou o número de rastreio de sua compra - '.$_p);									
										?>

										 <script type='text/javascript'>
										 	window.location.href="";
										 </script>	

										 <?php

									}


			}


		}

//=====================assets foto produto======================================
		if(isset($_FILES['fotoproduto']) and ($_FILES['fotoproduto']['name'])!='' and $logado){

			if($_arq_f = fotomaior_no_bd($_FILES['fotoproduto'],"comprovantes/","800","800",false));

			if($_con->query("UPDATE localcom_vendas SET foto_produto_antes_de_postar='$_arq_f' WHERE venda_id='$id_venda'")){
				echo "Foto rastreio postada com êxito!";

									if($_con->query("INSERT INTO localcom_notificacoes(id_anuncio,id_notificar,notificacao,data) VALUES('$id_venda','$_vendedor_id','O vendedor postou a foto do produto pronto para ser enviado -  $_p','$data')"))
									{

										notificar_atividade($email_comprador,'O vendedor postou a foto do produto pronto para ser enviado - '.$_p);									
										?>

										 <script type='text/javascript'>
										 	window.location.href="";
										 </script>	

										 <?php

									}


					}

				
		
		}



	//enviar comprante de pagamento	===================================================		

}//fim da verificacao se é vendedor


echo "</div>";//Exibir

}


//============================================================================
	echo "</div>";//fim da primeira linha

@require "rodape.php";
?>