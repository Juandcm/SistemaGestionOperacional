<div class="col-12 d-none" id="datatables-tabla-8">
	<div class="card">
		<div class="card-header">
			<h4 class="float-left">Tabla 8</h4>
			<h4 class="float-left ml-3 text-info">Reporte Diario Operaciones Cierre</h4>
			<a href="javascript:regresarbotonestablasreportes(8)" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
				<i class="mdi mdi-keyboard-backspace"></i> Regresar
			</a>
		</div>
		<div class="card-body">
			
			<h4 class="card-title mt-4">Selecciona una fecha de inicio y fin</h4>
			<div class="container-fluid">
				<form target="_blank" action="<?= base_url()."/Tabla8/reportetabla8"?>" method="post">
				<div class="row">
					<div class="col-4">
						<div class="input-group mb-3 border-dark">
							<input type='text' class="form-control border-dark" name="fechatabla8" id="fechatabla8" />
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
						<div id="mostrarselectabla8" class="d-none">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<select name="selecreportetabla8" id="selecreportetabla8" class="custom-select custom-select-lg select mb-4 mt-2">
											<option value="" disabled="" selected="">Selecciona un Caso de la Tabla 6</option>
											<option value="N">N</option>
											<option value="S">S</option>
										</select>
									</div>	
								</div>
							</div>
						</div>
						<div class="text-center cargando d-none" id="cargandotabla8">
							<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
								<span class="sr-only">Loading...</span>
							</div>
						</div>
						<div id="tabla8principal" class="d-none">
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
											<th colspan="2" align="center" style="text-align: center;">HASTA <span class="fechafinal" name="fechafinal"></span> 12:00:00 PM</th>
                                            <input type="hidden" name="fechainicial" class="fechainicial">
                                            <input type="hidden" name="fechafinal" class="fechafinal">
										</tr>
										<tr style="background-color:#FF0000;color:#FFFF00;">
											<th colspan="6" align="center" style="text-align: center;">PARÁMETROS DEL GAS</th>
										</tr>
									</thead>
									<tbody width="100%">
										<tr>
											<td colspan="4" align="center">PARÁMETROS GENERALES</td>
											<td colspan="2" align="center"></td>
										</tr>
										<tr>
											<td colspan="4" align="center">Vol.de Gas Procesado</td>
											<td colspan="1" align="center" id="F149"></td>
											<input type="hidden" name="F149">
											<td colspan="1" align="center">PCN</td>
										</tr>
										<tr>
											<td colspan="4" align="center">Vol. de Gas Entregado a Turbina</td>
											<td colspan="1" align="center" id="F150"></td>
											<input type="hidden" name="F150">
											<td colspan="1" align="center">PCN</td>
										</tr>
										<tr>
											<td colspan="4" align="center">Vol. de Gas Combustible Total</td>
											<td colspan="1" align="center" id="EF8"></td>
											<input type="hidden" name="EF8">
											<td colspan="1" align="center">PCN</td>
										</tr>
										<tr>
											<td colspan="4" align="center">Vol. de Gas Quemado</td>
											<td colspan="1" align="center" id="F153"></td>
											<input type="hidden" name="F153">
											<td colspan="1" align="center">PCN</td>
										</tr>
										<tr>
											<td colspan="4" align="center">Vol. de Gas combustible Calentador 31-E-301</td>
											<td colspan="1" align="center" id="F151"></td>
											<input type="hidden" name="F151">
											<td colspan="1" align="center">PCN</td>
										</tr>
										<tr>
											<td colspan="4" align="center">Vol. de Gas combustible Calentador 31-E-401</td>
											<td colspan="1" align="center" id="F152"></td>
											<input type="hidden" name="F152">
											<td colspan="1" align="center">PCN</td>
										</tr>
										<tr>
											<td colspan="4" align="center">LÍQUIDOS INGRESADOS A TANQUES</td>
											<td colspan="2" align="center"></td>
										</tr>

										<tr>
											<td colspan="2" rowspan="2" align="center">Vol. de Líquidos Ingresado en el Tk-A</td>
											<td colspan="1" align="center">Condensados (Bls)</td>
											<td colspan="1" align="center" id="EF13"></td>
											<input type="hidden" name="EF13">
											<td colspan="2" rowspan="9" align="center">REPORTE DE CIERRE (12 M)</td>
										</tr>
										<tr>
											<td colspan="1" align="center">Agua (Bls)</td>
											<td colspan="1" align="center" id="EF14"></td>
											<input type="hidden" name="EF14">
										</tr>
										<tr>
											<td colspan="2" align="center"></td>
											<td colspan="1" align="center">Tot. TK-A</td>
											<td colspan="1" align="center" id="EF15"></td>
											<input type="hidden" name="EF15">
										</tr>

										<tr>
											<td colspan="2" rowspan="2" align="center">Vol. de Líquidos Ingresado en el Tk-B</td>
											<td colspan="1" align="center">Condensados (Bls)</td>
											<td colspan="1" align="center" id="EF16"></td>
											<input type="hidden" name="EF16">
										</tr>
										<tr>
											<td colspan="1" align="center">Agua (Bls)</td>
											<td colspan="1" align="center" id="EF17"></td>
											<input type="hidden" name="EF17">
										</tr>
										<tr>
											<td colspan="2" align="center"></td>
											<td colspan="1" align="center">Tot. TK-B</td>
											<td colspan="1" align="center" id="EF18"></td>
											<input type="hidden" name="EF18">
										</tr>

										<tr>
											<td colspan="2" rowspan="4" align="center">Vol. de Líq. Ingresado en PTG-OBP-01 (Bls.)</td>
											<td colspan="1" align="center">Condensados   (Bls)</td>
											<td colspan="1" align="center" id="EF19"></td>
											<input type="hidden" name="EF19">
										</tr>
										<tr>
											<td colspan="1" align="center">Agua (Bls)</td>
											<td colspan="1" align="center" id="EF20"></td>
											<input type="hidden" name="EF20">
										</tr>
										<tr>
											<td colspan="1" align="center">Total (Bls)</td>
											<td colspan="1" align="center" id="EF21"></td>
											<input type="hidden" name="EF21">
										</tr>
										<tr>
											<td colspan="1" align="center">% Ag.    Libre</td>
											<td colspan="1" align="center" id="EF22"></td>
											<input type="hidden" name="EF22">
											<td colspan="1" align="center">Tot. A</td>
											<td colspan="1" align="center">Tot. B</td>
										</tr>
										<tr>
											<td colspan="3" align="center">Vol. de Líquidos Despachados (Bls.) TOTAL:</td>
											<td colspan="1" align="center" id="EF23"></td>
											<input type="hidden" name="EF23">
											<td colspan="1" align="center" id="G23"></td>
											<input type="hidden" name="G23">
											<td colspan="1" align="center" id="H23"></td>
											<input type="hidden" name="H23">
										</tr>
										<tr>
											<td colspan="4" align="center">PROMEDIO AL CIERRE</td>
											<td colspan="2" align="center">ULTIMO VALOR (12M)</td>
										</tr>

										<tr>
											<td colspan="1" rowspan="2" align="center">EQUIPO</td>
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
											<td colspan="1" align="center">ENTRADA GASODUCTO (03-PIT-01)</td>
											<td colspan="1" align="center" id="AH8"></td>
											<input type="hidden" name="AH8">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AD8"></td>
											<input type="hidden" name="AD8">
											<td colspan="1" align="center">N/A</td>
										</tr>

										<tr>
											<td colspan="1" align="center">ENTRADA SLUG CATCHER (03-PIT-02)</td>
											<td colspan="1" align="center" id="AH12"></td>
											<input type="hidden" name="AH12">
											<td colspan="1" align="center" id="AH27"></td>
											<input type="hidden" name="AH27">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AD12"></td>
											<input type="hidden" name="AD12">
											<td colspan="1" align="center" id="AD13"></td>
											<input type="hidden" name="AD13">
										</tr>

										<tr>
											<td colspan="1" align="center">ENTRADA DEPURADORES</td>
											<td colspan="1" align="center" id="AH22"></td>
											<input type="hidden" name="AH22">
											<td colspan="1" align="center" id="AH28"></td>
											<input type="hidden" name="AH28">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AD22"></td>
											<input type="hidden" name="AD22">
											<td colspan="1" align="center" id="AD27"></td>
											<input type="hidden" name="AD27">
										</tr>
										<tr>
											<td colspan="1" align="center">DEPURADOR 30-V-301</td>
											<td colspan="1" align="center" id="AH32"></td>
											<input type="hidden" name="AH32">
											<td colspan="1" align="center" id="AH33"></td>
											<input type="hidden" name="AH33">
											<td colspan="1" align="center" id="AH35"></td>
											<input type="hidden" name="AH35">
											<td colspan="1" align="center" id="AD32"></td>
											<input type="hidden" name="AD32">
											<td colspan="1" align="center" id="AD33"></td>
											<input type="hidden" name="AD33">
										</tr>
										<tr>
											<td colspan="1" align="center">DEPURADOR 30-V-401</td>
											<td colspan="1" align="center" id="AH40"></td>
											<input type="hidden" name="AH40">
											<td colspan="1" align="center" id="AH41"></td>
											<input type="hidden" name="AH41">
											<td colspan="1" align="center" id="AH43"></td>
											<input type="hidden" name="AH43">
											<td colspan="1" align="center" id="AD40"></td>
											<input type="hidden" name="AD40">
											<td colspan="1" align="center" id="AD41"></td>
											<input type="hidden" name="AD41">
										</tr>
										<tr>
											<td colspan="1" align="center">FLASH TANK 40-V-5O1</td>
											<td colspan="1" align="center" id="AH48"></td>
											<input type="hidden" name="AH48">
											<td colspan="1" align="center" id="AH49"></td>
											<input type="hidden" name="AH49">
											<td colspan="1" align="center" id="AH51"></td>
											<input type="hidden" name="AH51">
											<td colspan="1" align="center" id="AD48"></td>
											<input type="hidden" name="AD48">
											<td colspan="1" align="center" id="AD49"></td>
											<input type="hidden" name="AD49">
										</tr>
										<tr>
											<td colspan="1" align="center">ENTRADA CALENTADORES</td>
											<td colspan="1" align="center" id="AH57"></td>
											<input type="hidden" name="AH57">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AD57"></td>
											<input type="hidden" name="AD57">
											<td colspan="1" align="center">N/A</td>
										</tr>
										<tr>
											<td colspan="1" align="center">CALENTADOR 31-E-301</td>
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AH58"></td>
											<input type="hidden" name="AH58">
											<td colspan="1" align="center" id="AH60"></td>
											<input type="hidden" name="AH60">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AD58"></td>
											<input type="hidden" name="AD58">
										</tr>
										<tr>
											<td colspan="1" align="center">CALENTADOR 31-E-401</td>
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AH78"></td>
											<input type="hidden" name="AH78">
											<td colspan="1" align="center" id="AH70"></td>
											<input type="hidden" name="AH70">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AD68"></td>
											<input type="hidden" name="AD68">
										</tr>
										<tr>
											<td colspan="1" align="center">SKID DE MEDICIÓN (34-FQI-331A)</td>
											<td colspan="1" align="center" id="AH90"></td>
											<input type="hidden" name="AH90">
											<td colspan="1" align="center" id="AH91"></td>
											<input type="hidden" name="AH91">
											<td colspan="1" align="center">N/A</td>
											<td colspan="1" align="center" id="AD90"></td>
											<input type="hidden" name="AD90">
											<td colspan="1" align="center" id="AD91"></td>
											<input type="hidden" name="AD91">
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