<div class="col-12 d-none" id="grafica-tabla-1">
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Tabla 1</h4>
            <h4 class="float-left ml-3 text-info">(Área de Entrada de  Planta)</h4>
            <a href="javascript:regresarbotonestablasgraficas('1')" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
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
                        <div class="text-center d-none" id="cargando-grafica-1">
                            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="table-responsive d-none" id="grafica-responsive-1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body analytics-info">
                                                <h4 class="card-title">Detalles del registro de la tabla 1</h4>
                                                <div id="graficatabla1" style="height:400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>