<?php
@session_start();

if(isset($_SESSION['ID']) and $_SESSION['ID']!=''){

    $_idDoProduto = (int)($_POST['idProduto']);
    $_iUUU = (int)$_SESSION['ID'];

    require "connect.php";
            
           $pesquisar = $_con->query("SELECT * FROM localcom_favoritar WHERE userid=".$_SESSION['ID']." and idproduto=".$_idDoProduto." LIMIT 1");
            $num_linhas = $pesquisar->rowCount();
          

          if($num_linhas==0){
            
            $_con->query("INSERT INTO localcom_favoritar(userid,idproduto) VALUES ($_iUUU,$_idDoProduto)");
            echo "1";

           }else{
           	$_con->query("DELETE FROM localcom_favoritar WHERE userid=".$_SESSION['ID']." and idproduto=".$_idDoProduto);
           	echo "0";
           }


}

?>
