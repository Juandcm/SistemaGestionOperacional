<div class="col-12 d-none" id="datatables-tabla-1">
	<div class="card">
		<div class="card-header">
			<h4 class="float-left">Tabla <span class="numerodatatabla-1"></span></h4>
			<h4 class="float-left ml-3 text-info">(Área de Entrada de  Planta)</h4>
			<a href="javascript:regresarbotonesdatatables()" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
				<i class="mdi mdi-keyboard-backspace"></i> Regresar
			</a>
		</div>
		<div class="card-body">
			
			<h4 class="card-title mt-4">Selecciona una fecha de inicio y fin</h4>
			<div class="container-fluid">
				<div class="row">
					<div class="col-4">
						<div class="input-group mb-3 border-dark">
							<input type='text' class="form-control border-dark" name="fechatabla1" id="fechatabla1" />
							<div class="input-group-append">
								<span class="input-group-text border-dark">
									<span class="ti-calendar"></span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="text-center cargando d-none">
							<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
								<span class="sr-only">Loading...</span>
							</div>
						</div>
						<div class="table-responsive d-none" id="tabla-responsive-1">
						<div class="mt-4 mb-4 text-justify textousuariostabla">
						</div>
							<table id="tabla-1-datatable" class="table table-striped table-bordered display row-border order-column nowrap table-hover table-info" style="width:100%">
								<thead class="bg-info text-white">
									<tr>
										<th class="d-none">Identificador</th>
										<th>Área</th>
										<th>Equipo</th>
										<th>1-PM</th>
										<th>2-PM</th>
										<th>3-PM</th>
										<th>4-PM</th>
										<th>5-PM</th>
										<th>6-PM</th>
										<th>7-PM</th>
										<th>8-PM</th>
										<th>9-PM</th>
										<th>10-PM</th>
										<th>11-PM</th>
										<th>12-AM</th>
										<th>1-AM</th>
										<th>2-AM</th>
										<th>3-AM</th>
										<th>4-AM</th>
										<th>5-AM</th>
										<th>6-AM</th>
										<th>7-AM</th>
										<th>8-AM</th>
										<th>9-AM</th>
										<th>10-AM</th>
										<th>11-AM</th>
										<th>12-PM</th>
										<th>Promedio 6 AM</th>
										<th>Promedio 12 M</th>
									</tr>
								</thead>
								<tbody class="cuerpo">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>