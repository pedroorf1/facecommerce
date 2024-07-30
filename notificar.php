<?php
@session_start();

@require "funcoes.php";

if(isset($_SESSION['ID']) and $_SESSION['ID']!=''){

    $_idproduto = (int)($_POST['idProduto']);
    $_idnotificao = (int)($_POST['idnotificado']);
    $txt = substituir_especiais($_POST['txtNotificacao']);

    $data = date('d/m/Y');
    $data = muda_data_sql_2($data);

    $txt = $txt.=" - ".$data;

    @require "connect.php";

    if($_con->query("INSERT INTO localcom_notificacoes(id_anuncio,id_notificar,notificacao,data) VALUES('$_idproduto','$_idnotificao','$txt','$data')")){

      $parte = $_con->query("SELECT * FROM localcom_usuario WHERE localcom_us_id='$_idnotificao'");

      $_lista = $parte->fetch(PDO::FETCH_ASSOC);

      $email = $_lista['localcom_us_email'];

      $conteudo =
      "<!DOCTYPE html>

         <head>
         <meta charset='utf-8'>
         <link rel='stylesheet' type='text/css' href='https://www.facecomerce.com/css/materialize.css' />
         <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' />
         <script type='text/javascript' src='https://www.facecomerce.com/script/materialize.min.js'></script> 

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

     
      <title>facecomerce.com</title>



      </head>
      <body>
      <div class='avisos'>

      <div class='avisos_menor upper'>Você tem uma nova notificação - ".$data.".</div><br>

      ".$txt." - Click no link para visualizar o conteúdo! <br><br>

      <a href='https://www.facecomerce.com/visitarproduto?idproduto=$_idproduto'>https://www.facecomerce.com/visitarproduto?idproduto=$_idproduto</a><br>
    
      </div>
      </body>
      </html>";

      enviarEmail("Você tem uma atividade! - facecomerce.com<notificacoes@facecomerce.com>",$email,"Você tem uma atividade no https://www.facecomerce.com",$conteudo,"");

    }

            
           

}

?>
