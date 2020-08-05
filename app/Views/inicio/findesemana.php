<?php 
$usuario_nombre = ($_SESSION['usuario_nombre'] != '') ? $_SESSION['usuario_nombre'] : '';
$usuario_apellido = ($_SESSION['usuario_apellido'] != '') ? $_SESSION['usuario_apellido'] : '';
?>
<div class="row">
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<h2 class="text-center">Bienvenido Usuario de Fin de Semana</h2>
				<h3 class="text-center mt-2 mb-4">Que deseas hacer:</h3>
				<div class="container">
					<div class="row justify-content-center align-content-center">

						<div class="col-lg-4 col-xl-4 col-md-4 text-center">
							<a href="<?= base_url() ?>/tablas" class="card text-white bg-info card-hover waves-effect waves-light">
								<div class="card-header">
									<h4 class="m-b-0 text-white text-center">Tablas</h4>
								</div>
							</a>
						</div>

						<div class="col-lg-4 col-xl-4 col-md-4 text-center">
							<a href="<?= base_url() ?>/novedades" class="card text-white bg-info card-hover waves-effect waves-light">
								<div class="card-header">
									<h4 class="m-b-0 text-white text-center">Novedades</h4>
								</div>
							</a>
						</div>

						<div class="col-lg-4 col-xl-4 col-md-4 text-center">
							<a href="<?= base_url() ?>/reportes" class="card text-white bg-info card-hover waves-effect waves-light">
								<div class="card-header">
									<h4 class="m-b-0 text-white text-center">Reportes</h4>
								</div>
							</a>
						</div>

						<div class="col-lg-4 col-xl-4 col-md-4 text-center mt-2">
							<a href="<?= base_url() ?>/graficas" class="card text-white bg-info card-hover waves-effect waves-light">
								<div class="card-header">
									<h4 class="m-b-0 text-white text-center">Ver Gráficas</h4>
								</div>
							</a>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>