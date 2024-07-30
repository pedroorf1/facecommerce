$(document).ready(function(){

	function NovoXMLHttpReq(){
		try{
		xmlhttp = new XMLHttpRequest();
		}catch(ee){

		try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){

		try{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			
		xmlhttp = false;
		}
		}
		}
	return xmlhttp;	
	}

try{
var img_car_regando = document.getElementById('imgcarregando');	
var car_regando = new Image();
car_regando.src = img_car_regando.getAttribute("src");

	car_regando.addEventListener("load",function(){
		
		img_car_regando.src = car_regando.src;

	});

}catch(iimmggccaarr){}



	//GLOBAIS
	$('select').material_select();

	var load_gif = document.createElement("img");
	load_gif.setAttribute("src","www.facecomerce.com/imgsite/loading_windows.gif");


// VALIDACAO DE CAMPOS DOS CADASTRO DE PRODUTOS
// 
	if(document.getElementsByName('cadprodutos')[0]){

				var botao_cadastrar_produto = document.getElementsByName('cadprodutos')[0];
				var formCadProd = document.getElementById('frmCad_produtos');
				var div_carregando = document.getElementById('avisos');	
					
					var msgErrorDiv = document.getElementById('ErrorMSG');


						var passe = {
							tipo:		    false,
							titulo:         false,
							marca:          false,
							modelo:			false,
							valor: 			false,
							descricao: 		false,
							peseo:			false,
							altura: 		false,
							largura: 		false,
							comprimentor: 	false,
							pac: 			false,
							sedex: 			false,
							sedex10: 		false,
							sedexac: 		false,
							semTransporte:  false,
							quantidade:		false,
							capa:           false,
							fotos: 			false
							};

					
						


					botao_cadastrar_produto.addEventListener("click",function(){

						var mensagemDeErroDeTestes = "<img src='icons/ic_warning_black_24dp_2x.png'><br>";
						

								try{

										var campo_tipo = document.getElementsByName("tipo_prod")[0];
										var campo_titulo = document.getElementsByName("titulo")[0];
										var campo_marca = document.getElementsByName("marca")[0];
										var campo_modelo = document.getElementsByName("modelo")[0];
										var campo_valor = document.getElementsByName("valor")[0];
										var campo_descricao = document.getElementsByName("descricao")[0];
										var campo_peso = document.getElementsByName("peso")[0];
										var campo_altura = document.getElementsByName("altura")[0];
										var campo_largura = document.getElementsByName("largura")[0];
										var campo_comprimento = document.getElementsByName("comprimento")[0];
										var campo_pac = document.getElementsByName("pac")[0];
										var campo_sedex = document.getElementsByName("sedex")[0];
										var campo_sedexac = document.getElementsByName("sedexac")[0];
										var campo_sedex10 = document.getElementsByName("sedex10")[0];
										var campo_semTransporte = document.getElementsByName("sem")[0];
										var campo_quantidade = document.getElementsByName("quantidade")[0];
										var campo_capa = document.getElementById("fotocapa");
										var campo_fotos = document.getElementById("fotosadd");
									
									}catch(kkk){}


						if(campo_tipo.value=='todos'){mensagemDeErroDeTestes += "Você precisa escolher um <b>tipo</b> para o produto<br>";}else{passe['tipo']=true;}
						if(campo_titulo.value==''){mensagemDeErroDeTestes+="Digitar um <b>titulo</b> para o produto<br>";}else{passe['titulo']=true;}
						if(campo_marca.value==''){mensagemDeErroDeTestes+="Você precisa digitar a <b>marca</b> do produto<br>";}else{passe['marca']=true;}
						if(campo_modelo.value==''){mensagemDeErroDeTestes+="Você precisa digitar o <b>modelo</b> do produto<br>";}else{passe['modelo']=true;}
						if(campo_valor.value==''){mensagemDeErroDeTestes+="Você precisa especificar um <b>valor</b> para o produto<br>";}else{passe['valor']=true;}
						if(campo_descricao.value==''){mensagemDeErroDeTestes+="Você precisa digitar uma <b>descrição</b> para o produto<br>";}else{passe['descricao']=true;}
						if(campo_peso.value==''){mensagemDeErroDeTestes+="Você precisa digitar o <b>peso</b> do produto já embalado<br>";}else{passe['peso']=true;}
						if(campo_altura.value==''){mensagemDeErroDeTestes+="Você precisa especificar a <b>altura</b> da embalagem do produto<br>";}else{passe['altura']=true;}
						if(campo_comprimento.value==''){mensagemDeErroDeTestes+="Você precisa especificar o <b>comprimento</b> da embalagem do produto<br>";}else{passe['comprimento']=true;}
						if(campo_largura.value==''){mensagemDeErroDeTestes+="Você precisa especificar a <b>largura</b> da embalagem do produto<br>";}else{passe['largura']=true;}
						

						if(campo_pac.checked){passe['pac']=true;}
						if(campo_sedex.checked){passe['sedex']=true;}
						if(campo_sedex10.checked){passe['sedex10']=true;}
						if(campo_sedexac.checked){passe['sedexac']=true;}
						if(campo_semTransporte.checked){passe['semTransporte']=true;}
						
						if(campo_quantidade.value==''){mensagemDeErroDeTestes+="Você precisa digitar uma <b>quantidade</b> para o produto<br>";}else{passe['quantidade']=true;}
						if(campo_capa.value==''){mensagemDeErroDeTestes+="Você precisa escolher a <b>foto</b> de capa para o produto<br>";}else{passe['capa']=true;}
						if(campo_fotos.value==''){mensagemDeErroDeTestes+="Você precisa escolher ao menos uma <b>foto</b> para o produto<br>";}else{passe['fotos']=true;}
							

										

											var seTemTransporte = false;

											if(passe['pac'] || passe['sedex'] || passe['sedex10'] || passe['sedexac'] || passe['semTransporte']){
												seTemTransporte = true;
											}else{
												mensagemDeErroDeTestes +="Você precisa ecolher um tipo de <b>transporte</b>, ou marcar a opção <b>sem transporte</b><br>";
											}



						if(seTemTransporte && (passe['tipo'] && passe['titulo'] && 
							passe['marca'] && passe['modelo'] && passe['valor'] && 
							passe['descricao'] && passe['peso'] && passe['altura'] && 
							passe['comprimento'] &&	passe['largura'] && 
							passe['quantidade'] && passe['capa'] && passe['fotos']))
						{
							div_carregando.style['display']="block";
							formCadProd.submit();
						}else{

							msgErrorDiv.innerHTML = '';
							msgErrorDiv.innerHTML = mensagemDeErroDeTestes;
							mensagemDeErroDeTestes = '';

							
							
						}

						

					});

	}	

//=========CALCULO DE FRETE=====================================
//
		 

if($("[name=TPtransporte]")){

var PG_COMPRA = $("[name=TPtransporte]");
var QTD_MUDOU = $("[name=qtd]");

	 PG_COMPRA.change(function(){
	 	calc_fret();

	 });

	 PG_COMPRA.ready(function(){
	 	calc_fret();
	 });

	 QTD_MUDOU.change(function(){
	 	calc_fret();
	 });


}


function calc_fret(){

		var TP = $("[name=TPtransporte]");
		var ID_P = $("[name=IDPROD]");
		var VL_F = $("[name=frete_valor]");
		var VL_FH = $("[name=valor_frete]");
		var VL_unid = $("[name=produto_valor]").val();
		var quantidade_=1;
		var total;

		var TT_COMPRA = $("[name=tatalcompra]");
		var TT_COMPRAH = $("[name=ttcompra]");
		var QTD = $("[name=qtd]");
		quantidade_ = QTD.attr('value');
		VL_F.text("frete");

		quantidade_ = QTD.val();

			XM_frete = NovoXMLHttpReq();

						
				if(XM_frete!=false){


						XM_frete.onreadystatechange = function(){

									
							          			
							          			if(XM_frete.readyState==4){

							          			var Conteudos = XM_frete.responseText;
							          			var tamanhoDaString = Conteudos.length;	
							          			var separador = Conteudos.indexOf("|");
							          			var valorDoFrete = Conteudos.substr(0,separador);
							          			var PrazoDeEntrega = Conteudos.substr(separador+1,tamanhoDaString);	
							          			var soma,total;

							          				if(isNaN(valorDoFrete)){

							          					
							          					VL_unid = parseFloat(VL_unid);

							          	
							          												
													soma=(parseFloat(valorDoFrete.replace(",","."))+parseFloat(VL_unid)).toFixed(2);

													total=(parseFloat(soma))*(parseFloat(quantidade_)).toFixed(2);
													
	
													VL_F.text(valorDoFrete);
													VL_FH.attr("value",valorDoFrete.replace(",","."));
													//alert(VL_FH.value);

													// total.length;
													//alert(posicaoDoPonto+" | "+tamanhoDoTotal);
													var tamanhoDoTotal = total.toString().replace(".",",").length;
													var posicaoDaVirgula = total.toString().indexOf(".");
													
															TT_COMPRA.text((total.toFixed(2).replace(".",",")));
															TT_COMPRAH.attr("value",total.toFixed(2));
															//alert(TT_COMPRAH.value);

							          				}else{


							          					
							          				VL_unid = parseFloat(VL_unid);

							          	
							          												
													soma=VL_unid.toFixed(2);

													total=(parseFloat(soma))*(parseFloat(quantidade_)).toFixed(2);
													
													var avisodetranposte = "Este produto não pode ser enviado pelos correios ou sua localização não aceita este tipo de remessa. - A REMESSA DEVE SER ACERTADA COM O VENDEDOR!";
													VL_F.text(avisodetranposte);
													VL_FH.attr("value",0);
													//alert(VL_FH.value);

													// total.length;
													//alert(posicaoDoPonto+" | "+tamanhoDoTotal);
													var tamanhoDoTotal = total.toString().replace(".",",").length;
													var posicaoDaVirgula = total.toString().indexOf(".");
													
														TT_COMPRA.text((total.toFixed(2).replace(".",",")));
														TT_COMPRAH.attr("value",total.toFixed(2));
															//alert(TT_COMPRAH.value);	
							          					
							          				}
				
																		
							                    }
												
							            }

												    XM_frete.open("POST","calcularfrete.php",true);
												    XM_frete.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
												    XM_frete.send("item="+ID_P.val()+"&tipo_de_transporte="+TP.val()+"&qtd="+QTD.val());
												    
									
				}


}



//FAVORITAR
//

if($("#favoritar")){
try{	
	var bt_favoritar = document.getElementById("favoritar");
	var id_produto = document.getElementsByName("iddPPP")[0].value;
	var imagemFavoritar = document.getElementsByClassName("fffav")[0];
	var div_lateralEsquerdaProuto = document.getElementById("lateralEsquedaProduto");
	var toogleImagem;


	bt_favoritar.addEventListener("click",function(){
	

		XM_FAVORITAR = NovoXMLHttpReq();


		if(XM_FAVORITAR!=false){

			XM_FAVORITAR.onreadystatechange = function(){

				if(XM_FAVORITAR.readyState==4){
					
					toogleImagem = XM_FAVORITAR.responseText;

					if(toogleImagem=="1"){
						imagemFavoritar.src = '/Carbon/fav_vermelha.jpg';

					}else{
						imagemFavoritar.src = '/Carbon/fav_branca.jpg';
					}


					div_lateralEsquerdaProuto.innerHTML=location.reload();



				}

			}

			XM_FAVORITAR.open("POST","favoritar.php",true);
			XM_FAVORITAR.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			XM_FAVORITAR.send("item="+id_produto);



		}



	});

}catch(gg){}

}
//========================================
//PASSAR FOTOS
try{


var proximo = document.getElementById("proximo");
var anterior = document.getElementById("anterior");
var foto_exibida = document.getElementById("fotoexibida");
var fotos =  document.getElementsByName("fftos")[0];
var qtr_ftos =  document.getElementsByName("qtdfftos")[0].value;
var IMAGENS__ = fotos.value.split("-CASA-");
var idexdafoto,novafoto;
var i=0;


	proximo.addEventListener("click",function(){
		i=0;

		$("#fotoexibida").slideUp(100).fadeOut( 100 );
	
	var bbb = foto_exibida.src.replace("https://","");	
		bbb = bbb.replace("http://","");	
		bbb = bbb.replace("www.facecomerce.com/","");
		bbb = bbb.replace("facecomerce.com/","");	

		for(i;i<=qtr_ftos-1;i++){
				var aaa = IMAGENS__[i];

				if(aaa==bbb){
					idexdafoto = i;
					novafoto = idexdafoto+1;

					break;


				}
				
				
			}
				if(novafoto==qtr_ftos){
					novafoto=1;
				}


				var img_teste = new Image();
				img_teste.src = IMAGENS__[novafoto];

			fotoexibida.src = IMAGENS__[novafoto];
					
			img_teste.addEventListener("load",function(){
						$("#fotoexibida").slideDown(500).fadeIn( 400 );	
					});				
			


	});



	//ppppppp
	

		anterior.addEventListener("click",function(){

		i=0;

		$("#fotoexibida").slideUp(100).fadeOut( 100 );
	
			var bbb = foto_exibida.src.replace("https://","");	
				bbb = bbb.replace("http://","");	
				bbb = bbb.replace("www.facecomerce.com/","");
				bbb = bbb.replace("facecomerce.com/","");	

						for(i;i<=qtr_ftos-1;i++){
				var aaa = IMAGENS__[i];

				if(aaa==bbb){
					idexdafoto = i;
					novafoto = idexdafoto-1;
					break;

				}
				

			}
				if(novafoto==0){
					novafoto=qtr_ftos-1;
				}
			

				var img_teste = new Image();
				img_teste.src = IMAGENS__[novafoto];



			fotoexibida.src = IMAGENS__[novafoto];
					
			img_teste.addEventListener("load",function(){
						$("#fotoexibida").slideDown(500).fadeIn( 400 );	
					});				
			

	});

}catch(rer){}

//COMPRAR

try{

if($('#botao_comprar')){
var frm_Comprando = $('[name=comprando]');	
var btn_Comprar = $('#botao_comprar');

btn_Comprar.click(function(){

	frm_Comprando.submit();
});

}

}catch(rr){}

try{

//COMPROVANTE
//
if($('#enviar_compravante')){
var frm_Comprovante = $('[name=comprovante_pagamento]');	
var btn_EnviarComprovante = $('#enviar_compravante');
var comprovante = $('[name=comprovante]');
var meus_aviso = document.getElementById("avisos");

btn_EnviarComprovante.click(function(){


	meus_aviso.style['display']="block";
	frm_Comprovante.submit();


});


}
//	
}catch(compr){}

//======================FOTO PRODUTO===============================================


try{

//FOTO PRODUTO
//
	if($('#enviar_foto_prod')){
		var frm_foto = $('[name=frm_fotoproduto]');	
		var btn_foto_produto = $('#enviar_foto_prod');
		var foto_produto = $('[name=fotoproduto]');
		var meus_aviso = document.getElementById("avisos");

				btn_foto_produto.click(function(){


					meus_aviso.style['display']="block";
					frm_foto.submit();


				});


	}
//	
}catch(compr){}


//======================RECEBIMENTO DO PRODUTO=================================


try{


	var comp_data = /^\d{4}[./-]\d{2}[./-]\d{2}$/;

	if($('#recebido')){
		var frm_recebido = $('[name=confirmar_recebimento_do_produto]');	
		var btn_recebido = $('#recebido');
		var da_ta = $('[name=data]');
		var meus_aviso = document.getElementById("avisos");

				btn_recebido.click(function(){

					if(da_ta.val().match(comp_data)){
							meus_aviso.style['display']="block";
							frm_recebido.submit();
					}else{
						alert("A data precisa ser válida");


					}


				});


	}
//	
}catch(compr){}

//======================RASTREIO===============================================


try{

//COMPROVANTE RASTREIO
//
	if($('#enviar_rastreio')){
		var frm_rastreio = $('[name=comprovante_rastreio]');	
		var btn_EnviarRastreio = $('#enviar_rastreio');
		var meus_aviso = document.getElementById("avisos");

				btn_EnviarRastreio.click(function(){

					meus_aviso.style['display']="block";
					frm_rastreio.submit();


				});


	}
//	
}catch(compr){}

//==================================================================

try{

//QUALIFICANDO VENDEDOR
//
	if($('#bt_qualificar_vendedor')){
		var frm_qualifica_vendedor = $('[name=qualificando_vendedor]');	
		var btn_qlf_vendedor = $('#bt_qualificar_vendedor');
		var meus_aviso = document.getElementById("avisos");

				btn_qlf_vendedor.click(function(){


					meus_aviso.style['display']="block";
					frm_qualifica_vendedor.submit();


				});


	}
//	
}catch(compr){}

//==================================================================


try{

//PERUNTANDO
//
if($('#perguntando')){
var txt_pergunta = $('#perguntando');
var id_do_produto = $('#produto_id');
var div_perguntas = $('#pergutas_repostas');
var o_vendedor = $('#o_vendedor');
var o_comprador = $('#o_comprador');
var teste_vendedor = o_comprador.val();


txt_pergunta.on("keypress", function(e) {
  if (e.keyCode == 13) {
   
    if(txt_pergunta.val().length<5){

    	alert("Seu texto está muito curto.");

    }else{
    				
    				XM_PERGUNTAR = NovoXMLHttpReq();


		if(XM_PERGUNTAR!=false){

			XM_PERGUNTAR.onreadystatechange = function(){

				if(XM_PERGUNTAR.readyState==4){
					
					var pergunta_pronta = XM_PERGUNTAR.responseText;

									
					div_perguntas.innerHTML=location.reload();

				}

			}

			XM_PERGUNTAR.open("POST","inserirpergunta.php",true);
			XM_PERGUNTAR.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			XM_PERGUNTAR.send("item="+id_produto.val()+"&pergunnta="+txt_pergunta.val()+"&idnotificado="+teste_vendedor);



		}

		notificar(o_vendedor.val(),id_do_produto.val(),"Você tem uma pergunta a ser respondida no https://www.facecomerce.com! ");

    }


  }
});


}
//	
}catch(compr){}


//
//==================================================================

try{

//RESPONDENDO
//
if($('[name=resposta]')){
var txt_resposta = $('[name=resposta]');
var id_pergunta = $('[name=id_perg]');
var id_do_produto_ = $('#produto_id');
var div_perguntas = $('#pergutas_repostas');
var o_vendedor = $('#o_vendedor');
var o_comprador = $('#o_comprador');



txt_resposta.on("keypress", function(e) {
  if (e.keyCode == 13) {
   
    if(txt_resposta.val().length<5){

    	alert("Seu texto está muito curto.");

    }else{

    				

    				XM_RESPOSTA = NovoXMLHttpReq();


		if(XM_RESPOSTA!=false){

			XM_RESPOSTA.onreadystatechange = function(){

				if(XM_RESPOSTA.readyState==4){
					
					var resposta_pronta = XM_RESPOSTA.responseText;

					
					div_perguntas.innerHTML=location.reload();

					

				}

			}

			XM_RESPOSTA.open("POST","responder.php",true);
			XM_RESPOSTA.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			XM_RESPOSTA.send("id_pergunta="+id_pergunta.val()+"&reposta="+txt_resposta.val());



		}

		notificar(o_comprador.val(),id_do_produto_.val(),"Responderam sua pergunta no https://www.facecomerce.com! ");

 }


  }
});


}
//	
}catch(compr){}


//
//
try{

	function notificar(id_do_alvo_da_notificacao,id_do_produto_da_noticacao,textoNotificacao){
		//NOTIFICANDO
				//
				//
				
				

				XM_PERGUNTAR_NOTIFICACAO = NovoXMLHttpReq();

				if(XM_PERGUNTAR_NOTIFICACAO!=false){

					XM_PERGUNTAR_NOTIFICACAO.onreadystatechange = function(){

						if(XM_PERGUNTAR_NOTIFICACAO.readyState==4){

														
						}

					}

					XM_PERGUNTAR_NOTIFICACAO.open("POST","notificar.php",true);
					XM_PERGUNTAR_NOTIFICACAO.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
					XM_PERGUNTAR_NOTIFICACAO.send("item="+id_do_produto_da_noticacao+"&idnotificado="+id_do_alvo_da_notificacao+"&txtNotificacao="+textoNotificacao);



				}

	}	



}catch(rft){}


// ============ENVIANDO LOGIN ==================================

try{

 
if(document.getElementsByName("frm_logar")[0]){

	var logando = $("#enviar_form_login");

	var login_forward = document.getElementsByName("login_for")[0];
	var senha_forward = document.getElementsByName("senhaaa_for")[0];
	var form_forward = document.getElementsByName("frm_logar")[0];

	logando.click(function(){

		var tamanho_llg = login_forward.value;
		var tamanho_sss = senha_forward.value;

		if(tamanho_llg.length<5 || tamanho_sss.length<8){

			alert("Existem informações de login incorretas.");


		}else{	
																						
														
						form_forward.submit();

		}

	}); 	
}

}catch(UU){}

//=============================CONFIRMAÇÃO DE PAGAMENTO=======================

try{

 
if($('#btn_confirmar_pagamento')){

	var CONFIRMAR = $('#btn_confirmar_pagamento');
	var ID_VENDA = $('#ID_DA_VENDA');

	CONFIRMAR.click(function(){
		
				
				XM_CONFIRMACAO_COMPRA = NovoXMLHttpReq();

				if(XM_CONFIRMACAO_COMPRA!=false){

					XM_CONFIRMACAO_COMPRA.onreadystatechange = function(){

						
						if(XM_CONFIRMACAO_COMPRA.readyState==4){

							window.location.href="";	
						}

					}

					XM_CONFIRMACAO_COMPRA.open("POST","confirmar_pagamento.php",true);
					XM_CONFIRMACAO_COMPRA.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
					XM_CONFIRMACAO_COMPRA.send("CONFIRMACAO_PAGAMENTO=1&ID_VENDA="+ID_VENDA.val());



				}
																						
														
							


	}); 	
}

}catch(UU){}

//slide
try{

  $('.flexslider').flexslider({
    animation: "slide"
  });

}catch(drc){}

//DESATIVAR PRODUTO

try{
var botao_desativar_produto =  $("#desativaproduto");
var id_produto = $("#produto_id");

botao_desativar_produto.click(function(){
						
				XM_DESATIVAR_PRODUTO = NovoXMLHttpReq();

				if(XM_DESATIVAR_PRODUTO!=false){

					XM_DESATIVAR_PRODUTO.onreadystatechange = function(){

						

						
						if(XM_DESATIVAR_PRODUTO.readyState==4){

							alert(XM_DESATIVAR_PRODUTO.responseText);
							window.location.href="/";	
						}

					}

					XM_DESATIVAR_PRODUTO.open("POST","desativarproduto.php",true);
					XM_DESATIVAR_PRODUTO.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
					XM_DESATIVAR_PRODUTO.send("item="+id_produto.val());



				}

});	

}catch(sdsdsds){}

//DESISTIR DA COMPRA

try{
var BTN_DESISTIR_DA_COMPRA =  $("#desistirdacompra");
var COMPRA = $('[name=compra_identificador]');

BTN_DESISTIR_DA_COMPRA.click(function(){

						
				XM_DESISTIRCOMPRAR = NovoXMLHttpReq();

				if(XM_DESISTIRCOMPRAR!=false){

					XM_DESISTIRCOMPRAR.onreadystatechange = function(){

					
						if(XM_DESISTIRCOMPRAR.readyState==4){

							//alert(XM_DESISTIRCOMPRAR.responseText);
							window.location.href="/minhascompras";	
						}

					}

					XM_DESISTIRCOMPRAR.open("POST","desistir.php",true);
					XM_DESISTIRCOMPRAR.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
					XM_DESISTIRCOMPRAR.send("compra="+COMPRA.val());



				}

});	

}catch(sdsdsds){}




//FIM DO SCRIPT
});
