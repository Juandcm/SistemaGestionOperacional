<?php 
$usuario_tipo = ($_SESSION['usuario_tipo'] != '') ? $_SESSION['usuario_tipo'] : '';
?>
<div id="botonestablas">
	<h2 class="text-center">Selecciona una Tabla</h2>
	<hr>
	<div class="row justify-content-center align-content-center draggable-cards" id="draggable-area">
		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-info card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Tabla 1</h4>
					<h6 class="m-b-0 text-white text-center">Área de Entrada de  Planta</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:verdatatablas('1')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver tabla</a>
					<?php if ($usuario_tipo == '0'): ?>
						<a href="javascript:llenartabla('1')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Registrar datos</a>
					<?php endif ?>
					<a href="javascript:verlogstabla('1')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Ver los Logs</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-info card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Tabla 2</h4>
					<h6 class="m-b-0 text-white text-center">Área de Depuradores</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:verdatatablas('2')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver tabla</a>
					<?php if ($usuario_tipo == '0'): ?>
						<a href="javascript:llenartabla('2')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Registrar datos</a>	
					<?php endif ?>
					<a href="javascript:verlogstabla('2')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Ver los Logs</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-info card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Tabla 3</h4>
					<h6 class="m-b-0 text-white text-center">Área de Calentadores</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:verdatatablas('3')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver tabla</a>
					<?php if ($usuario_tipo == '0'): ?>
						<a href="javascript:llenartabla('3')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Registrar datos</a>
					<?php endif ?>
					<a href="javascript:verlogstabla('3')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Ver los Logs</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-success card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Tabla 4</h4>
					<h6 class="m-b-0 text-white text-center">Área de Salida de  Planta</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:verdatatablas('4')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver tabla</a>
					<?php if ($usuario_tipo == '0'): ?>
						<a href="javascript:llenartabla('4')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Registrar datos</a>
					<?php endif ?>
					<a href="javascript:verlogstabla('4')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Ver los Logs</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-success card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Tabla 5</h4>
					<h6 class="m-b-0 text-white text-center">Área de KOD/Tanques</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:verdatatablas('5')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver tabla</a>
					<?php if ($usuario_tipo == '0'): ?>
						<a href="javascript:llenartabla('5')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Registrar datos</a>
					<?php endif ?>
					<a href="javascript:verlogstabla('5')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Ver los Logs</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-success card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Tabla 6</h4>
					<h6 class="m-b-0 text-white text-center">Reporte: PRECIERRE</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:llenartabla('6')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Ver Tabla</a>
					<a href="javascript:verlogstabla('6')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-lead-pencil fa-1x"></i> Ver los Logs</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-warning card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Tabla 10</h4>
					<h6 class="m-b-0 text-white text-center">Cálculos de las condiciones de las operaciones</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:abrirtablacalculos('10')" class="mt-1 m-1 btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver tabla</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="formtablas" class="d-none">
	<div class="row justify-content-center align-content-center">
		<?php 
		echo view('operador/tablas/formularios/formtabla1');
		echo view('operador/tablas/formularios/formtabla2');
		echo view('operador/tablas/formularios/formtabla3');
		echo view('operador/tablas/formularios/formtabla4');
		echo view('operador/tablas/formularios/formtabla5');
		echo view('operador/tablas/formularios/formtabla6');
		echo view('operador/tablas/formularios/formtabla10');
		?>
	</div>
</div>

<div id="datatablestablas" class="d-none">
	<div class="row justify-content-center align-content-center">
		<?php 
		echo view('operador/tablas/datatables/tabla1');
		echo view('operador/tablas/datatables/tabla2');
		echo view('operador/tablas/datatables/tabla3');
		echo view('operador/tablas/datatables/tabla4');
		echo view('operador/tablas/datatables/tabla5');
		?>
	</div>
</div>

<div id="logstablas" class="d-none">
	<div class="row justify-content-center align-content-center">
		<?php 
		echo view('operador/tablas/logs/logstabla1');
		echo view('operador/tablas/logs/logstabla2');
		echo view('operador/tablas/logs/logstabla3');
		echo view('operador/tablas/logs/logstabla4');
		echo view('operador/tablas/logs/logstabla5');
		echo view('operador/tablas/logs/logstabla6');
		?>
	</div>
</div>

<!-- Modales -->
<?php 
echo view('operador/tablas/formularios/modalformtabla6');
?>