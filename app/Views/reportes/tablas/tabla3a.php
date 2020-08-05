<div class="col-12 d-none" id="datatables-tabla-3">
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Reporte Acumulado</h4>
            <h4 class="float-left ml-3 text-info">R-3 Parte A</h4>
            <a href="javascript:regresarbotonestablasreportes(3)" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
                <i class="mdi mdi-keyboard-backspace"></i> Regresar
            </a>
        </div>
        <div class="card-body">
            <h4 class="card-title mt-4">Selecciona una fecha</h4>
            <div class="container-fluid">
                <form target="_blank" action="<?= base_url()."/TablaR3/reportetablaparteA"?>" method="post">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3 border-dark">
                                <input type='text' class="form-control border-dark" name="fechatabla3a" id="fechatabla3a"/>
                                <div class="input-group-append">
                                    <span class="input-group-text border-dark">
                                        <span class="ti-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="button" id="btnbuscarpartea" class="btn btn-primary btn-rounded waves-effect waves-light">
                                Buscar
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center cargando d-none" id="cargandotabla3a">
                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div id="tabla3aprincipal" class="d-none">
                                <div class="dt-buttons"> 
                                    <button class="btn btn-success waves-effect waves-light mb-2" type="submit">
                                        <span>Reporte PDF</span>
                                    </button> 
                                </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered display row-border order-column nowrap table-hover table-info" border="1" cellpadding="2" cellspacing="0" style="width: 100%">
                                    <thead width="100%">
                                        <tr style="background-color:#FFFF00;color:#0000FF;">
                                            <th align="center">Equipo</th>
                                            <th align="center">Unidad</th>
                                            <th align="center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody width="100%">
                                        <tr>
                                            <td align="center">Equipo T6 - A3-1</td>
                                            <td align="center">vycyy</td>
                                            <td id="valort6equipo1area3" align="center"></td>
                                            <input type="hidden" name="valort6equipo1area3">
                                        </tr>
                                        <tr>
                                            <td align="center">Equipo T6 - A3-2</td>
                                            <td align="center">vycyy</td>
                                            <td id="valort6equipo2area3" align="center"></td>
                                            <input type="hidden" name="valort6equipo2area3">
                                        </tr>
                                        <tr>
                                            <td align="center">Equipo T3 - A1-7</td>
                                            <td align="center">vyc</td>
                                            <td id="valort3equipo7area1" align="center"></td>
                                            <input type="hidden" name="valort3equipo7area1">
                                        </tr>
                                        <tr>
                                            <td align="center">Equipo T3 - A2-7</td>
                                            <td align="center">vyc</td>
                                            <td id="valort3equipo7area2" align="center"></td>
                                            <input type="hidden" name="valort3equipo7area2">
                                        </tr>
                                        <tr>
                                            <td align="center">Sub Total A</td>
                                            <td align="center">vycyy</td>
                                            <td id="subtotala" align="center"></td>
                                            <input type="hidden" name="subtotala">
                                        </tr>
                                        <tr>
                                            <td align="center">Equipo T6 - A3-5</td>
                                            <td align="center">vyc</td>
                                            <td id="valort6equipo5area3" align="center"></td>
                                            <input type="hidden" name="valort6equipo5area3">
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