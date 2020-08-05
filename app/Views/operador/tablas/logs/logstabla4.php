<div class="col-12 d-none" id="logs-tabla-4">
  <div class="card">
    <div class="card-header">
      <h4 class="float-left">Logs de la Tabla 4</h4>
      <h4 class="float-left ml-3 text-info">(Área de Salida de  Planta)</h4>
      <a href="javascript:regresarbotoneslogstables('4')" class="btn btn-outline-dark btn-rounded float-right waves-effect waves-light">
        <i class="mdi mdi-keyboard-backspace"></i> Regresar
      </a>
    </div>
    <div class="card-body">
      <form class="form-horizontal" id="formlogtabla4">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="container-fluid">
                <div class="row justify-content-center">
                  <p class="mt-2 text-center">Elige el Área de la Tabla 1</p>
                </div>
                <div class="row mb-2">
                  <select class="form-control" id="areatabla4" name="areatabla4" required>
                    <option value='' disabled selected>Selecciona el Área</option>
                    <option value="1">Área 1</option>
                    <option value="2">Área 2</option>
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
                  <select class="form-control" id="equipoareatabla4" name="equipoareatabla4" disabled required>
                    <option value="1">Equipo 1</option>
                    <option value="3">Equipo 3</option>
                    <option value="5">Equipo 5</option>
                    <option value="6">Equipo 6</option>
                    <option value="7">Equipo 7</option>
                    <option value="8">Equipo 8</option>
                    <option value="9">Equipo 9</option>
                    <option value="10">Equipo 10</option>
                    <option value="11">Equipo 11</option>
                    <option value="12">Equipo 12</option>
                    <option value="12">Equipo 12</option>
                    <option value="13">Equipo 13</option>
                    <option value="14">Equipo 14</option>
                    <option value="15">Equipo 15</option>
                    <option value="16">Equipo 16</option>
                    <option value="18">Equipo 18</option>
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
                  <input type="text" class="form-control" required id="fechalogtabla4" name="fechalogtabla4">
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="container-fluid">
                <div class="row justify-content-center">
                  <p class="mt-2 text-center">Elige la hora del Equipo del Área seleccionada</p>
                </div>
                <div class="row mb-2">
                  <input type="text" class="form-control" required id="tiempologtabla4" name="tiempologtabla4">
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
        <div class="text-justify" id="mostrarlogstabla4">
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>
