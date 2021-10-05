<section class="lancamento">
			
				<h2><a href="#">
				<?php
				 	require 'media/src/LimitaCaracter.php';

					$titulo = new LimitaCaracter();
					$titulo->texto = "Homen Aranha sem volta para casa";

					echo $titulo->limiteDeCaracteres();
				?>
				</a></h2>
				<h3>Lançamento</h3>
				<p>Status: alugado</p>
				<img src="media/img/homenaranhasemvoltapracasa.jpg" alt="Homem aranha volta pra casa capa ">
				
				<ul>
					<li>Gênero: Aventura</li>
					<li>Ano: 2021</li>
					<li>Nota: 4.5/5</li>
				</ul>
			
			</section>

			<section class="lancamento">
				
				<h2><a href="#"> Anônimo</a></h2>
				<h3>Sugestão</h3>
				<p>Status: Disponivel</p>
				<img src="media/img/anonimo.jpg" alt="Anônimo ">
				
				<ul>
					<li>Gênero: Ação</li>
					<li>Ano: 2021</li>
					<li>Nota: 4.5/5</li>
				</ul>
			
			</section>