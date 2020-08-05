function regresarbotonesdatatables() {
  $("#datatablestablas").addClass('flipOutY animated')
  arraytabla = [$(".numerodatatabla-1").text(), $(".numerodatatabla-2").text(),
  $(".numerodatatabla-3").text(), $(".numerodatatabla-4").text(),
  $(".numerodatatabla-5").text(), $(".numerodatatabla-6").text(),
  $(".numerodatatabla-7").text(), $(".numerodatatabla-8").text(),
  $(".numerodatatabla-9").text(), $(".numerodatatabla-10").text(),
  $(".numerodatatabla-11").text(), $(".numerodatatabla-12").text(),
  $(".numerodatatabla-13").text()];
  const result = arraytabla.filter(item => item.length >= 1);

  setTimeout(function () {
    $(`.numerodatatabla-${result[0]}`).text('')
    $("#datatablestablas").addClass('d-none').removeClass('flipOutY animated')
    $(`#datatables-tabla-${result[0]}`).addClass('d-none')
    $("#botonestablas").removeClass('d-none').addClass('flipInY animated')
    $(`#tabla-responsive-${result[0]}`).addClass('d-none')
  }, 450)
}

function verlogstabla(numerotabla){
  $("#botonestablas").addClass('flipOutY animated')
  setTimeout(function () {
    $("#botonestablas").addClass('d-none').removeClass('flipOutY animated')
    $(`#logs-tabla-${numerotabla}`).removeClass('d-none').addClass('flipInY animated')
    $(`#logstablas`).removeClass('d-none')
    asignarmaterialpicker(numerotabla)
    selectareatabla(numerotabla)
    moment.locale('es');
  }, 450)
}


function asignarmaterialpicker(numerotabla){

  if (numerotabla == 6) {
    $.post(`${direccionfull}Tabla${numerotabla}/mostrarfechascargadas`, {}, function () { }).done(function (e) {
      data = JSON.parse(e)
      console.log(data)
      $(`#fechainiciallogtabla6`).bootstrapMaterialDatePicker(
      { 
        weekStart: 0, 
        time: false,
        minDate: `${data[0].minimafecha}`,
        maxDate: `${data[0].maximafecha}`,
        cancelText:'Cancelar',
        okText:'Aceptar',
        lang: 'es',
        currentDate: moment().format('Y-MM-DD'),
      });
      $(`#fechafinallogtabla6`).bootstrapMaterialDatePicker(
      { 
        weekStart: 0, 
        time: false,
        minDate: `${data[0].minimafecha}`,
        maxDate: `${data[0].maximafecha}`,
        cancelText:'Cancelar',
        okText:'Aceptar',
        lang: 'es',
        currentDate: moment().format('Y-MM-DD'),
      });
    }).fail(function (e) {
      console.log(e)
    })

  }else{


    $(`#fechalogtabla${numerotabla}`).bootstrapMaterialDatePicker(
    { 
      weekStart: 0, 
      time: false,
      cancelText:'Cancelar',
      okText:'Aceptar',
      lang: 'es',
      maxDate: moment().format('Y-MM-DD'),
      currentDate: moment().format('Y-MM-DD'),
    });

    $(`#tiempologtabla${numerotabla}`).bootstrapMaterialDatePicker(
    { 
      format: 'HH:mm', 
      time: true, 
      date: false,
      shortTime:true,
      cancelText:'Cancelar',
      okText:'Aceptar',
      currentDate: moment().format('HH:00 A'),
    });
  }
}


function selectareatabla(numerotabla) {
  $(`#areatabla${numerotabla}`).on('change', function(e) {
    areanumero = $(this).val()
    $(`#equipoareatabla${numerotabla}`).removeAttr('disabled')
    agregaroptionequiposarea(numerotabla,areanumero)
  })
}

function regresarbotoneslogstables(numerotabla){
  $(`#logs-tabla-${numerotabla}`).addClass('flipOutY animated')
  setTimeout(function () {
    $(`#logs-tabla-${numerotabla}`).addClass('d-none').removeClass('flipOutY animated')
    $("#botonestablas").removeClass('d-none').addClass('flipInY animated')
    $(`#logstablas`).addClass('d-none')
    $(`#formlogtabla${numerotabla}`)[0].reset()
    $(`#equipoareatabla${numerotabla}`).attr('disabled',true)
    $(`#mostrarlogstabla${numerotabla}`).addClass('d-none')

  }, 450)
}


function regresarbotonestablas() {
  $("#formtablas").addClass('flipOutY animated')
  arraytabla = [$(".numerotabla-1").text(), $(".numerotabla-2").text(),
  $(".numerotabla-3").text(), $(".numerotabla-4").text(),
  $(".numerotabla-5").text(), $(".numerotabla-6").text(),
  $(".numerotabla-7").text(), $(".numerotabla-8").text(),
  $(".numerotabla-9").text(), $(".numerotabla-10").text(),
  $(".numerotabla-11").text(), $(".numerotabla-12").text(),
  $(".numerotabla-13").text()];
  const result = arraytabla.filter(item => item.length >= 1);
  setTimeout(function () {
    $(`.numerotabla-${result[0]}`).text('')
    $("#formtablas").addClass('d-none').removeClass('flipOutY animated')
    $(`#tabla-${result[0]}`).addClass('d-none')
    $("#botonestablas").removeClass('d-none').addClass('flipInY animated')
    if (result[0] == '10' || result[0] == '6') {
      $("#formtabla6editar")[0].reset()
      $("#fechatabla6").val('')
      $("#tabla6principal").addClass('d-none')
    } else {
      $(`.tab-wizard-${result[0]}`).steps('destroy')
      $(`#formtabla${result[0]}`)[0].reset()
      $(`#formtabla${result[0]}`).find(".text-danger").remove();
    }
  }, 450)
}


function traerdatostablashorasform(numerotabla){
  dataporhora = []
  $.post(`${direccionfull}Tabla${numerotabla}/MostrarDataPorHora${numerotabla}`, {}, function () { }).done(function (e) {
    dataporhorajax = JSON.parse(e)
    console.log(dataporhorajax)
    datanumeros = dataporhorajax.datanumeros
    insertardatosenformtablas(numerotabla,datanumeros)
  }).fail(function (e) {
    console.log(e)
  })
}


function insertardatosenformtablas(numerotabla,datanumeros) {
  console.log(numerotabla)
  console.log(datanumeros)

  switch (numerotabla) {
    case '1':
    $("#equit1area1num1").val(datanumeros.equipo1_tab1_area_1)
    $("#equit1area1num2").val(datanumeros.equipo2_tab1_area_1)
    $("#equit1area2num1").val(datanumeros.equipo1_tab1_area_2)
    $("#equit1area2num2").val(datanumeros.equipo2_tab1_area_2)
    $("#equit1area2num2").val(datanumeros.equipo2_tab1_area_2)
    $("#equit1area2num3").val(datanumeros.equipo3_tab1_area_2)
    $("#equit1area2num4").val(datanumeros.equipo4_tab1_area_2)
    $("#equit1area2num5").val(datanumeros.equipo5_tab1_area_2)
    $("#equit1area2num6").val(datanumeros.equipo6_tab1_area_2)
    $("#equit1area3num1").val(datanumeros.equipo1_tab1_area_3)
    $("#equit1area3num2").val(datanumeros.equipo2_tab1_area_3)
    $("#equit1area3num3").val(datanumeros.equipo3_tab1_area_3)
    $("#equit1area3num4").val(datanumeros.equipo4_tab1_area_3)
    $("#equit1area3num5").val(datanumeros.equipo5_tab1_area_3)
    break;

    case '2':
    $("#equit2area1num1").val(datanumeros.equipo1_tab2_area_1)
    $("#equit2area1num2").val(datanumeros.equipo2_tab2_area_1)
    $("#equit2area1num3").val(datanumeros.equipo3_tab2_area_1)
    $("#equit2area2num1").val(datanumeros.equipo1_tab2_area_2)
    $("#equit2area2num2").val(datanumeros.equipo2_tab2_area_2)
    $("#equit2area2num3").val(datanumeros.equipo3_tab2_area_2)
    $("#equit2area2num4").val(datanumeros.equipo4_tab2_area_2)
    $("#equit2area2num5").val(datanumeros.equipo5_tab2_area_2)
    $("#equit2area2num6").val(datanumeros.equipo6_tab2_area_2)
    $("#equit2area3num1").val(datanumeros.equipo1_tab2_area_3)
    $("#equit2area3num2").val(datanumeros.equipo2_tab2_area_3)
    $("#equit2area3num3").val(datanumeros.equipo3_tab2_area_3)
    $("#equit2area3num4").val(datanumeros.equipo4_tab2_area_3)
    $("#equit2area3num5").val(datanumeros.equipo5_tab2_area_3)
    $("#equit2area3num6").val(datanumeros.equipo6_tab2_area_3)
    $("#equit2area4num1").val(datanumeros.equipo1_tab2_area_4)
    $("#equit2area4num2").val(datanumeros.equipo2_tab2_area_4)
    $("#equit2area4num3").val(datanumeros.equipo3_tab2_area_4)
    $("#equit2area4num4").val(datanumeros.equipo4_tab2_area_4)
    $("#equit2area4num5").val(datanumeros.equipo5_tab2_area_4)
    $("#equit2area4num6").val(datanumeros.equipo6_tab2_area_4)
    break;

    case '3':
    $("#equit3area1num1").val(datanumeros.equipo1_tab3_area_1)
    $("#equit3area1num2").val(datanumeros.equipo2_tab3_area_1)
    $("#equit3area1num3").val(datanumeros.equipo3_tab3_area_1)
    $("#equit3area1num4").val(datanumeros.equipo4_tab3_area_1)
    $("#equit3area1num5").val(datanumeros.equipo5_tab3_area_1)
    $("#equit3area1num7").val(datanumeros.equipo7_tab3_area_1)
    $("#equit3area2num1").val(datanumeros.equipo1_tab3_area_2)
    $("#equit3area2num2").val(datanumeros.equipo2_tab3_area_2)
    $("#equit3area2num3").val(datanumeros.equipo3_tab3_area_2)
    $("#equit3area2num4").val(datanumeros.equipo4_tab3_area_2)
    $("#equit3area2num5").val(datanumeros.equipo5_tab3_area_2)
    $("#equit3area2num7").val(datanumeros.equipo7_tab3_area_2)
    break;

    case '4':
    $("#equit4area1num1").val(datanumeros.equipo1_tab4_area_1)
    $("#equit4area1num3").val(datanumeros.equipo3_tab4_area_1)
    $("#equit4area1num5").val(datanumeros.equipo5_tab4_area_1)
    $("#equit4area1num6").val(datanumeros.equipo6_tab4_area_1)
    $("#equit4area1num7").val(datanumeros.equipo7_tab4_area_1)
    $("#equit4area1num8").val(datanumeros.equipo8_tab4_area_1)
    $("#equit4area1num9").val(datanumeros.equipo9_tab4_area_1)
    $("#equit4area1num10").val(datanumeros.equipo10_tab4_area_1)
    $("#equit4area1num11").val(datanumeros.equipo11_tab4_area_1)
    $("#equit4area1num12").val(datanumeros.equipo12_tab4_area_1)
    $("#equit4area1num13").val(datanumeros.equipo13_tab4_area_1)
    $("#equit4area1num14").val(datanumeros.equipo14_tab4_area_1)
    $("#equit4area1num15").val(datanumeros.equipo15_tab4_area_1)
    $("#equit4area1num16").val(datanumeros.equipo16_tab4_area_1)
    $("#equit4area1num18").val(datanumeros.equipo18_tab4_area_1)
    $("#equit4area2num1").val(datanumeros.equipo1_tab4_area_2)
    $("#equit4area2num2").val(datanumeros.equipo2_tab4_area_2)
    $("#equit4area2num3").val(datanumeros.equipo3_tab4_area_2)
    break;

    case '5':
    $("#equit5area1num1").val(datanumeros.equipo1_tab5_area_1)
    $("#equit5area1num2").val(datanumeros.equipo2_tab5_area_1)
    $("#equit5area1num3").val(datanumeros.equipo3_tab5_area_1)
    $("#equit5area1num4").val(datanumeros.equipo4_tab5_area_1)
    $("#equit5area2num1").val(datanumeros.equipo1_tab5_area_2)
    $("#equit5area2num2").val(datanumeros.equipo2_tab5_area_2)
    $("#equit5area2num3").val(datanumeros.equipo3_tab5_area_2)
    $("#equit5area2num4").val(datanumeros.equipo4_tab5_area_2)
    $("#equit5area2num5").val(datanumeros.equipo5_tab5_area_2)
    $("#equit5area3num1").val(datanumeros.equipo1_tab5_area_3)
    $("#equit5area3num2").val(datanumeros.equipo2_tab5_area_3)
    $("#equit5area3num3").val(datanumeros.equipo3_tab5_area_3)
    $("#equit5area3num4").val(datanumeros.equipo4_tab5_area_3)
    $("#equit5area3num5").val(datanumeros.equipo5_tab5_area_3)
    $("#equit5area4num1").val(datanumeros.equipo1_tab5_area_4)
    $("#equit5area4num2").val(datanumeros.equipo2_tab5_area_4)
    break;

    default:
    break;
  }
}

function llenartabla(numerotabla) {
  $("#botonestablas").addClass('flipOutY animated')
  setTimeout(function () {
    $(`.numerotabla-${numerotabla}`).text(numerotabla)
    $("#botonestablas").addClass('d-none').removeClass('flipOutY animated')
    $("#formtablas").removeClass('d-none').addClass('flipInY animated')
    $(`#tabla-${numerotabla}`).removeClass('d-none')
  }, 450)
  //Abriendo formulario por pasos
  if (numerotabla == '6') {
    verfechastablas('6')
  } else {
    traerdatostablashorasform(numerotabla)
    formularioporpasos(`.tab-wizard-${numerotabla}`, `#formtabla${numerotabla}`, numerotabla)
  }
}



function verfechastablas(numerotabla) {
  $.post(`${direccionfull}Tabla${numerotabla}/mostrarfechascargadas`, {}, function () { }).done(function (e) {
    data = JSON.parse(e)
    asignardatepickerange(numerotabla, data[0])
  }).fail(function (e) {
    console.log(e)
  })
}

function verdatatablas(numerotabla) {
  $("#botonestablas").addClass('flipOutY animated')
  setTimeout(function () {
    $(`.numerodatatabla-${numerotabla}`).text(numerotabla)
    $("#botonestablas").addClass('d-none').removeClass('flipOutY animated')
    $("#datatablestablas").removeClass('d-none').addClass('flipInY animated')
    $(`#datatables-tabla-${numerotabla}`).removeClass('d-none')
    $(`#tabla-responsive-${numerotabla}`).addClass('d-none')
  }, 450)
  verfechastablas(numerotabla)
}


/////////////////////////////////
//Tabla de los calculos
////////////////////////////////
function abrirdatatablacalculos() {
  fechaactual = moment().format('DD-MM-YYYY')
  tipouser = $("#tipousuarioweb").val()
  mensajepdf = `Reporte de Fecha: ${fechaactual}`
  tablaDataCalculos = $('#tabla10calculos').DataTable({
    responsive: false,
    "ajax": {
      url: `${direccionfull}Tabla10/mostrarCalculosTabla10`,
      type: "post",
      dataType: "json",
      beforeSend: function () { $(".cuerpo").css('filter', 'blur(2px)') },
      error: function (e) { console.log(e.responseText) },
      complete: function (e) {
        $(".cuerpo").css('filter', 'blur(0px)');
        urlback = `${direccionfull}Tabla10/editarTabla10`
        tabla = '#tabla10calculos'
        hideIdentifier = false
        filaid = [0, 'accion_id']
        valoreseditables = [
        [1, 'lect1_condc1'],
        [2, 'lect2_condc1'],
        [3, 'lect3_condc1'],
        [4, 'lect4_condc1'],
        [5, 'lect1_condc2'],
        [6, 'lect2_condc2'],
        [7, 'lect3_condc2'],
        [8, 'lect4_condc2']
        ]
        switch (tipouser) {
          case '0':
          setTimeout(cargarTablaEditable(tabla, urlback, hideIdentifier, filaid, valoreseditables, '10'), 500)
          break;
          case '2':
          setTimeout(cargarTablaEditable(tabla, urlback, hideIdentifier, filaid, valoreseditables, '10'), 500)
          break;
          default:
          break;
        }
        $("input[name='lect1_condc1']").mask("#.##0,00", { reverse: true });
        $("input[name='lect2_condc1']").mask("#.##0,000000", { reverse: true });
        $("input[name='lect3_condc1']").mask("#.##0,000000", { reverse: true });
        $("input[name='lect4_condc1']").mask("#.##0,000000", { reverse: true });
        $("input[name='lect1_condc2']").mask("#.##0,00", { reverse: true });
        $("input[name='lect2_condc2']").mask("#.##0,000000", { reverse: true });
        $("input[name='lect3_condc2']").mask("#.##0,000000", { reverse: true });
        $("input[name='lect4_condc2']").mask("#.##0,000000", { reverse: true });
      }
    },
    language: lenguaje,
    paging: false, //Paginador
    lengthChange: true,
    searching: false, //Para buscar
    ordering: false, //Para ordenar
    info: false, //Para mostrar cuantos registros tiene el datatable
    dom: 'Bfrtip',
    buttons: [
      // ,download: 'open'
      {
        extend: 'pdfHtml5', title: `Reporte tabla10 ${fechaactual}`, download: 'open', footer: true, orientation: 'landscape', pageSize: 'LEGAL', messageTop: mensajepdf,
        text: 'PDF', className: 'btn btn-success waves-effect waves-light', exportOptions: { orthogonal: 'export' }
      },
      { extend: 'excelHtml5', footer: true, text: 'EXCEL', className: 'btn btn-success waves-effect waves-light', },
      ]
    });
}

function abrirtablacalculos(numerotabla) {
  $("#botonestablas").addClass('flipOutY animated')
  setTimeout(function () {
    $(`.numerotabla-${numerotabla}`).text(numerotabla)
    $("#botonestablas").addClass('d-none').removeClass('flipOutY animated')
    $("#formtablas").removeClass('d-none').addClass('flipInY animated')
    $(`#tabla-${numerotabla}`).removeClass('d-none')
  }, 450)
  tablaDataCalculos.ajax.reload(null, false);
}


function tablasdatatables(numerotabla,mensajepdf) {
  tabla1 = `#tabla-${numerotabla}-datatable`
  urlback1 = `${direccionfull}Tabla${numerotabla}/EditarDatosTabla${numerotabla}`
  hideIdentifier1 = true
  filaid1 = [0, 'Identificador']
  valoreseditables1 = [
  [3, '13'], [4, '14'], [5, '15'], [6, '16'], [7, '17'],
  [8, '18'], [9, '19'], [10, '20'], [11, '21'], [12, '22'],
  [13, '23'], [14, '00'], [15, '01'], [16, '02'], [17, '03'],
  [18, '04'], [19, '05'], [20, '06'], [21, '07'], [22, '08'],
  [23, '09'], [24, '10'], [25, '11'], [26, '12']
  ]
  valor = $(`#fechatabla${numerotabla}`).val()
  tipouser = $("#tipousuarioweb").val()
  datatablefinal = $(`#tabla-${numerotabla}-datatable`).dataTable({
    responsive: false,
    language: lenguaje,
    ajax: {
      url: `${direccionfull}Tabla${numerotabla}/MostrarDatosTabla${numerotabla}`,
      type: "post",
      dataType: "json",
      data: { fechas: valor },
      beforeSend: function () {
        $(`.cargando`).removeClass('d-none')
        $(`#tabla-responsive-${numerotabla}`).addClass('d-none') //Div principal del datatable
      },
      error: function (e) {
        console.log(e.responseText);
      },
      complete: function (e) {
        console.log(e.responseJSON)
        if (e.responseJSON.data.length > 0) {
          $(".cuerpo").css('filter', 'blur(0px)');
          $(`.cargando`).addClass('d-none')
        $(`#tabla-responsive-${numerotabla}`).removeClass('d-none') //Div principal del datatable
        switch (tipouser) {
          case '0':
          setTimeout(cargarTablaEditable(tabla1, urlback1, hideIdentifier1, filaid1, valoreseditables1, numerotabla), 500)
          break;
          case '2':
          setTimeout(cargarTablaEditable(tabla1, urlback1, hideIdentifier1, filaid1, valoreseditables1, numerotabla), 500)
          break;
          default:
          break;
        }
        masknumerosdatatables(numerotabla)
      }else{
        $(`#tabla-responsive-${numerotabla}`).addClass('d-none')
        $(`.cargando`).addClass('d-none')
        // alertasweet('error', 'Error', 'No hay datos para esa Fecha')
      }

    }
  },
  rowGroup: { startRender: function (rows, group) { return `${rows.count()} Equipos en el ${group}`; }, dataSrc: 1 },
    paging: false, //Paginador
    lengthChange: true,
    searching: false, //Para buscar
    ordering: false, //Para ordenar
    info: false, //Para mostrar cuantos registros tiene el datatable
    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'pdfHtml5', title: `Reporte tabla ${numerotabla}. Fecha: ${valor}`, footer: true,
      download: 'open', orientation: 'landscape', pageSize: 'LEGAL', messageTop: (mensajepdf!=''?mensajepdf:'Disculpe, hubo un error.\n Por favor vuelve a cargar la misma fecha para que muestre correctamente los usuarios'),
      text: 'Reporte PDF', className: 'btn btn-success waves-effect waves-light',
      exportOptions: {
        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28],
        orthogonal: 'export'
      }
    },
    {
      extend: 'excelHtml5', title: `Reporte tabla ${numerotabla}. Fecha: ${valor}`, footer: true,
      text: 'Reporte EXCEL', className: 'btn btn-success waves-effect waves-light',
      exportOptions: {
        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28],
        orthogonal: 'export'
      }
    },
    ]
  });
}

// Ejecutando tablas
if ($('#tabla10calculos').length>0) {
  abrirdatatablacalculos()
}
// tablaDataCalculos.fnDestroy();
if ($('#tabla-1-datatable').length>0) {
  tablasdatatables('1','')
  datatablefinal.fnDestroy();
}
if ($('#tabla-2-datatable').length>0) {
  tablasdatatables('2','')
  datatablefinal.fnDestroy();
}
if ($('#tabla-3-datatable').length>0) {
  tablasdatatables('3','')
  datatablefinal.fnDestroy();
}


function asignardatepickerange(numerotabla, data) {
  $(`#fechatabla${numerotabla}`).daterangepicker({
    dateLimit: {
      days: 1
    },
    showDropdowns: true,
    minDate: `${data.minimafecha}`,
    maxDate: moment(data.maximafecha).add(1, 'day').format('YYYY-MM-DD'),
    autoUpdateInput: false,
    alwaysShowCalendars: true,
    buttonClasses: "btn",
    applyClass: "btn-info",
    cancelClass: "btn-danger",
    locale: {
      format: 'YYYY-MM-DD',
      applyLabel: "Aceptar",
      cancelLabel: 'Cancelar',
      startLabel: 'Fecha Inicial',
      endLabel: 'Fecha Final',
      customRangeLabel: 'Seleccionar una fecha',
      daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octucbre', 'Noviembre', 'Diciembre'],
      yesterday: 'Ayer',
      firstDay: 1
    }
  }, function (start, end, label) {
    if (numerotabla != '6') {
      $(`.cargando`).removeClass('d-none')
      $(`#tabla-responsive-${numerotabla}`).addClass('d-none')
    }
  });

  $(`#fechatabla${numerotabla}`).on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    valorfecha = picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD')
    if (numerotabla == '6') {
      buscardatostabla6(valorfecha)
    } else if (numerotabla == '7') {
      buscardatostabla7(valorfecha)
    } else if (numerotabla == '8') {
      buscardatostabla8(valorfecha)
    }else {
      $(".textousuariostabla").html('')
      $.post(`${direccionfull}Tabla${numerotabla}/buscarUsuariosTablaFechas${numerotabla}`, {fechas:valorfecha}, function () { }).done(function (e) {
        data = JSON.parse(e)
        console.log(data)
        if (data.status) {
          mensajepdf = ''
          usuariostablas = data.usuarios
          usuariostext = '<h4>Usuarios que registraron o modificaron datos en esta tabla:</h4><br>'
          usuariostextpdf = 'Usuarios que registraron o modificaron datos en esta tabla:\n'

          usuariostablas.map((item,index)=>{
            usuariostext += `Nombre: ${item.usuario_nombre} ${item.usuario_apellido}. C.I: ${item.usuario_cedula}<br>`
            usuariostextpdf += `Nombre: ${item.usuario_nombre} ${item.usuario_apellido}. C.I: ${item.usuario_cedula}\n`
          })
          $(".textousuariostabla").html(usuariostext)
          mensajepdf = usuariostextpdf
          datatablefinal.fnDestroy();
          tablasdatatables(numerotabla,mensajepdf);
        }else{
          datatablefinal.fnDestroy();
          tablasdatatables(numerotabla,'');   
        }
      }).fail(function (e) {
        console.log(e)
      })

    }
  });
}


function asignardatepickerangetabla6(nombretabla) {
  fechademañana = moment().add(1,'days').format('YYYY-MM-DD')
  $(`#${nombretabla}`).daterangepicker({
    dateLimit: {
      days: 1
    },
    showDropdowns: true,
    maxDate: fechademañana,
    autoUpdateInput: false,
    alwaysShowCalendars: true,
    buttonClasses: "btn",
    applyClass: "btn-info",
    cancelClass: "btn-danger",
    locale: {
      format: 'YYYY-MM-DD',
      applyLabel: "Aceptar",
      cancelLabel: 'Cancelar',
      startLabel: 'Fecha Inicial',
      endLabel: 'Fecha Final',
      customRangeLabel: 'Seleccionar una fecha',
      daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octucbre', 'Noviembre', 'Diciembre'],
      yesterday: 'Ayer',
      firstDay: 1
    }
  }, function (start, end, label) { });
  $(`#${nombretabla}`).on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
  });
}

$("#formtabla6").on('submit', function (e) {
  e.preventDefault()
  dataform = $(this).serialize()
  fechasregistro = $("#fechatabla6registro").val()
  // console.log(dataform,fechas)
  if (fechasregistro == '') {
    alertasweet('error', 'Error', 'Debes seleccionar una Fecha')
  } else {
    $.post(`${direccionfull}Tabla6/RegistroTabla6`, dataform, function () { }).done(function (e) {
      data = JSON.parse(e)
      if (data.status) {
        alertasweet('success', 'Exito', 'Se guardaron los datos')
        $("#formtabla6modal").modal('hide')
        verfechastablas('6')
      }
    }).fail(function (e) {
      console.log(e)
    })
  }
})

if ($("#fechatabla6registro").length > 0) {
  asignardatepickerangetabla6('fechatabla6registro')
}

function buscardatostabla6(valorfecha){
  $("#tabla6principal").addClass('d-none')
  $("#cargandotabla6").removeClass('d-none')
  $.post(`${direccionfull}Tabla6/buscardatostabla6`, {fechas:valorfecha}, function () { }).done(function (e) {
    data = JSON.parse(e)
    if(data.status){
      llenardatostabla6paraeditar(data.datostabla6)
      calculosarea2 = data.calculosarea2
      calculosarea3 = data.calculosarea3
      $("#tabla6principal").removeClass('d-none')
      $("#cargandotabla6").addClass('d-none')
      $("#tabla6area2").addClass('d-none')
      $("#tabla6area3").addClass('d-none')
    }else{
      alertasweet('error', 'Error', data.msg)
      $("#cargandotabla6").addClass('d-none')
    }
  }).fail(function (e) {
    console.log(e)
  })
}


$("#selectabla6area2").on('change',function() {
  console.log(this.value)
  console.log(calculosarea2)
  $("#tabla6area2").addClass('d-none')
  $("#cargandocasotabla6area2").removeClass('d-none')

  if(this.value == 'S'){
    $("#E139").text(calculosarea2.datosmostrararea2filae.E139)
    $("#E140").text(calculosarea2.datosmostrararea2filae.E140)
    $("#E141").text(calculosarea2.datosmostrararea2filae.E141)
    $("#E142").text(calculosarea2.datosmostrararea2filae.E142)
    $("#E143").text(calculosarea2.datosmostrararea2filae.E143)
    $("#E144").text(calculosarea2.datosmostrararea2filae.E144)

    $("#F139").text(calculosarea2.datosmostrararea2filaf.F139S)
    $("#F140").text(calculosarea2.datosmostrararea2filaf.F140S)
    $("#F141").text(calculosarea2.datosmostrararea2filaf.F141)
    $("#F142").text(calculosarea2.datosmostrararea2filaf.F142)
    $("#F143").text(calculosarea2.datosmostrararea2filaf.F143)
    $("#F144").text(calculosarea2.datosmostrararea2filaf.F144S)
  }else{
    $("#E139").text(calculosarea2.datosmostrararea2filae.E139)
    $("#E140").text(calculosarea2.datosmostrararea2filae.E140)
    $("#E141").text(calculosarea2.datosmostrararea2filae.E141)
    $("#E142").text(calculosarea2.datosmostrararea2filae.E142)
    $("#E143").text(calculosarea2.datosmostrararea2filae.E143)
    $("#E144").text(calculosarea2.datosmostrararea2filae.E144)
    
    $("#F139").text(calculosarea2.datosmostrararea2filaf.F139N)
    $("#F140").text(calculosarea2.datosmostrararea2filaf.F140N)
    $("#F141").text(calculosarea2.datosmostrararea2filaf.F141)
    $("#F142").text(calculosarea2.datosmostrararea2filaf.F142)
    $("#F143").text(calculosarea2.datosmostrararea2filaf.F143)
    $("#F144").text(calculosarea2.datosmostrararea2filaf.F144N)
  }
  setTimeout(function () {
    $("#cargandocasotabla6area2").addClass('d-none')
    $("#tabla6area2").removeClass('d-none')
  }, 450)
})
$("#selectabla6area3").on('change',function() {
  console.log(this.value)
  console.log(calculosarea3)
  $("#tabla6area3").addClass('d-none')
  $("#cargandocasotabla6area3").removeClass('d-none')

  if(this.value == 'S'){
    $("#E149").text(calculosarea3.datosmostrararea3filae.E149)
    $("#E150").text(calculosarea3.datosmostrararea3filae.E150)
    $("#E151").text(calculosarea3.datosmostrararea3filae.E151)
    $("#E152").text(calculosarea3.datosmostrararea3filae.E152)
    $("#E153").text(calculosarea3.datosmostrararea3filae.E153)
    $("#E154").text(calculosarea3.datosmostrararea3filae.E154)

    $("#F149").text(calculosarea3.datosmostrararea3filaf.F149S)
    $("#F150").text(calculosarea3.datosmostrararea3filaf.F150S)
    $("#F151").text(calculosarea3.datosmostrararea3filaf.F151)
    $("#F152").text(calculosarea3.datosmostrararea3filaf.F152)
    $("#F153").text(calculosarea3.datosmostrararea3filaf.F153)
    $("#F154").text(calculosarea3.datosmostrararea3filaf.F154S)
  }else{
    $("#E149").text(calculosarea3.datosmostrararea3filae.E149)
    $("#E150").text(calculosarea3.datosmostrararea3filae.E150)
    $("#E151").text(calculosarea3.datosmostrararea3filae.E151)
    $("#E152").text(calculosarea3.datosmostrararea3filae.E152)
    $("#E153").text(calculosarea3.datosmostrararea3filae.E153)
    $("#E154").text(calculosarea3.datosmostrararea3filae.E154)

    $("#F149").text(calculosarea3.datosmostrararea3filaf.F149N)
    $("#F150").text(calculosarea3.datosmostrararea3filaf.F150N)
    $("#F151").text(calculosarea3.datosmostrararea3filaf.F151)
    $("#F152").text(calculosarea3.datosmostrararea3filaf.F152)
    $("#F153").text(calculosarea3.datosmostrararea3filaf.F153)
    $("#F154").text(calculosarea3.datosmostrararea3filaf.F154N)
  }
  setTimeout(function () {
    $("#cargandocasotabla6area3").addClass('d-none')
    $("#tabla6area3").removeClass('d-none')
  }, 450)
})





function agregardatahoragrafica(seriesdata,numerotabla,formserialize){
  seriesdatacopy = seriesdata.slice()
  switch (numerotabla) {
    case '1':
    seriesdatacopy.map((item,index)=>{
      switch (item.name) {
      // Area 1
      case 'Equipo T1 - A1-1':
      item.data.push(formserialize.equit1area1num1)
      break;
      case 'Equipo T1 - A1-2':
      item.data.push(formserialize.equit1area1num2)
      break;
      // Area 2
      case 'Equipo T1 - A2-1':
      item.data.push(formserialize.equit1area2num1)
      break;
      case 'Equipo T1 - A2-2':
      item.data.push(formserialize.equit1area2num2)
      break;
      case 'Equipo T1 - A2-3':
      item.data.push(formserialize.equit1area2num3)
      break;
      case 'Equipo T1 - A2-4':
      item.data.push(formserialize.equit1area2num4)
      break;
      case 'Equipo T1 - A2-5':
      item.data.push(formserialize.equit1area2num5)
      break;
      case 'Equipo T1 - A2-6':
      item.data.push(formserialize.equit1area2num6)
      break;

      // Area 3
      case 'Equipo T1 - A3-1':
      item.data.push(formserialize.equit1area3num1)
      break;
      case 'Equipo T1 - A3-2':
      item.data.push(formserialize.equit1area3num2)
      break;
      case 'Equipo T1 - A3-3':
      item.data.push(formserialize.equit1area3num3)
      break;
      case 'Equipo T1 - A3-4':
      item.data.push(formserialize.equit1area3num4)
      break;
      case 'Equipo T1 - A3-5':
      item.data.push(formserialize.equit1area3num5)
      break;
      default:
      break;
    }
  })
    break;

    case '2':
    seriesdatacopy.map((item,index)=>{
      switch (item.name) {
      // Area 1
      case 'Equipo T2 - A1-1':
      item.data.push(formserialize.equit2area1num1)
      break;
      case 'Equipo T2 - A1-2':
      item.data.push(formserialize.equit2area1num2)
      break;
      case 'Equipo T2 - A1-3':
      item.data.push(formserialize.equit2area1num3)
      break;
      // Area 2
      case 'Equipo T2 - A2-1':
      item.data.push(formserialize.equit2area2num1)
      break;
      case 'Equipo T2 - A2-2':
      item.data.push(formserialize.equit2area2num2)
      break;
      case 'Equipo T2 - A2-3':
      item.data.push(formserialize.equit2area2num3)
      break;
      case 'Equipo T2 - A2-4':
      item.data.push(formserialize.equit2area2num4)
      break;
      case 'Equipo T2 - A2-5':
      item.data.push(formserialize.equit2area2num5)
      break;
      case 'Equipo T2 - A2-6':
      item.data.push(formserialize.equit2area2num6)
      break;

      // Area 3
      case 'Equipo T2 - A3-1':
      item.data.push(formserialize.equit2area3num1)
      break;
      case 'Equipo T2 - A3-2':
      item.data.push(formserialize.equit2area3num2)
      break;
      case 'Equipo T2 - A3-3':
      item.data.push(formserialize.equit2area3num3)
      break;
      case 'Equipo T2 - A3-4':
      item.data.push(formserialize.equit2area3num4)
      break;
      case 'Equipo T2 - A3-5':
      item.data.push(formserialize.equit2area3num5)
      break;
      case 'Equipo T2 - A3-6':
      item.data.push(formserialize.equit2area3num6)
      break;

      // Area 4
      case 'Equipo T2 - A4-1':
      item.data.push(formserialize.equit2area4num1)
      break;
      case 'Equipo T2 - A4-2':
      item.data.push(formserialize.equit2area4num2)
      break;
      case 'Equipo T2 - A4-3':
      item.data.push(formserialize.equit2area4num3)
      break;
      case 'Equipo T2 - A4-4':
      item.data.push(formserialize.equit2area4num4)
      break;
      case 'Equipo T2 - A4-5':
      item.data.push(formserialize.equit2area4num5)
      break;
      case 'Equipo T2 - A4-6':
      item.data.push(formserialize.equit2area4num6)
      break;
      default:
      break;
    }
  })
    break;

    case '3':
    seriesdatacopy.map((item,index)=>{
      switch (item.name) {
      // Area 1
      case 'Equipo T3 - A1-1':
      item.data.push(formserialize.equit3area1num1)
      break;
      case 'Equipo T3 - A1-2':
      item.data.push(formserialize.equit3area1num2)
      break;
      case 'Equipo T3 - A1-3':
      item.data.push(formserialize.equit3area1num3)
      break;
      case 'Equipo T3 - A1-4':
      item.data.push(formserialize.equit3area1num4)
      break;
      case 'Equipo T3 - A1-5':
      item.data.push(formserialize.equit3area1num5)
      break;
      case 'Equipo T3 - A1-7':
      item.data.push(formserialize.equit3area1num7)
      break;
      // Area 2
      case 'Equipo T3 - A2-1':
      item.data.push(formserialize.equit3area2num1)
      break;
      case 'Equipo T3 - A2-2':
      item.data.push(formserialize.equit3area2num2)
      break;
      case 'Equipo T3 - A2-3':
      item.data.push(formserialize.equit3area2num3)
      break;
      case 'Equipo T3 - A2-4':
      item.data.push(formserialize.equit3area2num4)
      break;
      case 'Equipo T3 - A2-5':
      item.data.push(formserialize.equit3area2num5)
      break;
      case 'Equipo T3 - A2-7':
      item.data.push(formserialize.equit3area2num7)
      break;

      default:
      break;
    }
  })
    break;

    case '4':
    seriesdatacopy.map((item,index)=>{
      switch (item.name) {
      // Area 1
      case 'Equipo T4 - A1-1':
      item.data.push(formserialize.equit4area1num1)
      break;
      case 'Equipo T4 - A1-3':
      item.data.push(formserialize.equit4area1num3)
      break;
      case 'Equipo T4 - A1-5':
      item.data.push(formserialize.equit4area1num5)
      break;
      case 'Equipo T4 - A1-6':
      item.data.push(formserialize.equit4area1num6)
      break;
      case 'Equipo T4 - A1-7':
      item.data.push(formserialize.equit4area1num7)
      break;
      case 'Equipo T4 - A1-8':
      item.data.push(formserialize.equit4area1num8)
      break;
      case 'Equipo T4 - A1-9':
      item.data.push(formserialize.equit4area1num9)
      break;
      case 'Equipo T4 - A1-10':
      item.data.push(formserialize.equit4area1num10)
      break;
      case 'Equipo T4 - A1-11':
      item.data.push(formserialize.equit4area1num11)
      break;
      case 'Equipo T4 - A1-12':
      item.data.push(formserialize.equit4area1num12)
      break;
      case 'Equipo T4 - A1-13':
      item.data.push(formserialize.equit4area1num13)
      break;
      case 'Equipo T4 - A1-14':
      item.data.push(formserialize.equit4area1num14)
      break;
      case 'Equipo T4 - A1-15':
      item.data.push(formserialize.equit4area1num15)
      break;
      case 'Equipo T4 - A1-16':
      item.data.push(formserialize.equit4area1num16)
      break;
      case 'Equipo T4 - A1-18':
      item.data.push(formserialize.equit4area1num18)
      break;
      // Area 2
      case 'Equipo T4 - A2-1':
      item.data.push(formserialize.equit4area2num1)
      break;
      case 'Equipo T4 - A2-2':
      item.data.push(formserialize.equit4area2num2)
      break;
      case 'Equipo T4 - A2-3':
      item.data.push(formserialize.equit4area2num3)
      break;

      default:
      break;
    }
  })
    break;

    case '5':
    seriesdatacopy.map((item,index)=>{
      switch (item.name) {
      // Area 1
      case 'Equipo T5 - A1-1':
      item.data.push(formserialize.equit5area1num1)
      break;
      case 'Equipo T5 - A1-2':
      item.data.push(formserialize.equit5area1num2)
      break;
      case 'Equipo T5 - A1-3':
      item.data.push(formserialize.equit5area1num3)
      break;
      case 'Equipo T5 - A1-4':
      item.data.push(formserialize.equit5area1num4)
      break;
      // Area 2
      case 'Equipo T5 - A2-1':
      item.data.push(formserialize.equit5area2num1)
      break;
      case 'Equipo T5 - A2-2':
      item.data.push(formserialize.equit5area2num2)
      break;
      case 'Equipo T5 - A2-3':
      item.data.push(formserialize.equit5area2num3)
      break;
      case 'Equipo T5 - A2-4':
      item.data.push(formserialize.equit5area2num4)
      break;
      case 'Equipo T5 - A2-5':
      item.data.push(formserialize.equit5area2num5)
      break;
      // Area 3
      case 'Equipo T5 - A3-1':
      item.data.push(formserialize.equit5area3num1)
      break;
      case 'Equipo T5 - A3-2':
      item.data.push(formserialize.equit5area3num2)
      break;
      case 'Equipo T5 - A3-3':
      item.data.push(formserialize.equit5area3num3)
      break;
      case 'Equipo T5 - A3-4':
      item.data.push(formserialize.equit5area3num4)
      break;
      case 'Equipo T5 - A3-5':
      item.data.push(formserialize.equit5area3num5)
      break;
      // Area 4
      case 'Equipo T5 - A4-1':
      item.data.push(formserialize.equit5area4num1)
      break;
      case 'Equipo T5 - A4-2':
      item.data.push(formserialize.equit5area4num2)
      break;
      default:
      break;
    }
  })
    break;

    default:
    break;
  }
  return seriesdatacopy
}


function formToJSON(f) { 
  var fd = $(f).serializeArray(); 
  var d = {}; 
  $(fd).each(function() { 
    if (d[this.name] !== undefined)
    { 
      if (!Array.isArray(d[this.name])) 
      { 
        d[this.name] = [d[this.name]]; 
      } 
      d[this.name].push(this.value); 
    }else{ 
      d[this.name] = this.value; 
    } 
  }); 
  return d; 
}

//Formulario por pasos
function formularioporpasos(divfull, formulariocompleto, numerotabla) {
  $(`${divfull}`).steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    autoFocus: true,
    enableAllSteps: true,
    enablePagination: true,
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
      cancel: "Cancelar",
      current: "Página actual:",
      pagination: "Paginación",
      finish: "Guardar",
      next: "Siguiente",
      previous: "Anterior",
      loading: "Cargando..."
    },
    onStepChanging: function (event, currentIndex, newIndex) {
      // Allways allow previous action even if the current form is not valid!
      if (currentIndex > newIndex) return true; // Forbid next action on "Warning" step if the user is to young
      // if (newIndex === 3 && Number($("#age-2").val()) < 18) return false; // Needed in some cases if the user went back (clean up)
      if (currentIndex < newIndex) { // To remove error styles
        $(`${formulariocompleto}`).find(".body:eq(" + newIndex + ") label.error").remove();
        $(`${formulariocompleto}`).find(".body:eq(" + newIndex + ") .error").removeClass("error");
      }
      $(`${formulariocompleto}`).validate().settings.ignore = ":disabled,:hidden";
      // return $(`${formulariocompleto}`).valid();
      return true;
    },
    onStepChanged: function (event, currentIndex, priorIndex) {
      // if (currentIndex === 2 && Number($("#age-2").val()) >= 18) $(`${formulariocompleto}`).steps("next")
      //  if (currentIndex === 2 && priorIndex === 3) $(`${formulariocompleto}`).steps("previous");
    },
    onFinishing: function (event, currentIndex) {
      $(`${formulariocompleto}`).validate().settings.ignore = ":disabled", $(`${formulariocompleto}`).valid()
      return true;
    },
    onFinished: function (event, currentIndex) {
      console.log('onFinished:', $(`${formulariocompleto}`).serialize())
      formulariofull = $(`${formulariocompleto}`).serialize()
      swalWithBootstrapButtons({
        title: '¿Quieres guardar los datos?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, deseo hacerlo',
        cancelButtonText: 'No',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.post(`${direccionfull}Tabla${numerotabla}/RegistroTabla${numerotabla}`, formulariofull, function () { }).done(function (e) {
            data = JSON.parse(e)
            console.log(data)
            alertasweet('success', 'Exito', 'Se guardaron los datos')
          }).fail(function (e) {
            alertasweet('error', 'Error', 'No se guardaron los datos')
            console.log(e)
          })
        }
      });
    }
  }).validate({
    ignore: "input[type=hidden]",
    errorClass: "text-danger",
    successClass: "text-success",
    highlight: function (element, errorClass) {
      $(element).removeClass(errorClass)
    },
    unhighlight: function (element, errorClass) {
      $(element).removeClass(errorClass)
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element)
    }
    // rules: { email: { email: !0  } }
  })
  comprobarnumerosinput()
}

function cargarTablaEditable(tabla, urlback, hideIdentifier, filaid, valoreseditables, numerotabla) {
  $(`${tabla}`).Tabledit({
    url: `${urlback}`,
    editButton: false,
    deleteButton: false,
    restoreButton: true,
    hideIdentifier: hideIdentifier, //Esto es para poner transparente la columna id
    autoFocus: true,
    rowIdentifier: `${filaid[1]}`, //Fila identificadora para el id
    columns: {
      identifier: filaid,
      editable: valoreseditables
    },
    onSuccess: function (data, textStatus, jqXHR) {
      // console.log(data);
      if (data.status) {
        toastr.success('Se guardaron los datos', '¡Exito!', { "closeButton": true, "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 3000 });
        if (data.tabla == '1' || data.tabla == '2' || data.tabla == '3' || data.tabla == '4' || data.tabla == '5') {
          datatablefinal.fnDestroy();
          tablasdatatables(data.tabla);
        }
        if (tabla == "#tabla10calculos") {
          tablaDataCalculos.ajax.reload(null, false);
        }
      } else {
        if (data.mensaje != '') {
          datatablefinal.fnDestroy();
          tablasdatatables(data.tabla);
          alertasweet('error', 'Error', data.mensaje)
        }
      }
    },
    onFail: function (jqXHR, textStatus, errorThrown) { },
    onAjax: function (action, serialize) {
      mostrarocultartablas(tabla, 'ocultar')
    }
  });
}


$("#formtabla6editar").on('submit', function (e) {
  e.preventDefault()
  dataform = $(this).serialize()
  fechaseditar = $("#fechatabla6").val()
  // console.log(dataform,fechaseditar)
  if (fechaseditar == '') {
    alertasweet('error', 'Error', 'Debes seleccionar una Fecha')
  } else {
    swalWithBootstrapButtons({
      title: `¿Quieres editar los datos?`,
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, deseo hacerlo',
      cancelButtonText: 'No',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.post(`${direccionfull}Tabla6/EditarDatosTabla6`, dataform, function () { }).done(function (e) {
          data = JSON.parse(e)
          // console.log(data)
          if (data.status) {
            buscardatostabla6(fechaseditar)
            alertasweet('success', 'Exito', 'Se editaron los datos')
          } else {
            alertasweet('error', 'Error', 'No se editaron los datos')
          }
        }).fail(function (e) {
          alertasweet('error', 'Error', 'No se editaron los datos')
          console.log(e)
        })
      }
    });
  }
})


$("#btnreportetabla6area2").on('click',function(e) {
  e.preventDefault()
  selectabla6area2 = $("#selectabla6area2").val()
  E139 = $("#E139").text()
  E140 = $("#E140").text()
  E141 = $("#E141").text()
  E142 = $("#E142").text()
  E143 = $("#E143").text()
  E144 = $("#E144").text()
  F139 = $("#F139").text()
  F140 = $("#F140").text()
  F141 = $("#F141").text()
  F142 = $("#F142").text()
  F143 = $("#F143").text()
  F144 = $("#F144").text()
  fechatabla6 = $("#fechatabla6").val()
  datos = {
    'E139':E139, 'E140':E140, 'E141':E141, 'E142':E142, 
    'E143':E143, 'E144':E144, 'F139':F139, 'F140':F140, 
    'F141':F141, 'F142':F142, 'F143':F143, 'F144':F144,
    'selectabla6area2':selectabla6area2,
    'fechatabla6':fechatabla6
  }
  $.post(`${direccionfull}Tabla6/reportetabla6area2`, datos, function () { }).done(function (e) {
    // data = JSON.parse(e)
    console.log(e)
  }).fail(function (e) {
    console.log(e)
  })
})

$("#btnreportetabla6area3").on('click',function(e) {
  e.preventDefault()
  selectabla6area3 = $("#selectabla6area3").val()
  E149 = $("#E149").text()
  E150 = $("#E150").text()
  E151 = $("#E151").text()
  E152 = $("#E152").text()
  E153 = $("#E153").text()
  E154 = $("#E154").text()
  F149 = $("#F149").text()
  F150 = $("#F150").text()
  F151 = $("#F151").text()
  F152 = $("#F152").text()
  F153 = $("#F153").text()
  F154 = $("#F154").text()
  fechatabla6 = $("#fechatabla6").val()
  datos = {
    'E149':E149, 'E150':E150, 'E151':E151, 'E152':E152, 
    'E153':E153, 'E154':E154, 'F149':F149, 'F150':F150, 
    'F151':F151, 'F152':F152, 'F153':F153, 'F154':F154,
    'selectabla6area3':selectabla6area3,
    'fechatabla6':fechatabla6
  }
  $.post(`${direccionfull}Tabla6/reportetabla6area3`, datos, function () { }).done(function (e) {
    console.log(e)
  }).fail(function (e) {
    console.log(e)
  })
})