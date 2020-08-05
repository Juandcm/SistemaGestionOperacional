<!-- Create Modal -->
<div class="modal animated bounceInUp" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/" method="post" id="formCrearUsuario" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Crear usuario nuevo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Nombre"><i class="ti-user text-white"></i></button>
                                <input type="text" class="form-control" id="nameRegistro" name="nameRegistro" placeholder="Nombre" aria-label="name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Apellido"><i class="ti-user text-white"></i></button>
                                <input type="text" class="form-control" id="apellidoRegistro" name="apellidoRegistro" placeholder="Apellido" aria-label="Apellido" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Cedula"><i class="ti-user text-white"></i></button>
                                <input type="text" class="form-control" id="cedulaRegistro" name="cedulaRegistro" placeholder="Cedula" aria-label="Cedula" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Email"><i class="ti-email text-white"></i></button>
                                <input type="email" class="form-control" id="emailRegistro" name="emailRegistro" placeholder="Email" aria-label="no" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Telefono"><i class="fas fa-phone text-white"></i></button>
                                <input type="text" class="form-control phone-inputmask" id="phoneRegistro" name="phoneRegistro" placeholder="Telefono" aria-label="no" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Dirección"><i class="ti ti-map-alt  text-white"></i></button>
                                <textarea name="direccionRegistro" class="form-control" placeholder="Dirección" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Indicador de Red"><i class="mdi mdi-block-helper text-white"></i></button>
                                <input type="text" class="form-control" id="indicadorderedRegistro" name="indicadorderedRegistro" placeholder="Indicador de Red" aria-label="no" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Clave de Red"><i class="mdi mdi-block-helper text-white"></i></button>
                                <input type="password" class="form-control" id="clavederedRegistro" name="clavederedRegistro" placeholder="Clave de Red" aria-label="no" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Fecha de Nacimiento"><i class="icon icon-calender text-white"></i></button>
                                <input type="date" class="form-control" id="fechanacimientoRegistro" name="fechanacimientoRegistro" placeholder="Fecha nacimiento" aria-label="no" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Rol del Usuario"><i class="ti-layout text-white"></i></button>
                                <select class="custom-select form-control required" id="selectRolRegistro" name="selectRolRegistro" aria-invalid="false" required>
                                    <option value="0">Operador</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Fin de Semana</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="dropzone" id="my-dropzone" style="width: 100%">
                                    <div class="fallback" style="width: 100%">
                                        <input name="file" type="file" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <input type="hidden" id="urlfotoregistro" name="urlfotoregistro">
                                <button type="button" id="subirfotoUser" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Nombre"><i class="ti-upload"></i> Subir archivos</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cerrar</button>

                    <button type="submit" class="btn btn-success waves-effect waves-light"><i class="ti-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>