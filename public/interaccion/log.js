
////////////////
// Logs

// Form Logs tabla 1
$(`#formlogtabla1`).on('submit',function(e){
    e.preventDefault()
    form = $(this).serialize()
    console.log(form)
    $(".cargandologs").removeClass('d-none')
    $(`#mostrarlogstabla1`).addClass('d-none')
    $(`#mostrarlogstabla1`).html('')

    $.post(`${direccionfull}Tabla1/MostrarLog1`, form, function () { }).done(function (e) {
        data = JSON.parse(e)
        console.log(data)
        datahtml = ''
        if (data.status) {
            datahtmlprimero = `
            <div class="mt-2 mb-2 border border-dark card-hover bg-success">
            <div class="ml-4 mb-2 mt-2">
            <p>Nombre del Equipo: ${data.nombrequipobuscar}</p>
            <p>Valor Operacional del Equipo: ${data.valorequipobuscar}</p>
            </div>
            </div>
            <hr>
            `
            $(`#mostrarlogstabla1`).append(datahtmlprimero)
            data.logsdata.map((item,index)=>{
                datahtml = `
                <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
                <div class="ml-4 mb-2 mt-2">
                <p>Fecha del Log: ${item.log_fecha}</p>
                <p>Tipo de acción del Log: ${item.log_tipo}</p>
                <p>Usuario que realizo la acción del Log:</p>
                <p>
                C.I: ${item.usuario_cedula}. 
                Nombre: ${item.usuario_nombre}. 
                Apellido: ${item.usuario_apellido}.
                </p>
                </div>
                </div>
                `
                $(`#mostrarlogstabla1`).append(datahtml)
            })
            $(`#mostrarlogstabla1`).removeClass('d-none')
        }else{
            datahtml = `
            <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
            <p class="text-center mb-2 mt-2">No se pudo encontrar nada</p>
            </div>
            `
            $(`#mostrarlogstabla1`).html(datahtml)
            $(`#mostrarlogstabla1`).removeClass('d-none')
        }
        $(".cargandologs").addClass('d-none')
    }).fail(function (e) {
        $(".cargandologs").addClass('d-none')
        console.log(e)
    })
})

// Form Logs tabla 2
$(`#formlogtabla2`).on('submit',function(e){
    e.preventDefault()
    form = $(this).serialize()
    console.log(form)
    $(".cargandologs").removeClass('d-none')
    $(`#mostrarlogstabla2`).addClass('d-none')
    $(`#mostrarlogstabla2`).html('')

    $.post(`${direccionfull}Tabla2/MostrarLog2`, form, function () { }).done(function (e) {
        data = JSON.parse(e)
        console.log(data)
        datahtml = ''
        if (data.status) {
            datahtmlprimero = `
            <div class="mt-2 mb-2 border border-dark card-hover bg-success">
            <div class="ml-4 mb-2 mt-2">
            <p>Nombre del Equipo: ${data.nombrequipobuscar}</p>
            <p>Valor Operacional del Equipo: ${data.valorequipobuscar}</p>
            </div>
            </div>
            <hr>
            `
            $(`#mostrarlogstabla2`).append(datahtmlprimero)
            data.logsdata.map((item,index)=>{
                datahtml = `
                <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
                <div class="ml-4 mb-2 mt-2">
                <p>Fecha del Log: ${item.log_fecha}</p>
                <p>Tipo de acción del Log: ${item.log_tipo}</p>
                <p>Usuario que realizo la acción del Log:</p>
                <p>
                C.I: ${item.usuario_cedula}. 
                Nombre: ${item.usuario_nombre}. 
                Apellido: ${item.usuario_apellido}.
                </p>
                </div>
                </div>
                `
                $(`#mostrarlogstabla2`).append(datahtml)
            })
            $(`#mostrarlogstabla2`).removeClass('d-none')
        }else{
            datahtml = `
            <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
            <p class="text-center mb-2 mt-2">No se pudo encontrar nada</p>
            </div>
            `
            $(`#mostrarlogstabla2`).html(datahtml)
            $(`#mostrarlogstabla2`).removeClass('d-none')
        }
        $(".cargandologs").addClass('d-none')
    }).fail(function (e) {
        $(".cargandologs").addClass('d-none')
        console.log(e)
    })
})

// Form Logs tabla 3
$(`#formlogtabla3`).on('submit',function(e){
    e.preventDefault()
    form = $(this).serialize()
    console.log(form)
    $(".cargandologs").removeClass('d-none')
    $(`#mostrarlogstabla3`).addClass('d-none')
    $(`#mostrarlogstabla3`).html('')

    $.post(`${direccionfull}Tabla3/MostrarLog3`, form, function () { }).done(function (e) {
        data = JSON.parse(e)
        console.log(data)
        datahtml = ''
        if (data.status) {
            datahtmlprimero = `
            <div class="mt-2 mb-2 border border-dark card-hover bg-success">
            <div class="ml-4 mb-2 mt-2">
            <p>Nombre del Equipo: ${data.nombrequipobuscar}</p>
            <p>Valor Operacional del Equipo: ${data.valorequipobuscar}</p>
            </div>
            </div>
            <hr>
            `
            $(`#mostrarlogstabla3`).append(datahtmlprimero)
            data.logsdata.map((item,index)=>{
                datahtml = `
                <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
                <div class="ml-4 mb-2 mt-2">
                <p>Fecha del Log: ${item.log_fecha}</p>
                <p>Tipo de acción del Log: ${item.log_tipo}</p>
                <p>Usuario que realizo la acción del Log:</p>
                <p>
                C.I: ${item.usuario_cedula}. 
                Nombre: ${item.usuario_nombre}. 
                Apellido: ${item.usuario_apellido}.
                </p>
                </div>
                </div>
                `
                $(`#mostrarlogstabla3`).append(datahtml)
            })
            $(`#mostrarlogstabla3`).removeClass('d-none')
        }else{
            datahtml = `
            <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
            <p class="text-center mb-2 mt-2">No se pudo encontrar nada</p>
            </div>
            `
            $(`#mostrarlogstabla3`).html(datahtml)
            $(`#mostrarlogstabla3`).removeClass('d-none')
        }
        $(".cargandologs").addClass('d-none')
    }).fail(function (e) {
        $(".cargandologs").addClass('d-none')
        console.log(e)
    })
})

// Form Logs tabla 4
$(`#formlogtabla4`).on('submit',function(e){
    e.preventDefault()
    form = $(this).serialize()
    console.log(form)
    $(".cargandologs").removeClass('d-none')
    $(`#mostrarlogstabla4`).addClass('d-none')
    $(`#mostrarlogstabla4`).html('')

    $.post(`${direccionfull}Tabla4/MostrarLog4`, form, function () { }).done(function (e) {
        data = JSON.parse(e)
        console.log(data)
        datahtml = ''
        if (data.status) {

            datahtmlprimero = `
            <div class="mt-2 mb-2 border border-dark card-hover bg-success">
            <div class="ml-4 mb-2 mt-2">
            <p>Nombre del Equipo: ${data.nombrequipobuscar}</p>
            <p>Valor Operacional del Equipo: ${data.valorequipobuscar}</p>
            </div>
            </div>
            <hr>
            `
            $(`#mostrarlogstabla4`).append(datahtmlprimero)

            data.logsdata.map((item,index)=>{
                datahtml = `
                <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
                <div class="ml-4 mb-2 mt-2">
                <p>Fecha del Log: ${item.log_fecha}</p>
                <p>Tipo de acción del Log: ${item.log_tipo}</p>
                <p>Usuario que realizo la acción del Log:</p>
                <p>
                C.I: ${item.usuario_cedula}. 
                Nombre: ${item.usuario_nombre}. 
                Apellido: ${item.usuario_apellido}.
                </p>
                </div>
                </div>
                `
                $(`#mostrarlogstabla4`).append(datahtml)
            })
            $(`#mostrarlogstabla4`).removeClass('d-none')
        }else{
            datahtml = `
            <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
            <p class="text-center mb-2 mt-2">No se pudo encontrar nada</p>
            </div>
            `
            $(`#mostrarlogstabla4`).html(datahtml)
            $(`#mostrarlogstabla4`).removeClass('d-none')
        }
        $(".cargandologs").addClass('d-none')
    }).fail(function (e) {
        $(".cargandologs").addClass('d-none')
        console.log(e)
    })
})

// Form Logs tabla 5
$(`#formlogtabla5`).on('submit',function(e){
    e.preventDefault()
    form = $(this).serialize()
    console.log(form)
    $(".cargandologs").removeClass('d-none')
    $(`#mostrarlogstabla5`).addClass('d-none')
    $(`#mostrarlogstabla5`).html('')

    $.post(`${direccionfull}Tabla5/MostrarLog5`, form, function () { }).done(function (e) {
        data = JSON.parse(e)
        console.log(data)
        datahtml = ''
        if (data.status) {          
            datahtmlprimero = `
            <div class="mt-2 mb-2 border border-dark card-hover bg-success">
            <div class="ml-4 mb-2 mt-2">
            <p>Nombre del Equipo: ${data.nombrequipobuscar}</p>
            <p>Valor Operacional del Equipo: ${data.valorequipobuscar}</p>
            </div>
            </div>
            <hr>
            `
            $(`#mostrarlogstabla5`).append(datahtmlprimero)

            data.logsdata.map((item,index)=>{
                datahtml = `
                <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
                <div class="ml-4 mb-2 mt-2">
                <p>Fecha del Log: ${item.log_fecha}</p>
                <p>Tipo de acción del Log: ${item.log_tipo}</p>
                <p>Usuario que realizo la acción del Log:</p>
                <p>
                C.I: ${item.usuario_cedula}. 
                Nombre: ${item.usuario_nombre}. 
                Apellido: ${item.usuario_apellido}.
                </p>
                </div>
                </div>
                `
                $(`#mostrarlogstabla5`).append(datahtml)
            })
            $(`#mostrarlogstabla5`).removeClass('d-none')
        }else{
            datahtml = `
            <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
            <p class="text-center mb-2 mt-2">No se pudo encontrar nada</p>
            </div>
            `
            $(`#mostrarlogstabla5`).html(datahtml)
            $(`#mostrarlogstabla5`).removeClass('d-none')
        }
        $(".cargandologs").addClass('d-none')
    }).fail(function (e) {
        $(".cargandologs").addClass('d-none')
        console.log(e)
    })
})



// Form Logs tabla 6
$(`#formlogtabla6`).on('submit',function(e){
    e.preventDefault()
    form = $(this).serialize()
    console.log(form)
    $(".cargandologs").removeClass('d-none')
    $(`#mostrarlogstabla6`).addClass('d-none')
    $(`#mostrarlogstabla6`).html('')

    $.post(`${direccionfull}Tabla6/MostrarLog6`, form, function () { }).done(function (e) {
        data = JSON.parse(e)
        console.log(data)
        datahtml = ''
        if (data.status) {          
            datahtmlprimero = `
            <div class="mt-2 mb-2 border border-dark card-hover bg-success">
            <div class="ml-4 mb-2 mt-2">
            <p>Nombre del Equipo: ${data.nombrequipobuscar}</p>
            <p>Valor Operacional del Equipo: ${data.valorequipobuscar}</p>
            </div>
            </div>
            <hr>
            `
            $(`#mostrarlogstabla6`).append(datahtmlprimero)

            data.logsdata.map((item,index)=>{
                datahtml = `
                <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
                <div class="ml-4 mb-2 mt-2">
                <p>Fecha del Log: ${item.log_fecha}</p>
                <p>Tipo de acción del Log: ${item.log_tipo}</p>
                <p>Usuario que realizo la acción del Log:</p>
                <p>
                C.I: ${item.usuario_cedula}. 
                Nombre: ${item.usuario_nombre}. 
                Apellido: ${item.usuario_apellido}.
                </p>
                </div>
                </div>
                `
                $(`#mostrarlogstabla6`).append(datahtml)
            })
            $(`#mostrarlogstabla6`).removeClass('d-none')
        }else{
            datahtml = `
            <div class="mt-2 mb-2 border border-dark card-hover" style='border-radius: 10px'>
            <p class="text-center mb-2 mt-2">No se pudo encontrar nada</p>
            </div>
            `
            $(`#mostrarlogstabla6`).html(datahtml)
            $(`#mostrarlogstabla6`).removeClass('d-none')
        }
        $(".cargandologs").addClass('d-none')
    }).fail(function (e) {
        $(".cargandologs").addClass('d-none')
        console.log(e)
    })
})