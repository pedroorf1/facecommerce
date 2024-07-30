<?php
//@require "cabecalho.php";
	session_start();
	$_SESSION['LOGIN']='';
 	$_SESSION['SENHA']='';
 	$_SESSION['NOME']='';
 	$_SESSION['EMAIL']='';
 	$_SESSION['ID']='';
 	$logado = false;

						?>

						 <script type='text/javascript'>
						 	window.location.href="/";
						 </script>	

						 <?php

//@require "rodape.php";
?>