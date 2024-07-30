<?php
@require_once "sessao.php";
@require_once "cabecalho.php";
echo "<div class='container'>";//Inicio do container

if($logado==true){

if(isset($_SESSION['CAD_PROD']) && $_SESSION['CAD_PROD']!=''){
echo "<div class=' panel corPadrao-1 afastamento-0'>".$_SESSION['CAD_PROD']."</div>";
echo "<div class='avisos upper afastamento-0'>Lembre-se de ativar seu(s) produto(s) para que possam ser exibidos.</div>";
}

?>

	

<!--NOTA SOBRE O CADASTRO DE PRODUTOS /-->

<div class="row left-align">

	<div class='col m12 s12 l12'>


<fieldset class='avisos'>
	<legend class='lapela'>AJUDA</legend>	

	<p>1 - FOTOS DO PRODUTO - Somente o máximo de cinco (5) fotos do produto podem ser carregadas, sendo 1 (uma) foto de capa para o produto e mais 4 (quatro) fotos promocionais, sendo obrigatório o cadastro de ao menos a foto de capa e uma foto promocional.</p>
	<p>As fevem precisam estar em um formato 16/9 com fundo branco, padrão para seu melhor aproveitamento, e em uma resolução maior que 1000pixels de largura.</p>
	<p>2 - QUANTIDADE - Coloque a quantidade exata de produtos que deseja dispor à venda.</p>
	<p>3 - VENDAS E COMPRAS - <strong>As negociações são de inteira responsabilidade dos seus negóciantes, o site facecomerce não se resposnsabiliza por qualquer uma das partes.</strong></p>
	<p>4 - TAXAS - <strong>O site facecomerce só cobra taxas por anúncios em destaque conforme escpecificações em nos <a href='termos.php'>termos e serviços</a>. Produtos apenas cadastrados na banco de buscas não recebe incisões de taxas.</strong></p>
	<p>4 - TEMPO DE EXPOSIÇÃO - rodutos apenas cadastrados na banco de buscas tem prazo máximo de 30(trinta) dias de exposição. Para que o produto apareça nas buscas o usuário deve ativar sua exibição dentro de seu paine de controle.</p>
	<p>4 - RESPONSABILIDADES E CUSTOS - O vendedor é TOTALMENTE resposnsavél pelo anúcio isentando o facecomence.com de qualquer ônus sobre o produto anunciado.</p>
	</fieldset>

	</div>
	</div>

<!--FORMULARIO DE CADASTRO DE PRODUTOS /-->
<center>


<div class="row">

<form action="inserir_produto.php" novalidate="novalidate" method="post" id="frmCad_produtos" enctype="multipart/form-data"  class="col s12 m12 l12">


<fieldset>
	<legend>ESPECIFICAÇÕES DO PRODUTO</legend>


	<div class='col s12 m12 l12'>	
	<select name="tipo_prod" size='1' class='input-field' id='categoria'>
	<option value="todos" selected disabled>Selecione uma categoria</option>
	<option value="Eletrônicos">Eletrônicos</option>
	<option value="Construcao">Material de Contrução</option>
	<option value="Eletros">Eletros</option>
	<option value="Artes">Artes</option>
	<option value="Artesanato">Artesanato</option>
	<option value="Móveis">Móveis</option>
	<option value="Imóveis">Imóveis</option>
	<option value="Veículos">Veículos</option>
	<option value="Celulares">Célulares</option>
	<option value="TVs">TVs</option>
	<option value="Videogames">Videogames</option>
	<option value="Calçados">Calçados</option>
	<option value="Roupas">Roupas</option>
	<option value="ArtigosEsportivos">Artigos Esportivos</option>
	<option value="Revistas">Revistas</option>
	<option value="QuadrinhosMangas" >Quadrinhos ou Mangás</option>
	<option value="Filmes">Filmes</option>
	<option value="Pinturas">Pinturas</option>
	<option value="Joias">Joias</option>
	<option value="Decoracao">Artigos de Decoração</option>
	<option value="Passatempos">Passatempos(Jogos de tabuleiro, cards e outros)</option>
	</select></div>

	<div id='avisocategoria'></div>

	<label class="padrao">TÍTULO DO ANÚNCIO</label>
	<input type="text" name="titulo" placeholder="Titulo do anuncio"  required><br>
	<label class="padrao">MARCA DO PRODUTO</label>
	<input type="text" name="marca" placeholder="Marca"  pattern="[a-zA-Z0-9'\._ ]{2,}"  required><br>
	<label class="padrao">MODELO DO PRODUTO</label>
	<input type="text" name="modelo" placeholder="Modelo"  required><br>

	<label class="padrao">NOVO OU USADO</label>
	<select name="novousado" size='1' class='input-field'>
	<option value="Novo" selected>Novo</option>
	<option value="Usado" selected>Usado</option>
	</select><br>
	
	<label class="padrao">VALOR EM REAIS DA UNIDADE</label>
	<input type="number" pattern='^[0-9]{1,}\.*[0-9]{0,2}' min='0.50' step='0.01' name="valor" id="valor" placeholder="valor(use '.'(ponto) para separar os decimais)" required ><br>
	<label class="padrao">DESCRIÇÃO DO PRODUTO, ESPECIFICAÇÕES TÉCNICAS.</label>
	<textarea  id='input-field-0' cols="10" name="descricao"  required="yes" placeholder='Descrição - Não aceita caracteres especiais @^| etc' ></textarea><br>

	</fieldset>

	
	<fieldset>
		<legend>CARACTERISTICAS DO PRODUTO EMBALADO PARA TRANSPORTE</legend>
	
	<label class="padrao">PESO(kg 0.0)</label>	
	<input type="number" pattern="[\d\.\d]+" min='0.1' step='0.1'  name="peso" size="5" required><br> 
	<label class="padrao">ALTURA(cm)</label>
	<input type="number" pattern="[\d\.\d]+" min='0.1' step='0.1'   name="altura" size="5" required><br>
	<label class="padrao">LARGURA(cm)</label>
	<input type="number" pattern="[\d\.\d]+" min='0.1' step='0.1'   name="largura" size="5" required>
	<label class="padrao">COMPRIMETO(cm)</label>
	<input type="number" pattern="[\d\.\d]+" min='0.1' step='0.1'   name="comprimento" size="5" required>

	</fieldset>
	

	
	<fieldset>

		<legend>TIPOS DE TRANSPORTES ACEITOS</legend>

	<input type="checkbox" name="pac" id="tp1" class='' /><label for='tp1'  class="corPadrao-1">Pac:</label><br>
	
	
	<input type="checkbox" name="sedex" id="tp2" class='' /><label for='tp2' class="corPadrao-1">Sedex:</label><br>
	
	
	<input type="checkbox" name="sedexac" id="tp3" class='' /><label for='tp3'  class="corPadrao-1">Sedex a Cobrar:</label><br>
	
	
	<input type="checkbox" name="sedex10" id="tp4" class='' /><label for='tp4'  class="corPadrao-1">Sedex 10:</label><br>

	<input type="checkbox" name="sem" id="tp5" class='' /><label for='tp5'  class="corPadrao-1">Sem transporte:</label><br>

	
	</fieldset>
	
	<fieldset>
	<legend>QUANTIDADE DISPONIVEL PARA VENDA</legend>
	<input type="number" class='col m5 s8 l5' name="quantidade" placeholder="quantidade" required><br>
	</fieldset>

	
	<fieldset class="col s12 m12 l12">
	<legend>IMAGENS PROMOCIONAIS</legend>

	Máximo de 5 fotos<br>(jpg,png,gif ou bmp).<br>
	1 -Foto de capa, 4 fotos adicionais<br><hr>
	
	<div class="col s12 m12 l12">1 FOTO PARA CAPA:<input  class="col s12 m12 l12"  name="foto_capa" id="fotocapa" size="1" type="file"/>
	</div>
	<hr>	
	<div class="col s12 m12 l12">4 FOTOS PROMOCIONAIS:<input class="col s12 m12 l12" name="fotos[]" id="fotosadd" size="4" type="file" required multiple /><br>
	</div>


	</fieldset>

	<div class="avisos_destaque">
	<img src="Carbon/del_32.png" class="responsive" valign='middle' />
	A ORIGINALIDADE DO PRODUTO ANUNCIADO E A VERACIDADE DO ANÚNCIO É DE INTEIRA RESPONSABILIDADE DO ANUNCIANTE!</div>

	<input type="hidden" name="keypassCadProd" value="put" >
	<input type="button" value="Cadastrar Produto" name="cadprodutos" class="btn">


</form>


		<div id='ErrorMSG' class='class col s12 m12 l12'>
			
		</div>

</div>



<?php
}
require "rodape.php";
?>