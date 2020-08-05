function verfechastablas(numerotabla) {
  $.post(`${direccionfull}Tabla${numerotabla}/mostrarfechascargadas`, {}, function () { }).done(function (e) {
    data = JSON.parse(e)
    asignardatepickerange(numerotabla, data[0])
}).fail(function (e) {
    console.log(e)
})
}

function vergraficatabla(numerotabla) {
    if (numerotabla != '0') {
        $("#botonesgraficas").addClass('flipOutY animated')
        setTimeout(function () {
            $("#botonesgraficas").addClass('d-none').removeClass('flipOutY animated')
            $("#tablasgraficas").removeClass('d-none').addClass('flipInY animated')
            $(`#grafica-tabla-${numerotabla}`).removeClass('d-none')
        }, 450)
        verfechastablas(numerotabla)
    }
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
  $(`#cargando-grafica-${numerotabla}`).addClass('d-none')
  $(`#grafica-responsive-${numerotabla}`).addClass('d-none')
});

  $(`#fechatabla${numerotabla}`).on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    valorfecha = picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD')
    traerdatosgrafica(numerotabla,valorfecha);
});
}

function traerdatosgrafica(numerotabla,valorfecha){
    $(`#grafica-responsive-${numerotabla}`).addClass('d-none');
    $(`#cargando-grafica-${numerotabla}`).removeClass('d-none')
    $.post(`${direccionfull}Tabla${numerotabla}/mostrarGrafica${numerotabla}`, {fechas:valorfecha}, function () { }).done(function (e) {
        data = JSON.parse(e)
        console.log(data)
        haciendograficas(data.dividgrafica,data.legendata,data.colores,numerotabla,data.seriesdata)
    }).fail(function (e) {
        console.log(e)
    })
}


function haciendograficas(dividgrafica,legendata,colores,numerotabla,seriesdata){
    $(".sidebartoggler").on('click', function(){
        setTimeout(function() {
            resize()
        },100)
    });
    xAxisdata = ['13PM','14PM','15PM','16PM','17PM','18PM','19PM','20PM','21PM','22PM','23PM','0AM','1AM','2AM','3AM','4AM','5AM','6AM','7AM','8AM','9AM','10AM','11AM','12PM']
    dividgrafica = `graficatabla${numerotabla}`

    myChart = echarts.init(document.getElementById(dividgrafica));
    myChart.showLoading();
    option = {
        dataZoom: [
        {
            id: 'dataZoomX',
            type: 'slider',
            xAxisIndex: [0],
            filterMode: 'filter'
        },
        {
            id: 'dataZoomY',
            type: 'slider',
            yAxisIndex: [0],
            filterMode: 'empty',
            right:'2px'
        }
        ],
        grid: {
            left: '0',
            right: '5%',
            bottom: '5%',
            containLabel: true
        },
        tooltip : { trigger: 'axis' },
        legend: { data: legendata, width:'90%', left:'3%', top:'0', bottom:'40px', padding:'20' },
        toolbox: {
            show : true,
            feature : {
                magicType : {show: true, type: ['line', 'bar']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        color: colores,
        calculable : true,
        xAxis : [
        { 
            type : 'category',
            data : xAxisdata
        }
        ],
        yAxis : [{ type : 'value' }],
        series : seriesdata
    };
    myChart.hideLoading();
    myChart.setOption(option);
    setTimeout(function() {
        resize();
        $(`#cargando-grafica-${numerotabla}`).addClass('d-none')
        $(`#grafica-responsive-${numerotabla}`).removeClass('d-none');
    }, 200);
    $(window).on('resize', resize);
}

function regresarbotonestablasgraficas(numerotabla) {
  $("#tablasgraficas").addClass('flipOutY animated')
  setTimeout(function () {
    $(`#fechatabla${numerotabla}`).val('')
    $("#tablasgraficas").addClass('d-none').removeClass('flipOutY animated')
    $(`#grafica-tabla-${numerotabla}`).addClass('d-none')
    $(`#grafica-responsive-${numerotabla}`).addClass('d-none')
    $(`#cargando-grafica-${numerotabla}`).addClass('d-none')
    $("#botonesgraficas").removeClass('d-none').addClass('flipInY animated')
    myChart.dispose()
}, 450)
}

function resize() {
    setTimeout(function() {
        if (myChart.length>0 || myChart != null || myChart._disposed==true) {
            console.log(myChart)
            myChart.resize();
        }
    }, 200);
} 