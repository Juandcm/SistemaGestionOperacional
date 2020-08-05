<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json,text/html; charset=utf-8');

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
// use App\Models\UsuarioModel;
use CodeIgniter\I18n\Time;
use App\Models\Tabla;
use App\Models\Log;
use App\Controllers\FuncionesUtiles;
use App\Controllers\Tabla3;


class Tabla4 extends Controller
{
  protected $request;
  public $session = null;
  public $user = null;

  public function __construct()
  {
    $this->session = \Config\Services::session();
    // $this->user = new UsuarioModel();
    $this->tabla = new Tabla();
    $this->log = new Log();
    $this->funcion = new FuncionesUtiles();
  }

  public function mostrarfechascargadas()
  {
    $result = array();
    $tabla1_area1 = $this->tabla->mostrarfechascargadas('tabla4_area1', 'fecha_tab4_area1')->getResult();
    echo json_encode($tabla1_area1);
  }

  public function RegistroTabla4()
  {
    //Tabla4 Area 1:
    $equit4area1num1 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num1', FILTER_SANITIZE_STRING));
    // $equit4area1num2 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num2', FILTER_SANITIZE_STRING)); //Salida
    $equit4area1num3 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num3', FILTER_SANITIZE_STRING));
    // $equit4area1num4 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num4', FILTER_SANITIZE_STRING)); //Salida
    $equit4area1num5 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num5', FILTER_SANITIZE_STRING));
    $equit4area1num6 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num6', FILTER_SANITIZE_STRING));
    $equit4area1num7 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num7', FILTER_SANITIZE_STRING));
    $equit4area1num8 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num8', FILTER_SANITIZE_STRING));
    $equit4area1num9 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num9', FILTER_SANITIZE_STRING));
    $equit4area1num10 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num10', FILTER_SANITIZE_STRING));
    $equit4area1num11 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num11', FILTER_SANITIZE_STRING));
    $equit4area1num12 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num12', FILTER_SANITIZE_STRING));
    $equit4area1num13 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num13', FILTER_SANITIZE_STRING));
    $equit4area1num14 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num14', FILTER_SANITIZE_STRING));
    $equit4area1num15 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num15', FILTER_SANITIZE_STRING));
    $equit4area1num16 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num16', FILTER_SANITIZE_STRING));
    // $equit4area1num17 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num17', FILTER_SANITIZE_STRING)); //Salida
    $equit4area1num18 = $this->funcion->transformardecimales($this->request->getPost('equit4area1num18', FILTER_SANITIZE_STRING));

    //Tabla4 Area 2:
    $equit4area2num1 = $this->funcion->transformardecimales($this->request->getPost('equit4area2num1', FILTER_SANITIZE_STRING));
    $equit4area2num2 = $this->funcion->transformardecimales($this->request->getPost('equit4area2num2', FILTER_SANITIZE_STRING));
    $equit4area2num3 = $this->funcion->transformardecimales($this->request->getPost('equit4area2num3', FILTER_SANITIZE_STRING));

    $fechayactual = Time::now()->toDateString();
    $horactual = Time::now()->getHour();

    $fechahorainicial = $fechayactual." ".$horactual.":00:00";
    $fechahorafinal = $fechayactual." ".$horactual.":59:59";

    $tabla1 = 'tabla4_area1';
    $select1 = 'tabla4_area1_id';
    $arraybusqueda1 = ['fecha_tab4_area1 >='=>$fechahorainicial, 'fecha_tab4_area1 <='=>$fechahorafinal];

    $tabla2 = 'tabla4_area2';
    $select2 = 'tabla4_area2_id';
    $arraybusqueda2 = ['fecha_tab4_area2 >='=>$fechahorainicial, 'fecha_tab4_area2 <='=>$fechahorafinal];

    $arraydata1 = $this->tabla->buscaridtabla($tabla1, $select1, $arraybusqueda1)->getResult();
    $arraydata2 = $this->tabla->buscaridtabla($tabla2, $select2, $arraybusqueda2)->getResult();


    $data1 = [
      'tabla4_area1_id' => (count($arraydata1)>0)?$arraydata1[0]->$select1:null,
      'equipo1_tab4_area_1' => $equit4area1num1,
      'equipo3_tab4_area_1' => $equit4area1num3,
      'equipo5_tab4_area_1' => $equit4area1num5,
      'equipo6_tab4_area_1' => $equit4area1num6,
      'equipo7_tab4_area_1' => $equit4area1num7,
      'equipo8_tab4_area_1' => $equit4area1num8,
      'equipo9_tab4_area_1' => $equit4area1num9,
      'equipo10_tab4_area_1' => $equit4area1num10,
      'equipo11_tab4_area_1' => $equit4area1num11,
      'equipo12_tab4_area_1' => $equit4area1num12,
      'equipo13_tab4_area_1' => $equit4area1num13,
      'equipo14_tab4_area_1' => $equit4area1num14,
      'equipo15_tab4_area_1' => $equit4area1num15,
      'equipo16_tab4_area_1' => $equit4area1num16,
      'equipo18_tab4_area_1' => $equit4area1num18,
      'fecha_tab4_area1' => Time::now()->toDateTimeString(),
      'status_tab4_area1' => '1'
    ];
    $data2 = [
      'tabla4_area2_id' => (count($arraydata2)>0)?$arraydata2[0]->$select2:null,
      'equipo1_tab4_area_2' => $equit4area2num1,
      'equipo2_tab4_area_2' => $equit4area2num2,
      'equipo3_tab4_area_2' => $equit4area2num3,
      'fecha_tab4_area2' => Time::now()->toDateTimeString(),
      'status_tab4_area2' => '1'
    ];

    if (count($arraydata1)>0) {
      $where1 = ['tabla4_area1_id'=>$arraydata1[0]->$select1];
      $registrotabla1 = $this->tabla->EdiccionTabla($data1, $tabla1, $where1);
    }else{
      $registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla4_area1');
      $datamejorada1 = json_decode($registrotabla1);
    }

    if (count($arraydata2)>0) {
      $where2 = ['tabla4_area2_id'=>$arraydata2[0]->$select2];
      $registrotabla2 = $this->tabla->EdiccionTabla($data2, $tabla2, $where2);
    }else{
      $registrotabla2 = $this->tabla->RegistroTablas($data2, 'tabla4_area2');
      $datamejorada2 = json_decode($registrotabla2);
    }

    // Guardando el log
    $guardarlogs = [
      [
        'log_id' => null,
        'log_tabla' => 'tabla4_area1',
        'log_tipo' => 'registro del usuario',
        'log_fecha' => Time::now()->toDateTimeString(),
        'log_id_referencia' => (count($arraydata1)>0) ? $arraydata1[0]->$select1: $datamejorada1->retornoid,
        'usuario_id' => $this->session->get('usuario_id')
      ],
      [
        'log_id' => null,
        'log_tabla' => 'tabla4_area2',
        'log_tipo' => 'registro del usuario',
        'log_fecha' => Time::now()->toDateTimeString(),
        'log_id_referencia' => (count($arraydata2)>0) ? $arraydata2[0]->$select2: $datamejorada2->retornoid,
        'usuario_id' => $this->session->get('usuario_id')
      ],
    ];
    $this->log->RegistrarLog($guardarlogs);
    echo json_encode(array('data' => true));
  }

  public function MostrarDatosTabla4()
  {
    $this->tabla3 = new Tabla3(); //Instanciando la clase de la tabla 3
    $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);

    if ($fechas == '') {
      echo json_encode(array('data' => []));
    } else {
      $fechasnew = explode(' - ',  $fechas);
      $fechainicialmod = $fechasnew[0];
      $fechafinalmod = $fechasnew[1];

      $arraybusqueda1 = ['fecha_tab4_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab4_area1 <=' => $fechafinalmod . ' 12:59:59'];
      $arraybusqueda2 = ['fecha_tab4_area2 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab4_area2 <=' => $fechafinalmod . ' 12:59:59'];
      $arraybusqueda3 = ['fecha_tab3_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab3_area1 <=' => $fechafinalmod . ' 12:59:59'];
      $arraybusqueda4 = ['fecha_tab3_area2 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab3_area2 <=' => $fechafinalmod . ' 12:59:59'];
      $arraybusquedatabla6 = ['fecha_inicial_tab6_area1' => $fechainicialmod, 'fecha_final_tab6_area1' => $fechafinalmod];

      //Trayendo datos de la tabla 4
      $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla4_area1', $arraybusqueda1)->getResult();
      $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla4_area2', $arraybusqueda2)->getResult();

      //Trayendo datos de la tabla 3
      $datatabla3area1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area1', $arraybusqueda3)->getResult();
      $datatabla3area2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area2', $arraybusqueda4)->getResult();

      //Trayendo datos de la tabla 6
      $databusquedatabla6 = $this->tabla->mostrarTodosDatosTablasFechas('tabla6_area1', $arraybusquedatabla6)->getResult();

      if (count($data1)>0 || count($data2)>0 || count($datatabla3area1)>0 || count($datatabla3area2)>0 || count($databusquedatabla6)>0) {

      //Para hacer los calculos para la tabla 4 area 1 equipo 4 
      $arrayequipo6tabla3area1 = $this->tabla3->calculosalidatabla3($databusquedatabla6, $datatabla3area1, 'equipo7_tab3_area_1', 'equipo2_tab6_area_1', 'Área-1', 'Equipo-6', $fechainicialmod, $fechafinalmod); //Salida S1
      $arrayequipo6tabla3area2 = $this->tabla3->calculosalidatabla3($databusquedatabla6, $datatabla3area2, 'equipo7_tab3_area_2', 'equipo3_tab6_area_1', 'Área-2', 'Equipo-6', $fechainicialmod, $fechafinalmod); //Salida S2

      //Tabla 4 Area 1
      $arrayequipo1area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-1', 'equipo1_tab4_area_1', $fechas, '2');
      $arrayequipo2area1 = $this->calculosalidatabla4($databusquedatabla6, $data1, 'equipo3_tab4_area_1', 'equipo1_tab6_area_1', 'Área-1', 'Equipo-2', $fechainicialmod, $fechafinalmod);
      $arrayequipo3area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-3', 'equipo3_tab4_area_1', $fechas, '2');


      $arrayequipo5area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-5', 'equipo5_tab4_area_1', $fechas, '2');
      $arrayequipo6area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-6', 'equipo6_tab4_area_1', $fechas, '0');
      $arrayequipo7area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-7', 'equipo7_tab4_area_1', $fechas, '0');
      $arrayequipo8area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-8', 'equipo8_tab4_area_1', $fechas, '0');
      $arrayequipo9area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-9', 'equipo9_tab4_area_1', $fechas, '0');
      $arrayequipo10area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-10', 'equipo10_tab4_area_1', $fechas, '0');
      $arrayequipo11area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-11', 'equipo11_tab4_area_1', $fechas, '0');
      $arrayequipo12area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-12', 'equipo12_tab4_area_1', $fechas, '0');
      $arrayequipo13area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-13', 'equipo13_tab4_area_1', $fechas, '0');
      $arrayequipo14area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-14', 'equipo14_tab4_area_1', $fechas, '0');
      $arrayequipo15area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-15', 'equipo15_tab4_area_1', $fechas, '0');
      $arrayequipo16area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-16', 'equipo16_tab4_area_1', $fechas, '2');
      $arrayequipo18area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-18', 'equipo18_tab4_area_1', $fechas, '2');
      $arrayequipo17area1 = $this->calculosalidatabla4equipo17($data1, 'equipo18_tab4_area_1', 'Área-1', 'Equipo-17', $fechainicialmod, $fechafinalmod); //Salida S5

      $arrayequipo4area1 = $this->calculosalidatabla4equipo4($arrayequipo6tabla3area1, $arrayequipo6tabla3area2, $arrayequipo2area1, $arrayequipo17area1, 'Área-1', 'Equipo-4', $fechainicialmod, $fechafinalmod); //Salida S4

      //Tabla 4 Area 2
      $arrayequipo1area2 = $this->ordenardatosdatatable4($data2, 'Área-2', 'Equipo-1', 'equipo1_tab4_area_2', $fechas, '0');
      $arrayequipo2area2 = $this->ordenardatosdatatable4($data2, 'Área-2', 'Equipo-2', 'equipo2_tab4_area_2', $fechas, '0');
      $arrayequipo3area2 = $this->ordenardatosdatatable4($data2, 'Área-2', 'Equipo-3', 'equipo3_tab4_area_2', $fechas, '0');

      $arrayfinal = array(
        $arrayequipo1area1, $arrayequipo2area1, $arrayequipo3area1, $arrayequipo4area1, $arrayequipo5area1, $arrayequipo6area1, $arrayequipo7area1, $arrayequipo8area1, $arrayequipo9area1, $arrayequipo10area1, $arrayequipo11area1, $arrayequipo12area1, $arrayequipo13area1, $arrayequipo14area1, $arrayequipo15area1, $arrayequipo16area1, $arrayequipo17area1, $arrayequipo18area1,
        $arrayequipo1area2, $arrayequipo2area2, $arrayequipo3area2
      );
      echo json_encode(array('data' => $arrayfinal, 'arrayequipo4area1' => $arrayequipo4area1));
    }else{
     echo json_encode(array('data' => []));
   }
 }
}

public function buscarUsuariosTablaFechas4()
{
  $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);

  if ($fechas == '') {
    echo json_encode(array('status' => false));
  } else {
    $fechasnew = explode(' - ',  $fechas);
    $fechainicialmod = $fechasnew[0];
    $fechafinalmod = $fechasnew[1];
    $select = 'log_id, log_tabla, log_tipo, log_fecha, logs.usuario_id, usuario_cedula, usuario_nombre, usuario_apellido';

    $innerjoinlogs1 =  'tabla4_area1.tabla4_area1_id = logs.log_id_referencia';
    $arraybusquedalogs1 = ['fecha_tab4_area1 >=' => $fechainicialmod, 'fecha_tab4_area1 <=' => $fechafinalmod];

    $innerjoinlogs2 =  'tabla4_area2.tabla4_area2_id = logs.log_id_referencia';
    $arraybusquedalogs2 = ['fecha_tab4_area2 >=' => $fechainicialmod, 'fecha_tab4_area2 <=' => $fechafinalmod];

    $datalogs1 = $this->tabla->mostrarTodosDatosUsuariosTablas('tabla4_area1',$select,$innerjoinlogs1,$arraybusquedalogs1)->getResult();
    $datalogs2 = $this->tabla->mostrarTodosDatosUsuariosTablas('tabla4_area2',$select,$innerjoinlogs2,$arraybusquedalogs2)->getResult();

    if (count($datalogs1)>0 || count($datalogs2)>0) {
      $arrayuserfinal =array_merge($datalogs1,$datalogs2);
      $details = $this->funcion->unique_multidim_array($arrayuserfinal,'usuario_id'); 
      echo json_encode(array('status'=>true,'usuarios'=>$details));
    }else{
      echo json_encode(array('status'=>false));
    }
  }
}

public function MostrarDataPorHora4()
{
  // $fechamanana = Time::tomorrow()->toDateString();
  $fechatual = Time::now()->toDateString();
  $fechayer = Time::yesterday()->toDateString();
  $hora = Time::now()->hour;
    // Le resto 1 hora para que me traiga todos los datos de las tabla exceptuando la de la hora actual

  if ($hora == '0' || $hora == '1' || $hora == '2' || $hora == '3' || $hora == '4' || $hora == '5' || $hora == '6' || $hora == '7' || $hora == '8' || $hora == '9' || $hora == '10' || $hora == '11' || $hora == '12') {
    if ($hora == '0') {
      $horactual = '23';
    }else{
      $horactual = $hora;
    }
    $fechainicialmod = $fechatual.' '.$horactual.':00:00';
    $fechafinalmod = $fechatual. ' '.$horactual.':59:59';
  } else {
    $horactual = $hora;
    $fechainicialmod = $fechatual.' '.$horactual.':00:00';
    $fechafinalmod = $fechatual. ' '.$horactual.':59:59';
  }

  $arraybusqueda1 = ['fecha_tab4_area1 >=' => $fechainicialmod, 'fecha_tab4_area1 <=' => $fechafinalmod];
  $arraybusqueda2 = ['fecha_tab4_area2 >=' => $fechainicialmod, 'fecha_tab4_area2 <=' => $fechafinalmod];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla4_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla4_area2', $arraybusqueda2)->getResult();

  $datanumberseries = array();

        // Area 1
  $datanumberseries['equipo1_tab4_area_1'] = !isset($data1[0]->equipo1_tab4_area_1) ? '0' : $data1[0]->equipo1_tab4_area_1;
  $datanumberseries['equipo3_tab4_area_1'] = !isset($data1[0]->equipo3_tab4_area_1) ? '0' : $data1[0]->equipo3_tab4_area_1;
  $datanumberseries['equipo5_tab4_area_1'] = !isset($data1[0]->equipo5_tab4_area_1) ? '0' : $data1[0]->equipo5_tab4_area_1;
  $datanumberseries['equipo6_tab4_area_1'] = !isset($data1[0]->equipo6_tab4_area_1) ? '0' : $data1[0]->equipo6_tab4_area_1;
  $datanumberseries['equipo7_tab4_area_1'] = !isset($data1[0]->equipo7_tab4_area_1) ? '0' : $data1[0]->equipo7_tab4_area_1;
  $datanumberseries['equipo8_tab4_area_1'] = !isset($data1[0]->equipo8_tab4_area_1) ? '0' : $data1[0]->equipo8_tab4_area_1;
  $datanumberseries['equipo9_tab4_area_1'] = !isset($data1[0]->equipo9_tab4_area_1) ? '0' : $data1[0]->equipo9_tab4_area_1;
  $datanumberseries['equipo10_tab4_area_1'] = !isset($data1[0]->equipo10_tab4_area_1) ? '0' : $data1[0]->equipo10_tab4_area_1;
  $datanumberseries['equipo11_tab4_area_1'] = !isset($data1[0]->equipo11_tab4_area_1) ? '0' : $data1[0]->equipo11_tab4_area_1;
  $datanumberseries['equipo12_tab4_area_1'] = !isset($data1[0]->equipo12_tab4_area_1) ? '0' : $data1[0]->equipo12_tab4_area_1;
  $datanumberseries['equipo13_tab4_area_1'] = !isset($data1[0]->equipo13_tab4_area_1) ? '0' : $data1[0]->equipo13_tab4_area_1;
  $datanumberseries['equipo14_tab4_area_1'] = !isset($data1[0]->equipo14_tab4_area_1) ? '0' : $data1[0]->equipo14_tab4_area_1;
  $datanumberseries['equipo15_tab4_area_1'] = !isset($data1[0]->equipo15_tab4_area_1) ? '0' : $data1[0]->equipo15_tab4_area_1;
  $datanumberseries['equipo16_tab4_area_1'] = !isset($data1[0]->equipo16_tab4_area_1) ? '0' : $data1[0]->equipo16_tab4_area_1;
  $datanumberseries['equipo18_tab4_area_1'] = !isset($data1[0]->equipo18_tab4_area_1) ? '0' : $data1[0]->equipo18_tab4_area_1;

        // Area 2
  $datanumberseries['equipo1_tab4_area_2'] = !isset($data2[0]->equipo1_tab4_area_2) ? '0' : $data2[0]->equipo1_tab4_area_2;
  $datanumberseries['equipo2_tab4_area_2'] = !isset($data2[0]->equipo2_tab4_area_2) ? '0' : $data2[0]->equipo2_tab4_area_2;
  $datanumberseries['equipo3_tab4_area_2'] = !isset($data2[0]->equipo3_tab4_area_2) ? '0' : $data2[0]->equipo3_tab4_area_2;


  $arrayName = array(
    'status' => true,
    'datanumeros' => $datanumberseries,
  );
  echo json_encode($arrayName);
}



public function mostrarGrafica4()
{
  $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);
  $fechasnew = explode(' - ',  $fechas);
  $fechainicialmodprimera = $fechasnew[0];
  $fechafinalmodprimera = $fechasnew[1];
  $hora = Time::now()->hour;
    // Le resto 1 hora para que me traiga todos los datos de las tabla exceptuando la de la hora actual

  if ($hora == '0' || $hora == '1' || $hora == '2' || $hora == '3' || $hora == '4' || $hora == '5' || $hora == '6' || $hora == '7' || $hora == '8' || $hora == '9' || $hora == '10' || $hora == '11' || $hora == '12') {
    if ($hora == '0') {
      $unahorantes = '23';
    }else{
      $unahorantes = $hora;
    }
    $fechainicialmod = $fechainicialmodprimera.' 13:00:00';
    $fechafinalmod = $fechafinalmodprimera. ' '.$unahorantes.':59:59';
  } else {
    $unahorantes = $hora;
    $fechainicialmod = $fechainicialmodprimera. ' 13:00:00';
    $fechafinalmod = $fechafinalmodprimera. ' '.$unahorantes.':59:59';
  }

  $arraybusqueda1 = ['fecha_tab4_area1 >=' => $fechainicialmod, 'fecha_tab4_area1 <=' => $fechafinalmod];
  $arraybusqueda2 = ['fecha_tab4_area2 >=' => $fechainicialmod, 'fecha_tab4_area2 <=' => $fechafinalmod];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla4_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla4_area2', $arraybusqueda2)->getResult();

    // Variables para la libreria de los graficos
  $dividgrafica = 'graficatabla4';
    $legendata = ['Equipo T4 - A1-1', 'Equipo T4 - A1-10','Equipo T4 - A1-13'];
    $colores = ["#2962FF", "#4fc3f7", "#4fc4cc"];

    $seriesdata = array();
    $datanumberseries = array();

    if (count($data1)>0 || count($data2)>0) {

      foreach ($data1 as $key => $value) {
        // Area 1
        $datanumberseries['0'][] = $value->equipo1_tab4_area_1;
        $datanumberseries['1'][] = $value->equipo10_tab4_area_1;
        $datanumberseries['2'][] = $value->equipo13_tab4_area_1;
      }

      foreach ($legendata as $key => $value) {
        $seriesdata[] = [
          'name'=>$legendata[$key],
          'type'=>'line',
          'data'=>$datanumberseries[$key],
        ]; 
      }

      $arrayName = array(
        'status' => true,
        'arraybusqueda1' => $arraybusqueda1,
        'dividgrafica' => $dividgrafica,
        'legendata' => $legendata,
        'colores' => $colores,
        'seriesdata' => $seriesdata,
      );
      echo json_encode($arrayName);
    }else{
      foreach ($legendata as $key => $value) {
        $seriesdata[] = [
          'name'=>$legendata[$key],
          'type'=>'line',
          'data'=>[],
        ]; 
      }
      echo json_encode(array('status' => false,'arraybusqueda1' => $arraybusqueda1,'legendata' => $legendata,
        'colores' => $colores,'seriesdata' => $seriesdata));
    }
  }




public function llevandoDatosTabla6($fechainicialmod,$fechafinalmod)
{
  $fechas = $fechainicialmod." - ".$fechafinalmod;
  $arraybusqueda1 = ['fecha_tab4_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab4_area1 <=' => $fechafinalmod . ' 12:59:59'];
      //Trayendo datos de la tabla 4
  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla4_area1', $arraybusqueda1)->getResult();
      //Tabla 4 Area 1

  if (count($data1)>0) {
    $arrayequipo3area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-3', 'equipo3_tab4_area_1', $fechas, '2');

      // Preguntar por esta salida bien (si es 2 o 4 decimales para hacer los calculos en la tabla 6)
    $arrayequipo18area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-18', 'equipo18_tab4_area_1', $fechas, '4');
    return json_encode(array('status' => true,'arrayequipo3area1' => $arrayequipo3area1, 'arrayequipo18area1' => $arrayequipo18area1));
  }else{
    return json_encode(array('status' => false));
  }
}

public function calculosalidatabla4equipo4($arrayequipo6tabla3area1, $arrayequipo6tabla3area2, $arrayequipo2area1, $arrayequipo17area1, $area, $equipo, $fechainicialmod, $fechafinalmod)
{
  $idprimario = $area . "---" . $equipo . "---" . $fechainicialmod . " - " . $fechafinalmod;
  $result = array($idprimario, $area, $equipo);
  $sumatoria = 0;
    $promedio6am = 0; //18 horas
    $promedio12m = 0; //24 horas
    $iteraccionpromedio = 0;

    for ($i = 0; $i <= 23; $i++) {
      $equipot4area1num2 = !isset($arrayequipo2area1[($i + 3)]) ? '0' : $this->funcion->transformardecimales($arrayequipo2area1[($i + 3)]); //Fila 78
      $equipot4area1num17 = !isset($arrayequipo17area1[($i + 3)]) ? '0' : $this->funcion->transformardecimales($arrayequipo17area1[($i + 3)]); //Fila 93
      $equipot3area1num6 = !isset($arrayequipo6tabla3area1[($i + 3)]) ? '0' : $this->funcion->transformardecimales($arrayequipo6tabla3area1[($i + 3)]); //Fila 62
      $equipot3area2num6 = !isset($arrayequipo6tabla3area2[($i + 3)]) ? '0' : $this->funcion->transformardecimales($arrayequipo6tabla3area2[($i + 3)]); //Fila 72 

      // =G78-G93-G62/1000-G72/1000
      $calculo = $equipot4area1num2 - $equipot4area1num17 - $equipot3area1num6 / 1000 - $equipot3area2num6 / 1000;
      $sumatoria += $calculo;
      if ($calculo != '0') {
        $iteraccionpromedio++;
      }
      $result[] = number_format($calculo, '2', ',', '.');

      switch ($i) {
        case '17':
          $promedio6am = $iteraccionpromedio; //18 horas
          break;
          case '23':
          $promedio12m = $iteraccionpromedio; //24 horas
          $result[] = number_format($sumatoria / $promedio6am, '2', ',', '.');
          $result[] = number_format($sumatoria / $promedio12m, '2', ',', '.');
          break;
          default:
          break;
        }
      }
      return $result;
    }

    public function calculosalidatabla4equipo17($arrayequipo18, $nombreprimerequipo, $area, $equipo, $fechainicialmod, $fechafinalmod)
    {
      $idprimario = $area . "---" . $equipo . "---" . $fechainicialmod . " - " . $fechafinalmod;
      $result = array($idprimario, $area, $equipo);
      $sumatoria = 0;
    $promedio6am = 0; //18 horas
    $promedio12m = 0; //24 horas
    $iteraccionpromedio = 0;

    for ($i = 0; $i <= 23; $i++) {
      if ($i == '0') {
        $valornumero = !isset($arrayequipo18[$i]->$nombreprimerequipo) ? '0' : $arrayequipo18[$i]->$nombreprimerequipo;
        $calculo = $valornumero * 24;
        $sumatoria = $calculo;
        if ($calculo != '0' && isset($arrayequipo18[$i]->$nombreprimerequipo)) {
          $iteraccionpromedio++;
        }
        $result[] = number_format($calculo, '2', ',', '.');
      } else {
        $valornumeroprimero = !isset($arrayequipo18[$i]->$nombreprimerequipo) ? '0' : $arrayequipo18[$i]->$nombreprimerequipo;
        $valornumerosegundo = !isset($arrayequipo18[($i - 1)]->$nombreprimerequipo) ? '0' : $arrayequipo18[($i - 1)]->$nombreprimerequipo;
        $calculo = ($valornumeroprimero - $valornumerosegundo) * 24;
        $sumatoria += $calculo;
        if ($calculo != '0' && isset($arrayequipo18[$i]->$nombreprimerequipo) || isset($arrayequipo18[($i - 1)]->$nombreprimerequipo)) {
          $iteraccionpromedio++;
        }
        $result[] = number_format($calculo, '2', ',', '.');
      }
      switch ($i) {
        case '17':
          $promedio6am = $iteraccionpromedio; //18 horas
          break;
          case '23':
          $promedio12m = $iteraccionpromedio; //24 horas
          $result[] = number_format($sumatoria / $promedio6am, '2', ',', '.');
          $result[] = number_format($sumatoria / $promedio12m, '2', ',', '.');
          break;
          default:
          break;
        }
      }
      return $result;
    }


    public function calculosalidatabla4($databusquedatabla6, $arrayequipo7, $nombreprimerequipo, $nombrequipotab6, $area, $equipo, $fechainicialmod, $fechafinalmod)
    {
      $idprimario = $area . "---" . $equipo . "---" . $fechainicialmod . " - " . $fechafinalmod;
      $result = array($idprimario, $area, $equipo);
      $sumatoria = 0;
      $promedio6am = 18;
      $promedio12m = 24;

      for ($i = 0; $i <= 23; $i++) {
        if ($i == '0') {

          $nombreprimerequipo = !isset($arrayequipo7[$i])?'0':$arrayequipo7[$i]->equipo3_tab4_area_1;
          $nombrequipotab6 = !isset($databusquedatabla6[$i])?'0':$databusquedatabla6[$i]->equipo1_tab6_area_1;
          $calculo = ( $nombreprimerequipo - $nombrequipotab6 ) * 24;
          $sumatoria = $calculo;
          $result[] = number_format($calculo, '2', ',', '.');
        } else {
          $nombreprimerequipo = !isset($arrayequipo7[$i])?'0':$arrayequipo7[$i]->equipo3_tab4_area_1;
          $nombreprimerequipoanteriornew = !isset($arrayequipo7[($i - 1)])?'0':$arrayequipo7[($i - 1)]->equipo3_tab4_area_1;

          $calculo = ($nombreprimerequipo - $nombreprimerequipoanteriornew) * 24;
          $sumatoria += $calculo;
          $result[] = number_format($calculo, '2', ',', '.');
        }
        if ($i == '23') {
          $result[] = number_format($sumatoria / $promedio6am, '2', ',', '.');
          $result[] = number_format($sumatoria / $promedio12m, '2', ',', '.');
        }
      }
      return $result;
    }


    public function ordenardatosdatatable4($arraydata, $nombrearea, $nombreequipo, $nombrequipo, $fecha, $cantidadecimales)
    {
    $pm1 = !isset($arraydata[0]) ? '0' : $arraydata[0]->$nombrequipo; //Columna del excel G
    $pm2 = !isset($arraydata[1]) ? '0' : $arraydata[1]->$nombrequipo;
    $pm3 = !isset($arraydata[2]) ? '0' : $arraydata[2]->$nombrequipo;
    $pm4 = !isset($arraydata[3]) ? '0' : $arraydata[3]->$nombrequipo;
    $pm5 = !isset($arraydata[4]) ? '0' : $arraydata[4]->$nombrequipo;
    $pm6 = !isset($arraydata[5]) ? '0' : $arraydata[5]->$nombrequipo;
    $pm7 = !isset($arraydata[6]) ? '0' : $arraydata[6]->$nombrequipo;
    $pm8 = !isset($arraydata[7]) ? '0' : $arraydata[7]->$nombrequipo;
    $pm9 = !isset($arraydata[8]) ? '0' : $arraydata[8]->$nombrequipo;
    $pm10 = !isset($arraydata[9]) ? '0' : $arraydata[9]->$nombrequipo;
    $pm11 = !isset($arraydata[10]) ? '0' : $arraydata[10]->$nombrequipo;
    $am0 = !isset($arraydata[11]) ? '0' : $arraydata[11]->$nombrequipo;
    $am1 = !isset($arraydata[12]) ? '0' : $arraydata[12]->$nombrequipo;
    $am2 = !isset($arraydata[13]) ? '0' : $arraydata[13]->$nombrequipo;
    $am3 = !isset($arraydata[14]) ? '0' : $arraydata[14]->$nombrequipo;
    $am4 = !isset($arraydata[15]) ? '0' : $arraydata[15]->$nombrequipo;
    $am5 = !isset($arraydata[16]) ? '0' : $arraydata[16]->$nombrequipo;
    $am6 = !isset($arraydata[17]) ? '0' : $arraydata[17]->$nombrequipo; //Columna del excel X
    $am7 = !isset($arraydata[18]) ? '0' : $arraydata[18]->$nombrequipo;
    $am8 = !isset($arraydata[19]) ? '0' : $arraydata[19]->$nombrequipo;
    $am9 = !isset($arraydata[20]) ? '0' : $arraydata[20]->$nombrequipo;
    $am10 = !isset($arraydata[21]) ? '0' : $arraydata[21]->$nombrequipo;
    $am11 = !isset($arraydata[22]) ? '0' : $arraydata[22]->$nombrequipo;
    $pm12 = !isset($arraydata[23]) ? '0' : $arraydata[23]->$nombrequipo; //Columna del excel AD

    //Sacando promedios
    $promedio6am_calculo = $this->funcion->sacarcalculospromedio($arraydata, $nombrequipo, '17');
    $promedio12am_calculo = $this->funcion->sacarcalculospromedio($arraydata, $nombrequipo, '23');

    return array(
      '0' => $nombrearea . "---" . $nombreequipo . "---" . $fecha,
      '1' => $nombrearea,
      '2' => $nombreequipo,
      '3' => number_format($pm1, $cantidadecimales, ',', '.'), //G
      '4' => number_format($pm2, $cantidadecimales, ',', '.'),
      '5' => number_format($pm3, $cantidadecimales, ',', '.'),
      '6' => number_format($pm4, $cantidadecimales, ',', '.'),
      '7' => number_format($pm5, $cantidadecimales, ',', '.'),
      '8' => number_format($pm6, $cantidadecimales, ',', '.'),
      '9' => number_format($pm7, $cantidadecimales, ',', '.'),
      '10' => number_format($pm8, $cantidadecimales, ',', '.'),
      '11' => number_format($pm9, $cantidadecimales, ',', '.'),
      '12' => number_format($pm10, $cantidadecimales, ',', '.'),
      '13' => number_format($pm11, $cantidadecimales, ',', '.'),
      '14' => number_format($am0, $cantidadecimales, ',', '.'),
      '15' => number_format($am1, $cantidadecimales, ',', '.'),
      '16' => number_format($am2, $cantidadecimales, ',', '.'),
      '17' => number_format($am3, $cantidadecimales, ',', '.'),
      '18' => number_format($am4, $cantidadecimales, ',', '.'),
      '19' => number_format($am5, $cantidadecimales, ',', '.'),
      '20' => number_format($am6, $cantidadecimales, ',', '.'), //X
      '21' => number_format($am7, $cantidadecimales, ',', '.'),
      '22' => number_format($am8, $cantidadecimales, ',', '.'),
      '23' => number_format($am9, $cantidadecimales, ',', '.'),
      '24' => number_format($am10, $cantidadecimales, ',', '.'),
      '25' => number_format($am11, $cantidadecimales, ',', '.'),
      '26' => number_format($pm12, $cantidadecimales, ',', '.'), //AD
      '27' => number_format($promedio6am_calculo, '2', ',', '.'),
      '28' => number_format($promedio12am_calculo, '2', ',', '.'),
    );
  }

  public function EditarDatosTabla4()
  {
    $input = filter_input_array(INPUT_POST);
    $datos = $this->obtenerValoresTablaEditable($input);

    $numerotabla = '4';
    $numeroarea = $datos[0]['numeroarea'];
    $numeroequipo = $datos[0]['numeroequipo'];
    $fechainicialmod = $datos[0]['fechainicialmod'];
    $fechafinalmod = $datos[0]['fechafinalmod'];
    $datoparacambiar = $datos[1]['datoparacambiar'];
    $horawhere = $datos[1]['horawhere'];

    if ($horawhere == '00' || $horawhere == '01' || $horawhere == '02' || $horawhere == '03' || $horawhere == '04' || $horawhere == '05' || $horawhere == '06' || $horawhere == '07' || $horawhere == '08' || $horawhere == '09' || $horawhere == '10' || $horawhere == '11' || $horawhere == '12') {
      $fechabuscar = $fechafinalmod . " " . $horawhere;
    } else {
      $fechabuscar = $fechainicialmod . " " . $horawhere;
    }

    if (($numeroarea == '1' && $numeroequipo == '2') || ($numeroarea == '1' && $numeroequipo == '4') || ($numeroarea == '1' && $numeroequipo == '17')) {
      echo json_encode(array('status' => false, 'mensaje' => 'No puedes editar este campo ya que es una Salida no Editable', 'tabla' => $numerotabla));
    } else {
      $nombrecampoactualizar = "equipo" . $numeroequipo . "_tab" . $numerotabla . "_area_" . $numeroarea;
      $fechaparabuscarwhere = "fecha_tab" . $numerotabla . "_area" . $numeroarea;
      $nombretabla = "tabla" . $numerotabla . "_area" . $numeroarea;
      $nombreidtabla = $nombretabla . "_id";

      $retornobusqueda = $this->tabla->buscarIdPorFecha($nombretabla, $fechaparabuscarwhere, $fechabuscar)->getResult();
      if (count($retornobusqueda)>0) {
        $idtabla = $retornobusqueda[0]->$nombreidtabla;
        $datosactualizar = [$nombrecampoactualizar => $datoparacambiar];
        $where = [$nombreidtabla => $idtabla];
        $edicciontabla = $this->tabla->EdiccionTabla($datosactualizar, $nombretabla, $where);

            // Guardando el log
        $guardarlogs = [
          [
            'log_id' => null,
            'log_tabla' => $nombretabla,
            'log_tipo' => 'editado',
            'log_fecha' => Time::now()->toDateTimeString(),
            'log_id_referencia' => $idtabla,
            'usuario_id' => $this->session->get('usuario_id')
          ]
        ];
        $this->log->RegistrarLog($guardarlogs);
        if ($edicciontabla == '1') {
          echo json_encode(array('status' => true, 'data' => $edicciontabla, 'tabla' => $numerotabla));
        } else {
          echo json_encode(array('status' => false,'mensaje'=>'No se pudo editar','tabla' => $numerotabla));
        }
      }else{
       echo json_encode(array('status' => false,'mensaje'=>'No se puede editar','tabla' => $numerotabla));
     }
   }
 }


 public function obtenerValoresTablaEditable($valoresinput)
 {
  $i = 0;
  $data = array();
    // $i == '0' //accion_id // $i == '1' //variable con el nombre del campo para actualizar // $i == '2' //action == edit
  foreach ($valoresinput as $key => $value) {
    if ($i == '0') {
      $fechaequipoarea = explode('---', $value);

        //Para traerme el numero del area
      $area = $fechaequipoarea[0];
      $explodearea = explode('-', $area);
      $numeroarea = $explodearea[1];

        //Para traerme el numero del equipo
      $equipo = $fechaequipoarea[1];
      $explodeequipo = explode('-', $equipo);
      $numeroequipo = $explodeequipo[1];

        //Para traerme las fechas
      $fechas = $fechaequipoarea[2];
      $fechasnew = explode(' - ', $fechas);
      $fechainicialmod = $fechasnew[0];
      $fechafinalmod = $fechasnew[1];

      $data[] = [
        'numeroarea' =>  $numeroarea,
        'numeroequipo' =>  $numeroequipo,
        'fechainicialmod' =>  $fechainicialmod,
        'fechafinalmod' =>  $fechafinalmod,
      ];
    }
    if ($i == '1') {
      $conversioncomaporpunto = $this->funcion->transformardecimales($this->request->getPost($key, FILTER_SANITIZE_STRING));
      $data[] = [
        'horawhere' =>  $key,
        'datoparacambiar' => $conversioncomaporpunto
      ];
    }
    $i++;
  }
  return $data;
}

public function llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod)
{
  $fechas = $fechainicialmod." - ".$fechafinalmod;
  $arraybusqueda1 = ['fecha_tab4_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab4_area1 <=' => $fechafinalmod . ' 12:59:59'];
  $arraybusquedatabla6 = ['fecha_inicial_tab6_area1' => $fechainicialmod, 'fecha_final_tab6_area1' => $fechafinalmod];

    //Trayendo datos de la tabla 4
  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla4_area1', $arraybusqueda1)->getResult();
      //Trayendo datos de la tabla 6
  $databusquedatabla6 = $this->tabla->mostrarTodosDatosTablasFechas('tabla6_area1', $arraybusquedatabla6)->getResult();


  if (count($data1)>0  && count($databusquedatabla6)>0) {
      //Tabla 4 Area 1
      $arrayequipo2area1 = $this->calculosalidatabla4($databusquedatabla6, $data1, 'equipo3_tab4_area_1', 'equipo1_tab6_area_1', 'Área-1', 'Equipo-2', $fechainicialmod, $fechafinalmod); //Salida S3
      $arrayequipo14area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-14', 'equipo14_tab4_area_1', $fechas, '0');
      $arrayequipo15area1 = $this->ordenardatosdatatable4($data1, 'Área-1', 'Equipo-15', 'equipo15_tab4_area_1', $fechas, '0');

      return json_encode(array('status' => true,
        'arrayequipo2area1' => $arrayequipo2area1, 
        'arrayequipo14area1' => $arrayequipo14area1, 'arrayequipo15area1' => $arrayequipo15area1));
    }else{
      return json_encode(array('status' => false));
    }
  }

  public function MostrarLog4()
  {
    $areatabla4 = $this->funcion->transformardecimales($this->request->getPost('areatabla4', FILTER_SANITIZE_STRING));
    $equipoareatabla4 = $this->funcion->transformardecimales($this->request->getPost('equipoareatabla4', FILTER_SANITIZE_STRING));
    $fechalogtabla4 = $this->funcion->transformardecimales($this->request->getPost('fechalogtabla4', FILTER_SANITIZE_STRING));
    $tiempologtabla4 = $this->funcion->transformardecimales($this->request->getPost('tiempologtabla4', FILTER_SANITIZE_STRING));

    $numerotabla = '4';
    $tabla = 'tabla'.$numerotabla.'_area'.$areatabla4;

    $arrayhora = explode(':', $tiempologtabla4);
    $horaseleccionada = $arrayhora[0];

    $selectidtabla = $tabla.'_id';
    $fecha = $fechalogtabla4." ".$horaseleccionada;
    $buscarfecha = 'fecha_tab'.$numerotabla.'_area'.$areatabla4;
    $where = [$buscarfecha.' >= '=>$fecha.':00',$buscarfecha.' <= '=>$fecha.':59'];


    $tablaid = $this->tabla->buscaridtabla($tabla, $selectidtabla, $where)->getResult();

    if (count($tablaid)>0) {
      $nombrequipobuscar = 'equipo'.$equipoareatabla4.'_tab'.$numerotabla.'_area_'.$areatabla4;
      $select = 'log_tabla, log_tipo, log_id_referencia, log_fecha, usuario_cedula, usuario_nombre, usuario_apellido,'.$nombrequipobuscar;
      $valoridtabla = $tablaid[0]->$selectidtabla;
      $innerjoinlogs =  $tabla.'.'.$selectidtabla.' = logs.log_id_referencia';
      $wherejoin = ['log_id_referencia' => $valoridtabla,'log_tabla'=>$tabla];

      $logsdata = $this->tabla->mostrarTodosDatosLogsTablas($tabla,$select,$innerjoinlogs,$wherejoin)->getResult();

      if (count($logsdata)>0) {
        $arrayName = array(          
          'status' => true,
          'logsdata' => $logsdata,
          'nombrequipobuscar' => $nombrequipobuscar,
          'valorequipobuscar' => $logsdata[0]->$nombrequipobuscar,
        );
      }else{
        $arrayName = array(          
          'status' => false,
        );
      }
    }else{
      $arrayName = array(
        'status' => false,
      );
    }
    echo json_encode($arrayName);
  }
}
