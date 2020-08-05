direccionfull = 'http://localhost/SGO/sistema/public/'

moment.locale('es');

$('body').tooltip({ selector: '[data-toggle="tooltip"]' });

$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

swalWithBootstrapButtons = swal.mixin({
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false
});

lenguaje = {
  'sProcessing': 'Procesando...',
  'sLengthMenu': 'Mostrar _MENU_ registros',
  'sZeroRecords': 'No se encontraron resultados',
  'sEmptyTable': 'Ningún dato disponible en esta tabla',
  'sInfo': 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_',
  'sInfoEmpty': 'Mostrando registros del 0 al 0 de un total de 0 registros',
  'sInfoFiltered': '(filtrado de un total de _MAX_ registros)',
  'sInfoPostFix': '',
  'sSearch': 'Buscar:',
  'sUrl': '',
  'sInfoThousands': ',',
  'sLoadingRecords': 'Cargando...',
  'oPaginate': {
    'sFirst': 'Primero',
    'sLast': 'Último',
    'sNext': 'Siguiente',
    'sPrevious': 'Anterior'
  },
  'oAria': {
    'sSortAscending': ': Activar para ordenar la columna de manera ascendente',
    'sSortDescending': ': Activar para ordenar la columna de manera descendente'
  }
}

// Variable de funciones en el tiempo
iteracciontoastr = 0

var SessionTimeout = function() {
  var i = function() { 
    $.sessionTimeout({ 
      title: "Notificación de cierre de sesión", 
      message: "",
      keepAliveUrl: `${direccionfull}/Usuario/MantenerSession`,
      keepAliveAjaxRequestType: 'POST',
      redirUrl: `${direccionfull}`, 
      logoutUrl: `${direccionfull}/Usuario/logout`, 
          warnAfter: 00000, //Estos son los 0 segundos que cuando pasan se empieza a mostrar el modal y quedarian 20 segundos que es lo que se muestra en el contador hacia atras
          redirAfter: 60000, //Estos son los 60 segundos que pasan para que muestre el modal y elegir una opcion: salir o quedarse
          ignoreUserActivity: !0, 
          countdownMessage: "Saliendo en {timer} segundos.", 
          countdownBar: !0,
          keepAlive: !1,
          logoutButton: 'Salir',
          keepAliveButton: 'Seguir Conectado'
        }) 
  }; 
  return { 
    init: function() { 
      i() 
    } 
  } 
}();

function updatesegundos() {
  usuario_inicio_session = moment($("#usuario_inicio_session").text())
  hora_actual = moment()

  diasdiferencia = hora_actual.diff(usuario_inicio_session,'d')
  horasdiferencia = hora_actual.diff(usuario_inicio_session,'h')
  minutosdiferencia = hora_actual.diff(usuario_inicio_session,'m')
  segundosdiferencia = hora_actual.diff(usuario_inicio_session,'s')

  $("#fechaactual").text(moment().format('dddd DD [de] MMMM [del] Y'))
  $("#horaactual").text(moment().format('hh:mm:ss A'))
  hora = moment().format('hh')
  minutos = moment().format('mm')
  segundo = moment().format('ss')

  if (minutos == '45' && (segundo == '00' || segundo =='30')) {
    toastr.warning('Llenar tablas con datos', '¡Alerta!', { "closeButton": true, "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 30000 }); //150000 = 2,5 Minutos
  }

  if (minutos == '00' && segundo =='00') {
    console.log('hacer registro')
    // Solo se va a poder registrar datos automaticamente el usuario Operador
    if ($("#tipousuarioweb").val() == '0') {
      registrarentablas1_5cadahora()
    }
  }

  // Esto comprobara la session cada 50 minutos y si no se recibe ninguna respuesta despues de los 60minutos o 1hora se cerrara la session 
  if (segundosdiferencia >= '3500') {
    iteracciontoastr++
    if (iteracciontoastr<='1') {
      jQuery(function() { SessionTimeout.init() }); //Esta es la funcion para terminar la session
      // toastr.warning('Se esta terminando el tiempo de la sesión', '¡Alerta!', { "closeButton": true, "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 30000 }); //150000 = 2,5 Minutos
    }
  }
}
setInterval(updatesegundos, 1000); //1000 = 1 Segundo

// Revisar para registrar cada hora
function registrarentablas1_5cadahora(){
  $.post(`${direccionfull}RegistroTabla/RegistrarTodo`, {}, function () { }).done(function (e) {
    data = JSON.parse(e)
    console.log(data)
  }).fail(function (e) {
    console.log(e)
  })
}

Dropzone.autoDiscover = false;
Dropzone.prototype.defaultOptions.dictDefaultMessage = "<div class='drag-icon-cph'><i class='material-icons'>Tocar o Arrastrar</i></div><h5>Para agregar archivo</h5>";
Dropzone.prototype.defaultOptions.dictRemoveFile = "Eliminar archivo";
Dropzone.prototype.defaultOptions.dictFallbackText = "Utilice el siguiente formulario de respaldo para cargar sus archivos como en los viejos tiempos";
Dropzone.prototype.defaultOptions.dictFileTooBig = "El archivo es demasiado grande ({{filesize}}MiB). Tamaño máximo de archivo: {{maxFilesize}}MiB";
Dropzone.prototype.defaultOptions.dictInvalidFileType = "No puede cargar archivos de este tipo";
Dropzone.prototype.defaultOptions.dictResponseError = "El servidor respondió con el código {{statusCode}}";
Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancelar carga";
Dropzone.prototype.defaultOptions.dictUploadCanceled = "Carga cancelada";
Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "¿Está seguro de que desea cancelar esta carga?";
Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "No puede cargar más archivos";

if ($('.image-popup-vertical-fit').length > 0) {
  $('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
  });
}

$("#createmodel").on('hidden.bs.modal', function () {
  $("#formCrearUsuario")[0].reset()
  if ($("#dz-remove").length > 0) {
    $("#dz-remove")[0].click()
    $("#urlfotoregistro").val('')
  }
});

$("#editarusermodal").on('hidden.bs.modal', function () {
  $("#formEditarUsuario")[0].reset()
  if ($("#dz-remove").length > 0) {
    $("#dz-remove")[0].click()
    $("#urlfotoEditar").val('')
  }
});

$("#formtabla6modal").on('hidden.bs.modal', function () {
  $("#formtabla6")[0].reset()
});

$("#crearNovedadModal").on('hidden.bs.modal', function () {
  $("#formCrearNovedad")[0].reset()
});


if ($("#draggable-area").length > 0) {
  dragula([document.getElementById("draggable-area")]),
  dragula([document.getElementById("card-colors")]).on("drag", function (e) {
    e.className = e.className.replace("card-moved", "")
  }).on("drop", function (e) {
    e.className += " card-moved"
  }).on("over", function (e, t) {
    t.className += " card-over"
  }).on("out", function (e, t) {
    t.className = t.className.replace("card-over", "")
  }), dragula([document.getElementById("copy-left"), document.getElementById("copy-right")], {
    copy: !0
  }), dragula([document.getElementById("left-handles"), document.getElementById("right-handles")], {
    moves: function (e, t, n) {
      return n.classList.contains("handle")
    }
  }), dragula([document.getElementById("left-titleHandles"), document.getElementById("right-titleHandles")], {
    moves: function (e, t, n) {
      return n.classList.contains("titleArea")
    }
  })
}

// Aqui muestra el swall alert del tipo success
function alertasweet(valorestado, titulo, valormsg) {
  swal({
    type: valorestado,
    title: titulo,
    text: valormsg,
    showConfirmButton: false,
    timer: 3000
  });
}

function verImagenDetallada(url) {
  $("#modalVerImagen").modal('show')
  $("#verImagenForoUrl").attr('src', url)
}

function recargarPagina(direccion) {
  if (direccion.length > 0) {
    setTimeout(function () {
      window.location.replace(direccion);
    }, 1000);
  } else {
    setTimeout(function () {
      window.location.reload(true);
    }, 1000);
  }
}

function salir() {
  $.ajax({
    url: `${direccionfull}Usuario/logout`,
    type: "GET",
    success: function (data) {
      recargarPagina(direccionfull)
    },
    error: function (error) {
      console.log(error)
    }
  });
}

function myDropzone(idropzone, urlbackend, btnsubir, urlregistro, multipleFile) {
  opciones = null
  if (multipleFile) {
    opciones = {
      url: `${direccionfull}${urlbackend}`,
      files: this,
      method: "post",
      addRemoveLinks: true,
      autoProcessQueue: false,
      uploadMultiple: true,
      maxFilesize: 2, // MB
      parallelUploads: 10,
      acceptedFiles: "image/*",
      init: function (data) {
        $(btnsubir).on('click', function (e) {
          e.preventDefault();
          e.stopPropagation();
          myDropzone.processQueue();
        });
        this.on("success", function (file, xhr) {
          // console.log(file.xhr.response);
          valoranterior = $(urlregistro).val()
          $(urlregistro).val(valoranterior + file.xhr.response)
        });
      }
    }
  } else {
    opciones = {
      url: `${direccionfull}${urlbackend}`,
      files: this,
      method: "post",
      addRemoveLinks: true,
      autoProcessQueue: false,
      uploadMultiple: false,
      maxFiles: 1,
      maxFilesize: 2, // MB
      acceptedFiles: "image/*",
      init: function (data) {
        $(btnsubir).on('click', function (e) {
          e.preventDefault();
          e.stopPropagation();
          myDropzone.processQueue();
        });
        this.on("success", function (file, xhr) {
          // console.log(file.xhr.response);
          $(urlregistro).val(file.xhr.response)
        });
        // this.on("removedfile",function(file){
        //   console.log('removedfile')
        //   console.log(file);
        //   });
      }
    }
  }
  var myDropzone = new Dropzone(idropzone, opciones);
}

function datatableSistema(idtable, urlbackend, otro) {
  if (otro) {
    tablaDataNew = $(`#${idtable}`).DataTable({
      'ajax': `${direccionfull}${urlbackend}`,
      'language': lenguaje,
      'responsive': true,
      dom: 'Bfrtip',
      'orders': []
    });
  } else {
    tablaData = $(`#${idtable}`).DataTable({
      'ajax': `${direccionfull}${urlbackend}`,
      'language': lenguaje,
      'responsive': true,
      dom: 'Bfrtip',
      'orders': []
    });
  }
}

function comprobarnumerosinput() {
  if ($("input[name='equit1area1num1']").length > 0) {
    $("input[name='equit1area1num1']").mask("#.##0", { reverse: true });
    $("input[name='equit1area1num2']").mask("#.##0", { reverse: true });
    $("input[name='equit1area2num1']").mask("#.##0", { reverse: true });
    $("input[name='equit1area2num2']").mask("#.##0", { reverse: true });
    $("input[name='equit1area2num3']").mask("#.##0", { reverse: true });
    $("input[name='equit1area2num4']").mask("#.##0", { reverse: true });
    $("input[name='equit1area2num5']").mask("#.##0", { reverse: true }); //Texto - 1
    $("input[name='equit1area2num6']").mask("#.##0", { reverse: true }); //Texto - 1
    $("input[name='equit1area3num1']").mask("#.##0", { reverse: true }); //Texto - 4
    $("input[name='equit1area3num2']").mask("#.##0", { reverse: true }); //Texto - 4
    $("input[name='equit1area3num3']").mask("#.##0", { reverse: true });
    $("input[name='equit1area3num5']").mask("#.##0", { reverse: true });
  }

  if ($("input[name='equit2area1num1']").length > 0) {
    $("input[name='equit2area1num2']").mask("#.##0", { reverse: true });
    $("input[name='equit2area1num3']").mask("#.##0", { reverse: true });
    $("input[name='equit2area2num1']").mask("#.##0", { reverse: true });
    $("input[name='equit2area2num2']").mask("#.##0", { reverse: true });
    $("input[name='equit2area2num3']").mask("#.##0", { reverse: true });
    $("input[name='equit2area2num4']").mask("#.##0", { reverse: true });
    $("input[name='equit2area2num5']").mask("#.##0", { reverse: true }); //Texto - 1
    $("input[name='equit2area2num6']").mask("#.##0", { reverse: true }); //Texto - 1
    $("input[name='equit2area3num1']").mask("#.##0", { reverse: true });
    $("input[name='equit2area3num2']").mask("#.##0", { reverse: true });
    $("input[name='equit2area3num3']").mask("#.##0", { reverse: true });
    $("input[name='equit2area3num4']").mask("#.##0", { reverse: true });
    $("input[name='equit2area3num5']").mask("#.##0", { reverse: true }); //Texto - 1
    $("input[name='equit2area3num6']").mask("#.##0", { reverse: true }); //Texto - 1
    $("input[name='equit2area4num1']").mask("#.##0", { reverse: true });
    $("input[name='equit2area4num2']").mask("#.##0", { reverse: true });
    $("input[name='equit2area4num3']").mask("#.##0", { reverse: true });
    $("input[name='equit2area4num4']").mask("#.##0", { reverse: true });
    $("input[name='equit2area4num5']").mask("#.##0", { reverse: true }); //Texto - 1
    $("input[name='equit2area4num6']").mask("#.##0", { reverse: true }); //Texto - 1
  }

  if ($("input[name='equit3area1num1']").length > 0) {
    $("input[name='equit3area1num1']").mask("#.##0", { reverse: true });
    $("input[name='equit3area1num2']").mask("#.##0", { reverse: true });
    $("input[name='equit3area1num3']").mask("#.##0", { reverse: true });
    $("input[name='equit3area1num4']").mask("#.##0", { reverse: true });
    $("input[name='equit3area1num5']").mask("#.##0,00", { reverse: true });
    $("input[name='equit3area1num6']").mask("#.##0,00", { reverse: true }); //Salida S1
    $("input[name='equit3area1num7']").mask("#.##0,000000", { reverse: true });
    $("input[name='equit3area2num1']").mask("#.##0", { reverse: true });
    $("input[name='equit3area2num2']").mask("#.##0", { reverse: true });
    $("input[name='equit3area2num3']").mask("#.##0", { reverse: true });
    $("input[name='equit3area2num4']").mask("#.##0", { reverse: true });
    $("input[name='equit3area2num5']").mask("#.##0,00", { reverse: true });
    $("input[name='equit3area2num6']").mask("#.##0,00", { reverse: true }); //Salida S2
    $("input[name='equit3area2num7']").mask("#.##0,000000", { reverse: true });
  }

  if ($("input[name='equit4area1num1']").length > 0) {
    $("input[name='equit4area1num1']").mask("#.##0,00", { reverse: true });
    $("input[name='equit4area1num2']").mask("#.##0,00", { reverse: true }); //Salida S3
    $("input[name='equit4area1num3']").mask("#.##0,00", { reverse: true });
    $("input[name='equit4area1num4']").mask("#.##0,00", { reverse: true }); //Salida S4
    $("input[name='equit4area1num5']").mask("#.##0", { reverse: true }); //Texto - 3
    $("input[name='equit4area1num6']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num7']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num8']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num9']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num10']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num11']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num12']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num13']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num14']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num15']").mask("#.##0", { reverse: true });
    $("input[name='equit4area1num16']").mask("#.##0,00", { reverse: true });
    $("input[name='equit4area1num17']").mask("#.##0,00", { reverse: true }); //Salida S5
    $("input[name='equit4area1num18']").mask("#.##0,00", { reverse: true });
    $("input[name='equit4area2num1']").mask("#.##0", { reverse: true });
    $("input[name='equit4area2num2']").mask("#.##0", { reverse: true });
    $("input[name='equit4area2num3']").mask("#.##0", { reverse: true });
  }

  if ($("input[name='equit5area1num1']").length > 0) {
    $("input[name='equit5area1num1']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area1num2']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area1num3']").mask("#.##0", { reverse: true });
    $("input[name='equit5area1num4']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area2num1']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area2num2']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area2num3']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area2num4']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area2num5']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area3num1']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area3num2']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area3num3']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area3num4']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area3num5']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area4num1']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area4num2']").mask("#.##0,00", { reverse: true });
    $("input[name='equit5area4num3']").mask("#.##0,00", { reverse: true }); //Salida S6
  }
}

function masknumerosdatatables(numerotabla) {
  switch (numerotabla) {
    case '1':
    $("input[name='13'],input[name='14'],input[name='15'],input[name='16'],input[name='17'],input[name='18'],input[name='19'],input[name='20']").mask("#.##0", { reverse: true });
    $("input[name='21'],input[name='22'],input[name='23'],input[name='24'],input[name='00'],input[name='01'],input[name='02'],input[name='03']").mask("#.##0", { reverse: true });
    $("input[name='04'],input[name='05'],input[name='06'],input[name='07'],input[name='08'],input[name='09'],input[name='10'],input[name='11']").mask("#.##0", { reverse: true });
    $("input[name='12']").mask("#.##0", { reverse: true });
    break
    case '2':
    $("input[name='13'],input[name='14'],input[name='15'],input[name='16'],input[name='17'],input[name='18'],input[name='19'],input[name='20']").mask("#.##0", { reverse: true });
    $("input[name='21'],input[name='22'],input[name='23'],input[name='24'],input[name='00'],input[name='01'],input[name='02'],input[name='03']").mask("#.##0", { reverse: true });
    $("input[name='04'],input[name='05'],input[name='06'],input[name='07'],input[name='08'],input[name='09'],input[name='10'],input[name='11']").mask("#.##0", { reverse: true });
    $("input[name='12']").mask("#.##0", { reverse: true });
    break;
    case '3':
    $("input[name='13'],input[name='14'],input[name='15'],input[name='16'],input[name='17'],input[name='18'],input[name='19'],input[name='20']").mask("#.##0,000000", { reverse: true });
    $("input[name='21'],input[name='22'],input[name='23'],input[name='24'],input[name='00'],input[name='01'],input[name='02'],input[name='03']").mask("#.##0,000000", { reverse: true });
    $("input[name='04'],input[name='05'],input[name='06'],input[name='07'],input[name='08'],input[name='09'],input[name='10'],input[name='11']").mask("#.##0,000000", { reverse: true });
    $("input[name='12']").mask("#.##0,000000", { reverse: true });
    break;
    case '4':
    $("input[name='13'],input[name='14'],input[name='15'],input[name='16'],input[name='17'],input[name='18'],input[name='19'],input[name='20']").mask("#.##0,00", { reverse: true });
    $("input[name='21'],input[name='22'],input[name='23'],input[name='24'],input[name='00'],input[name='01'],input[name='02'],input[name='03']").mask("#.##0,00", { reverse: true });
    $("input[name='04'],input[name='05'],input[name='06'],input[name='07'],input[name='08'],input[name='09'],input[name='10'],input[name='11']").mask("#.##0,00", { reverse: true });
    $("input[name='12']").mask("#.##0,00", { reverse: true });
    break;
    case '5':
    $("input[name='13'],input[name='14'],input[name='15'],input[name='16'],input[name='17'],input[name='18'],input[name='19'],input[name='20']").mask("#.##0,00", { reverse: true });
    $("input[name='21'],input[name='22'],input[name='23'],input[name='24'],input[name='00'],input[name='01'],input[name='02'],input[name='03']").mask("#.##0,00", { reverse: true });
    $("input[name='04'],input[name='05'],input[name='06'],input[name='07'],input[name='08'],input[name='09'],input[name='10'],input[name='11']").mask("#.##0,00", { reverse: true });
    $("input[name='12']").mask("#.##0,00", { reverse: true });
    break;
    default:
    break;
  }
}

function mostrarocultartablas(tabla, tipoaccion) {
  if (tipoaccion == 'ocultar') {
    switch (tabla) {
      case '#tabla-1-datatable':
      $(`.cargando`).removeClass('d-none')
        $(`#tabla-responsive-1`).addClass('d-none') //Div principal del datatable
        break;
        case '#tabla-2-datatable':
        $(`.cargando`).removeClass('d-none')
        $(`#tabla-responsive-2`).addClass('d-none') //Div principal del datatable
        break;
        case '#tabla-3-datatable':
        $(`.cargando`).removeClass('d-none')
        $(`#tabla-responsive-3`).addClass('d-none') //Div principal del datatable
        break;
        case '#tabla-4-datatable':
        $(`.cargando`).removeClass('d-none')
        $(`#tabla-responsive-4`).addClass('d-none') //Div principal del datatable
        break;
        case '#tabla-5-datatable':
        $(`.cargando`).removeClass('d-none')
        $(`#tabla-responsive-5`).addClass('d-none') //Div principal del datatable
        break;
        default:
        break;
      }
    } else {
      switch (tabla) {
        case '#tabla-1-datatable':
        $(`.cargando`).addClass('d-none')
        $(`#tabla-responsive-1`).removeClass('d-none') //Div principal del datatable
        break;
        case '#tabla-2-datatable':
        $(`.cargando`).addClass('d-none')
        $(`#tabla-responsive-2`).removeClass('d-none') //Div principal del datatable
        break;
        case '#tabla-3-datatable':
        $(`.cargando`).addClass('d-none')
        $(`#tabla-responsive-3`).removeClass('d-none') //Div principal del datatable
        break;
        case '#tabla-4-datatable':
        $(`.cargando`).addClass('d-none')
        $(`#tabla-responsive-4`).removeClass('d-none') //Div principal del datatable
        break;
        case '#tabla-5-datatable':
        $(`.cargando`).addClass('d-none')
        $(`#tabla-responsive-5`).removeClass('d-none') //Div principal del datatable
        break;
        default:
        break;
      }
    }
  }


  if ($("input[name='equit6area1num1']").length > 0) {
    $("input[name='equit6area1num1']").mask("#.##0,000000", { reverse: true });
    $("input[name='equit6area1num2']").mask("#.##0,000000", { reverse: true });
    $("input[name='equit6area1num3']").mask("#.##0,000000", { reverse: true });
    $("input[name='equit6area1num5']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num6']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num7']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num8']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num9']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num10']").mask("#.##0,00", { reverse: true });
  }

  if ($("input[name='equit6area1num1editar']").length > 0) {
    $("input[name='equit6area1num1editar']").mask("#.##0,000000", { reverse: true });
    $("input[name='equit6area1num2editar']").mask("#.##0,000000", { reverse: true });
    $("input[name='equit6area1num3editar']").mask("#.##0,000000", { reverse: true });
    $("input[name='equit6area1num5editar']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num6editar']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num7editar']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num8editar']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num9editar']").mask("#.##0,00", { reverse: true });
    $("input[name='equit6area1num10editar']").mask("#.##0,00", { reverse: true });
  }

  function llenardatostabla6paraeditar(datostabla6) {
    $("#tabla6_area1_id").val(datostabla6.tabla6_area1_id)
    $("#equit6area1num1editar").val(datostabla6.equipo1_tab6_area_1)
    $("#equit6area1num2editar").val(datostabla6.equipo2_tab6_area_1)
    $("#equit6area1num3editar").val(datostabla6.equipo3_tab6_area_1)
    $("#equit6area1num5editar").val(datostabla6.equipo5_tab6_area_1)
    $("#equit6area1num6editar").val(datostabla6.equipo6_tab6_area_1)
    $("#equit6area1num7editar").val(datostabla6.equipo7_tab6_area_1)
    $("#equit6area1num8editar").val(datostabla6.equipo8_tab6_area_1)
    $("#equit6area1num9editar").val(datostabla6.equipo9_tab6_area_1)
    $("#equit6area1num10editar").val(datostabla6.equipo10_tab6_area_1)
  }


  function agregaroptionequiposarea(numerotabla,areanumero) {
    $(`#equipoareatabla${numerotabla}`).html('')
    htmlequipotion = ''

    switch (numerotabla) {
      case '1':
      switch (areanumero) {
        case '1':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option>
        `
        break;
        case '2':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option><option value="6">Equipo 6</option>
        `
        break;
        case '3':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option><option value="6">Equipo 6</option>
        `
        break;
        default:
        break;
      }
      break;
      case '2':
      switch (areanumero) {
        case '1':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option>
        `
        break;
        case '2':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option><option value="6">Equipo 6</option>
        `
        break;
        case '3':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option><option value="6">Equipo 6</option>
        `
        break;
        case '4':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option><option value="6">Equipo 6</option>
        `
        break;
        default:
        break;
      }
      break;
      case '3':
      switch (areanumero) {
        case '1':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option><option value="7">Equipo 7</option>
        `
        break;
        case '2':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option><option value="7">Equipo 7</option>
        `
        break;
        default:
        break;
      }
      break;
      case '4':
      switch (areanumero) {
        case '1':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="3">Equipo 3</option><option value="5">Equipo 5</option><option value="6">Equipo 6</option><option value="7">Equipo 7</option><option value="8">Equipo 8</option><option value="9">Equipo 9</option><option value="10">Equipo 10</option><option value="11">Equipo 11</option><option value="12">Equipo 12</option><option value="12">Equipo 12</option><option value="13">Equipo 13</option><option value="14">Equipo 14</option><option value="15">Equipo 15</option><option value="16">Equipo 16</option><option value="18">Equipo 18</option>
        `
        break;
        case '2':
        htmlequipotion = `<option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option>`
        break;
        default:
        break;
      }
      break;
      case '5':
      switch (areanumero) {
        case '1':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option> `
        break;
        case '2':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option> `
        break;
        case '3':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option><option value="3">Equipo 3</option><option value="4">Equipo 4</option><option value="5">Equipo 5</option> `
        break;
        case '4':
        htmlequipotion = `
        <option value="1">Equipo 1</option><option value="2">Equipo 2</option>
        `
        break;
        default:
        break;
      }
      break;
      default:
      break;
    }
    $(`#equipoareatabla${numerotabla}`).html(htmlequipotion)
  }


  //////////////////////////////////////////////
  ///////Usuario
  //////////////////////////////////////////////
  if ($("#my-dropzone-editar").length > 0) {
    myDropzone("#my-dropzone-editar", "Usuario/uploadImage", "#subirfotoUserEditar", "#urlfotoEditar", false)
  }

  function editarusuariodatatable(id, cedula, name, apellido, phone, fechanac, direccion, email, photo, indicadorred, clavered, type, tipodeaccion, usuario_tiposession) {
    $("#tipodeaccion").val(tipodeaccion)
    $("#editarusermodal").modal('show')
    $("#iduserEditar").val(id)
    $("#nameEditar").val(name)
    $("#apellidoEditar").val(apellido)
    $("#cedulaEditar").val(cedula)
    $("#emailEditar").val(email)
    $("#phoneEditar").val(phone)
    $("#direccionEditar").val(direccion)
    $("#indicadorderedEditar").val(indicadorred)
    $("#fechanacimientoEditar").val(fechanac)
    $("#urlfotoEditar").val(photo)
  }

  $("#formEditarUsuario").on('submit', function (e) {
    e.preventDefault();
    form = $("#formEditarUsuario").serialize()

    swalWithBootstrapButtons({
      title: '¿Quieres editar el usuario?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, deseo hacerlo',
      cancelButtonText: 'No',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.post(`${direccionfull}Usuario/editarUsuario`, form, function () { }).done(function (e) {
          data = JSON.parse(e)
                // console.log(data)
                if (data.status) {
                  $("#usuario_inicio_session").text(data.usuario_inicio_session)
                  if ($("#tipodeaccion").val() == 1) {
                    recargarPagina('')
                  } else {
                    tablaData.ajax.reload(null, false);
                  }
                  alertasweet('success', 'Exito', 'Se edito correctamente el usuario')
                  $("#editarusermodal").modal('hide')
                }else{
                  alertasweet('error', 'Error', 'No se edito el usuario')
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
  })
