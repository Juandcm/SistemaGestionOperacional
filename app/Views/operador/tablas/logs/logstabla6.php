<div class="col-12 d-none" id="logs-tabla-6">
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Logs de la Tabla 6</h4>
            <h4 class="float-left ml-3 text-info">(Reporte: PRECIERRE)</h4>
            <a href="javascript:regresarbotoneslogstables('6')" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
                <i class="mdi mdi-keyboard-backspace"></i> Regresar
            </a>
        </div>
        <div class="card-body">
            <form class="form-horizontal" id="formlogtabla6">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <p class="mt-2 text-center">Elige el Equipo del Área 1</p>
                                </div>
                                <div class="row mb-2">
                                    <select class="form-control" id="equipoareatabla6" name="equipoareatabla6" required>
                                      <option value="1">Equipo 1</option>
                                      <option value="2">Equipo 2</option>
                                      <option value="3">Equipo 3</option>
                                      <option value="5">Equipo 5</option>
                                      <option value="6">Equipo 6</option>
                                      <option value="7">Equipo 7</option>
                                      <option value="8">Equipo 8</option>
                                      <option value="9">Equipo 9</option>
                                      <option value="10">Equipo 10</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <p class="mt-2 text-center">Elige la fecha del Equipo Inicial</p>
                            </div>
                            <div class="row mb-2">
                                <input type="text" class="form-control" required id="fechainiciallogtabla6" name="fechainiciallogtabla6">
                            </div>
                        </div>
                    </div>
                      <div class="col-md-4">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <p class="mt-2 text-center">Elige la fecha del Equipo Final</p>
                            </div>
                            <div class="row mb-2">
                                <input type="text" class="form-control" required id="fechafinallogtabla6" name="fechafinallogtabla6">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-rounded btn-block btn-info waves-effect waves-light">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="card">
           <div class="card-body">
            <div class="text-center cargandologs d-none">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="text-justify" id="mostrarlogstabla6">

            </div>
        </div>
    </div>
</div>
</div>
</div>
