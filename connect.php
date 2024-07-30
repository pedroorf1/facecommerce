<?php
try{
$_con = new PDO("mysql:host=localhost;
	dbname=facec402_localcom",
	"facec402_pdr",
	"Resenha1");
$_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "conectou!<br>";
}catch(Exception $e){

echo $e;

}



?>
