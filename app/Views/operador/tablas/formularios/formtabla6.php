<?php 
$usuario_tipo = ($_SESSION['usuario_tipo'] != '') ? $_SESSION['usuario_tipo'] : '';
?>
<div class="col-12 d-none" id="tabla-6">
	<div class="card">
		<div class="card-header">
			<h4 class="float-left">Tabla <span class="numerotabla-6"></span></h4>
			<h4 class="float-left ml-3 text-info">(Reporte: PRECIERRE)</h4>
			<a href="javascript:regresarbotonestablas()" class="btn btn-outline-dark btn-rounded float-right">
				<i class="mdi mdi-keyboard-backspace"></i> Regresar
			</a>
		</div>

		<div class="card-body">
			<h4 class="card-title m-b-40">Selecciona una fecha de inicio y fin para buscar</h4>
			<div class="container-fluid">
				<div class="row">
					<div class="col-4">
						<div class="input-group mb-3 border-dark">
							<input type='text' class="form-control border-dark" name="fechatabla6" id="fechatabla6"/>
							<div class="input-group-append">
								<span class="input-group-text border-dark">
									<span class="ti-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-4"></div>

					<?php if ($usuario_tipo == '0' || $usuario_tipo == '1'): ?>
						<div class="col-4 text-center">
							<button class="btn btn-success waves-effect waves-light" type="button" data-toggle="modal" data-target="#formtabla6modal">Registrar datos del Área 1</button>
						</div>
					<?php endif ?>


				</div>
			</div>

			<div class="text-center d-none" id="cargandotabla6">
				<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
					<span class="sr-only">Loading...</span>
				</div>
			</div>

			<div id="tabla6principal" class="d-none">
				<ul class="nav nav-tabs justify-content-center align-content-center" id="myTab" role="tablist">
					<li class="nav-item"> 
						<a class="nav-link active show" data-toggle="tab" href="#area1" role="tab" aria-controls="area1" aria-expanded="true" aria-selected="true">
							<span class="hidden-xs-down">Área 1</span>
						</a> 
					</li>
					<li class="nav-item"> 
						<a class="nav-link show" data-toggle="tab" href="#area2" role="tab" aria-controls="area2" aria-selected="false">
							<span class="hidden-xs-down">Área 2</span>
						</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link show" data-toggle="tab" href="#area3" role="tab" aria-controls="area3" aria-selected="false">
							<span class="hidden-xs-down">Área 3</span>
						</a>
					</li>
				</ul>
				<div class="tab-content tabcontent-border p-20" id="myTabContent">
					<div role="tabpanel" class="tab-pane fade active show" id="area1">
						<form class="form-horizontal r-separator" id="formtabla6editar">
							<div class="container-fluid">
								<div class="row">
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-1:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="hidden" name="tabla6_area1_id" id="tabla6_area1_id">
											<input type="text" class="form-control" name="equit6area1num1editar" id="equit6area1num1editar" value="0.000,000000"  placeholder="Equipo T6 - A1-1:" required>
										</div>
									</div>
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-2:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="text" class="form-control" name="equit6area1num2editar" id="equit6area1num2editar" value="0.000,000000"  placeholder="Equipo T1 - A1-2:" required>
										</div>
									</div>
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-3:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="text" class="form-control" name="equit6area1num3editar" id="equit6area1num3editar" value="0.000,000000"  placeholder="Equipo T1 - A1-3:" required>
										</div>
									</div>
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-5:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="text" class="form-control" name="equit6area1num5editar" id="equit6area1num5editar" value="0.000,00" placeholder="Equipo T1 - A1-5:" required>
										</div>
									</div>
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-6:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="text" class="form-control" name="equit6area1num6editar" id="equit6area1num6editar" value="0.000,00" placeholder="Equipo T1 - A1-6:" required>
										</div>
									</div>
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-7:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="text" class="form-control" name="equit6area1num7editar" id="equit6area1num7editar" value="0.000,00" placeholder="Equipo T1 - A1-7:" required>
										</div>
									</div>
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-8:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="text" class="form-control" name="equit6area1num8editar" id="equit6area1num8editar" value="0.000,00" placeholder="Equipo T1 - A1-8:" required>
										</div>
									</div>
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-9:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="text" class="form-control" name="equit6area1num9editar" id="equit6area1num9editar" value="0.000,00" placeholder="Equipo T1 - A1-9:" required>
										</div>
									</div>
									<div class="form-group row col-12 align-items-center mb-1">
										<label class="col-2 text-center control-label col-form-label">Equipo T6 - A1-10:</label>
										<div class="col-10 border-left p-b-10 p-t-10">
											<input type="text" class="form-control" name="equit6area1num10editar" id="equit6area1num10editar" value="0.000,00" placeholder="Equipo T1 - A1-10:" required>
										</div>
									</div>
								</div>
								<div class="row justify-content-center align-items-center mb-4">
									<button class="btn btn-success waves-effect waves-light" type="submit">Editar Datos</button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="area2" role="tabpanel">
						<select name="selectabla6area2" id="selectabla6area2" class="custom-select custom-select-lg select mb-4 mt-2">
							<option value='' disabled selected>Selecciona un Caso</option>
							<option value="N">N</option>
							<option value="S">S</option>
						</select>
						<div class="text-center d-none" id="cargandocasotabla6area2">
							<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
								<span class="sr-only">Loading...</span>
							</div>
						</div>
						<div id="tabla6area2" class="d-none">
							<div class="dt-buttons"> 
								<a href="<?= base_url() ?>/Tabla6/reportetabla6area2" class="btn btn-success waves-effect waves-light mb-2" id="btnreportetabla6area2" target="__blank">
									<span>Reporte PDF</span>
								</a>
							</div>
							<div class="table-responsive">
								<table class="table table-striped table-bordered display row-border order-column nowrap table-hover table-info" style="width:100%">
									<thead class="bg-info text-white">
										<tr>
											<th>Equipo</th>
											<th>Calculado</th>
											<th>Corregido</th>
										</tr>
									</thead>
									<tbody class="border border-info">
										<tr>
											<td align="center">Equipo T6 - A2-1</td>
											<td align="center" id="E139"></td>
											<td align="center" id="F139"></td>
										</tr>
										<tr>
											<td align="center">Equipo T6 - A2-2</td>
											<td align="center" id="E140"></td>
											<td align="center" id="F140"></td>
										</tr>
										<tr>
											<td align="center">Equipo T6 - A2-3</td>
											<td align="center" id="E141"></td>
											<td align="center" id="F141"></td>
										</tr>
										<tr>
											<td align="center">Equipo T6 - A2-4</td>
											<td align="center" id="E142"></td>
											<td align="center" id="F142"></td>
										</tr>
										<tr>
											<td align="center">Equipo T6 - A2-5</td>
											<td align="center" id="E143"></td>
											<td align="center" id="F143"></td>
										</tr>
										<tr>
											<td align="center" rowspan="2">Equipo T6 - A2-5</td>
											<td align="center" id="E144"></td>
											<td align="center" id="F144"></td>
										</tr>
										<tr>
											<td align="center">Balanceado</td>
											<td align="center">Balanceado</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="area3" role="tabpanel">
						<select name="selectabla6area3" id="selectabla6area3" class="custom-select custom-select-lg select mb-4 mt-2">
							<option value='' disabled selected>Selecciona un Caso</option>
							<option value="N">N</option>
							<option value="S">S</option>
						</select>
						<div class="text-center d-none" id="cargandocasotabla6area3">
							<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
								<span class="sr-only">Loading...</span>
							</div>
						</div>
						<div id="tabla6area3" class="d-none">
							<div class="dt-buttons"> 
								<a href="<?= base_url() ?>/Tabla6/reportetabla6area3" class="btn btn-success waves-effect waves-light mb-2" id="btnreportetabla6area3" target="__blank">
									<span>Reporte PDF</span>
								</a>

							</div>
							<div class="table-responsive">
								<table class="table table-striped table-bordered display row-border order-column nowrap table-hover table-info" style="width:100%">
									<thead class="bg-info text-white">
										<tr>
											<th>Equipo</th>
											<th>Calculado</th>
											<th>Corregido</th>
										</tr>
									</thead>
									<tbody class="border border-info">
										<tr>
											<td align="center">Equipo T6 - A3-1</td>
											<td align="center" id="E149"></td>
											<td align="center" id="F149"></td>
										</tr>
										<tr>
											<td align="center">Equipo T6 - A3-2</td>
											<td align="center" id="E150"></td>
											<td align="center" id="F150"></td>
										</tr>
										<tr>
											<td align="center">Equipo T6 - A3-3</td>
											<td align="center" id="E151"></td>
											<td align="center" id="F151"></td>
										</tr>
										<tr>
											<td align="center">Equipo T6 - A3-4</td>
											<td align="center" id="E152"></td>
											<td align="center" id="F152"></td>
										</tr>
										<tr>
											<td align="center">Equipo T6 - A3-5</td>
											<td align="center" id="E153"></td>
											<td align="center" id="F153"></td>
										</tr>
										<tr>
											<td align="center" rowspan="2">Equipo T6 - A3-5</td>
											<td align="center" id="E154"></td>
											<td align="center" id="F154"></td>
										</tr>
										<tr>
											<td align="center">Balanceado</td>
											<td align="center">Balanceado</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



