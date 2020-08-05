<div class="col-12 d-none" id="logs-tabla-1">
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Logs de la Tabla 1</h4>
            <h4 class="float-left ml-3 text-info">(Área de Entrada de  Planta)</h4>
            <a href="javascript:regresarbotoneslogstables('1')" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
                <i class="mdi mdi-keyboard-backspace"></i> Regresar
            </a>
        </div>
        <div class="card-body">
            <form class="form-horizontal" id="formlogtabla1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <p class="mt-2 text-center">Elige el Área de la Tabla 1</p>
                                </div>
                                <div class="row mb-2">
                                    <select class="form-control" id="areatabla1" name="areatabla1" required>
                                        <option value='' disabled selected>Selecciona el Área</option>
                                        <option value="1">Área 1</option>
                                        <option value="2">Área 2</option>
                                        <option value="3">Área 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <p class="mt-2 text-center">Elige el Equipo del Área seleccionada</p>
                                </div>
                                <div class="row mb-2">
                                    <select class="form-control" id="equipoareatabla1" name="equipoareatabla1" disabled required>
                                        <option value="1">Equipo 1</option>
                                        <option value="2">Equipo 2</option>
                                        <option value="3">Equipo 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <p class="mt-2 text-center">Elige la fecha del Equipo del Área seleccionada</p>
                                </div>
                                <div class="row mb-2">
                                    <input type="text" class="form-control" required id="fechalogtabla1" name="fechalogtabla1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <p class="mt-2 text-center">Elige la hora del Equipo del Área seleccionada</p>
                                </div>
                                <div class="row mb-2">
                                    <input type="text" class="form-control" required id="tiempologtabla1" name="tiempologtabla1">
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
                <div class="text-justify" id="mostrarlogstabla1">
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
