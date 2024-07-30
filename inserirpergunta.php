<?php
@session_start();

if(isset($_SESSION['ID']) and $_SESSION['ID']!=''){

	@require "funcoes.php";

    $_idDoProduto = (int)($_POST['item']);
    $_usuario = (int)$_SESSION['ID'];
    $pergunta = substituir_especiais($_POST['pergunnta']);

    require "connect.php";
            
           $inserindo = $_con->query("INSERT INTO localcom_perguntas(id_produto,id_usuario,pergunta)values('$_idDoProduto','$_usuario','$pergunta') ");
           echo "pergunta cadastrada com sucesso.";
           
          

}

?>
