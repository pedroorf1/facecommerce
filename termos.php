<?php
@require_once "sessao.php";
@require_once "cabecalho.php";

echo "<div class='corpo'>";//corpo da pagina inicial/corpos das paginas normais
//inicio da pagina

	echo "<div class='container'>";//Inicio do container
	echo "<div class='titulos_listas'>TERMOS E SERVIÇOS</div>";

		echo "<div class='termos_servicos'>";

			echo "<ol class='listas_primeira'>"; //inicio dos termos e serviços

					echo "<caption><b>ITEM A</b> - DAS ATIVIDADE DO FACECOMERCE E SEUS SERVIÇOS</caption>";
							echo "<ol>";
									echo "<li>".substituir_especiais("

											O facecomerce.com é uma empresa de cunho publicitário, responsável unicamente pela 
											divulgação dos produtos cadastrados em seus bancos de dados, não tratrando em suas formas de 
											capitação qualquer tipo de comissão sobre os produtos anunciados.


										")."</li>";

							echo "</ol>";//DIM DO ITEM A




					echo "<caption><b>ITEM B</b> - DOS PRODUTOS ANUNCIADOS</caption>";
							echo "<ol>";
									echo "<li>".substituir_especiais("

											O facecomerce.com não é responsável pelos dados dos anúncios de seus sitemas, 
											tais dados são de total responsabilidade dos anunciantes.

										")."</li>";

									echo "<li>".substituir_especiais("

											O facecomerce.com se reserva o direito de usar para os devidos fins legais todos os dados
											fornecidos por seus usuários.

										")."</li>";
									echo "<li>".substituir_especiais("

											Para produtos anunciados nos casos que o transporte não poder ser
											realizado pela ECT(Empresa brasileira de correrios e  telégrafos), essa informações deve estar clara para o comprador.

										")."</li>";

							echo "</ol>";//FIM DO ITEM B



					echo "<caption><b>ITEM C</b> - DOS CONTRATOS DE ANÚNCIOS</caption>";
							echo "<ol>";
									echo "<li>".substituir_especiais("

											Os contratos de anúcios não são vinculados aos preços dos produtos.

										")."</li>";

									echo "<li>".substituir_especiais("

											Somente produtos em áreas de destaque como capas e lapelas no facecomerce.com são taxados e devem ser contratadas diretamente pelo comercial@facecomerce.com. 

										")."</li>";

									echo "<li>".substituir_especiais("

											Para produtos anunciados fora das áreas taxadas, o prazo de exposição máximo é de 30(trint dias).

										")."</li>";

									echo "<li>".substituir_especiais("

											Para produtos anunciados nos casos que o transporte não pode ser
											realizado pela ECT(Empresa brasileira de correrios e  telégrafos), essa informações deve estar clara para o comprador.

										")."</li>";

									echo "<li>".substituir_especiais("

											Cada produto deve ser vinculado a um único anúncio, ficado vetada agregar mais de um tipo de produto
											ao anúcio.<br><b>Exemplo:</b> - Anunciar um lote de produtos de peças sendo estas peças difentes uma das outras, anúnciar DVD´s de diferentes títulos ou lançamentos em um mesmo anúncio, mesmo sendo estes dvd´s do mesmo artista. Este item só se torna inapliável nos casos de BOXES lacrados ou itens que se semelhem ao citado. A violação deste item acarreta na exclusão do anúncio sem qualquer prejuiso para o facecomerce.

										")."</li>";

							echo "</ol>";//FIM DO ITEM C					


					echo "<caption><b>ITEM D</b> - RECLAMAÇÕES OU DUVIDAS</caption>";
							echo "<ol>";
									echo "<li>".substituir_especiais("

											Entre em contato pelo nosso serviço de atendimento ao cliente sac@facecomerce.com.

										")."</li>";

									

							echo "</ol>";//FIM DO ITEM D	


					echo "<caption><b>ITEM E</b> - ADESÃO</caption>";
							echo "<ol>";
									echo "<li>".substituir_especiais("

											Todos os usuários e visitantes do facecomerce.com concordam automaticamente com seus termos de uso.

										")."</li>";

									

							echo "</ol>";//FIM DO ITEM E




			echo "</ol>";//fim dos termos e serviços
			echo "<hr>";
			echo "<hr>";
			echo "<center>www.facecomerce.com</center>";
			echo "<hr>";
			echo "<hr>";


	echo "</div>";

	//fim da pagina
echo "</div></div></div></div></div></div></div>";

// @require_once "rodape.php";
?>