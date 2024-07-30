<?php
@require "../site/administracao/cabecalho.php";

    	echo "<div class='corpo'>";//corpo da pagina inicial/corpos das paginas normais
//inicio da pagina
//    	echo "<a href='cadastro.php' alt='Cadastrar'> CADASTRAR USUARIO | </a>";
if(!$logado or $logado==false){

                        echo "<form action='logar.php' method='post'>
                            <input type='text' name='login' required='yes' placeholder='login' autofocus >
                            <input type='password' name='senha' required='yes' placeholder='senha'> 
                            <input type='submit' name='btLogar' value='Logar'>
                            </form>";

            }

//fim da pagina
    	echo "</div>";

@require "../site/administracao/rodape.php";
?>