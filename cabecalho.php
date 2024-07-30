<!DOCTYPE html>
<?php
##################################
# PEDOR RIBEIRO - ©1990-2017     #
# http://www.pedroorf.com.br     #
# pedroorf@yahoo.com.br          #
# Script by PEDRO RIBEIRO        #
##################################
#

if($titulo==''){
  $titulo='facecomerce.com - seu portal de compras e vendas';
  $information='Comércio eletrônico simples para negócios rápidos.';
  
}

echo "<html lang='pt-br'>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta http-equiv='Content-Type' content='text/html'>

  <meta name='google-site-verification' content='-osX9e7ZJsWsmkIQ_6S-NWKc8eQaAw4MyqhYhKuqIiY' />
  
  <title>".$titulo."</title>
  <meta name='description' content='".$information."'>
  
  <meta name='keywords' content='Vendas,Trocas,Produtos,Videogames,Jogos,Celular,Tablet,Tv,Digital,Sansung,Sony,Moto,Motorola,LG,Carro,Moto,Fogão,Porta,Liquidificador,Churrasqueira,Unhas,Beleza,Computador,Notebook,Tela,Touch,Wi-fi,Wifi,Fone,projetor,Áudio,Vídio,Som,Casa,Cama,Banho,Toalha,Camisa,Calça,Tênis,Meia,Leggin,Short,Boné,péças,acessórios'>
  
  <meta name='robots' content='index, follow'>

<meta name='viewport' charset='width=device-width, initial-scale=1'>
<meta name='author' content='Pedro Ribeiro'>
<link rel='Shortcut Icon' href='/favicon.ico'>
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' />
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
<link rel='stylesheet' type='text/css' href='/css/materialize.css?v=".date('i:s')."'>
<link rel='stylesheet' type='text/css' href='/css/fontawesome-all.css?v=".date('i:s')."'>
<link rel='stylesheet' type='text/css' href='/css/estilo.css?v=".date('i:s')."'>

<meta property='og:image' content='".$imagemInicial."' />

</head>"

?>

<body>

     
      <div class="col s12 card-panel center" id="avisos">
        <img src="imgsite/loading_windows.gif" id="imgcarregando" />
      </div>


<?php

$logado=false;

@include_once "funcoes.php";

if(isset($_SESSION['NOME']) and $_SESSION['NOME']!=""){
$logado=true;
}


echo "<div class='corpo_container center'>";//termina no rodape
  echo "<div class='linha corPadrao-1'>";
    echo "<div class='row'>";


        //cabeçalho
        
            
            echo "<div class='col s12 l4 m12 logo center'>";
                
                        echo "<a href='/'><img src='/imgsite/logo.png' class='responsive-img'></a>";
                        
            echo "</div>";//titulo_logo

            echo "<div class='col s12 l4 m12'>";

                if($logado==false){
                    echo "<form name='frm_logar' action='logar.php' method='post'>";
                    echo "<br><input type='text' required name='login_for' placeholder='Login'>";
                    echo "<br><input type='password' required name='senhaaa_for' placeholder='Senha'>";
                    echo "<a href='#' id='enviar_form_login' class='btn waves-effect waves-light'>LOGAR</a>";
                    
                    echo "<a href='/cadastro' class='btn waves-effect waves-light orange bt_cadastro'>Cadastro</a>";

                    echo "</form>";
                    

                }else{
                  echo "
                
                  <div class='destaque borda-padrao' style='width:98%;margin-top:20px;'>
                  Bem-vindo(a)<br>

                  <i>".$_SESSION['LOGIN']."</i>, divirta-se vendendo e comprando!</div>";
                  
                  
                }
            echo "</div>";    

            echo "<div class='col s12 l4 m12'>";

                    echo "<form name='buscar_produto' action='/pesquisar' method='post'>";
                    echo "      

                              <div class='input-field'>
                              <input id='search' type='search' name='pesquisar' required>
                              <i class='material-icons'><img src='/Carbon/srch_16.png'></i>
                            </div>
                                              
                            


                                ";
                                
                    echo "</form>";
                    

            echo "</div>";//pesquisa fim


        if($logado){

          echo "
                  <div class='menuImagens center col s12 lista_de_icones'>
                  
                    <a href='sair'><img src='/Carbon/close_32.png' alt='Sair' title='Sair'></a>

                    <a href='minhascompras'><img src='/Carbon/cart_32.png' alt='Minhas Compras' title='Minhas Compras'></a>

                    <a href='minhasvendas'><img src='/Carbon/fax_32.png' alt='Minhas Vendas' title='Minhas Vendas'></a>

                    <a href='cadastrarProduto'><img src='/Carbon/edit_32.png' alt='Cadastrar Produto' title='Cadastrar Produto'></a>

                    <a href='qualificacoes'><img src='/Carbon/group_32.png' alt='Qualificações' title='Qualificações'></a>

                    <a href='notificacoes'><img src='/Carbon/timer_32.png' alt='Notificações' title='Notificações'></a>

                    <a href='ativarprodutos'><img src='/Carbon/opts_32.png' alt='Ativar produtos' title='Ativar produtos'></a>
                  
                  </div>";  

        }

       
        echo "</div>";//fim do div class=linha

       echo "</div>"; //fim do div class=row
       

    
?>

