<div class="row">
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="d-flex no-block align-items-center m-b-30">
					<h4 class="card-title">Todos los usuarios</h4>
					<div class="ml-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#createmodel">
								Crear nuevo usuario
							</button>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table id="usersDatatable" class="table table-bordered dt-responsive nowrap" style="width:98%">
						<thead>
							<tr>
								<th>Nombre y Apellido</th>
								<th>Cedula</th>
								<th>Correo</th>
								<th>Telefono</th>
								<th>Fecha de Nacimiento</th>
								<th>Dirección</th>
								<th>Rol</th>
								<th>Estado</th>
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
echo view('administracion/usuarios/modalcrearusuario');
 ?>