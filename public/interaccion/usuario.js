if ($("#usersDatatable").length > 0) {
    datatableSistema("usersDatatable", "Usuario/mostrarTodosUsuario", false)
}

if ($("#my-dropzone").length > 0) {
    myDropzone("#my-dropzone", "Usuario/uploadImage", "#subirfotoUser", "#urlfotoregistro", false)
}



function bilitarusuario(id, tipo) {
    if (tipo == '1') {
        valor = 'habilitar'
        valorfinal = 'habilito'
    } else {
        valor = 'deshabilitar'
        valorfinal = 'deshabilito'
    }
    swalWithBootstrapButtons({
        title: `¿Quieres ${valor} el usuario?`,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, deseo hacerlo',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.post(`${direccionfull}Usuario/bilitarUsuario`, { id: id, tipo: tipo }, function () { }).done(function (e) {
                tablaData.ajax.reload(null, false);
                if (tipo == '0') {
                    alertasweet('success', 'Exito', 'Se desabilito correctamente el usuario')
                } else {
                    alertasweet('success', 'Exito', 'Se habilito correctamente el usuario')
                }
            }).fail(function (e) {
                alertasweet('error', 'Error', 'No se edito el usuario')
                console.log(e)
            })

        } else if (result.dismiss === swal.DismissReason.cancel) {
            alertasweet('error', 'Error', 'No se edito el usuario')
            $("#editarusermodal").modal('hide')
        }
    });
}

// Formularios
$("#formCrearUsuario").on('submit', function (e) {
    e.preventDefault();
    form = $("#formCrearUsuario").serialize()
    $.post(`${direccionfull}Usuario/registrarUsuario`, form, function () { }).done(function (e) {
        tablaData.ajax.reload(null, false);
        alertasweet('success', 'Exito', 'Se guardo el usuario')
        $("#createmodel").modal('hide')
    }).fail(function (e) {
        alertasweet('error', 'Error', 'No se guardo el usuario')
        console.log(e)
    })
})