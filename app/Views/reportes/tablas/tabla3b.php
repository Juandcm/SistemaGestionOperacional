<div class="col-12 d-none" id="datatables-tabla-4">
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Reporte Acumulado</h4>
            <h4 class="float-left ml-3 text-info">R-3 Parte B</h4>
            <a href="javascript:regresarbotonestablasreportes(4)" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
                <i class="mdi mdi-keyboard-backspace"></i> Regresar
            </a>
        </div>
        <div class="card-body">
            <h4 class="card-title mt-4">Selecciona una fecha</h4>
            <div class="container-fluid">
                <form target="_blank" action="<?= base_url()."/TablaR3/reportetablaparteB"?>" method="post">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3 border-dark">
                                <input type='text' class="form-control border-dark" name="fechatabla3b" id="fechatabla3b"/>
                                <div class="input-group-append">
                                    <span class="input-group-text border-dark">
                                        <span class="ti-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="button" id="btnbuscarparteb" class="btn btn-primary btn-rounded waves-effect waves-light">
                                Buscar
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center cargando d-none" id="cargandotabla3b">
                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div id="tabla3bprincipal" class="d-none">
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
                                            <td align="center">Equipo T5 - A4-3</td>
                                            <td align="center">vyc</td>
                                            <td id="valort5equipo3area4" align="center"></td>
                                            <input type="hidden" name="valort5equipo3area4">
                                        </tr>
                                        <tr>
                                            <td align="center">Equipo T5 - A4-1</td>
                                            <td align="center">vyc</td>
                                            <td id="valort5equipo1area4" align="center"></td>
                                            <input type="hidden" name="valort5equipo1area4">
                                        </tr>
                                        <tr>
                                            <td align="center">Equipo T5 - A4-2</td>
                                            <td align="center">vyc</td>
                                            <td id="valort5equipo2area4" align="center"></td>
                                            <input type="hidden" name="valort5equipo2area4">
                                        </tr>
                                        <tr>
                                            <td align="center">Sub Total B1</td>
                                            <td align="center">vyc</td>
                                            <td id="subtotalb1" align="center"></td>
                                            <input type="hidden" name="subtotalb1">
                                        </tr>
                                        <tr>
                                            <td align="center">Sub Total B2</td>
                                            <td align="center">vyc</td>
                                            <td id="subtotalb2" align="center"></td>
                                            <input type="hidden" name="subtotalb2">
                                        </tr>
                                        <tr>
                                            <td align="center">Sub Total B3</td>
                                            <td align="center">vyc</td>
                                            <td id="subtotalb3" align="center"></td>
                                            <input type="hidden" name="subtotalb3">
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