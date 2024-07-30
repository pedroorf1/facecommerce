<?php
@require_once "sessao.php";
@require_once "cabecalho.php";

    	echo "<div class='corpo'>";//corpo da pagina inicial/corpos das paginas normais
//inicio da pagina

echo "<div class='container'>";//Inicio do container

if($logado){
echo "<div class='row col m12 l12 s12 left-align'>";//primeira linha

@require "connect.php";
$_usuario = $_SESSION['ID'];

//opção para buscar compra
echo "<div class='col s12 m12 l12 card-panel'>

<form method='post' action='notificacoes'>
<input type='search' name='bcn' id='buscar_notificacao' placeholder='Buscar notificação'>
<label for='buscar_notificacao'>Buscar Notificações</label>
</form>
</div>"; 

echo "<div class='avisos'>SUAS NOTIFICAÇÕES</div>";

$_buscando_compras = $_con->query("SELECT * FROM localcom_notificacoes  WHERE id_notificar=$_usuario ORDER BY data DESC");
	
	$temPesq = false;

	if(isset($_POST['bcc'])){

		$temPesq = true;
		$pes = substituir_especiais($_POST['bcc']);
		$pes = explode(" ",$pes);
		$tamanho = count($pes);
		//echo $tamanho;

	}




	}




echo "</div>";

//fim da pagina
    	echo "</div>";

@require_once "rodape.php";
?>