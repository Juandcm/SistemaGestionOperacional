function vertablasreportes(numerotabla) {
  if (numerotabla != '0') {
    $("#botonesreportes").addClass('flipOutY animated')
    setTimeout(function () {
      $("#botonesreportes").addClass('d-none').removeClass('flipOutY animated')
      $("#tablasreportes").removeClass('d-none').addClass('flipInY animated')
      $(`#datatables-tabla-${numerotabla}`).removeClass('d-none')
    }, 450)
    verfechastablas(numerotabla)
  }
}

function vertablasreporteacumulado(tipotabla) {
  valornumerotabla = 0;
  if (tipotabla == 'A') {
    valornumerotabla = 3;
  }else{
    valornumerotabla = 4;
  }
  $("#botonesreportes").addClass('flipOutY animated')
  setTimeout(function () {
    $("#botonesreportes").addClass('d-none').removeClass('flipOutY animated')
    $("#tablasreportes").removeClass('d-none').addClass('flipInY animated')
    $(`#datatables-tabla-${valornumerotabla}`).removeClass('d-none')
  }, 450)
}

$(`#fechatabla3a`).datepicker({
 format: "yyyy-mm",
 viewMode: "months", 
 minViewMode: "months",
});

$(`#fechatabla3b`).datepicker({
 format: "yyyy-mm",
 viewMode: "months", 
 minViewMode: "months",
});

$("#btnbuscarpartea").on('click',function(e){
  e.preventDefault()
  valorfecha = $("#fechatabla3a").val()
  if (valorfecha == '') {
    alertasweet('error', 'Error', 'Debes seleccionar una Fecha')
  }else{
    $("#tabla3aprincipal").addClass('d-none')
    $("#cargandotabla3a").removeClass('d-none')
    $.post(`${direccionfull}TablaR3/mostrarDataParteA`, {fecha:valorfecha}, function () { }).done(function (e) {
      data = JSON.parse(e)
      console.log(data)
      $("#cargandotabla3a").addClass('d-none')
      if (data.status) {
        $("#valort6equipo1area3").text(data.valort6equipo1area3)
        $("#valort6equipo2area3").text(data.valort6equipo2area3)
        $("#valort3equipo7area1").text(data.valort3equipo7area1)
        $("#valort3equipo7area2").text(data.valort3equipo7area2)
        $("#subtotala").text(data.subtotala)
        $("#valort6equipo5area3").text(data.valort6equipo5area3)

        $("input[name=valort6equipo1area3]").val(data.valort6equipo1area3)
        $("input[name=valort6equipo2area3]").val(data.valort6equipo2area3)
        $("input[name=valort3equipo7area1]").val(data.valort3equipo7area1)
        $("input[name=valort3equipo7area2]").val(data.valort3equipo7area2)
        $("input[name=subtotala]").val(data.subtotala)
        $("input[name=valort6equipo5area3]").val(data.valort6equipo5area3)

        $("#tabla3aprincipal").removeClass('d-none')
      }else{
        $("#tabla3aprincipal").addClass('d-none')
        alertasweet('error', 'Error', 'Por favor escoge otra fecha')
      }
    });
  }
})

$("#btnbuscarparteb").on('click',function(e){
  e.preventDefault()
  valorfecha = $("#fechatabla3b").val()
  if (valorfecha == '') {
    alertasweet('error', 'Error', 'Debes seleccionar una Fecha')
  }else{
    $("#tabla3bprincipal").addClass('d-none')
    $("#cargandotabla3b").removeClass('d-none')
    $.post(`${direccionfull}TablaR3/mostrarDataParteB`, {fecha:valorfecha}, function () { }).done(function (e) {
      data = JSON.parse(e)
      console.log(data)
      $("#cargandotabla3b").addClass('d-none')
      if (data.status) {
        $("#valort5equipo3area4").text(data.valort5equipo3area4)
        $("#valort5equipo1area4").text(data.valort5equipo1area4)
        $("#valort5equipo2area4").text(data.valort5equipo2area4)
        $("#subtotalb1").text(data.subtotalb1)
        $("#subtotalb2").text(data.subtotalb2)
        $("#subtotalb3").text(data.subtotalb3)

        $("input[name=valort5equipo3area4]").val(data.valort5equipo3area4)
        $("input[name=valort5equipo1area4]").val(data.valort5equipo1area4)
        $("input[name=valort5equipo2area4]").val(data.valort5equipo2area4)
        $("input[name=subtotalb1]").val(data.subtotalb1)
        $("input[name=subtotalb2]").val(data.subtotalb2)
        $("input[name=subtotalb3]").val(data.subtotalb3)

        $("#tabla3bprincipal").removeClass('d-none')
      }else{
        $("#tabla3bprincipal").addClass('d-none')
        alertasweet('error', 'Error', 'Por favor escoge otra fecha')
      }
    });
  }
})


function regresarbotonestablasreportes(numerotabla) {
  $("#tablasreportes").addClass('flipOutY animated')
  setTimeout(function () {
    $(`#fechatabla${numerotabla}`).val('')
    $("#tablasreportes").addClass('d-none').removeClass('flipOutY animated')
    $(`#datatables-tabla-${numerotabla}`).addClass('d-none')
    $(`#cargandotabla7`).addClass('d-none')
    $(`#cargandotabla8`).addClass('d-none')
    $(`#cargandotabla${numerotabla}`).addClass('d-none')
    $(`#tabla${numerotabla}principal`).addClass('d-none')
    $("#botonesreportes").removeClass('d-none').addClass('flipInY animated')
    $(`#mostrarselectabla${numerotabla}`).addClass('d-none')
    $("#tabla3aprincipal").addClass('d-none')
    $("#tabla3bprincipal").addClass('d-none')
  }, 450)
}


function buscardatostabla8(valorfecha) {
  $("#cargandotabla8").removeClass('d-none')
  $("#tabla8principal").addClass('d-none')
  $("#mostrarselectabla8").addClass('d-none')
  $.post(`${direccionfull}Tabla8/buscardatostabla8`, {fechas:valorfecha}, function () { }).done(function (e) {
    data = JSON.parse(e)
    console.log(data)
    if(data.status){
      resultadotablas = data.resultadotablas
      arrayTab1 = resultadotablas.arrayTab1
      arrayTab2 = resultadotablas.arrayTab2
      arrayTab3 = resultadotablas.arrayTab3
      arrayTab4 = resultadotablas.arrayTab4
      arrayTab5 = resultadotablas.arrayTab5
      arrayTab6Tab8 = resultadotablas.arrayTab6
      fechainicialmod = data.fechainicialmod 
      fechafinalmod = data.fechafinalmod
      $(".fechainicial").text(fechainicialmod)
      $(".fechafinal").text(fechafinalmod)
      $(".fechainicial").val(fechainicialmod)
      $(".fechafinal").val(fechafinalmod)

      llenardatostabla8(arrayTab1,arrayTab2,arrayTab3,arrayTab4,arrayTab5)
      $("#mostrarselectabla8").removeClass('d-none')
      $("#cargandotabla8").addClass('d-none')
    }else{
      console.log(data.msg) 
      alertasweet('error', 'Error', data.msg)
      $("#tabla8principal").addClass('d-none')
      $("#cargandotabla8").addClass('d-none')
    }
  }).fail(function (e) {
    console.log(e)
  })
}

$("#selecreportetabla8").on('change',function() {
  console.log(this.value)
  console.log(arrayTab6Tab8)

  $("#tabla8principal").addClass('d-none')
  $("#cargandotabla8").removeClass('d-none')

  if(this.value == 'S'){
    $("#F149").text(arrayTab6Tab8.EF6S)
    $("#F150").text(arrayTab6Tab8.EF7S)
    $("#F151").text(arrayTab6Tab8.EF9)
    $("#F152").text(arrayTab6Tab8.EF10)
    $("#F153").text(arrayTab6Tab8.EF11)
    $("#EF8").text(arrayTab6Tab8.EF8)

    $("input[name=F149]").val(arrayTab6Tab8.EF6S)
    $("input[name=F150]").val(arrayTab6Tab8.EF7S)
    $("input[name=F151]").val(arrayTab6Tab8.EF9)
    $("input[name=F152]").val(arrayTab6Tab8.EF10)
    $("input[name=F153]").val(arrayTab6Tab8.EF11)
    $("input[name=EF8]").val(arrayTab6Tab8.EF8)

  }else{
    $("#F149").text(arrayTab6Tab8.EF6N)
    $("#F150").text(arrayTab6Tab8.EF7N)
    $("#F151").text(arrayTab6Tab8.EF9)
    $("#F152").text(arrayTab6Tab8.EF10)
    $("#F153").text(arrayTab6Tab8.EF11)
    $("#EF8").text(arrayTab6Tab8.EF8)

    $("input[name=F149]").val(arrayTab6Tab8.EF6N)
    $("input[name=F150]").val(arrayTab6Tab8.EF7N)
    $("input[name=F151]").val(arrayTab6Tab8.EF9)
    $("input[name=F152]").val(arrayTab6Tab8.EF10)
    $("input[name=F153]").val(arrayTab6Tab8.EF11)
    $("input[name=EF8]").val(arrayTab6Tab8.EF8)
  }
  setTimeout(function () {
    $("#cargandotabla8").addClass('d-none')
    $("#tabla8principal").removeClass('d-none')
  }, 450)
})

function buscardatostabla7(valorfecha) {
  $("#cargandotabla7").removeClass('d-none')
  $("#tabla7principal").addClass('d-none')
  $("#mostrarselectabla7").addClass('d-none')
  $.post(`${direccionfull}Tabla7/buscardatostabla7`, {fechas:valorfecha}, function () { }).done(function (e) {
    data = JSON.parse(e)
    console.log(data)
    if(data.status){
      resultadotablas = data.resultadotablas
      arrayTab1 = resultadotablas.arrayTab1
      arrayTab2 = resultadotablas.arrayTab2
      arrayTab3 = resultadotablas.arrayTab3
      arrayTab4 = resultadotablas.arrayTab4
      arrayTab5 = resultadotablas.arrayTab5
      arrayTab6Tab7 = resultadotablas.arrayTab6
      fechainicialmod = data.fechainicialmod 
      fechafinalmod = data.fechafinalmod
      $(".fechainicial").text(fechainicialmod)
      $(".fechafinal").text(fechafinalmod)
      $(".fechainicial").val(fechainicialmod)
      $(".fechafinal").val(fechafinalmod)
      llenardatostabla7(arrayTab1,arrayTab2,arrayTab3,arrayTab4,arrayTab5,arrayTab6Tab7)
      $("#mostrarselectabla7").removeClass('d-none')
      $("#cargandotabla7").addClass('d-none')
    }else{
      console.log(data.msg) 
      alertasweet('error', 'Error', data.msg)
      $("#tabla7principal").addClass('d-none')
      $("#cargandotabla7").addClass('d-none')
    }
  }).fail(function (e) {
    console.log(e)
  })
}

$("#selecreportetabla7").on('change',function() {
  console.log(this.value)
  console.log(arrayTab6Tab7)
  $("#tabla7principal").addClass('d-none')
  $("#cargandotabla7").removeClass('d-none')

  if(this.value == 'S'){
    $("#F139").text(arrayTab6Tab7.DE6S)
    $("#F140").text(arrayTab6Tab7.DE7S)
    $("#F141").text(arrayTab6Tab7.DE1011)
    $("#F142").text(arrayTab6Tab7.DE1213)
    $("#F143").text(arrayTab6Tab7.DE9)
    $("#DE8").text(arrayTab6Tab7.DE8)

    $("input[name=F139]").val(arrayTab6Tab7.DE6S)
    $("input[name=F140]").val(arrayTab6Tab7.DE7S)
    $("input[name=F141]").val(arrayTab6Tab7.DE1011)
    $("input[name=F142]").val(arrayTab6Tab7.DE1213)
    $("input[name=F143]").val(arrayTab6Tab7.DE9)
    $("input[name=DE8]").val(arrayTab6Tab7.DE8)

    
  }else{
    $("#F139").text(arrayTab6Tab7.DE6N)
    $("#F140").text(arrayTab6Tab7.DE7N)
    $("#F141").text(arrayTab6Tab7.DE1011)
    $("#F142").text(arrayTab6Tab7.DE1213)
    $("#F143").text(arrayTab6Tab7.DE9)
    $("#DE8").text(arrayTab6Tab7.DE8)

    $("input[name=F139]").val(arrayTab6Tab7.DE6N)
    $("input[name=F140]").val(arrayTab6Tab7.DE7N)
    $("input[name=F141]").val(arrayTab6Tab7.DE1011)
    $("input[name=F142]").val(arrayTab6Tab7.DE1213)
    $("input[name=F143]").val(arrayTab6Tab7.DE9)
    $("input[name=DE8]").val(arrayTab6Tab7.DE8)
  }
  setTimeout(function () {
    $("#cargandotabla7").addClass('d-none')
    $("#tabla7principal").removeClass('d-none')
  }, 450)
})


$("#btnreportetabla7").on('click',function(e) {
  e.preventDefault()
  console.log('btnreportetabla7')
  fechatabla7 = $("#fechatabla7").val()
  selecreportetabla7 = $("#selecreportetabla7").val()

  F139 = $("#F139").text()
  J6 = $("#J6").text()
  F140 = $("#F140").text()
  J7 = $("#J7").text()
  DE8 = $("#DE8").text()
  J8 = $("#J8").text()
  F143 = $("#F143").text()
  J9 = $("#J9").text()
  F141 = $("#F141").text()
  J10 = $("#J10").text()
  J11 = $("#J11").text()
  F142 = $("#F142").text()
  J12 = $("#J12").text()
  J13 = $("#J13").text()
  J14 = $("#J14").text()
  J15 = $("#J15").text()
  J16 = $("#J16").text()
  J17 = $("#J17").text()
  J18 = $("#J18").text()
  AF8 = $("#AF8").text()
  X8 = $("#X8").text()
  AF12 = $("#AF12").text()
  AF27 = $("#AF27").text()
  X12 = $("#X12").text()
  X13 = $("#X13").text()
  AF22 = $("#AF22").text()
  AF28 = $("#AF28").text()
  X22 = $("#X22").text()
  X27 = $("#X27").text()
  AF32 = $("#AF32").text()
  AF33 = $("#AF33").text()
  AF35 = $("#AF35").text()
  X32 = $("#X32").text()
  X33 = $("#X33").text()
  AF40 = $("#AF40").text()
  AF41 = $("#AF41").text()
  AF43 = $("#AF43").text()
  X40 = $("#X40").text()
  X41 = $("#X41").text()
  AF48 = $("#AF48").text()
  AF49 = $("#AF49").text()
  AF51 = $("#AF51").text()
  X48 = $("#X48").text()
  X49 = $("#X49").text()
  AF57 = $("#AF57").text()
  X57 = $("#X57").text()
  AF58 = $("#AF58").text()
  AF60 = $("#AF60").text()
  X58 = $("#X58").text()
  AF68 = $("#AF68").text()
  AF70 = $("#AF70").text()
  X68 = $("#X68").text()
  AF90 = $("#AF90").text()
  AF91 = $("#AF91").text()
  X90 = $("#X90").text()
  X91 = $("#X91").text()

  datos = {
    'F139':F139, 'J6':J6, 'F140':F140, 'J7':J7, 'DE8':DE8, 
    'J8':J8, 'F143':F143, 'J9':J9, 'F141':F141, 'J10':J10,
    'J11':J11, 'F142':F142, 'J12':J12, 'J13':J13, 'J14':J14, 
    'J15':J15, 'J16':J16, 'J17':J17, 'J18':J18, 'AF8':AF8, 
    'X8':X8, 'AF12':AF12, 'AF27':AF27, 'X12':X12, 'X13':X13,
    'AF22':AF22, 'AF28':AF28, 'X22':X22, 'X27':X27, 'AF32':AF32,
    'AF33':AF33, 'AF35':AF35, 'X32':X32, 'X33':X33, 'AF40':AF40,
    'AF41':AF41, 'AF43':AF43, 'X40':X40, 'X41':X41, 'AF48':AF48, 
    'AF49':AF49, 'AF51':AF51, 'X48':X48, 'X49':X49, 'AF57':AF57, 
    'X57':X57, 'AF58':AF58, 'AF60':AF60, 'X58':X58, 'AF68':AF68, 
    'AF70':AF70, 'X68':X68, 'AF90':AF90, 'AF91':AF91, 'X90':X90, 
    'X91':X91,
    'selecreportetabla7':selecreportetabla7,
    'fechatabla7':fechatabla7
  }
  $.post(`${direccionfull}Tabla7/reportetabla7`, datos, function () { }).done(function (e) {
    console.log(e)

        //window.open(e)
       // window.location.href = e
       //window.open(e)
      //downloadPDF(e)
        // The actual download
        //var filename = e;
        //var blob = new Blob([e], { type: 'application/pdf' });
        //var link = document.createElement('a');
        //link.href = window.URL.createObjectURL(blob);
        //link.download = filename;

        //document.body.appendChild(link);

        //link.click();

        //document.body.removeChild(link);

      }).fail(function (e) {
        console.log(e)
      })
    })

function downloadPDF(pdf) {
  const linkSource = `data:application/pdf;base64,${pdf}`;
  const downloadLink = document.createElement("a");
  const fileName = "vct_illustration.pdf";

  downloadLink.href = linkSource;
  downloadLink.download = fileName;
  downloadLink.click();
}

$("#btnreportetabla8").on('click',function(e) {
  e.preventDefault()
  console.log('btnreportetabla8')
  fechatabla8 = $("#fechatabla8").val()
  selecreportetabla8 = $("#selecreportetabla8").val()

  F149 = $("#F149").text()
  F150 = $("#F150").text()
  EF8 = $("#EF8").text()
  F153 = $("#F153").text()
  F151 = $("#F151").text()
  F152 = $("#F152").text()
  E111 = $("#E111").text()
  E110 = $("#E110").text()
  EF15 = $("#EF15").text()
  E117 = $("#E117").text()
  E116 = $("#E116").text()
  EF18 = $("#EF18").text()
  EF19 = $("#EF19").text()
  EF20 = $("#EF20").text()
  EF21 = $("#EF21").text()
  EF22 = $("#EF22").text()
  EF23 = $("#EF23").text()
  E121 = $("#E121").text()
  E122 = $("#E122").text()
  AH8 = $("#AH8").text()
  AD8 = $("#AD8").text()
  AH12 = $("#AH12").text()
  AH27 = $("#AH27").text()
  AD12 = $("#AD12").text()
  AD13 = $("#AD13").text()
  AH22 = $("#AH22").text()
  AH28 = $("#AH28").text()
  AD22 = $("#AD22").text()
  AD27 = $("#AD27").text()
  AH32 = $("#AH32").text()
  AH33 = $("#AH33").text()
  AH35 = $("#AH35").text()
  AD32 = $("#AD32").text()
  AD33 = $("#AD33").text()
  AH40 = $("#AH40").text()
  AH41 = $("#AH41").text()
  AH43 = $("#AH43").text()
  AD40 = $("#AD40").text()
  AD41 = $("#AD41").text()
  AH48 = $("#AH48").text()
  AH49 = $("#AH49").text()
  AH51 = $("#AH51").text()
  AD48 = $("#AD48").text()
  AD49 = $("#AD49").text()
  AH57 = $("#AH57").text()
  AD57 = $("#AD57").text()
  AH58 = $("#AH58").text()
  AH60 = $("#AH60").text()
  AD58 = $("#AD58").text()
  AH78 = $("#AH78").text()
  AH70 = $("#AH70").text()
  AD68 = $("#AD68").text()
  AH90 = $("#AH90").text()
  AH91 = $("#AH91").text()
  AD90 = $("#AD90").text()
  AD91 = $("#AD91").text()

  datos = {
    'F149':F149,'F150':F150,'EF8':EF8,'F153':F153,
    'F151':F151,'F152':F152,'E111':E111,'E110':E110,
    'EF15':EF15,'E117':E117,'E116':E116,'EF18':EF18,
    'EF19':EF19,'EF20':EF20,'EF21':EF21,'EF22':EF22,
    'EF23':EF23,'E121':E121,'E122':E122,'AH8':AH8,
    'AD8':AD8,'AH12':AH12,'AH27':AH27,'AD12':AD12,
    'AD13':AD13,'AH22':AH22,'AH28':AH28,'AD22':AD22,
    'AD27':AD27,'AH32':AH32,'AH33':AH33,'AH35':AH35,
    'AD32':AD32,'AD33':AD33,'AH40':AH40,'AH41':AH41,
    'AH43':AH43,'AD40':AD40,'AD41':AD41,'AH48':AH48,
    'AH49':AH49,'AH51':AH51,'AD48':AD48,'AD49':AD49,
    'AH57':AH57,'AD57':AD57,'AH58':AH58,'AH60':AH60,
    'AD58':AD58,'AH78':AH78,'AH70':AH70,'AD68':AD68,
    'AH90':AH90,'AH91':AH91,'AD90':AD90,'AD91':AD91,
    'selecreportetabla8':selecreportetabla8,
    'fechatabla8':fechatabla8
  }
  $.post(`${direccionfull}Tabla8/reportetabla8`, datos, function () { }).done(function (e) {
        // data = JSON.parse(e)
        console.log(e)
      }).fail(function (e) {
        console.log(e)
      })
    })


function llenardatostabla7(arrayTab1,arrayTab2,arrayTab3,arrayTab4,arrayTab5,arrayTab6){
  // arrayTab1
  $("#AF8").text(arrayTab1.AF8)
  $("#X8").text(arrayTab1.X8)
  $("#AF12").text(arrayTab1.AF12)
  $("#X12").text(arrayTab1.X12)
  $("#X13").text(arrayTab1.X13)
  $("#AF22").text(arrayTab1.AF22)
  $("#X22").text(arrayTab1.X22)

  $("input[name=AF8]").val(arrayTab1.AF8)
  $("input[name=X8]").val(arrayTab1.X8)
  $("input[name=AF12]").val(arrayTab1.AF12)
  $("input[name=X12]").val(arrayTab1.X12)
  $("input[name=X13]").val(arrayTab1.X13)
  $("input[name=AF22]").val(arrayTab1.AF22)
  $("input[name=X22]").val(arrayTab1.X22)

  // arrayTab2
  $("#AF27").text(arrayTab2.AF27)
  $("#X27").text(arrayTab2.X27)
  $("#AF28").text(arrayTab2.AF28)
  $("#AF32").text(arrayTab2.AF32)
  $("#X32").text(arrayTab2.X32)
  $("#AF33").text(arrayTab2.AF33)
  $("#X33").text(arrayTab2.X33)
  $("#AF35").text(arrayTab2.AF35)
  $("#AF40").text(arrayTab2.AF40)
  $("#X40").text(arrayTab2.X40)
  $("#AF41").text(arrayTab2.AF41)
  $("#X41").text(arrayTab2.X41)
  $("#AF43").text(arrayTab2.AF43)
  $("#AF48").text(arrayTab2.AF48)
  $("#X48").text(arrayTab2.X48)
  $("#AF49").text(arrayTab2.AF49)
  $("#X49").text(arrayTab2.X49)
  $("#AF51").text(arrayTab2.AF51)

  $("input[name=AF27]").val(arrayTab2.AF27)
  $("input[name=X27]").val(arrayTab2.X27)
  $("input[name=AF28]").val(arrayTab2.AF28)
  $("input[name=AF32]").val(arrayTab2.AF32)
  $("input[name=X32]").val(arrayTab2.X32)
  $("input[name=AF33]").val(arrayTab2.AF33)
  $("input[name=X33]").val(arrayTab2.X33)
  $("input[name=AF35]").val(arrayTab2.AF35)
  $("input[name=AF40]").val(arrayTab2.AF40)
  $("input[name=X40]").val(arrayTab2.X40)
  $("input[name=AF41]").val(arrayTab2.AF41)
  $("input[name=X41]").val(arrayTab2.X41)
  $("input[name=AF43]").val(arrayTab2.AF43)
  $("input[name=AF48]").val(arrayTab2.AF48)
  $("input[name=X48]").val(arrayTab2.X48)
  $("input[name=AF49]").val(arrayTab2.AF49)
  $("input[name=X49]").val(arrayTab2.X49)
  $("input[name=AF51]").val(arrayTab2.AF51)

  // arrayTab3
  $("#AF57").text(arrayTab3.AF57)
  $("#X57").text(arrayTab3.X57)
  $("#AF58").text(arrayTab3.AF58)
  $("#X58").text(arrayTab3.X58)
  $("#AF60").text(arrayTab3.AF60)
  $("#AF68").text(arrayTab3.AF68)
  $("#X68").text(arrayTab3.X68)
  $("#AF70").text(arrayTab3.AF70)

  $("input[name=AF57]").val(arrayTab3.AF57)
  $("input[name=X57]").val(arrayTab3.X57)
  $("input[name=AF58]").val(arrayTab3.AF58)
  $("input[name=X58]").val(arrayTab3.X58)
  $("input[name=AF60]").val(arrayTab3.AF60)
  $("input[name=AF68]").val(arrayTab3.AF68)
  $("input[name=X68]").val(arrayTab3.X68)
  $("input[name=AF70]").val(arrayTab3.AF70)

  // arrayTab4
  $("#AF90").text(arrayTab4.AF90)
  $("#X90").text(arrayTab4.X90)
  $("#AF91").text(arrayTab4.AF91)
  $("#X91").text(arrayTab4.X91)

  $("input[name=AF90]").val(arrayTab4.AF90)
  $("input[name=X90]").val(arrayTab4.X90)
  $("input[name=AF91]").val(arrayTab4.AF91)
  $("input[name=X91]").val(arrayTab4.X91)

  // arrayTab5
  $("#J9").text(arrayTab5.J9)
  $("#J10").text(arrayTab5.J10)
  $("#J11").text(arrayTab5.J11)
  $("#J12").text(arrayTab5.J12)
  $("#J13").text(arrayTab5.J13)
  $("#J14").text(arrayTab5.J14)
  $("#J15").text(arrayTab5.J15)
  $("#J16").text(arrayTab5.J16)
  $("#J17").text(arrayTab5.J17)
  $("#J18").text(arrayTab5.J18)

  $("input[name=J9]").val(arrayTab5.J9)
  $("input[name=J10]").val(arrayTab5.J10)
  $("input[name=J11]").val(arrayTab5.J11)
  $("input[name=J12]").val(arrayTab5.J12)
  $("input[name=J13]").val(arrayTab5.J13)
  $("input[name=J14]").val(arrayTab5.J14)
  $("input[name=J15]").val(arrayTab5.J15)
  $("input[name=J16]").val(arrayTab5.J16)
  $("input[name=J17]").val(arrayTab5.J17)
  $("input[name=J18]").val(arrayTab5.J18)

  // arrayTab6
  $("#J6").text(arrayTab6.J6)
  $("#J7").text(arrayTab6.J7)
  $("#J8").text(arrayTab6.J8)

  $("input[name=J6]").val(arrayTab6.J6)
  $("input[name=J7]").val(arrayTab6.J7)
  $("input[name=J8]").val(arrayTab6.J8)
}

function llenardatostabla8(arrayTab1,arrayTab2,arrayTab3,arrayTab4,arrayTab5) {

  // arrayTab1
  $("#AH8").text(arrayTab1.AH8)
  $("#AD8").text(arrayTab1.AD8)
  $("#AH12").text(arrayTab1.AH12)
  $("#AD12").text(arrayTab1.AD12)
  $("#AD13").text(arrayTab1.AD13)
  $("#AH22").text(arrayTab1.AH22)
  $("#AD22").text(arrayTab1.AD22)

  $("input[name=AH8]").val(arrayTab1.AH8)
  $("input[name=AD8]").val(arrayTab1.AD8)
  $("input[name=AH12]").val(arrayTab1.AH12)
  $("input[name=AD12]").val(arrayTab1.AD12)
  $("input[name=AD13]").val(arrayTab1.AD13)
  $("input[name=AH22]").val(arrayTab1.AH22)
  $("input[name=AD22]").val(arrayTab1.AD22)

  // arrayTab2
  $("#AH27").text(arrayTab2.AH27)
  $("#AD27").text(arrayTab2.AD27)
  $("#AH28").text(arrayTab2.AH28)
  $("#AH32").text(arrayTab2.AH32)
  $("#AD32").text(arrayTab2.AD32)
  $("#AH33").text(arrayTab2.AH33)
  $("#AD33").text(arrayTab2.AD33)
  $("#AH35").text(arrayTab2.AH35)
  $("#AH40").text(arrayTab2.AH40)
  $("#AD40").text(arrayTab2.AD40)
  $("#AH41").text(arrayTab2.AH41)
  $("#AD41").text(arrayTab2.AD41)
  $("#AH43").text(arrayTab2.AH43)
  $("#AH48").text(arrayTab2.AH48)
  $("#AD48").text(arrayTab2.AD48)
  $("#AH49").text(arrayTab2.AH49)
  $("#AD49").text(arrayTab2.AD49)
  $("#AH51").text(arrayTab2.AH51)

  $("input[name=AH27]").val(arrayTab2.AH27)
  $("input[name=AD27]").val(arrayTab2.AD27)
  $("input[name=AH28]").val(arrayTab2.AH28)
  $("input[name=AH32]").val(arrayTab2.AH32)
  $("input[name=AD32]").val(arrayTab2.AD32)
  $("input[name=AH33]").val(arrayTab2.AH33)
  $("input[name=AD33]").val(arrayTab2.AD33)
  $("input[name=AH35]").val(arrayTab2.AH35)
  $("input[name=AH40]").val(arrayTab2.AH40)
  $("input[name=AD40]").val(arrayTab2.AD40)
  $("input[name=AH41]").val(arrayTab2.AH41)
  $("input[name=AD41]").val(arrayTab2.AD41)
  $("input[name=AH43]").val(arrayTab2.AH43)
  $("input[name=AH48]").val(arrayTab2.AH48)
  $("input[name=AD48]").val(arrayTab2.AD48)
  $("input[name=AH49]").val(arrayTab2.AH49)
  $("input[name=AD49]").val(arrayTab2.AD49)
  $("input[name=AH51]").val(arrayTab2.AH51)

  // arrayTab3
  $("#AH57").text(arrayTab3.AH57)
  $("#AD57").text(arrayTab3.AD57)
  $("#AH58").text(arrayTab3.AH58)
  $("#AH60").text(arrayTab3.AH60)
  $("#AD58").text(arrayTab3.AD58)
  $("#AD68").text(arrayTab3.AD68)
  $("#AH60").text(arrayTab3.AH60)
  $("#AH70").text(arrayTab3.AH70)

  $("input[name=AH57]").val(arrayTab3.AH57)
  $("input[name=AD57]").val(arrayTab3.AD57)
  $("input[name=AH58]").val(arrayTab3.AH58)
  $("input[name=AH60]").val(arrayTab3.AH60)
  $("input[name=AD58]").val(arrayTab3.AD58)
  $("input[name=AD68]").val(arrayTab3.AD68)
  $("input[name=AH60]").val(arrayTab3.AH60)
  $("input[name=AH70]").val(arrayTab3.AH70)

  // arrayTab4
  $("#AH78").text(arrayTab4.AH78)
  $("#AH90").text(arrayTab4.AH90)
  $("#AD90").text(arrayTab4.AD90)
  $("#AH91").text(arrayTab4.AH91)
  $("#AD91").text(arrayTab4.AD91)

  $("input[name=AH78]").val(arrayTab4.AH78)
  $("input[name=AH90]").val(arrayTab4.AH90)
  $("input[name=AD90]").val(arrayTab4.AD90)
  $("input[name=AH91]").val(arrayTab4.AH91)
  $("input[name=AD91]").val(arrayTab4.AD91)

  // arrayTab5
  $("#EF13").text(arrayTab5.EF13)
  $("#EF14").text(arrayTab5.EF14)
  $("#EF15").text(arrayTab5.EF15)
  $("#EF16").text(arrayTab5.EF16)
  $("#EF17").text(arrayTab5.EF17)
  $("#EF18").text(arrayTab5.EF18)
  $("#EF19").text(arrayTab5.EF19)
  $("#EF20").text(arrayTab5.EF20)
  $("#EF21").text(arrayTab5.EF21)
  $("#EF22").text(arrayTab5.EF22)
  $("#G23").text(arrayTab5.G23)
  $("#H23").text(arrayTab5.H23)
  $("#EF23").text(arrayTab5.EF23)

  $("input[name=EF13]").val(arrayTab5.EF13)
  $("input[name=EF14]").val(arrayTab5.EF14)
  $("input[name=EF15]").val(arrayTab5.EF15)
  $("input[name=EF16]").val(arrayTab5.EF16)
  $("input[name=EF17]").val(arrayTab5.EF17)
  $("input[name=EF18]").val(arrayTab5.EF18)
  $("input[name=EF19]").val(arrayTab5.EF19)
  $("input[name=EF20]").val(arrayTab5.EF20)
  $("input[name=EF21]").val(arrayTab5.EF21)
  $("input[name=EF22]").val(arrayTab5.EF22)
  $("input[name=G23]").val(arrayTab5.G23)
  $("input[name=H23]").val(arrayTab5.H23)
  $("input[name=EF23]").val(arrayTab5.EF23)
}
