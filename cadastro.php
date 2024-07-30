<?php
@require "cabecalho.php";

echo "<div class='container'>";//Inicio do container

?>
<div class='row'>



		<div class='class col s12 m12 l12 center'>
				
				<form name="cadastro_usuarios" action="inserir_usuario.php" method="post" id='forma_cad_usuario'>
				
				<input type="text" name="pnome" required="yes" placeholder="Primeiro Nome" id="primeironome">
				<label for="primeironome">Primeiro Nome</label><br>
				
				
				<input type="text" name="snome" required="yes" placeholder="Sobre Nome" id="sobrenome">
				<label for="sobrenome">Sobre Nome</label><br>
				
				<input type="date" name="data_nasc" required="yes" placeholder="Data de nascimento" id="datanasc">
				<label for="datanasc">Data de nascimento</label><br>

				
				<input type="text" name="cpf" required="yes" placeholder="CPF(Somente numeros)" pattern="[0-9]{11}" minlength="11" maxlength="12" id="cpf">
				<label for="cpf">CPF - somente números</label><br>

				<input type="text" name='sexo' placeholder="M ou F" required pattern='^[fFmM]{1}' maxlength="1" id="sexo">
				<label for="sexo">Sexo</label><br>

				
				<input type="text" name="endereco" required="yes" placeholder="Rua/Praça/Avenida/Travessa e Bairro" id="endereco">
				<label for="endereco">Endereço - Rua/Praça/Avenida/Travessa e Bairro</label><br>

			
				<input type="text" name="numero" required="yes" placeholder="Numero" id="numero">
				<label for="numero">Número</label><br>

				
				<input type="text" name="cidade" required="yes" placeholder="Cidade" id="cidade">
				<label for="cidade">Cidade</label>


				
				<input type="text" name="estado" required="yes" placeholder="Estado"  minlength="2" maxlength="2" id="estado">
				<label for="estado">Estado -  duas letras</label><br>

				
				<input type="text" name="cep" required="yes" placeholder="CEP"  pattern='^\d{5}-\d{3}' maxlength="9" minlength="9" id="cep">
				<label for="cep">CEP - completo</label><br>

				<input type="text" name="celular" required="yes" placeholder="CELULAR (00)00000-0000 " minlength=11 pattern="\(\d{2}\)\s*\d{4,5}-\d{4}" id="celular">
				<label for="celular">Celular - CELULAR (00)00000-0000, O Numero vai ser testado.</label><br>

				
				<input type="email" name="email" required="yes" placeholder="email"  minlength="8" id="email">
				<label for="email">Email - Este email vai ser confirmado!</label><br>

				
				<input type="text" name="login_cad" required="yes" placeholder="Login" id="login_">
				<label for="login_">Login</label><br>

				
				<input type="password" name="senha_cad" required="yes" placeholder="Senha" title="a senha dever começar com uma letra, deve conter ao menos 6 digitos." minlength="8" id="senha">
				<label for="senha">Senha - Mínimo de oito caracteres. Letras e números!</label><br>

				
				<input type="password" name="senha2_cad" required="yes" placeholder="Redigite a senha" title="a senha dever começar com uma letra, deve conter ao menos 6 digitos." minlength="8" id="senha2">
				<label for="senha2">Redigitar a senha</label><br>

				<a class="btn waves-effect waves-light" name="btCadUser" id='btCadUser'>CADASTRAR</a>
		
				</form>

		</div>

		<div id='ErrorMSG' class='class col s12 m12 l12 centered'>
			
		</div>


		
</div>		
<?php

echo "</div>";


@require "rodape.php";
?>