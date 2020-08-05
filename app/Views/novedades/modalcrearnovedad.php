<!-- Create Modal -->
<div class="modal animated bounceInUp" id="crearNovedadModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/" method="post" id="formCrearNovedad" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="ti-marker-alt m-r-10"></i> Registrar Novedad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="input-group mb-3">
                                <textarea name="novedadDescripcion" id="novedadDescripcion" class="form-control" placeholder="Novedad" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <select class="custom-select form-control required" id="selectPrioridadNovedad" name="selectPrioridadNovedad" aria-invalid="false" required>
                                    <option value="0">Baja</option>
                                    <option value="1">Media</option>
                                    <option value="2">Alta</option>
                                </select>
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