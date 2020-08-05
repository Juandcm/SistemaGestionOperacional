<?php
$uri = $_SERVER['REQUEST_URI'];

$urlsemifull = env('urlsemifull');

$librerias = '
<script src="' . base_url() . '/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="' . base_url() . '/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="' . base_url() . '/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="' . base_url() . '/dist/js/app.min.js"></script>
<script src="' . base_url() . '/dist/js/app.init.horizontal.js"></script>
<script src="' . base_url() . '/dist/js/waves.js"></script>
<script src="' . base_url() . '/dist/js/custom.min.js"></script>
<script src="' . base_url() . '/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="' . base_url() . '/assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="' . base_url() . '/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="' . base_url() . '/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="' . base_url() . '/dist/js/sidebarmenu.js"></script>
<script src="' . base_url() . '/dist/js/momentjs/moment.min.js"></script>
<script src="' . base_url() . '/dist/js/momentjs/es.js"></script>
<script src="' . base_url() . '/assets/libs/toastr/build/toastr.min.js"></script>
<script src="' . base_url() . '/assets/extra-libs/jquery-sessiontimeout/jquery.sessionTimeout.min.js"></script>
';
switch ($uri) {
    case $urlsemifull:
    $librerias .= '
    <script src="' . base_url() . '/interaccion/funciones.js"></script>
    ';
    break;

    case $urlsemifull.'tablas':
    $librerias .= '
    <!--This page plugins -->
    <script src="' . base_url() . '/assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="' . base_url() . '/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="' . base_url() . '/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="' . base_url() . '/assets/libs/jquery-validation/dist/localization/messages_es.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/dataTables.rowGroup.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/dataTables.fixedColumns.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/dataTables.buttons.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/jszip.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/pdfmake.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/vfs_fonts.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/buttons.html5.min.js"></script>
    <script src="' . base_url() . '/dist/js/bootstrap-responsive/dataTables.responsive.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/jquery.tabledit.min.js"></script>
    <script src="' . base_url() . '/dist/js/jquery.mask.min.js"></script>
    <script src="' . base_url() . '/assets/libs/daterangepicker/daterangepicker.js"></script>
    <script src="' . base_url() . '/assets/libs/echarts/dist/echarts-en.min.js"></script>
    <script src="' . base_url() . '/assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js"></script>
    <script src="' . base_url() . '/interaccion/funciones.js"></script>
    <script src="' . base_url() . '/interaccion/tabla.js"></script>
    <script src="' . base_url() . '/interaccion/log.js"></script>
    ';
    break;

    case $urlsemifull.'usuarios':
    $librerias .= '
    <!--This page plugins -->
    <script src="' . base_url() . '/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="' . base_url() . '/dist/js/bootstrap-responsive/dataTables.responsive.min.js"></script>
    <script src="' . base_url() . '/interaccion/funciones.js"></script>
    <script src="' . base_url() . '/interaccion/usuario.js"></script>
    ';
    break;

    case $urlsemifull.'novedades':
    $librerias .= '
    <!--This page plugins -->
    <script src="' . base_url() . '/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="' . base_url() . '/dist/js/bootstrap-responsive/dataTables.responsive.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/dataTables.buttons.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/jszip.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/pdfmake.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/vfs_fonts.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/buttons.html5.min.js"></script>
    <script src="' . base_url() . '/interaccion/funciones.js"></script>
    <script src="' . base_url() . '/interaccion/novedad.js"></script>
    ';
    break;


    case $urlsemifull.'reportes':
    $librerias .= '
    <script src="' . base_url() . '/assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="' . base_url() . '/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="' . base_url() . '/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="' . base_url() . '/assets/libs/jquery-validation/dist/localization/messages_es.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/dataTables.rowGroup.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/dataTables.fixedColumns.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/dataTables.buttons.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/jszip.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/pdfmake.min.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/vfs_fonts.js"></script>
    <script src="' . base_url() . '/assets/extra-libs/DataTables/buttons.html5.min.js"></script>
    <script src="' . base_url() . '/dist/js/bootstrap-responsive/dataTables.responsive.min.js"></script>
    <script src="' . base_url() . '/assets/libs/daterangepicker/daterangepicker.js"></script>
    <script src="' . base_url() . '/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script src="' . base_url() . '/interaccion/funciones.js"></script>
    <script src="' . base_url() . '/interaccion/tabla.js"></script>
    <script src="' . base_url() . '/interaccion/reporte.js"></script>
    ';
    break;

        // <script src="' . base_url() . '/assets/libs/daterangepicker/daterangepicker.js"></script>
    case $urlsemifull.'graficas':
    $librerias .= '
    <script src="' . base_url() . '/assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="' . base_url() . '/assets/libs/daterangepicker/daterangepicker.js"></script>
    <script src="' . base_url() . '/assets/libs/echarts/dist/echarts-en.min.js"></script>
    <script src="' . base_url() . '/interaccion/funciones.js"></script>
    <script src="' . base_url() . '/interaccion/grafica.js"></script>
    ';
    break;

    default:
    break;
}

echo $librerias;
?>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

</body>
</html>