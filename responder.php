<?php
@session_start();

if(isset($_SESSION['ID']) and $_SESSION['ID']!=''){

	@require "funcoes.php";

    $_id_pergunta = (int)($_POST['id_pergunta']);
    $_vendedor = (int)$_SESSION['ID'];
    $responsta =substituir_especiais($_POST['reposta']);

    require "connect.php";
            
           $_con->query("UPDATE localcom_perguntas SET resposta='$responsta' WHERE id='$_id_pergunta'");
           $_con->query("UPDATE localcom_perguntas SET id_vendedor='$_vendedor'  WHERE id='$_id_pergunta'");

           echo "resposta cadastrada com sucesso.".$_id_pergunta." '$responsta'";
           
          

}

?>
