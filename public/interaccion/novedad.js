function datatableNovedades() {
    datatablenovedadesvar = $(`#novedadesDatatable`).DataTable({
        'ajax': `${direccionfull}Novedad/mostrarTodasNovedades`,
        'language': lenguaje,
        'responsive': true,
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'pdfHtml5', title: `Reporte de las Novedades`, footer: true,
            download: 'open', orientation: 'landscape', pageSize: 'LEGAL',
            text: 'Reporte PDF', className: 'btn btn-success waves-effect waves-light',
            exportOptions: {
                columns: [0,1, 2, 3],
                orthogonal: 'export',
            },
        },
        ],
        'orders': []
    });
}
if ($(`#novedadesDatatable`).length>0) {
    datatableNovedades()
}

$("#formCrearNovedad").on('submit', function (e) {
    e.preventDefault();
    form = $("#formCrearNovedad").serialize()
    $.post(`${direccionfull}Novedad/registrarNovedad`, form, function () { }).done(function (e) {
        datos = JSON.parse(e)
        console.log(datos)
        if (datos.status) {
            alertasweet('success', 'Exito', 'Se guardaron los datos')
            $("#crearNovedadModal").modal('hide')
            datatablenovedadesvar.ajax.reload(null, false);
        }else{
            alertasweet('error', 'Error', 'No se guardaron los datos')
        }
        // tablaData.ajax.reload(null, false);
    }).fail(function (e) {
        alertasweet('error', 'Error', 'No se guardo el usuario')
        console.log(e)
    })
})

function detallesNovedad(id, descripcion, prioridad, fecharegistro){
    $("#fecharegistroNovedaddetalles").html('')
    $.post(`${direccionfull}Novedad/verDetallesNovedad`, {idlog:id}, function () { }).done(function (e) {
        datos = JSON.parse(e)
        if (datos.status) {
            datos.data.map((item,index)=>{
                switch (item.log_tipo) {
                    case 'registro':
                    msgtipo = `<p class="text-justify">Se registro el ${item.log_fecha} Por el Usuario: ${item.usuario_nombre} ${item.usuario_apellido} de Cedula: ${item.usuario_cedula}</p>`;
                    break;
                    case 'editado':
                    msgtipo = `<p class="text-justify">Se edito el ${item.log_fecha} Por el Usuario: ${item.usuario_nombre} ${item.usuario_apellido} de Cedula: ${item.usuario_cedula}</p>`;
                    break;
                    default:
                    break;
                }
                $("#fecharegistroNovedaddetalles").append(msgtipo)
            })
        }
    }).fail(function (e) {
        alertasweet('error', 'Error', 'No se guardo el usuario')
        console.log(e)
    })

    novedad_prioridad=""
    $("#detallesNovedadModal").modal('show') 
    $("#novedadDescripciondetalles").html(descripcion)
    switch (prioridad) {
        case '0':
        novedad_prioridad = '<div class="label label-success text-center">Prioridad Baja</div>';
        break;
        case '1':
        novedad_prioridad = '<div class="label label-warning text-center">Prioridad Media</div>';
        break;
        case '2':
        novedad_prioridad = '<div class="label label-danger text-center">Prioridad Alta</div>';
        break;
        default:
        break;
    }
    $("#selectPrioridadNovedaddetalles").html(novedad_prioridad)
}

function editarNovedad(id, descripcion, prioridad){
    $("#editarNovedadModal").modal('show') 
    $("#idnovedadEditar").val(id) 
    $("#novedadDescripcionEditar").val(descripcion) 
    $("#selectPrioridadNovedadEditar").val(prioridad) 
}

$("#formEditarNovedad").on('submit', function (e) {
    e.preventDefault();
    form = $("#formEditarNovedad").serialize()
    $.post(`${direccionfull}Novedad/editarNovedad`, form, function () { }).done(function (e) {
        datos = JSON.parse(e)
        console.log(datos)
        if (datos.status) {
            alertasweet('success', 'Exito', 'Se editaron los datos')
            $("#editarNovedadModal").modal('hide')
            datatablenovedadesvar.ajax.reload(null, false);
        }else{
            alertasweet('error', 'Error', 'No se editaron los datos')
        }
    }).fail(function (e) {
        alertasweet('error', 'Error', 'No se guardo el usuario')
        console.log(e)
    })
})