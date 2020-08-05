<div class="col-12 d-none" id="datatables-tabla-7">
	<div class="card">
		<div class="card-header">
			<h4 class="float-left">Tabla 7</h4>
			<h4 class="float-left ml-3 text-info">Reporte Diario Operaciones: Pre-Cierre (6AM)</h4>
			<a href="javascript:regresarbotonestablasreportes(7)" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
				<i class="mdi mdi-keyboard-backspace"></i> Regresar
			</a>
		</div>
		<div class="card-body">
			
			<h4 class="card-title mt-4">Selecciona una fecha de inicio y fin</h4>
			<div class="container-fluid">
                <form target="_blank" action="<?= base_url()."/Tabla7/reportetabla7"?>" method="post">
				<div class="row">
					<div class="col-4">
						<div class="input-group mb-3 border-dark">
							<input type='text' class="form-control border-dark" name="fechatabla7" id="fechatabla7" />
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
						<div id="mostrarselectabla7" class="d-none">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<select name="selecreportetabla7" id="selecreportetabla7" class="custom-select custom-select-lg select mb-4 mt-2">
											<option value="" disabled="" selected="">Selecciona un Caso de la Tabla 6</option>
											<option value="N">N</option>
											<option value="S">S</option>
										</select>
									</div>	
								</div>
							</div>
						</div>
						<div class="text-center cargando d-none" id="cargandotabla7">
							<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
								<span class="sr-only">Loading...</span>
							</div>
						</div>
						<div id="tabla7principal" class="d-none">
							<div class="dt-buttons"> 
								<button class="btn btn-success waves-effect waves-light mb-2" type="submit">
									<span>Reporte PDF</span>
								</button> 
							</div>
							<div class="table-responsive">
								<table class="table table-striped table-bordered display row-border order-column nowrap table-hover table-info" border="1" cellpadding="2" cellspacing="0" style="width: 100%">
									<thead width="100%">
										<tr style="background-color:#FFFF00;color:#0000FF;">
											<th colspan="4" align="center" style="text-align: center;">FECHA DESDE: <span class="fechainicial"></span> 12:00:00 PM</th>
											<th colspan="3" align="center" style="text-align: center;">HASTA <span class="fechafinal" name="fechafinal"></span> 6:00:00 AM</th>
                                            <input type="hidden" name="fechainicial" class="fechainicial">
                                            <input type="hidden" name="fechafinal" class="fechafinal">
										</tr>
										<tr style="background-color:#FF0000;color:#FFFF00;">
											<th colspan="4" align="center" style="text-align: center;">PARÁMETROS DEL GAS</th>        
											<th colspan="3" align="center" style="text-align: center;">PARÁMETROS DE LOS LÌQUIDOS</th>
										</tr>
									</thead>
									<tbody width="100%">
										<tr>
											<td colspan="2" align="center">Vol.de Gas Procesado</td>
											<td colspan="1" align="center" id="F139"></td>
											<input type="hidden" name="F139">
											<td colspan="1" align="center">PCN</td>
											<td colspan="2" align="center">% Agua Libre (Ayer)</td>
											<td colspan="1" align="center" id="J6"></td>
											<input type="hidden" name="J6">
										</tr>
										<tr>
											<td colspan="2" align="center">Vol. de Gas Entregado a Turbina</td>
											<td colspan="1" align="center" id="F140"></td>
											<input type="hidden" name="F140">
											<td colspan="1" align="center">PCN</td>
											<td colspan="1" rowspan="2" align="center">Vol. de Agua Ayer (Bls.)</td>
											<td colspan="1" align="center">40-TK-002A</td>
											<td colspan="1" align="center" id="J7"></td>
											<input type="hidden" name="J7">
										</tr>
										<tr>
											<td colspan="2" align="center">Vol. de Gas Combustible Total</td>
											<td colspan="1" align="center" id="DE8"></td>
											<input type="hidden" name="DE8">
											<td colspan="1" align="center">PCN</td>
											<td colspan="1" align="center">40-TK-002B</td>
											<td colspan="1" align="center" id="J8"></td>
											<input type="hidden" name="J8">
										</tr>
										<tr>
											<td colspan="2" align="center">Vol. de Gas Quemado</td>
											<td colspan="1" align="center" id="F143"></td>
											<input type="hidden" name="F143">
											<td colspan="1" align="center">PCN</td>
											<td colspan="1" rowspan="3" align="center">Vol. de Ingresados al 40-TK-002A</td>
											<td colspan="1" align="center">Condensado</td>
											<td colspan="1" align="center" id="J9"></td>
											<input type="hidden" name="J9">
										</tr>
										<tr>
											<td colspan="2" rowspan="2" align="center">Vol. de Gas combustible Calentador 31-E-301</td>
											<td colspan="1" rowspan="2" align="center" id="F141"></td>
											<input type="hidden" name="F141">
											<td colspan="1" rowspan="2" align="center">PCN</td>
											<td colspan="1" rowspan="1" align="center">Agua</td>
											<td colspan="1" rowspan="1" align="center" id="J10"></td>
											<input type="hidden" name="J10">
										</tr>
										<tr>
											<td colspan="1" align="center">Total (Bls)</td>
											<td colspan="1" align="center" id="J11"></td>
											<input type="hidden" name="J11">
										</tr>

										<tr>
											<td colspan="2" rowspan="2" align="center">Vol. de Gas combustible Calentador 31-E-401</td>
											<td colspan="1" rowspan="2" align="center" id="F142"></td>
											<input type="hidden" name="F142">
											<td colspan="1" rowspan="2" align="center">PCN</td>
											<td colspan="1" rowspan="3" align="center">Vol. de Ingresados al 40-TK-002B</td>
											<td colspan="1" align="center">Condensado</td>
											<td colspan="1" align="center" id="J12"></td>
											<input type="hidden" name="J12">
										</tr>
										<tr>
											<td colspan="1" align="center">Agua</td>
											<td colspan="1" align="center" id="J13"></td>
											<input type="hidden" name="J13">
										</tr>
										<tr>
											<td colspan="4" align="center" rowspan="5">PRE-CIERRE (6 AM)</td>
											<td colspan="1" align="center">Total (Bls)</td>
											<td colspan="1" align="center" id="J14"></td>
											<input type="hidden" name="J14">
										</tr>
										<tr>
											<td colspan="1" rowspan="4" align="center">Vol. de Líquidos Ingresados a PTG-OBP-01</td>
											<td colspan="1" align="center">Condensado</td>
											<td colspan="1" align="center" id="J15"></td>
											<input type="hidden" name="J15">
										</tr>
										<tr>
											<td colspan="1" align="center">Agua</td>
											<td colspan="1" align="center" id="J16"></td>
											<input type="hidden" name="J16">
										</tr>
										<tr>
											<td colspan="1" align="center">Total</td>
											<td colspan="1" align="center" id="J17"></td>
											<input type="hidden" name="J17">
										</tr>
										<tr>
											<td colspan="1" align="center">% Agua Libre</td>
											<td colspan="1" align="center" id="J18"></td>
											<input type="hidden" name="J18">
										</tr>

										<tr>
											<td colspan="2" align="center"></td>
											<td colspan="3" align="center">PROMEDIO AL CIERRE</td>
											<td colspan="2" align="center">ÚLTIMO VALOR (6 AM)</td>
										</tr>

										<tr>
											<td colspan="2" rowspan="2" align="center">EQUIPO</td>
											<td colspan="1" align="center">PRESION</td>
											<td colspan="1" align="center">TEMP</td>
											<td colspan="1" align="center">NIVEL</td>
											<td colspan="1" align="center">PRESION</td>
											<td colspan="1" align="center">TEMP</td>
										</tr>

										<tr>
											<td colspan="1" align="center">Lpc</td>
											<td colspan="1" align="center">ºF</td>
											<td colspan="1" align="center">%</td>
											<td colspan="1" align="center">Lpc</td>
											<td colspan="1" align="center">ºF</td>
										</tr>

										<tr>
											<td colspan="2" align="center">ENTRADA GASODUCTO (03-PIT-01)</td>
											<td colspan="1" align="center" id="AF8"></td>
											<input type="hidden" name="AF8">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="X8"></td>
											<input type="hidden" name="X8">
											<td colspan="1" align="center">N/A</td>
										</tr>

										<tr>
											<td colspan="2" align="center">ENTRADA SLUG CATCHER (03-PIT-02)</td>
											<td colspan="1" align="center" id="AF12"></td>
											<input type="hidden" name="AF12">
											<td colspan="1" align="center" id="AF27"></td>
											<input type="hidden" name="AF27">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="X12"></td>
											<input type="hidden" name="X12">
											<td colspan="1" align="center" id="X13"></td>
											<input type="hidden" name="X13">
										</tr>
										<tr>
											<td colspan="2" align="center">ENTRADA DEPURADORES</td>
											<td colspan="1" align="center" id="AF22"></td>
											<input type="hidden" name="AF22">
											<td colspan="1" align="center" id="AF28"></td>
											<input type="hidden" name="AF28">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="X22"></td>
											<input type="hidden" name="X22">
											<td colspan="1" align="center" id="X27"></td>
											<input type="hidden" name="X27">
										</tr>
										<tr>
											<td colspan="2" align="center">DEPURADOR 30-V-301</td>
											<td colspan="1" align="center" id="AF32"></td>
											<input type="hidden" name="AF32">
											<td colspan="1" align="center" id="AF33"></td>
											<input type="hidden" name="AF33">
											<td colspan="1" align="center" id="AF35"></td>
											<input type="hidden" name="AF35">
											<td colspan="1" align="center" id="X32"></td>
											<input type="hidden" name="X32">
											<td colspan="1" align="center" id="X33"></td>
											<input type="hidden" name="X33">
										</tr>
										<tr>
											<td colspan="2" align="center">DEPURADOR 30-V-401</td>
											<td colspan="1" align="center" id="AF40"></td>
											<input type="hidden" name="AF40">
											<td colspan="1" align="center" id="AF41"></td>
											<input type="hidden" name="AF41">
											<td colspan="1" align="center" id="AF43"></td>
											<input type="hidden" name="AF43">
											<td colspan="1" align="center" id="X40"></td>
											<input type="hidden" name="X40">
											<td colspan="1" align="center" id="X41"></td>
											<input type="hidden" name="X41">
										</tr>
										<tr>
											<td colspan="2" align="center">FLASH TANK 40-V-5O1</td>
											<td colspan="1" align="center" id="AF48"></td>
											<input type="hidden" name="AF48">
											<td colspan="1" align="center" id="AF49"></td>
											<input type="hidden" name="AF49">
											<td colspan="1" align="center" id="AF51"></td>
											<input type="hidden" name="AF51">
											<td colspan="1" align="center" id="X48"></td>
											<input type="hidden" name="X48">
											<td colspan="1" align="center" id="X49"></td>
											<input type="hidden" name="X49">
										</tr>
										<tr>
											<td colspan="2" align="center">ENTRADA CALENTADORES</td>
											<td colspan="1" align="center" id="AF57"></td>
											<input type="hidden" name="AF57">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="X57"></td>
											<input type="hidden" name="X57">
											<td colspan="1" align="center">N/A</td>
										</tr>
										<tr>
											<td colspan="2" align="center">CALENTADOR 31-E-301</td>
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AF58"></td>
											<input type="hidden" name="AF58">
											<td colspan="1" align="center" id="AF60"></td>
											<input type="hidden" name="AF60">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="X58"></td>
											<input type="hidden" name="X58">
										</tr>
										<tr>
											<td colspan="2" align="center">CALENTADOR 31-E-401</td>
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AF68"></td>
											<input type="hidden" name="AF68">
											<td colspan="1" align="center" id="AF70"></td>
											<input type="hidden" name="AF70">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="X68"></td>
											<input type="hidden" name="X68">
										</tr>
										<tr>
											<td colspan="2" align="center">SKID DE MEDICIÓN (34-FQI-331A)</td>
											<td colspan="1" align="center" id="AF90"></td>
											<input type="hidden" name="AF90">
											<td colspan="1" align="center" id="AF91"></td>
											<input type="hidden" name="AF91">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="X90"></td>
											<input type="hidden" name="X90">
											<td colspan="1" align="center" id="X91"></td>
											<input type="hidden" name="X91">
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
                </form>
			</div>
		</div>
	</div>
</div>