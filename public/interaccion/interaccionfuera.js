// direccionfull = 'http://localhost/bicicletappci/public/';
direccionfull = `http://localhost/SGO/sistema/public/`

$('[data-toggle="tooltip"]').tooltip();
$(".preloader").fadeOut();
$("#verificarform").slideUp();

var swalWithBootstrapButtons = swal.mixin({
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false
});

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


$('#btnentrar').on('click', function () {
  $.ajax({
    url: `${direccionfull}Usuario/login`,
    type: "POST",
    data: $('#loginformulario').serialize(),
    dataType: "JSON",
    success: function (data) {
      // console.log(data)
      if (data.status) {
        window.location.reload();
      } else {
        alertasweet('error', 'Error', 'Datos incorrectos')
      }
    },
    error: function (error) {
      console.log(error)
    }
  });
})