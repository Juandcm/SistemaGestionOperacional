<div id="botonesreportes">
	<h2 class="text-center">Selecciona un Reporte con la fecha que quieres ver</h2>
	<hr>
	<div class="row justify-content-center align-content-center draggable-cards" id="draggable-area">

		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-info card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Reporte R-1</h4>
					<h6 class="m-b-0 text-white text-center">Reporte diario de Operaciones: Pre - Cierre (6 AM)</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:vertablasreportes('7')" class="btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver tabla</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-info card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Reporte R-2</h4>
					<h6 class="m-b-0 text-white text-center">Reporte diario de Operaciones - Cierre</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:vertablasreportes('8')" class="btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver tabla</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-xl-4 col-md-4">
			<div class="card text-white bg-info card-hover">
				<div class="card-header">
					<h4 class="m-b-0 text-white text-center">Reporte R-3</h4>
					<h6 class="m-b-0 text-white text-center">Reporte Acumulado</h6>
				</div>
				<div class="card-body bg-secondary text-center">
					<a href="javascript:vertablasreporteacumulado('A')" class="btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Parte A</a>
					<a href="javascript:vertablasreporteacumulado('B')" class="btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Parte B</a>
				</div>
			</div>
		</div>

	</div>
</div>

<div id="tablasreportes" class="d-none">
	<div class="row justify-content-center align-content-center">
		<?php 
		echo view('reportes/tablas/tabla7');
		echo view('reportes/tablas/tabla8');
		echo view('reportes/tablas/tabla3a');
		echo view('reportes/tablas/tabla3b');
		?>
	</div>
</div>