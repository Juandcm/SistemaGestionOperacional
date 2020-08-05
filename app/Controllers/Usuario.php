<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json,text/html; charset=utf-8');

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\UsuarioModel;
use CodeIgniter\I18n\Time;

class Usuario extends Controller
{
  protected $request;
  public $session = null;
  public $user = null;
  public $email = null;

  public function __construct()
  {
    $this->session = \Config\Services::session();
    $this->email = \Config\Services::email();
    $this->user = new UsuarioModel();
  }

  public function login()
  {
    $user_email = $this->request->getPost('correo', FILTER_SANITIZE_STRING);
    $user_password = $this->request->getPost('contrasena', FILTER_SANITIZE_STRING);
    $datos = $this->user->login($user_email)->getResult();
    if (count($datos) >= 1) {
      if (password_verify($user_password, $datos[0]->usuario_clave_red)) {
        $dataUser = array(
          'usuario_id' => $datos[0]->usuario_id,
          'usuario_cedula' => $datos[0]->usuario_cedula,
          'usuario_nombre' => $datos[0]->usuario_nombre,
          'usuario_apellido' => $datos[0]->usuario_apellido,
          'usuario_telefono' => $datos[0]->usuario_telefono,
          'usuario_fecha_nac' => $datos[0]->usuario_fecha_nac,
          'usuario_direccion' => $datos[0]->usuario_direccion,
          'usuario_correo' => $datos[0]->usuario_correo,
          'usuario_foto' => $datos[0]->usuario_foto,
          'usuario_indicador_red' => $datos[0]->usuario_indicador_red,
          'usuario_clave_red' => $datos[0]->usuario_clave_red,
          'usuario_tipo' => $datos[0]->usuario_tipo,
          'usuario_status' => $datos[0]->usuario_status,
          'usuario_inicio_session' => Time::now('America/Caracas', 'es_VE')->toDateTimeString(),
        );
        $this->session->set($dataUser);
        echo json_encode(array('status' => true, 'user' => $dataUser));
      } else {
        echo json_encode(array('status' => false));
      }
    } else {
      echo json_encode(array('status' => false));
    }
  }

  public function uploadImage()
  {
    $file = $this->request->getFile('file');
    if ($file->isValid() && !$file->hasMoved()) {
      $newName = $file->getRandomName();
      $lugar = 'uploads/foto_usuario/' . date("d_m_y");
      $file->move($lugar, $newName, true);
      echo $lugar . "/" . $newName;
    } else {
      echo false;
    }
  }

  public function mostrarTodosUsuario()
  {
    $result = array();
    $usuario_tiposession = $this->session->get('usuario_tipo');

    $data = $this->user->mostrarTodosUsuario();
    $datos = $data->getResult();
    foreach ($datos as $key => $value) {
      if ($value->usuario_foto != "") {
        $foto = '<img src="' . base_url() . '/' . $value->usuario_foto . '" class="rounded-circle" width="50" />';
        $nombre = '<a href="javascript:void(0)" onclick="verImagenDetallada(\'' . base_url() . '/' . $value->usuario_foto . '\')">' . $foto . ' ' . $value->usuario_nombre . ' ' . $value->usuario_apellido . '</a>';
      } else {
        $nombre = '<a href="javascript:void(0)">' . $value->usuario_nombre . ' ' . $value->usuario_apellido . '</a>';
      }

      switch ($value->usuario_tipo) {
        case '0':
        $typeuser = '<span class="label label-warning">Operador</span>';
        break;
        case '1':
        $typeuser = '<span class="label label-success">Administrador</span>';
        break;
        case '2':
        $typeuser = '<span class="label label-info">Supervisor</span>';
        break;
        case '3':
        $typeuser = '<span class="label label-primary">Fin de Semana</span>';
        break;
        default:
        break;
      }


      if ($value->usuario_status == '1') {
        $typestatus = '<span class="label label-success">Habilitado</span>';
        $btnstatus = '<a class="dropdown-item" href="javascript:void(0)" onclick="bilitarusuario(\'' . $value->usuario_id . '\',\'0\')">
        <i class="fas fa-eye-slash"></i> Desabilitar
        </a>';
      } else {
        $typestatus = '<span class="label label-danger">Desabilitado</span>';
        $btnstatus = '<a class="dropdown-item" href="javascript:void(0)" onclick="bilitarusuario(\'' . $value->usuario_id . '\',\'1\')">
        <i class="fas fa-eye"></i> Habilitar
        </a>';
      }

      $buttons = '<div class="btn-group">
      <button type="button" class="btn btn-dark dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-original-title="Opciones" aria-hidden="true">
      <i class="ti-settings"></i>
      </button>
      <div class="dropdown-menu animated fadeIn" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px); background: #ccc;">
      <a class="dropdown-item" href="javascript:void(0)" onclick="editarusuariodatatable(\'' . $value->usuario_id . '\',
      \'' . $value->usuario_cedula  . '\',
      \'' . $value->usuario_nombre . '\',
      \'' . $value->usuario_apellido . '\',
      \'' . $value->usuario_telefono . '\',
      \'' . $value->usuario_fecha_nac . '\',
      \'' . $value->usuario_direccion . '\',
      \'' . $value->usuario_correo . '\',
      \'' . $value->usuario_foto . '\',
      \'' . $value->usuario_indicador_red . '\',
      \'' . $value->usuario_clave_red . '\',
      \'' . $value->usuario_tipo . '\',
      \'' . "0" . '\',
      \'' . $usuario_tiposession . '\')">
      <i class="ti-pencil-alt"></i> Editar
      </a>
      ' . $btnstatus . '
      </div>
      </div>
      ';

      $result[] = array(
        "0" => $nombre,
        "1" => $value->usuario_cedula,
        "2" => $value->usuario_correo,
        "3" => $value->usuario_telefono,
        "4" => $value->usuario_fecha_nac,
        "5" => $value->usuario_direccion,
        "6" => $typeuser,
        "7" => $typestatus,
        "8" => $buttons,
      );
    }
    $json_data = array(
      "data" => $result
    );
    echo json_encode($json_data);
  }

  public function registrarUsuario()
  {
    $nameRegistro = $this->request->getPost('nameRegistro', FILTER_SANITIZE_STRING);
    $emailRegistro = $this->request->getPost('emailRegistro', FILTER_SANITIZE_STRING);
    $phoneRegistro = $this->request->getPost('phoneRegistro', FILTER_SANITIZE_STRING);
    $urlfotoregistro = $this->request->getPost('urlfotoregistro', FILTER_SANITIZE_STRING);
    $selectRolRegistro = $this->request->getPost('selectRolRegistro', FILTER_SANITIZE_STRING);
    $indicadorderedRegistro = $this->request->getPost('indicadorderedRegistro', FILTER_SANITIZE_STRING);
    $clavederedRegistro = $this->request->getPost('clavederedRegistro', FILTER_SANITIZE_STRING);
    $apellidoRegistro = $this->request->getPost('apellidoRegistro', FILTER_SANITIZE_STRING);
    $cedulaRegistro = $this->request->getPost('cedulaRegistro', FILTER_SANITIZE_STRING);
    $direccionRegistro = $this->request->getPost('direccionRegistro', FILTER_SANITIZE_STRING);
    $fechanacimientoRegistro = $this->request->getPost('fechanacimientoRegistro', FILTER_SANITIZE_STRING);
    $pass = password_hash($clavederedRegistro, PASSWORD_BCRYPT);

if ($selectRolRegistro != '') {
    $array = [
      'usuario_cedula' => $cedulaRegistro,
      'usuario_nombre'   => $nameRegistro,
      'usuario_apellido'   => $apellidoRegistro,
      'usuario_correo'  => $emailRegistro,
      'usuario_indicador_red'  => $indicadorderedRegistro,
      'usuario_clave_red' => $pass,
      'usuario_foto' => $urlfotoregistro,
      'usuario_telefono' => $phoneRegistro,
      'usuario_fecha_nac' => $fechanacimientoRegistro,
      'usuario_direccion' => $direccionRegistro,
      'usuario_tipo' => $selectRolRegistro,
      'usuario_status' => '1'
    ];
}else{
      $array = [
      'usuario_cedula' => $cedulaRegistro,
      'usuario_nombre'   => $nameRegistro,
      'usuario_apellido'   => $apellidoRegistro,
      'usuario_correo'  => $emailRegistro,
      'usuario_indicador_red'  => $indicadorderedRegistro,
      'usuario_clave_red' => $pass,
      'usuario_foto' => $urlfotoregistro,
      'usuario_telefono' => $phoneRegistro,
      'usuario_fecha_nac' => $fechanacimientoRegistro,
      'usuario_direccion' => $direccionRegistro,
      'usuario_status' => '1'
    ];
}

    $insertar = $this->user->registrarUsuario($array);
    if ($insertar) {
      echo json_encode(array('status' => true));
    } else {
      echo json_encode(array('status' => false));
    }
  }

  public function editarUsuario()
  {
    $iduserEditar = $this->request->getPost('iduserEditar', FILTER_SANITIZE_STRING);
    $nameEditar = $this->request->getPost('nameEditar', FILTER_SANITIZE_STRING);
    $emailEditar = $this->request->getPost('emailEditar', FILTER_SANITIZE_STRING);
    $phoneEditar = $this->request->getPost('phoneEditar', FILTER_SANITIZE_STRING);
    $urlfotoEditar = $this->request->getPost('urlfotoEditar', FILTER_SANITIZE_STRING);
    $selectRolEditar = $this->request->getPost('selectRolEditar', FILTER_SANITIZE_STRING);
    $apellidoEditar = $this->request->getPost('apellidoEditar', FILTER_SANITIZE_STRING);
    $cedulaEditar = $this->request->getPost('cedulaEditar', FILTER_SANITIZE_STRING);
    $direccionEditar = $this->request->getPost('direccionEditar', FILTER_SANITIZE_STRING);
    $fechanacimientoEditar = $this->request->getPost('fechanacimientoEditar', FILTER_SANITIZE_STRING);
    $indicadorderedEditar = $this->request->getPost('indicadorderedEditar', FILTER_SANITIZE_STRING);
    $clavederedEditar = $this->request->getPost('clavederedEditar', FILTER_SANITIZE_STRING);

    $tipodeaccion = $this->request->getPost('tipodeaccion', FILTER_SANITIZE_STRING);

    $tiempoactual = Time::now('America/Caracas', 'es_VE')->toDateTimeString();

    $arrayeditar = [
      'usuario_id' => $iduserEditar,
      'usuario_cedula' => $cedulaEditar,
      'usuario_nombre'   => $nameEditar,
      'usuario_apellido'  => $apellidoEditar,
      'usuario_telefono' => $phoneEditar,
      'usuario_fecha_nac' => $fechanacimientoEditar,
      'usuario_direccion' => $direccionEditar,
      'usuario_correo'  => $emailEditar,
      'usuario_foto' => $urlfotoEditar,
      'usuario_indicador_red' => $indicadorderedEditar,
      'usuario_clave_red' => $clavederedEditar,
      'usuario_tipo' => $selectRolEditar,
    ];

    $editar = $this->user->editarUsuario($arrayeditar);
    if ($editar == '1') {
      if ($tipodeaccion == '1') {

        $fotouser = ($urlfotoEditar != '')?$urlfotoEditar:$this->session->get('usuario_foto');
        $tipouser = ($selectRolEditar != '')?$selectRolEditar:$this->session->get('usuario_tipo');

        $arrayeditarsession = [
          'usuario_id' => $this->session->get('usuario_id'),
          'usuario_cedula' => $cedulaEditar,
          'usuario_nombre'   => $nameEditar,
          'usuario_apellido'  => $apellidoEditar,
          'usuario_telefono' => $phoneEditar,
          'usuario_fecha_nac' => $fechanacimientoEditar,
          'usuario_direccion' => $direccionEditar,
          'usuario_correo'  => $emailEditar,
          'usuario_foto' => $fotouser,
          'usuario_indicador_red' => $indicadorderedEditar,
          'usuario_clave_red' => $clavederedEditar,
          'usuario_tipo' => $tipouser,
          'usuario_status' => $this->session->get('usuario_status'),
          'usuario_inicio_session' => $tiempoactual,
        ];
        $this->session->set($arrayeditarsession);
        echo json_encode(array('status' => true,'usuario_inicio_session'=> $tiempoactual));
      } else {
        echo json_encode(array('status' => true));
      }
    } else {
      echo json_encode(array('status' => false, 'user' => $array));
    }
  }

  public function bilitarUsuario()
  {
    $id = $this->request->getPost('id', FILTER_SANITIZE_STRING);
    $tipo = $this->request->getPost('tipo', FILTER_SANITIZE_STRING);

    $array = [
      'usuario_id' => $id,
      'usuario_status' => $tipo,
    ];
    $editar = $this->user->bilitarUsuario($array);
    if ($editar == '1') {
      echo json_encode(array('status' => true));
    } else {
      echo json_encode(array('status' => false));
    }
  }


  public function logout()
  {
    $this->session->destroy();
    return redirect()->to(base_url());
  }

  public function MantenerSession()
  {
    $tiempoactual = Time::now('America/Caracas', 'es_VE')->toDateTimeString();
    $dataUser = array(
      'usuario_id' => $this->session->get('usuario_id'),
      'usuario_cedula' => $this->session->get('usuario_cedula'),
      'usuario_nombre' => $this->session->get('usuario_nombre'),
      'usuario_apellido' => $this->session->get('usuario_apellido'),
      'usuario_telefono' => $this->session->get('usuario_telefono'),
      'usuario_fecha_nac' => $this->session->get('usuario_fecha_nac'),
      'usuario_direccion' => $this->session->get('usuario_direccion'),
      'usuario_correo' => $this->session->get('usuario_correo'),
      'usuario_foto' => $this->session->get('usuario_foto'),
      'usuario_indicador_red' => $this->session->get('usuario_indicador_red'),
      'usuario_clave_red' => $this->session->get('usuario_clave_red'),
      'usuario_tipo' => $this->session->get('usuario_tipo'),
      'usuario_status' => $this->session->get('usuario_status'),
      'usuario_inicio_session' => $tiempoactual,
    );
    $this->session->set($dataUser);
    $arrayName = array('usuario_inicio_session' => $tiempoactual );
    echo json_encode($arrayName);
  }
}
