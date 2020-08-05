<div class="row">
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="d-flex no-block align-items-center m-b-30">
					<h4 class="card-title">Todas las novedades</h4>
					<div class="ml-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#crearNovedadModal">
								Registrar Novedad
							</button>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table id="novedadesDatatable" class="table table-bordered dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Novedad</th>
								<th>Prioridad</th>
								<th>Fecha de Registro</th>
								<th>Usuario del Registro</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
echo view('novedades/modalcrearnovedad');
echo view('novedades/modaleditarnovedad');
echo view('novedades/modaldetallesnovedad');
?>
