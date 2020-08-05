<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:#ccc">
    <div class="auth-box" style="max-width: 80% !important;">
        <div id="loginform">
            <!-- Form -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                     <!--  <span class="db"><img src="<?= base_url() ?>/assets/images/icon.png" alt="logo" style="width: 25%;height: 80px;" /></span> -->
                     <h2 class="font-medium m-b-20">Sistema de Gestion Operacional</h2>
                      <h5 class="font-medium m-b-20">Acceso de Usuarios</h5>
                 </div>

                 <form class="form-horizontal m-t-20" id="loginformulario">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                        </div>
                        <input type="email" class="form-control form-control-lg" placeholder="Indicador de Red" aria-label="Indicador de Red" name="correo" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-lg" placeholder="Clave de Red" aria-label="Clave de Red" name="contrasena" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-info waves-effect waves-light" type="button" id="btnentrar">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-6 d-flex no-block justify-content-center align-items-center" style="background:url(<?= base_url() ?>/assets/images/fotoprincipal.png) no-repeat center center; width: 140px;">
            </div>

        </div>
    </div>
</div>
</div>