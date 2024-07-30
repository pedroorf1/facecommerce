<?php
@session_start();
$servico;
//$quantidade;
$altura;//inteiro cm
$largura;//inteiro cm
$comprimento;//inteiro cm
$peso;//float
$qtd;
$valor;//float 00.00
$CEPorigem;//inteiro
$CEPdestino;//inteiro

if(isset($_POST['item']) && $_SESSION['ID']!=''){

                    $_idDoProduto = (int)($_POST['item']);
                    $servico = (string)$_POST['tipo_de_transporte'];
                    $qtd = $_POST['qtd'];
                    $_SESSION['QT_PROD']=$qtd;



                    //$quantidade = 23;

                    @require "connect.php";
                    $_pesqProd_a = $_con->query("SELECT * FROM localcom_produtos WHERE localcom_produto_id='$_idDoProduto' LIMIT 1");
                    $_pesqProd = $_pesqProd_a->fetch(PDO::FETCH_ASSOC);
                           
                            $altura = (int)$_pesqProd['localcom_altura'];
                            $largura = (int)$_pesqProd['localcom_largura'];
                            $comprimento = (int)$_pesqProd['localcom_comprimento'];
                            $peso = (float)$_pesqProd['localcom_peso'];
                            $valor = (float)$_pesqProd['localcom_valor'];
                            
                    $Vendedor_a = $_con->query("SELECT * FROM localcom_usuario WHERE localcom_us_id='".$_pesqProd['localcom_iduser']."'");
                    $Vendedor_r = $Vendedor_a->fetch(PDO::FETCH_ASSOC);
                    $CEPorigem = trim(str_replace("-","",$Vendedor_r['localcom_us_cep']));
                    $Comprador_a =  $_con->query("SELECT * FROM localcom_usuario WHERE localcom_us_id='".$_SESSION['ID']."'");
                    $Comprador_r = $Comprador_a->fetch(PDO::FETCH_ASSOC);
                    $CEPdestino = trim(str_replace("-","",$Comprador_r['localcom_us_cep']));

$cal = calculaFrete($CEPorigem,$CEPdestino,$peso,$altura,$largura,$comprimento,$valor,$servico);

}//FIM DA FUNÇÃO DE VERIFICAÇÃO DO POST


 
function calculaFrete($origem,$destino,$pes,$alt,$larg,$comp,$val,$serv){
                        
    ////////////////////////////////////////////////
    // Código dos Serviços dos Correios
    // 41106 PAC
    // 40010 SEDEX
    // 40045 SEDEX a Cobrar
    // 40215 SEDEX 10
    ////////////////////////////////////////////////
    // URL do WebService
                        $qtd = $_SESSION['QT_PROD'];
                        if($comp<16)$comp=16;
                        if($larg<11)$larg=11;
                        if($alt<2)$alt=2;


                        
                        $calcular = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
                        $calcular .= "nCdEmpresa=";
                        $calcular .= "&sDsSenha=";
                        $calcular .= "&nCdServico=".$serv;
                        $calcular .= "&sCepOrigem=".$origem;
                        $calcular .= "&sCepDestino=".$destino;
                        $calcular .= "&nVlPeso=".$pes;
                        $calcular .= "&nCdFormato=1";
                        $calcular .= "&nVlComprimento=".$comp;
                        $calcular .= "&nVlAltura=".$alt;
                        $calcular .= "&nVlLargura=".$larg;
                        $calcular .= "&nVlDiametro=0";
                        $calcular .= "&sCdMaoPropria=n";
                        $calcular .= "&nVlValorDeclarado=".$val;
                        $calcular .= "&sCdAvisoRecebimento=n";
                        $calcular .= "&StrRetorno=xml";
                        //$calcular .= "&nIndicaCalculo=";
                        
                        $xml = simplexml_load_file($calcular);
                        $pegaResultado = $xml->cServico;
                        $pegaErro = $pegaResultado->Erro;
                        $pegaCodigo = $pegaResultado->Codigo;
                        $pegaValor = $pegaResultado->Valor;

                        
                        // $pegaValor=$pegaValor*;
                        

                        $pegaPrazo = $pegaResultado->PrazoEntrega;

           if($pegaErro==0){

           require "funcoes.php"; 

           //$quantidade = substVirgulaPorPonto($quantidade);
          $pegaValor = substVirgulaPorPonto($pegaValor);

          $quanti = $qtd * $pegaValor;
          $quanti = substPontoPorVirgula($quanti);
           
                                if($pegaCodigo=='41106'){
                                        echo "".$quanti."|";
                                        echo "".$pegaPrazo."";
                                        }//41106

                                if($pegaCodigo=='40010'){
                                       echo "".$quanti."|";
                                       echo "".$pegaPrazo."";
                                       }//40010

                                if($pegaCodigo=='40045'){
                                        echo "".$quanti."|";
                                        echo "".$pegaPrazo."";
                                      }//40045

                                if($pegaCodigo=='40215'){
                                        echo "".$quanti."|";
                                        echo "".$pegaPrazo."";
                                    }//40215

                return $pegaResultado;

           }else{
            
            echo verErro($pegaErro);
            return $pegaErro;

     }
}

       function verErro($Er){
        $msg_erro_correios='';

        if($Er=='-2'){$msg_erro_correios='CEP de origem inválido';}
        if($Er=='-3'){$msg_erro_correios='CEP de destino inválido';}
        if($Er=='-4'){$msg_erro_correios='Peso excedido';}
        if($Er=='-5'){$msg_erro_correios='O Valor total não pode exceder R$ 10.000,00';}
        if($Er=='-6'){$msg_erro_correios='Serviço indisponível para o trecho informado';}
        if($Er=='-7'){$msg_erro_correios='O Valor Declarado é obrigatório para este serviço';}
        if($Er=='-15'){$msg_erro_correios='O comprimento não pode ser maior que 105 cm.';}
        if($Er=='-16'){$msg_erro_correios='A largura não pode ser maior que 105 cm.o';}
        if($Er=='-17'){$msg_erro_correios='A altura não pode ser maior que 105 cm.';}
        if($Er=='-18'){$msg_erro_correios='A altura não pode ser inferior a 2 cm.';}
        if($Er=='-20'){$msg_erro_correios='A largura não pode ser inferior a 11 cm.';}
        if($Er=='-22'){$msg_erro_correios='O comprimento não pode ser inferior a 16 cm.';}
        if($Er=='-23'){$msg_erro_correios='A soma resultante do comprimento + largura + altura não deve superar a 200 cm.';}
        if($Er=='-28'){$msg_erro_correios='O comprimento não pode ser maior que 105 cm.';}
        if($Er=='-30'){$msg_erro_correios='O comprimento não pode ser inferior a 18 cm';}
        if($Er=='-33'){$msg_erro_correios='O site dos correios não está respondendo.';}
        if($Er=='16'){$msg_erro_correios='Serviço indisponível para o trecho informado.';}

        return $msg_erro_correios;

    }//fim da duncao erros
 ?>