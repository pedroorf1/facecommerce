
<?php
try{
//=================================================
//
if (!function_exists('limpaInjection')) {
function limpaInjection($dado_dado){

return $resultado = preg_replace('/[^[:alnum:]_\@\.áàâéêíóôúãõ]/', '',$dado_dado);

}

}

//================================================
//GERAR NOVA SENHA COM CRYPT
//
if (!function_exists('gerarSenhaCry')) {
function gerarSenhaCry($senhass,$senhaas){

    if($senhass===$senhaas){

                    $custo = "08";
                                $tipoDash = '2a';
                                $salt = "";
                                $validos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";


                            $podeCriar=false;
                            
                                
                                //preparando o teste de numeros
                                
                                $ttt=0;
                                for($i=0;$i<9;$i++){

                                $ttt .= strpos($senhass,strval($i));
                               
                                }   

                            if($ttt==0 || (strlen($senhass)<8)){//testa se a senha tem menso de 8 caracteres
                                            
                                            echo "<center><div id='mensagem'>A senha precisa ter ao menos um numero!<br>
                                                                            A senha precisa ter ao menos 8 caracteres!.</div></center><br>";

                                $podeCriar=false;           

                            }else{

                                $podeCriar=true;
                            }



                                        if($podeCriar==true){

                                                $tamanho = strlen($validos);

                                                for($i=0;$i<22;$i++){

                                                $salt .= $validos[rand(0,$tamanho-1)];
                                                }

                                                $strSalt = '$'.$tipoDash.'$'.$custo.'$'.$salt.'$';

                                                $pronto = substituir_especiais($senhass);

                                                $Senha_hash = crypt($pronto,$strSalt);

                                                return $Senha_hash;

                                        }else{

                                            return $podeCriar;

                                        }


                    }else{

                        echo "<center><div id='mensagem'>Senhas inválidas ou não combinam.</div></center><br>";
                    }




    }

            

}


//=================================================
//=================================================
//
if (!function_exists('testaInjection')) {
function testaInjection($dado_dado){

return $resultado = preg_match('/[^[:alnum:]_\@\.]/', '',$dado_dado);

}

}

//===================================================
if (!function_exists('qualificar')) {
function qualificar($posi,$neg){

  
if(($posi=='' and $neg=='')or ($posi==0 and $neg==0)){

$regraDeTres='0';

return $regraDeTres;

}else{

        $total = $posi+$neg;
    
        if($neg==0 || $neg==''){$neg=1;}
        if($posi==0 || $posi==''){$posi=1;}
 

        $regraDeTres = ($posi*100)/$total;

        $regraDeTres=substr_replace($regraDeTres,'',5);

        $regraDeTres;
         return (int)$regraDeTres;

        }


    }  

}


//=========================================================================================
            

if (!function_exists('avisosGerais')) {
    
    function avisosGerais($texoto,$posX,$posY,$leftOrRight){
                echo "<div id='avisosgerais' style='top:".$posY.";right:".$posX.";float:".$leftOrRight.";position:fixed;'>";
                   
                echo "<img src='imagens/alerta.png'/ valign='top' width='40px' id='imgavisos' align='right'>";
                
                echo "<table id='trans' width='250px' style='table-layout:fixed;overflow: hidden;color:white;'><tr><td valign='top'>";
                
                
                echo "<div id='exaltado'><i>".$texoto."</i></div>";
                echo "</td></tr></table></div>";
            }
    }


//==========================================================================================

if (!function_exists('textoVertical')) {

                function textoVertical($texto){
                    $qtdCarac = strlen($texto);
                    $str_array = str_split($texto);
                    $invertida = array_flip($str_array);
                    
                    $pronto='';
                    foreach($str_array as $indice2 => $letra){
                        
                        $nnn = ($qtdCarac-1) - $indice2; 
                        
                        $pronto = $pronto.$str_array[$nnn]."<br />";
                        
                    }
                        
                    return $pronto;
                }
        }

//===============================================================================================
 
if (!function_exists('arredonda')) {

        function arredonda($valor){
            
            if(($valor>0) and  ($valor<=0.5)){$valor=0.5;}
            if(($valor>0.5) and  ($valor<=1.0)){$valor=1.0;}
            if(($valor>1.0) and  ($valor<=1.5)){$valor=1.5;}
            if(($valor>1.5) and  ($valor<=2.0)){$valor=2.0;}
            if(($valor>2.0) and  ($valor<=2.5)){$valor=2.5;}
            if(($valor>2.5) and  ($valor<=3.0)){$valor=3.0;}
            if(($valor>3.0) and  ($valor<=3.5)){$valor=3.5;}
            if(($valor>3.5) and  ($valor<=4.0)){$valor=4.0;}
            if(($valor>4.0) and  ($valor<=4.5)){$valor=4.5;}
            if(($valor>4.5) and  ($valor<=5.0)){$valor=5.0;}
            if(($valor>5.0) and  ($valor<=5.5)){$valor=5.5;}
            if(($valor>5.5) and  ($valor<=6.0)){$valor=6.0;}
            if(($valor>6.0) and  ($valor<=6.5)){$valor=6.5;}
            if(($valor>6.5) and  ($valor<=7.0)){$valor=7.0;}
            if(($valor>7.0) and  ($valor<=7.5)){$valor=7.5;}
            if(($valor>7.5) and  ($valor<=8.0)){$valor=8.0;}
            if(($valor>8.0) and  ($valor<=8.5)){$valor=8.5;}
            if(($valor>8.5) and  ($valor<=9.0)){$valor=9.0;}
            if(($valor>9.0) and  ($valor<=9.5)){$valor=9.5;}
            if(($valor>9.5) and  ($valor<=10.0)){$valor=10.0;}
            if(($valor>10.1) and  ($valor<=10.5)){$valor=10.5;}
            if(($valor>10.5) and  ($valor<=11.0)){$valor=11.0;}
            if(($valor>11.0) and  ($valor<=11.5)){$valor=11.5;}
            if(($valor>11.5) and  ($valor<=12.0)){$valor=12.0;}
            if(($valor>12.0) and  ($valor<=12.5)){$valor=12.5;}
            if(($valor>12.5) and  ($valor<=13.0)){$valor=13.0;}
            if(($valor>13.0) and  ($valor<=13.5)){$valor=13.5;}
            if(($valor>13.5) and  ($valor<=14.0)){$valor=14.0;}
            if(($valor>14.0) and  ($valor<=14.5)){$valor=14.5;}
            if(($valor>14.5) and  ($valor<=15.0)){$valor=15.0;}
            if(($valor>15.0) and  ($valor<=15.5)){$valor=15.5;}
            if(($valor>15.5) and  ($valor<=16.0)){$valor=16.0;}
            if(($valor>16.0) and  ($valor<=16.5)){$valor=16.5;}
            if(($valor>16.5) and  ($valor<=17.0)){$valor=17.0;}
            if(($valor>17.0) and  ($valor<=17.5)){$valor=17.5;}
            if(($valor>17.5) and  ($valor<=18.0)){$valor=18.0;}
            if(($valor>18.0) and  ($valor<=18.5)){$valor=18.5;}
            if(($valor>18.5) and  ($valor<=19.0)){$valor=19.0;}
            if(($valor>19.0) and  ($valor<=19.5)){$valor=19.5;}
            if(($valor>19.5) and  ($valor<=20.0)){$valor=20.0;}
            if(($valor>20.0) and  ($valor<=20.5)){$valor=20.5;}
            if(($valor>20.5) and  ($valor<=21.0)){$valor=21.0;}
            if(($valor>21.0) and  ($valor<=21.5)){$valor=21.5;}
            if(($valor>21.5) and  ($valor<=22.0)){$valor=22.0;}
            if(($valor>22.0) and  ($valor<=22.5)){$valor=22.5;}
            if(($valor>22.5) and  ($valor<=23.0)){$valor=23.0;}
            if(($valor>23.0) and  ($valor<=23.5)){$valor=23.5;}
            if(($valor>23.5) and  ($valor<=24.0)){$valor=24.0;}
            if(($valor>24.0) and  ($valor<=24.5)){$valor=24.5;}
            if(($valor>24.5) and  ($valor<=25.0)){$valor=25.0;}
            if(($valor>25.0) and  ($valor<=25.5)){$valor=25.5;}
            if(($valor>25.5) and  ($valor<=26.0)){$valor=26.0;}
            if(($valor>26.0) and  ($valor<=26.5)){$valor=26.5;}
            if(($valor>26.5) and  ($valor<=27.0)){$valor=27.0;}
            if(($valor>27.0) and  ($valor<=27.5)){$valor=27.5;}
            if(($valor>27.5) and  ($valor<=28.0)){$valor=28.0;}
            if(($valor>28.0) and  ($valor<=28.5)){$valor=28.5;}
            if(($valor>28.5) and  ($valor<=29.0)){$valor=29.0;}
            if(($valor>29.0) and  ($valor<=29.5)){$valor=29.5;}
            if(($valor>29.5) and  ($valor<=30.0)){$valor=30.0;}
            
            return $valor;
            
        }
}

//===========================================================================================================
                
if (!function_exists('recarregarPagina')) {

                function recarregarPagina(){
                    
                 ?>
                 <script language="javascript" type=" text/JavaScript">
                <!--
                parent.document.location.reload();
                 -->
                 </script>
                <?php
                    
                }
}

if (!function_exists('recarregarPagina2')) {


                function recarregarPagina2($endereco){
                    
                 ?>
                 <script language="javascript" type=" text/JavaScript">
                <!--
                 parent.document.location.href=<?php $endereco ?>; 
                 -->
                 </script>
                <?php
                    
                }
}
//============================================================================================================


if (!function_exists('seNumeroInteiro')) {

            function seNumeroInteiro($testando){
                
                $_valor2 = preg_match('/^[0-9]{1,9}$/',$testando);
                
                if($_valor2 ){
                    
                    return $_valor2;
                    
                }else{
                    
                    echo mensgen("O Valor inserido não é valido: - ".$_valor2." / ".$testando);
                    return false;
                    
                }
                
            }
}


if (!function_exists('se_E_Ano')) {

                function se_E_Ano($tes){
                    
                   
                    $_valor1 = preg_match('/^[0-9]{4}$/',$tes);
                    
                    
                    if($_valor1){
                        
                        return $tes;
                        
                    }else{
                        
                        echo mensgen("O Valor inserido do ano não é valido");
                        return false;
                        
                    }
                    
                }
}


if (!function_exists('seNumeroFracionado')) {

                function seNumeroFracionado($testando){
                    
                    $nnota = substVirgulaPorPonto($testando);
                    
                    $_valor1 = preg_match('/^[0-9]{1,9}\.[0-9]{0,2}$/',$nnota);
                    $_valor2 = preg_match('/^[0-9]{1,9} $/',$nnota);
                    $_valor3 = preg_match('/^[0-9]\.[0-9]{0,2}$/',$nnota);
                    
                    if($_valor1 or $_valor2 or $_valor3){
                        
                        return $nnota;
                        
                    }else{
                        
                        echo mensgen("O Valor inserido da nota não é valido ".$_valor3." / ".$nnota);
                        return false;
                        
                    }
                    
                }
}



if (!function_exists('testaData')) {

                    function testaData($dataaaa){
                        
                        $dataOk;
                        
                        if($dataaaa=='00/00/0000' or $dataaaa==''){
                            $valor1 = false;
                            echo "<br />Erro, o campo data está vazio!";
                        }else{
                            
                            $valor1=true;
                            
                        }

                            $_valor2 = preg_match('/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/',$dataaaa);

                        
                        if($valor1 and $_valor2){
                            
                             return $dataOk=$dataaaa;
                            
                        }else{
                            
                          $mensagem = "Erro, a data não é válida!";
                          
                          echo "<br />".substituir_especiais($mensagem);  
                          return $dataOk=false;  
                            
                        }
    
    
            }

}



//==========================================

if (!function_exists('substituir_especiais')) {
                    function substituir_especiais($texto){
                              
                                $comparador = array("'",'"','>','<','Ú','ú','Á','á','Â','â','Ã','ã','É','é','Ê','ê','Í','í','Ó','ó','Ô','ô','Õ','õ','Ç','ç','=','ñ','À','à','*');
                                
                                $trocar = array("`","``",'&gt','&lt','&Uacute;','&uacute;','&Aacute;','&aacute;','&Acirc;','&acirc;','&Atilde;','&atilde;','&Eacute;','&eacute;','&Ecirc;','&ecirc;','&Iacute;','&iacute;','&Oacute;','&oacute;','&Ocirc;','&ocirc;','&Otilde;','&otilde;','&Ccedil;','&ccedil;','&$8332;','n','&Agrave;','&agrave;',' ');    
                        
                     $pronto = str_replace($comparador,$trocar,$texto);
                     
                    return $pronto;
                    }
}
//================================================


if (!function_exists('devolver_especiais')) {
                    function devolver_especiais($texto){
                              
                                $comparador = array("'",'"','>','<','#','$','%','(',')','*','+','=',':',';','?','@','Á','á','Â','É','é','Ã','ã','É','é','Ê','ê','Í','í','Ó','ó','Ô','ô',
                                'Ç','ç');
                                $trocar = array("`","``",'&gt','&lt','&#35','&#36','&#37','&#40','&#41','&#42','&#43','&#61','&#58','&#59','&#63','&#64','&Aacute',
                                '&aacute','&Acirc','&Eacute','&eacute','&Atilde','&atilde','&Eacute','&eacute','&Ecirc','&ecirc','&Iacute','&iacute','&Oacute','&oacute','&Ocirc','&ocirc',
                                '&#199','&#231');    
                        
                     $pronto = str_replace($trocar,$comparador,$texto);
                     
                    return $pronto;
                    }
}

 //================================================                   

if (!function_exists('tratar_erros_uppercase')) {
                    function tratar_erros_uppercase($texto){
                              
                                $comparador = array('&UACUTE;','&AACUTE;','&AACIRC;','&ATILDE;','&EACUTE;','&ECIRC;','&IACUTE;','&OACUTE;','&OCIRC;','&OTILDE;','&CCEDIL;');
                                
                                $trocar = array('&Uacute;','&Aacute;','&Acirc;','&Atilde;','&Eacute;','&Ecirc;','&Iacute;','&Oacute;','&Ocirc;','&Otilde;','&Ccedil;');    
                        
                     $pronto = str_replace($comparador,$trocar,$texto);
                     
                    return $pronto;
                    }
}
//================================================




if (!function_exists('devolver_aspas')) {
                    function devolver_aspas($texto){
                              
                                
                                $comparador = "\'"; 
                                $trocar = ('"');
                                   
                        
                     $pronto = str_replace($comparador,$trocar,$texto);
                     
                    return $pronto;
                    }
}
//================================================

if (!function_exists('substituir_')) {
                function substituir_($texto){
                          
                            $comparador = array("'",'"');
                            $trocar = "\'";    
                    
                 $pronto = str_replace($comparador,$trocar,$texto);
                 
                return $pronto;
                }
}

//===========================================

if (!function_exists('mensgen')) {

            function mensgen($txt){
                
                echo "<center><div id='mensa'>";
                
                echo substituir_especiais($txt); 
                
                echo "</center></div>";
            }
}
//======================================================================================================
        
if (!function_exists('corTitulos')) {
        function corTitulos(){
            $cor = '#E066FF';
            return $cor;
        }
}
//========================================================================================================

if (!function_exists('testarEmail')) {
            function testarEmail($email){
                $E_email=false;
                $pos = strpos($email, '@');
                
                if($pos===true){
                    
                    $E_email=true;
                    
                }

                return $E_email;
            }
}


//========================================================================================================
           
if (!function_exists('testarCpf')) {

            function testarCpf($cpf){
               //verificando numeros
              $_teste1 = preg_match('/^[0-9]{11}$/',$cpf);
              
               
                if($_teste1 and $_teste1!='00000000000'){
                    return true;
                    
                }
                   
                   
                    if(!$_teste1){
                    echo "<center>CPF incorreto, favor corrigir</center><br />";
                    return false;
                    
                }
                
                               
            }
}

//==============================================================================================================
//dias por mes

if (!function_exists('anoVertical')) {
            function anoVertical($ridick){
               
               $parte1 = substr($ridick,0,2);
               $parte2 = substr($ridick,2,4); 
                
                $ddddd = $parte1."<br />".$parte2;
                
               return $ddddd; 
                
            }
}




if (!function_exists('diasPorMes')) {
            function diasPorMes($mes){
                $dias;
                if($mes=='01' or $mes=='03' or $mes=='05' or $mes=='07' or $mes=='08' or $mes=='10' or $mes=='12'){
                    
                 $dias=31;   
                    
                }
                if($mes=='04' or $mes=='06' or $mes=='09' or $mes=='11'){
                    
                 $dias=30;   
                    
                }
               
                if($mes=='02'){
                    
                 $dias=28;   
                    
                }
               

                return $dias;
               
            }
    }


//====================================================================================================================
    if (!function_exists('getDia')) {
                    function getDia($dt){
                    $dia = substr($dt,8,2);
                    return $dia;
                    }
                }
                   
    if (!function_exists('getMes')) {               
                    function getMes($dt){
                    $mes = substr($dt,5,2);
                    return $mes;
                    }
                }
                

    if (!function_exists('getAno')) {                
                    function getAno($dt){
                    $ano = substr($dt,0,4);
                    return $ano;
                    }
                 }   
//======================================================================================================================


if (!function_exists('testarCnpj')) { 
            function testarCnpj($cnpj){
               //verificando numeros
              $_teste1 = preg_match('/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{3}-[0-9]{2}$/',$cnpj);
              
               
                if($_teste1){
                    return $cnpj;
                    
                }
                   
                   
                    if(!$_teste1){
                    echo "<center>CNPJ incorreto, favor corrigir</center><br />";
                    return $cnpj='';
                    
                }
                
                               
            }
}

//////======================///////====================================================================================
//transferir imagem para o servidor

if (!function_exists('foto_no_bd')) { 
                    function foto_no_bd($arquivo_origem,$depositorio){
                        
                        global $iiii;

                    try{
                    	
                    					//verifica se é uma foto
                    					if(!isset($arquivo_origem) || $arquivo_origem['name']==''){
                    					echo "<center>Voc&ecirc; pode inserir a foto em outro momento.</center><br />";
                                        return $mdname="padrao.png";

                    					}else{
                    						
                    					$iiii = $arquivo_origem['name'];
                    					$extensao = pathinfo($iiii,PATHINFO_EXTENSION);
                    					$dir=$depositorio;
                    					
                    					
                    					if($extensao=='jpg' or $extensao=='gif' or $extensao=='png'  or $extensao=='jpeg'){
                    					   
                    							$arquivo = $arquivo_origem['tmp_name'];
                    							$fotoNome = $arquivo_origem['name'];
                    							$mdname = uniqid(md5($iiii),true).".".$extensao;
                    							$diretorio = $dir.$mdname;
                                                $peso = $arquivo_origem['size'];
                                                
                                                                          
                                                if($peso>50000){
                                                    echo "<center>Esta imagem passa dos 50kb(limite de peso para transfer&ecirc;ncia)</center><br />";
                                                    
                                                }else{
                                                    
                                                    
                                                          	if(move_uploaded_file($arquivo,$diretorio)){
                                    						
                                                            return $mdname;
                                                            
                                    						}else{
                                    						
                                    							echo "<br><center>erro ao carregar foto</center><br />";
                                    							echo $diretorio."<br />";
                                    							echo $arquivo."<br />";
                                    						                     						
                                    							}          
                                                    
                                                    
                                                }
                                                
                                                
                                        }
                                        else
                                            {
                                            echo "<br><center>este arquivo não é válido!</center><br />";
                                            }                           
                        							

                    					}
                    					
                    		
                    		

                    	}catch(Exception $e){}
                        
                        
                    }
}
//======================================================================================================

//transferir imagem para o servidor

if (!function_exists('pdf_no_bd')) { 
                    function pdf_no_bd($arquivo_origem,$depositorio){
                        
                        global $iiii;

                    try{
                        
                                        //verifica se é uma foto
                                        if(!isset($arquivo_origem) || $arquivo_origem['name']==''){
                                        echo "<center>Voc&ecirc; precisa selecionar uma arquivo pdf para fazer upload.</center><br />";
                                        return $mdname="";

                                        }else{
                                            
                                                $iiii = $arquivo_origem['name'];
                                                $extensao = pathinfo($iiii,PATHINFO_EXTENSION);
                                                $dir=$depositorio;
                                                
                                                        
                                                        if($extensao=='pdf'){
                                                           
                                                                $arquivo = $arquivo_origem['tmp_name'];
                                                                $fotoNome = $arquivo_origem['name'];
                                                                $mdname = uniqid(md5($iiii),true).".".$extensao;
                                                                $diretorio = $dir.$mdname;
                                                                
                                                                            if(move_uploaded_file($arquivo,$diretorio)){
                                                                            
                                                                                    return $mdname;
                                                                            
                                                                            }else{
                                                                            
                                                                                echo "<br><center>erro ao carregar arquivo</center><br />";
                                                                                echo $diretorio."<br />";
                                                                                echo $arquivo."<br />";
                                                                                                                        
                                                                                }          
                                                               
                                                        }else{
                                                                     echo "<br><center>este arquivo não é válido!</center><br />";
                                                             }                           
                                                                    

                                        }
                                        
                        }catch(Exception $e){}
                        
                        
                    }
}
//======================================================================================================



if (!function_exists('fotomaior_no_bd')) { 
                function fotomaior_no_bd($arquivo_origem,$depositorio,$larguramaxima,$alturamaxima,$criarthumb){
                    
                    global $iiii,$extensao,$dir,$dir_thumbs,$arquivo,$fotoNome,$mdname,$nome_completo,$nome_completo_thumb;

                try{
                    
                                    //verifica se é uma foto
                                    if(!isset($arquivo_origem) || $arquivo_origem['name']==''){

                                    }else{
                                        
                                    $iiii = $arquivo_origem['name'];
                                    $extensao = pathinfo($iiii,PATHINFO_EXTENSION);
                                    $dir=$depositorio;
                                    $dir_thumbs = $depositorio."thumbs/";

                                    if($extensao=='jpg' or $extensao=='gif' or $extensao=='png'  or $extensao=='jpeg' ){
                                       
                                            $arquivo = $arquivo_origem['tmp_name'];
                                            $fotoNome = $arquivo_origem['name'];
                                            $mdname = uniqid(md5($iiii),true).".".$extensao;
                                            $nome_completo = $dir.$mdname;
                                                                                        
                                                //carregando aquivo
                                                        if(move_uploaded_file($arquivo,$nome_completo)){
                                                        
                                                        redimensionar_carregarFotos($nome_completo,$dir,$extensao,$mdname,$larguramaxima,$alturamaxima);

                                                        if($criarthumb){
                                                       
                                                        redimensionar_carregarFotos($nome_completo,$dir_thumbs,$extensao,$mdname,"400","400");


                                                        }


                                                        return $nome_completo;
                                                        
                                                        }
                                            
                                    }else{
                                        echo "<br><center>".substituir_especiais("este arquivo não é uma imágem válida!")."</center><br />";
                                        }                           
                                                

                                    }
                                    
                        
                        

                    }catch(Exception $e){}
                    
                    
                }

}

//=======================================================================================================


//=======================================================================================================



if (!function_exists('uploade_video')) { 
                function uploade_video($arquivo_origem,$depositorio){
                    
                    global $iiii;

                try{
                    
                                    //verifica se é uma foto
                                    if(!isset($arquivo_origem) || $arquivo_origem['name']==''){
                                    echo "<center>Voc&ecirc; pode inserir o video em outro momento.</center><br />";
                                    return $mdname="padrao.png";

                                    }else{
                                        
                                    $iiii = $arquivo_origem['name'];
                                    $extensao = pathinfo($iiii,PATHINFO_EXTENSION);
                                    $dir=$depositorio;
                                    
                                    	

                                            if($extensao=='mp4' or $extensao=='wmv' or $extensao=='MP4'){
                                               
                                                    $arquivo = $arquivo_origem['tmp_name'];
                                                    $fotoNome = $arquivo_origem['name'];
                                                    $mdname = uniqid(md5($iiii),true).".".$extensao;
                                                    $diretorio = $dir.$mdname;
                                                    $peso = $arquivo_origem['size'];
                                                    

                                                        
                                                        
                                                                if(move_uploaded_file($arquivo,$diretorio)){
                                                                
                                                                    echo "<br><center>Arquivo carregado com sucesso</center><br />";
                                                                    return $diretorio;                                                              
                                                                }else{
                                                                
                                                                    echo "<br><center>erro ao carregar o video</center><br />";
                                                                    echo $diretorio."<br />";
                                                                    echo $arquivo."<br />";
                                                                                            
                                                                    return false;                                        
                                                                }          

                                                    
                                            }else{
                                                    echo "<br><center>este arquivo não é válido!'".$extensao."'</center><br />";
                                                 }                           
                                                        
                                                return false;
                                            }
                                            
                        
                        

                    }catch(Exception $e){}
                    
                    
                }

}

//=======================================================================================================



///duas cores para tabelas
  if (!function_exists('retorna_cor')) {
        function retorna_cor($numero){
            $cores;
            if(($numero%2)==0){
                $cores='#E6E6FA';
                }
                else
                    { 
                    $cores='#FFE4E1';
                    }
             return $cores;   
            }
   } 
 
//======================================================================================================
//gerando password do sistema
if (!function_exists('auto_pass')) {     

            function auto_pass($pass){
                
                $truePass = md5(md5($pass."&%%$#@!!#%$%&&&kndksihoihknsknaksnaksjjkn#####$$$&&&&&%R$%##$#$$%%%&&&&&&&%%$$###@@@@@@@%$%%$%$%$%$%$%$$#$$#@@".$pass));
                
                return $truePass;
                
                
            }
}
      
//=======================================================================================================            
if (!function_exists('corrigeCasasDecimais')) { 
            function corrigeCasasDecimais($numerooo){
               //verificando numeros
               $_teste1 = preg_match('/^[0-9]{1,}\.[0-9]{1}$/',$numerooo);
               $_teste2 = preg_match('/^[0-9]{1,}$/',$numerooo);
               $_teste3 = preg_match('/^[0-9]{1,}\.[0-9]{2}$/',$numerooo);
               
                if($_teste1){
                    return $numerooo.'0';
                    
                }
                    if($_teste2){
                    return $numerooo.',00';
                    
                }
                   
                    if($_teste3){
                    return $numerooo;
                    
                }


                    if(!$_teste1 && !$_teste2 && !$_teste3){
                    return $numerooo='Erro de numero';
                    
                }
                
            }
}
//=============================================================================================================
  if (!function_exists('muda_data_sql')) {         

            function muda_data_sql($dt)
            {
            //origem dd/mm/aaaa
            $dia = substr($dt,0,2);
            $mes = substr($dt,3,2);
            $ano = substr($dt,6,4);
            $data = $ano."/".$mes."/".$dia;
            return $data;
            //retorno aaaa/mm/dd

            }
}
            //222

if (!function_exists('muda_data_sql_2')) { 
            function muda_data_sql_2($dt)
            {
            //origem dd/mm/aaaa
            $dia = substr($dt,0,2);
            $mes = substr($dt,3,2);
            $ano = substr($dt,6,8);
            $data = $ano."/".$mes."/".$dia;
            return $data;
            //retorno aaaa/mm/dd

            }
    }        
            //=============================================================================================================

    if (!function_exists('muda_data_php')) { 
                    function muda_data_php($dt)
                    {
                    //origem aaaa/mm/dd
                    //$dia = substr($dt,0,2);
                    $dia = substr($dt,8,2);
                   
                    $mes = substr($dt,5,2);
                   
                    //$ano = substr($dt,6,4);
                    $ano = substr($dt,0,4);
                                       
                    $data = $dia."/".$mes."/".$ano;
                    return $data;
                    //retorno dd/mm/aaaa
                    }

        }            
//=============================================================================================================
            
if (!function_exists('substVirgulaPorPonto')) {
            function substVirgulaPorPonto($value){
                 $string;
                 
                 $strPosi = strpos($value,",");
                 $strPosi2 = strpos($value,".");
                         
                    
                    if($strPosi==0 || $strPosi==''){
                        
                       $string=str_replace(",", '.00', $value); 
             
                    }
                    
                    if($strPosi2==0 || $strPos2==''){
                        
                       $string=str_replace(".", '.00', $value); 
             
                    }
                    
               
                    if($strPosi>0){
                        
                       $string=str_replace(",", ".", $value); 
             
                    }
                    
                   return $string;
         }

}
//=============================================================================================================
            
if (!function_exists('substPontoPorVirgula')) {
            function substPontoPorVirgula($value){
                 $string;

                             if(preg_match('/\./',$value)){

                                $value = round($value,2);
                                $string=str_replace(".", ",", $value);
                             }else{
                                $value=str_replace(",", ".", $value);
                                $value = round($value,2);
                                $string=str_replace(".",",",$value);
                             }

                             $tamanho = strlen($string);
                             $posicao = strpos($string,",");

                             if($posicao===($tamanho-2)){
                                $string=$string."0";

                             }

                             if($posicao===false){
                                $string=$string.",00";

                             }


                   return $string;
        }

  }
//=============================================================================================================
    if (!function_exists('testeRegistroSeExiste')) {
                             function testeRegistroSeExiste($Servidor,$usuario,$Senha,$bancoDeDados,$Tabela,$id_do_registro){
                                 echo "<br>=======================testando registros ==========================<br>";
                                $addres = $Servidor;
                                $user = $usuario;
                                $passWf = $Senha;
                                $tab = $Tabela;
                                $iddd = $id_do_registro;
                                $Existe = FALSE;
                               
                                
                                if($iddd==""){
                                    
                                    $iddd=0;
                                    echo 'Um aluno precisa ser selecionado';
                                }else{
                                   try{
                                        if($conection = mysql_connect($addres,$user,$passWf)or die("<br>Erro ao tentar conectar ao servidor")){
                                       
                                            echo "<br>Coexão realizada com sucesso!";
                                            echo "<br>Verificação de no registro iniciada"; 
                                            
                                            $selectDb = mysql_select_db($bancoDeDados,$conection) or die("<br>Banco de dados não Existe");
                                            echo "<br>Banco de dados selecionada com sucessor"; 
                                            echo "<br>Vericando a existencia do registro agora!!!!";
                                            
                                            $testandoRegistro = mysql_query("Select * from $tab where id=$iddd")or die("<br>Tabela não Existe");
                                            echo "<br>Pesquisa realizad com sucesso!!!!";
                                            
                                            //criando array de dados
                                            $DADOS = mysql_fetch_array($testandoRegistro);
                                            echo "<br>Dados :".$DADOS['id'];
                                            
                                            
                                            $Existe=TRUE;
                                            
                                       
                                        }
                                       
                                   }catch(Exception $rr)
                                   {       
                                       echo "erro de conecção de dados";
                                       $Existe=FALSE;
                                   }   
                                       
                                }   
                                   
                                   
                                   
                                   
                                 
                                   $conection.exit();
                                   return $Existe;
                                   
                                    
                             
                             } 
        }                       
//=============================================================================================================
//se é texto
if (!function_exists('se_e_texto')) {
            function se_e_texto($value){


                if(preg_match('/[a-zA-Zà-üÀ-Ü,!?çÇ]/', $value)){

                    return true;


                }else{

                    return false;
                }


}

}
//FUNCAO CRIAR TUHMBS
if (!function_exists('redimensionar_carregarFotos')) { 
                function redimensionar_carregarFotos($imagem,$diretorio,$extensao,$mdname,$larguraMaxima,$alturaMaxima){

                  list($width, $height, $type) = getimagesize($imagem);
                  //echo "<br>".$width." | ".$height."<br>";
                                                              
                        if($extensao=='jpg' or $extensao=='jpeg'){
                        $img = @imagecreatefromjpeg($imagem);
                        }
                        if($extensao=='png'){
                        $img = @imagecreatefrompng($imagem);
                        }
                        if($extensao=='gif'){
                        $img = @imagecreatefromgif($imagem);
                        }
                        if($extensao=='bmp'){
                        $img = @imagecreatefrombmp($imagem);
                        } 

                            $novaAltura = $height;
                            $novaLargura = $width;



                                        if($novaLargura>$larguraMaxima){
                                            $porcentagem = (($larguraMaxima*100)/$width)/100;
                                            $novaLargura = $porcentagem*$width;
                                            $novaAltura = $porcentagem*$height;
                                            }

                                        
                                        if($novaAltura>$alturaMaxima){
                                            $porcentagem = (($alturaMaxima*100)/$height)/100;
                                            $novaLargura = $porcentagem*$width;
                                            $novaAltura = $porcentagem*$height;

                                        }

                                                                if($novaLargura>$larguraMaxima){
                                            $porcentagem = (($larguraMaxima*100)/$width)/100;
                                            $novaLargura = $porcentagem*$width;
                                            $novaAltura = $porcentagem*$height;
                                            }

                                        
                                        if($novaAltura>$alturaMaxima){
                                            $porcentagem = (($alturaMaxima*100)/$height)/100;
                                            $novaLargura = $porcentagem*$width;
                                            $novaAltura = $porcentagem*$height;

                                        }

                                       
                                                                                  
                            $tamanho = @imagecreatetruecolor($novaLargura,$novaAltura);

                            //coorigindo erro de alpha

                          if($extensao == "gif" or $extensao == "png"){
                            imagecolortransparent($tamanho, imagecolorallocatealpha($tamanho, 0, 0, 0, 127));
                            imagealphablending($tamanho, false);
                            imagesavealpha($tamanho, true);
                          }                                            
                            //calculando o tamanho;
                                                            
                            @imagecopyresampled($tamanho,$img,0,0,0,0,$novaLargura,$novaAltura,$width,$height);


                            if($extensao == "gif"){@imagegif($tamanho,$diretorio.$mdname);}
                            if($extensao == "png"){@imagepng($tamanho,$diretorio.$mdname);}
                            if($extensao == "jpg" or $extensao == "jpeg"){@imagejpeg($tamanho,$diretorio.$mdname);}
                            if($extensao == "bmp"){@imagewbmp($tamanho,$diretorio.$mdname);}
                                                                  
                            //@imagejpeg($tamanho,$diretorio.$mdname);
                                                                      
                            @imagedestroy($img);
                            @imagedestroy($tamanho);  
                                                              
  }                         

}//////////FIM REDIMENSIONAR CARREGAR FOTOS

//FUNCAO CRIAR TUHMBS
if (!function_exists('enviarEmail')) { 
                function enviarEmail($origem,$destino,$assunto,$conteudo,$msgConfirmação){
                //
                //$origem = "e-paah_ativacao <ativando@e-paah.com.br>";
                //                            
                $para = "<".$destino.">";
                $headers = "From: ".$origem."\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-type: text/html; charset=utf-8\n"; 
                $headers .= "X-Priority: 1\n"; // 1 Urgente, 3 Normal 

                if (mail($para,$assunto, $conteudo, $headers,"-r".$origem) == FALSE){
                            echo "".substituir_especiais("Erro ao enviar o e-mail")."";
                        return true;             
                    }else{

                        echo "".substituir_especiais($msgConfirmação)."";
                        return false;
                    
                    }

    }


}//FIM DA FUNCAO EMAIL


//FUNCAO PARA CALCULAR FRETE
if (!function_exists('calculaFrete')) { 
            function calculaFrete($origem,$destino,$pes,$alt,$larg,$comp,$val,$serv){
                                    
                ////////////////////////////////////////////////
                // Código dos Serviços dos Correios
                // 41106 PAC
                // 40010 SEDEX
                // 40045 SEDEX a Cobrar
                // 40215 SEDEX 10
                ////////////////////////////////////////////////
                // URL do WebService
                    isset($_SESSION['QT_PROD'])?$quantidade=$_SESSION['QT_PROD']:$quantidade=1;
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

                                    for($ii=1;$ii<$quantidade;$ii++){
                                    $pegaValor+=$pegaValor;
                                    }

                                    $pegaPrazo = $pegaResultado->PrazoEntrega;

                       if($pegaErro==0){

                       @require "funcoes.php";
                       @session_start(); 

                       //$quantidade = substVirgulaPorPonto($quantidade);
                      $pegaValor = substVirgulaPorPonto($pegaValor);

                      $quanti = $quantidade * $pegaValor;
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
}//FIM DA FUNCAO CALCULAR FRETE


//FUNCAO VER ERRO DO FRETE
//
  if (!function_exists('verErro')) {
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
    }
}//fim da FUNCAO VER ERRO DO FRETE


//FUNCAO NOTIFICAR ATIVIDADE
//
  if (!function_exists('notificar_atividade')) {
       function notificar_atividade($destino,$mensagem){

            $data = date('d/m/Y');

            $txt = $mensagem.=" - ".$data;

            $email = $destino;

            $conteudo =
                  "<!DOCTYPE html>

                     <head>
                     <meta charset='utf-8'>
                     <link rel='stylesheet' type='text/css' href='http://www.facecomerce.com/css/materialize.css'>
                     <script type='text/javascript' src='../../script/materialize.min.js'></script> 

                        <STYLE type='text/css'>  
                        <!--  

                        .avisos{
                        width: 100%; /* Full width */
                          padding: 2% 2%;
                          background-color: #42a5f5;
                          color: white;
                          border-radius: 10px 10px 10px 10px;
                          box-shadow: 2px 3px 4px gray;

                      }

                      .avisos_menor{
                        width: 100%; /* Full width */
                          padding: 1% 1%;
                          background-color: orange;
                          color: white;
                          font-weight: bold;
                          border-radius: 5px 5px 5px 5px;
                          box-shadow: 1px 2.5px 2px gray;

                      } 

                      .avisos{
                        width: 100%; /* Full width */
                          padding: 2% 2%;
                          background-color: #42a5f5;
                          color: white;
                          font-weight: bold;
                          border-radius: 5px 5px 5px 5px;
                          box-shadow: 1px 2.5px 2px gray;
                          margin-top:10px;


                      } 

                      .upper{
                        text-transform: uppercase;
                      }


                      .icones{
                          vertical-align: middle;
                          max-height: 50px;
                          max-width:50px;
                      }

                        -->  
                        </STYLE>

                 
                  <title>notificação - facecomerce.com</title>



                  </head>
                  <body>
                  <div class='avisos'>

                  <div class='avisos_menor upper'>Você tem uma notificação - ".$data.".</div><br>

                  <img src='http://www.facecomerce.com/Carbon/timer_32.png' class='icones'>

                  ".$txt."
                
                  </div>
                  </body>
                  </html>";

      enviarEmail("Notificação de atividade - facecomerce.com<notificacoes@facecomerce.com>",$email,"Alerta de atividade",$conteudo,"");

   }
 }            

}catch(Exception $e){}



?>
