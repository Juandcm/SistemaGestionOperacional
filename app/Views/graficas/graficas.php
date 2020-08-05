<div id="botonesgraficas">
    <h2 class="text-center">Selecciona un Tabla Para ver la gráfica</h2>
    <hr>
    <div class="row justify-content-center align-content-center draggable-cards" id="draggable-area">
        <div class="col-lg-4 col-xl-4 col-md-4">
            <div class="card text-white bg-info card-hover">
                <div class="card-header">
                    <h4 class="m-b-0 text-white text-center">Tabla 1</h4>
                </div>
                <div class="card-body bg-secondary text-center">
                    <a href="javascript:vergraficatabla('1')" class="btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver gráfica</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-4 col-md-4">
            <div class="card text-white bg-info card-hover">
                <div class="card-header">
                    <h4 class="m-b-0 text-white text-center">Tabla 3</h4>
                </div>
                <div class="card-body bg-secondary text-center">
                    <a href="javascript:vergraficatabla('3')" class="btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver gráfica</a>
                </div>
            </div>
        </div>

            <div class="col-lg-4 col-xl-4 col-md-4">
            <div class="card text-white bg-info card-hover">
                <div class="card-header">
                    <h4 class="m-b-0 text-white text-center">Tabla 4</h4>
                </div>
                <div class="card-body bg-secondary text-center">
                    <a href="javascript:vergraficatabla('4')" class="btn btn-outline-dark btn-rounded waves-effect waves-light"><i class="mdi mdi-search-web fa-1x"></i> Ver gráfica</a>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="tablasgraficas" class="d-none">
    <div class="row justify-content-center align-content-center">
        <?php 
        echo view('graficas/tablas/tabla1');
        echo view('graficas/tablas/tabla3');
        echo view('graficas/tablas/tabla4');
        ?>
    </div>
</div>