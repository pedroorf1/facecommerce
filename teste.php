<?php
@include_once "administracao/sessao.php";
@require_once "cabecalho.php";
?>

<div class="flexslider">
	<ul class="slides">
		<li><img src="../../site/capa/1.jpg" alt="">
				<section>
					<p>Uno</p>
				</section>
		</li>
		<li><img src="../../site/capa/2.jpg" alt="">
				<section>
					<p>Due</p>
				</section>
		</li>
		<li><img src="../../site/capa/3.jpg" alt="">
				<section>
					<p>Tres</p>
				</section>
		</li>
	</ul>

</div>

<div><span  id="flex-prev"></span>
	<span  id="flex-next"></span>
</div>


<?php
@require "rodape.php";
?>

