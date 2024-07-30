window.onload = function(){

try{

	$("#capa").ready(function(){
		
	});

}catch(oopw){}


try{

var RegTesteArroba = new RegExp(/@\w{2,}\.\w{2,}/);
var RegTesteEspacoEmBranco = new RegExp(/\s/);

var RegTesteQtdDigitosSenha = new RegExp(/\w{8,}/);
var RegTesteSeTemNumeroNaSenha = new RegExp(/\d{1,}/);
var RegTesteSeTemLetraMaiuscula = new RegExp(/[A-Z]+/);

}catch(eee){

}


	//inicio request
function criarXmlHttp(){
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
	//fim do request


try{
//avaliando e enviando formulario de cadastro de pessoa fisica


	var mensagemDeErroDeTestes = "<img src='/icons/ic_warning_black_24dp_2x.png'><br>";
	var msgErrorDiv = document.getElementById('ErrorMSG');

	var botao_cadastar_pessoarfisisca = document.getElementById("btCadUser");
	var nome = document.getElementsByName("pnome")[0];
	var snome = document.getElementsByName("snome")[0];
	var data = document.getElementsByName("data_nasc")[0];
	var cpf = document.getElementsByName("cpf")[0];
	var endereco = document.getElementsByName("endereco")[0];
	var numero = document.getElementsByName("numero")[0];
	var cidade = document.getElementsByName("cidade")[0];
	var estado = document.getElementsByName("estado")[0];
	var cep = document.getElementsByName("cep")[0];
	var celular = document.getElementsByName("celular")[0];
	var email = document.getElementsByName("email")[0];
	var login = document.getElementsByName("login_cad")[0];
	var senha = document.getElementsByName("senha_cad")[0];
	var senha2 = document.getElementsByName("senha2_cad")[0];

	var fomurlario_cadastro_usuario = document.getElementById("forma_cad_usuario");


		var cpf_qtd_digitos;
		var cpf_teste;
		var cpf_passou = false;
		var email_passou=false;
		var senha_passou=false;
		var nome_passou=false;
		var sobre_nome_passou=false;
		var cidade_passou=false;
		var estado_passou=false;
		var cep_passou=false;
		var celular_passou=false;
		var login_passou=false;

	var caractes_;
	var testarCEP = /[0-9]{5}-[0-9]{3}/;


		celular.addEventListener("keypress",function(){
			
			if(celular.value.length==1){

				celular.value = "(";
			}

			if(celular.value.length==3){
				caractes_ = celular.value;
				celular.value = caractes_+")";

			}

			if(celular.value.length==9){
			caractes_ = celular.value;
			celular.value = caractes_+"-";

			}



		});

		cep.addEventListener("keypress",function(){

				if(cep.value.length==5){
				caractes_ = cep.value;
				cep.value = caractes_+"-";

			}



		});


		data.addEventListener("keypress",function(){
			
			if(data.value.length==2){

				caractes_ = data.value;
				data.value = caractes_+"/";
			}

			if(data.value.length==5){
				caractes_ = data.value;
				data.value = caractes_+"/";

			}

		});		
	
//===================================================TESTECPF==================================================================
		cpf.addEventListener("change",function(){

			var enviarCPF = parseInt(cpf.value);
			var testResultadoCPF = '';
			var testarSeENumero = /[0-9]{10,11}/;

			var testesCPF = [
			false,
			false,
			false,
			false
			]

			//testes sequencias para cpf
				var cpf_test1 = /123456789/;
				var cpf_test2 = /11111111111/;
				var cpf_test3 = /22222222222/;
				var cpf_test4 = /33333333333/;
				var cpf_test5 = /33333333333/;
				var cpf_test6 = /33333333333/;
				var cpf_test7 = /44444444444/;
				var cpf_test8 = /55555555555/;
				var cpf_test9 = /66666666666/;
				var cpf_test10 = /77777777777/;
				var cpf_test11 = /88888888888/;
				var cpf_test12 = /99999999999/;
				var cpf_test13 = /00000000000/;
		
				

			// ================================
	

			cpf_teste =parseInt(cpf.value);
			cpf_qtd_digitos = cpf_teste.toString().length;
			CPF_ = cpf_teste.toString();
			

				if(testarSeENumero.test(cpf.value)){

							testesCPF[0]=true;



				}else{
					testesCPF[0]=false;
					mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - CPF Inválido - Digite 11 (onze) números.<br>";
					cpf.style.background='red';
					
				}


					//testadndo ocorrencias simétricas
					
				if(testesCPF[0]){

								if(	cpf_test1.test(cpf.value) ||
									cpf_test2.test(cpf.value) ||
									cpf_test3.test(cpf.value) ||
									cpf_test4.test(cpf.value) ||
									cpf_test5.test(cpf.value) ||
									cpf_test6.test(cpf.value) ||
									cpf_test7.test(cpf.value) ||
									cpf_test8.test(cpf.value) ||
									cpf_test9.test(cpf.value) ||
									cpf_test10.test(cpf.value) ||
									cpf_test11.test(cpf.value) ||
									cpf_test12.test(cpf.value) ||
									cpf_test13.test(cpf.value)

									){
									testesCPF[1]=false;
									mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - A sequencia digitada para o cpf é invalida.<br>";
									cpf.style.background='red';
									
								}else{
									testesCPF[1]=true;
								}

				}


		//Testa digitos do cpf
		//
		//
		
							if(testesCPF[1]){//validacao dos digitos dos cpf
												var POSICAO,I,SOMA,DV,DV_INFORMADO;
												var DIGITO = new Array(10);

												var taaa = parseInt(CPF_.length);

												var Binicio = taaa-2;

												DV_INFORMADO = CPF_.substr(Binicio,2);//pegas os dois ultimos digitos do cpf

												//Colocando os numeros do cpf em um array
												for(I=0;I<=Binicio-1;I++){
													DIGITO[I]=CPF_.substr(I,1);

													
												}

												//Calcula o valor do 10 digito da verificacao
												POSICAO = Binicio+1;SOMA=0;

												for(I=0;I<=Binicio-1;I++){
													SOMA=SOMA+DIGITO[I]*POSICAO;
													POSICAO=POSICAO-1;
													
												}

											
												DIGITO[Binicio]=SOMA%11;

												if(DIGITO[Binicio]<2){DIGITO[Binicio]=0;}else{DIGITO[Binicio]=11-DIGITO[Binicio];}

												//Calcula o valor do 11 digito da verificacao
												POSICAO = Binicio+2;SOMA=0;
												for(I=0;I<=Binicio;I++){
													SOMA=SOMA+DIGITO[I]*POSICAO;
													POSICAO=POSICAO-1;
													

												}
												
												DIGITO[Binicio+1]=SOMA%11;
													
													
												if(DIGITO[Binicio+1]<2){DIGITO[Binicio+1]=0;}else{DIGITO[Binicio+1]=11-DIGITO[Binicio+1];}
													
												//VALIDADNDO O CPF
												DV = DIGITO[Binicio]*10+DIGITO[Binicio+1];

												
												if(DV!=DV_INFORMADO){
													mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - Este CPF foi testado e não passou.<br>";
													cpf.value = '';
													testesCPF[2]=false;

												}else{
													testesCPF[2] = true;
													cpf.style.background='white';
												}		


											}

				//++++++++++++++++++++++++++

								testCPF = criarXmlHttp();	

									if(testCPF!=false && testesCPF[2]){

										testResultadoCPF ='';


							          	testCPF.onreadystatechange = function(){

							          			
							          			if(testCPF.readyState==4){

													// testResultadoLOgin = xRemoverFav.getAllResponseHeaders();
													
													testResultadoCPF = testCPF.responseText;
													
																
															var coisa = testResultadoCPF.length>1;


															if(coisa){
																cpf_passou=false;
																cpf.style.background='red';
																cpf.value = 'Este cpf já está em uso';
																mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - Este cpf já esta cadastrado.<br>";

															}


															if(!coisa){
																cpf.style.background='white';
																cpf_passou=true;
															}

															
																		
							                    }





												
							            }

												    testCPF.open("POST","testarCpfExiste.php",true);
												    testCPF.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
												    testCPF.send("cpf="+cpf.value);
												    
									}



		});

//===================================================TESTELOGIN==================================================================
		login.addEventListener("change",function(){

			var enviar = login.value;
			var testResultadoLOgin = '';

			if(enviar.toString().length>7){


								xRemoverFav = criarXmlHttp();	

																	if(xRemoverFav!=false){

															          	xRemoverFav.onreadystatechange = function(){

															          			
															          			if(xRemoverFav.readyState==4){

																					// testResultadoLOgin = xRemoverFav.getAllResponseHeaders();
																					
																					testResultadoLOgin = xRemoverFav.responseText;
																					
																							if(testResultadoLOgin.length<1){
																								login_passou=true;

																								login.style.background='white';
																									
																							}else{
																								
																								mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - Este Login já existe, tente novamente.<br>";
																								login.style.background='red';
																								login_passou=false;
																								
																							}																										
															                    }
																				
															            }

																				    xRemoverFav.open("POST","testarLoginExiste.php",true);
																				    xRemoverFav.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
																				    xRemoverFav.send("login="+enviar);
																	}





			}else{

				login.style.background='red';
				mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - O login precisa ter ao menso 8 digitos<br>";
				login_passou=false;
			}					
								
																	if(login.value == ''){
																		login.style.background='white';
																		login_passou=false;
																	}



		});
										
//=====================================EMAIL=============================================================================
	

	email.addEventListener("change",function(){

		var email_test1 = /[a-zA-Z0-9]{3,}@[a-zA-Z]{2,}\.[a-zA-Z]{1,}/;
		var email_test2 = /\s/;

		//variaveis

		var testes_mail = [//usada para guardar os valores de testes no email
			false,
			false,
			false,
			false
		]

		var testResultadoEmail = '';
		var valor_email = email.value;



		//testamdo a entrada do email
		var teste_de_email = email_test1.test(email.value);
		var teste_de_email2 = email_test2.test(email.value);

			if(teste_de_email && !teste_de_email2){

								email.style.background = 'white';
								testes_mail[0]=true;
								
								4
							}else{

								
								email.style.background = 'red';	
								
								mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - Este email foi testado e não passou! Verifirque se tem o '@', se não tem espaços vazios, se não está com um endereço inválido de servidor.<br>";
							}



		//testando se já existe o email no bd
								

			if(testes_mail[0]){

								emailXmlHttp = criarXmlHttp();	

																	if(emailXmlHttp!=false){

															          	emailXmlHttp.onreadystatechange = function(){

															          			
															          			if(emailXmlHttp.readyState==4){

																					// testResultadoLOgin = xRemoverFav.getAllResponseHeaders();
																					
																					testResultadoEmail = emailXmlHttp.responseText;
																																										

																										
															                    }
																				
															            }

																				    emailXmlHttp.open("POST","testarEmailExiste.php",true);
																				    emailXmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
																				    emailXmlHttp.send("mail="+valor_email);
												



				}							
				
				if(testResultadoEmail!=''){
						testes_mail[1]=false;
						email.style.background='red';
						mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - O email que você está tentando cadastrar já existe<br>";
																		
					}else{
																						
																				
						testes_mail[1]=true;
						email.style.background='white';
																			
						}	
	

			}


								if(testes_mail[0] && testes_mail[1]){
									email_passou = true;
									}else{
									email_passou = false;
								}					


							

	});

//=======================================================================================================================
botao_cadastar_pessoarfisisca.addEventListener("click",function(){


//==================================TESTES MENORES=====================================================================


	if(nome.value.length>3){nome_passou=true;}else{mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - O nome precisa ter ao menos 3 digitos<br>";}	
	if(snome.value.length>3){sobre_nome_passou=true;}else{mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - O sobre nome precisa ter ao menos 3 digitos<br>";}
	if(cidade.value.length>3){cidade_passou=true;}else{mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - A cidade precisa ter ao menos 3 digitos<br>";}
	if(celular.value.length>=10){celular_passou=true;}else{mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - O telefone (celular) precisa ter ao menos 10 digitos(dd e numero) <br>";}
	if(testarCEP.test(cep.value)){cep_passou=true;}else{mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - O cep não passou no teste, verifique se esta correto.<br>";}
//=================================INFORMAÇÕES DOS ERROS===================================================================


//======================================SENHA=============================================================================


								if(senha.value === senha2.value){

										if((RegTesteQtdDigitosSenha.test(senha.value)) && (RegTesteSeTemNumeroNaSenha.test(senha.value)) && (RegTesteSeTemLetraMaiuscula.test(senha.value))){
											senha_passou=true;
											

										}else{

											mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - Esta senha foi testada e não passou. A senha precisa ter ao menos um número e uma letra maiúscula assim como tambem no mínimo oito caracteres.<br>";

											senha_passou=false;
										}


								}else{
									
									mensagemDeErroDeTestes = mensagemDeErroDeTestes + " - As senhas digitadas não são iguais.<br>";
									senha_passou=false;
								}


			//ENVIANDO O FORM DE CADASTROs
	if(email_passou&&celular_passou&&cep_passou&&cpf_passou&&nome_passou&&sobre_nome_passou&&cidade_passou&&senha_passou&&login_passou){
		msgErrorDiv.style.display = 'none';
		fomurlario_cadastro_usuario.submit();
							
		}else{

			msgErrorDiv.innerHTML  = '';
			msgErrorDiv.innerHTML  = mensagemDeErroDeTestes;

				

		}
		mensagemDeErroDeTestes = "<img src='/icons/ic_warning_black_24dp_2x.png'><br>";

});




}catch(tr){}


//===========================================================================================================//

}//fin do codigo ajax funcao window.load