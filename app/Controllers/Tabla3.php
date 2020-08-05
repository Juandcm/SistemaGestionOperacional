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

class Tabla3 extends Controller
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


  public function RegistroTabla3()
  {
    //Tabla3 Area 1:
    $equit3area1num1 = $this->funcion->transformardecimales($this->request->getPost('equit3area1num1', FILTER_SANITIZE_STRING));
    $equit3area1num2 = $this->funcion->transformardecimales($this->request->getPost('equit3area1num2', FILTER_SANITIZE_STRING));
    $equit3area1num3 = $this->funcion->transformardecimales($this->request->getPost('equit3area1num3', FILTER_SANITIZE_STRING));
    $equit3area1num4 = $this->funcion->transformardecimales($this->request->getPost('equit3area1num4', FILTER_SANITIZE_STRING));
    $equit3area1num5 = $this->funcion->transformardecimales($this->request->getPost('equit3area1num5', FILTER_SANITIZE_STRING));
    // $equit3area1num6 = $this->funcion->transformardecimales($this->request->getPost('equit3area1num6', FILTER_SANITIZE_STRING)); //Salida
    $equit3area1num7 = $this->funcion->transformardecimales($this->request->getPost('equit3area1num7', FILTER_SANITIZE_STRING));

    //Tabla3 Area 2:
    $equit3area2num1 = $this->funcion->transformardecimales($this->request->getPost('equit3area2num1', FILTER_SANITIZE_STRING));
    $equit3area2num2 = $this->funcion->transformardecimales($this->request->getPost('equit3area2num2', FILTER_SANITIZE_STRING));
    $equit3area2num3 = $this->funcion->transformardecimales($this->request->getPost('equit3area2num3', FILTER_SANITIZE_STRING));
    $equit3area2num4 = $this->funcion->transformardecimales($this->request->getPost('equit3area2num4', FILTER_SANITIZE_STRING));
    $equit3area2num5 = $this->funcion->transformardecimales($this->request->getPost('equit3area2num5', FILTER_SANITIZE_STRING));
    // $equit3area2num6 = $this->funcion->transformardecimales($this->request->getPost('equit3area2num6', FILTER_SANITIZE_STRING)); //Salida
    $equit3area2num7 = $this->funcion->transformardecimales($this->request->getPost('equit3area2num7', FILTER_SANITIZE_STRING));


    $fechayactual = Time::now()->toDateString();
    $horactual = Time::now()->getHour();

    $fechahorainicial = $fechayactual." ".$horactual.":00:00";
    $fechahorafinal = $fechayactual." ".$horactual.":59:59";

    $tabla1 = 'tabla3_area1';
    $select1 = 'tabla3_area1_id';
    $arraybusqueda1 = ['fecha_tab3_area1 >='=>$fechahorainicial, 'fecha_tab3_area1 <='=>$fechahorafinal];

    $tabla2 = 'tabla3_area2';
    $select2 = 'tabla3_area2_id';
    $arraybusqueda2 = ['fecha_tab3_area2 >='=>$fechahorainicial, 'fecha_tab3_area2 <='=>$fechahorafinal];

    $arraydata1 = $this->tabla->buscaridtabla($tabla1, $select1, $arraybusqueda1)->getResult();
    $arraydata2 = $this->tabla->buscaridtabla($tabla2, $select2, $arraybusqueda2)->getResult();


    $data1 = [
      'tabla3_area1_id' => (count($arraydata1)>0)?$arraydata1[0]->$select1:null,
      'equipo1_tab3_area_1' => $equit3area1num1,
      'equipo2_tab3_area_1' => $equit3area1num2,
      'equipo3_tab3_area_1' => $equit3area1num3,
      'equipo4_tab3_area_1' => $equit3area1num4,
      'equipo5_tab3_area_1' => $equit3area1num5,
      'equipo7_tab3_area_1' => $equit3area1num7,
      'fecha_tab3_area1' => Time::now()->toDateTimeString(),
      'status_tab3_area1' => '1'
    ];
    $data2 = [
      'tabla3_area2_id' => (count($arraydata2)>0)?$arraydata2[0]->$select2:null,
      'equipo1_tab3_area_2' => $equit3area2num1,
      'equipo2_tab3_area_2' => $equit3area2num2,
      'equipo3_tab3_area_2' => $equit3area2num3,
      'equipo4_tab3_area_2' => $equit3area2num4,
      'equipo5_tab3_area_2' => $equit3area2num5,
      'equipo7_tab3_area_2' => $equit3area2num7,
      'fecha_tab3_area2' => Time::now()->toDateTimeString(),
      'status_tab3_area2' => '1'
    ];


    if (count($arraydata1)>0) {
      $where1 = ['tabla3_area1_id'=>$arraydata1[0]->$select1];
      $registrotabla1 = $this->tabla->EdiccionTabla($data1, $tabla1, $where1);
    }else{
      $registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla3_area1');
      $datamejorada1 = json_decode($registrotabla1);
    }

    if (count($arraydata2)>0) {
      $where2 = ['tabla3_area2_id'=>$arraydata2[0]->$select2];
      $registrotabla2 = $this->tabla->EdiccionTabla($data2, $tabla2, $where2);
    }else{
      $registrotabla2 = $this->tabla->RegistroTablas($data2, 'tabla3_area2');
      $datamejorada2 = json_decode($registrotabla2);
    }

    // Guardando el log
    $guardarlogs = [
      [
        'log_id' => null,
        'log_tabla' => 'tabla3_area1',
        'log_tipo' => 'registro del usuario',
        'log_fecha' => Time::now()->toDateTimeString(),
        'log_id_referencia' => (count($arraydata1)>0) ? $arraydata1[0]->$select1: $datamejorada1->retornoid,
        'usuario_id' => $this->session->get('usuario_id')
      ],
      [
        'log_id' => null,
        'log_tabla' => 'tabla3_area2',
        'log_tipo' => 'registro del usuario',
        'log_fecha' => Time::now()->toDateTimeString(),
        'log_id_referencia' => (count($arraydata2)>0) ? $arraydata2[0]->$select2: $datamejorada2->retornoid,
        'usuario_id' => $this->session->get('usuario_id')
      ],
    ];
    $this->log->RegistrarLog($guardarlogs);
    echo json_encode(array('data' => true));
  }

  public function mostrarfechascargadas()
  {
    $result = array();
    $tabla1_area1 = $this->tabla->mostrarfechascargadas('tabla3_area1', 'fecha_tab3_area1')->getResult();
    echo json_encode($tabla1_area1);
  }

  public function MostrarDatosTabla3()
  {
    $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);

    if ($fechas == '') {
      echo json_encode(array('data' => []));
    } else {
      $fechasnew = explode(' - ',  $fechas);
      $fechainicialmod = $fechasnew[0];
      $fechafinalmod = $fechasnew[1];
      $arraybusqueda1 = ['fecha_tab3_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab3_area1 <=' => $fechafinalmod . ' 12:59:59'];
      $arraybusqueda2 = ['fecha_tab3_area2 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab3_area2 <=' => $fechafinalmod . ' 12:59:59'];

      $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area1', $arraybusqueda1)->getResult();
      $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area2', $arraybusqueda2)->getResult();

      $arraybusquedatabla6 = ['fecha_inicial_tab6_area1' => $fechainicialmod, 'fecha_final_tab6_area1' => $fechafinalmod];
      $databusquedatabla6 = $this->tabla->mostrarTodosDatosTablasFechas('tabla6_area1', $arraybusquedatabla6)->getResult();
      if (count($data1)>0 || count($data2)>0 || count($databusquedatabla6)>0) {

      //Tabla 3 Area 1
        $arrayequipo1area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-1', 'equipo1_tab3_area_1', $fechas, '0');
        $arrayequipo2area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-2', 'equipo2_tab3_area_1', $fechas, '0');
        $arrayequipo3area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-3', 'equipo3_tab3_area_1', $fechas, '0');
        $arrayequipo4area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-4', 'equipo4_tab3_area_1', $fechas, '0');
        $arrayequipo5area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-5', 'equipo5_tab3_area_1', $fechas, '2');
      $arrayequipo6area1 = $this->calculosalidatabla3($databusquedatabla6, $data1, 'equipo7_tab3_area_1', 'equipo2_tab6_area_1', 'Área-1', 'Equipo-6', $fechainicialmod, $fechafinalmod); //Salida S1
      $arrayequipo7area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-7', 'equipo7_tab3_area_1', $fechas, '6');

      //Tabla 3 Area 2
      $arrayequipo1area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-1', 'equipo1_tab3_area_2', $fechas, '0');
      $arrayequipo2area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-2', 'equipo2_tab3_area_2', $fechas, '0');
      $arrayequipo3area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-3', 'equipo3_tab3_area_2', $fechas, '0');
      $arrayequipo4area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-4', 'equipo4_tab3_area_2', $fechas, '0');
      $arrayequipo5area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-5', 'equipo5_tab3_area_2', $fechas, '2');
      $arrayequipo6area2 = $this->calculosalidatabla3($databusquedatabla6, $data2, 'equipo7_tab3_area_2', 'equipo3_tab6_area_1', 'Área-2', 'Equipo-6', $fechainicialmod, $fechafinalmod); //Salida S2
      $arrayequipo7area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-7', 'equipo7_tab3_area_2', $fechas, '6');

      $arrayfinal = array(
        $arrayequipo1area1, $arrayequipo2area1, $arrayequipo3area1, $arrayequipo4area1, $arrayequipo5area1, $arrayequipo6area1, $arrayequipo7area1,
        $arrayequipo1area2, $arrayequipo2area2, $arrayequipo3area2, $arrayequipo4area2, $arrayequipo5area2, $arrayequipo6area2, $arrayequipo7area2
      );
      echo json_encode(array('data' => $arrayfinal, 'arrayequipo6area1' => $arrayequipo6area1, 'arrayequipo6area2' => $arrayequipo6area2));
    }else{
      echo json_encode(array('data' => []));
    }
  }
}


public function buscarUsuariosTablaFechas3()
{
  $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);

  if ($fechas == '') {
    echo json_encode(array('status' => false));
  } else {
    $fechasnew = explode(' - ',  $fechas);
    $fechainicialmod = $fechasnew[0];
    $fechafinalmod = $fechasnew[1];
    $select = 'log_id, log_tabla, log_tipo, log_fecha, logs.usuario_id, usuario_cedula, usuario_nombre, usuario_apellido';

    $innerjoinlogs1 =  'tabla3_area1.tabla3_area1_id = logs.log_id_referencia';
    $arraybusquedalogs1 = ['fecha_tab3_area1 >=' => $fechainicialmod, 'fecha_tab3_area1 <=' => $fechafinalmod];

    $innerjoinlogs2 =  'tabla3_area2.tabla3_area2_id = logs.log_id_referencia';
    $arraybusquedalogs2 = ['fecha_tab3_area2 >=' => $fechainicialmod, 'fecha_tab3_area2 <=' => $fechafinalmod];

    $datalogs1 = $this->tabla->mostrarTodosDatosUsuariosTablas('tabla3_area1',$select,$innerjoinlogs1,$arraybusquedalogs1)->getResult();
    $datalogs2 = $this->tabla->mostrarTodosDatosUsuariosTablas('tabla3_area2',$select,$innerjoinlogs2,$arraybusquedalogs2)->getResult();

    if (count($datalogs1)>0 || count($datalogs2)>0) {
      $arrayuserfinal =array_merge($datalogs1,$datalogs2);
      $details = $this->funcion->unique_multidim_array($arrayuserfinal,'usuario_id'); 
      echo json_encode(array('status'=>true,'usuarios'=>$details));
    }else{
      echo json_encode(array('status'=>false));
    }
  }
}


public function MostrarDataPorHora3()
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

  $arraybusqueda1 = ['fecha_tab3_area1 >=' => $fechainicialmod, 'fecha_tab3_area1 <=' => $fechafinalmod];
  $arraybusqueda2 = ['fecha_tab3_area2 >=' => $fechainicialmod, 'fecha_tab3_area2 <=' => $fechafinalmod];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area2', $arraybusqueda2)->getResult();

  $datanumberseries = array();

        // Area 1
  $datanumberseries['equipo1_tab3_area_1'] = !isset($data1[0]->equipo1_tab3_area_1) ? '0' : $data1[0]->equipo1_tab3_area_1;
  $datanumberseries['equipo2_tab3_area_1'] = !isset($data1[0]->equipo2_tab3_area_1) ? '0' : $data1[0]->equipo2_tab3_area_1;
  $datanumberseries['equipo3_tab3_area_1'] = !isset($data1[0]->equipo3_tab3_area_1) ? '0' : $data1[0]->equipo3_tab3_area_1;
  $datanumberseries['equipo4_tab3_area_1'] = !isset($data1[0]->equipo4_tab3_area_1) ? '0' : $data1[0]->equipo4_tab3_area_1;
  $datanumberseries['equipo5_tab3_area_1'] = !isset($data1[0]->equipo5_tab3_area_1) ? '0' : $data1[0]->equipo5_tab3_area_1;
  $datanumberseries['equipo7_tab3_area_1'] = !isset($data1[0]->equipo7_tab3_area_1) ? '0' : $data1[0]->equipo7_tab3_area_1;

        // Area 2
  $datanumberseries['equipo1_tab3_area_2'] = !isset($data2[0]->equipo1_tab3_area_2) ? '0' : $data2[0]->equipo1_tab3_area_2;
  $datanumberseries['equipo2_tab3_area_2'] = !isset($data2[0]->equipo2_tab3_area_2) ? '0' : $data2[0]->equipo2_tab3_area_2;
  $datanumberseries['equipo3_tab3_area_2'] = !isset($data2[0]->equipo3_tab3_area_2) ? '0' : $data2[0]->equipo3_tab3_area_2;
  $datanumberseries['equipo4_tab3_area_2'] = !isset($data2[0]->equipo4_tab3_area_2) ? '0' : $data2[0]->equipo4_tab3_area_2;
  $datanumberseries['equipo5_tab3_area_2'] = !isset($data2[0]->equipo5_tab3_area_2) ? '0' : $data2[0]->equipo5_tab3_area_2;
  $datanumberseries['equipo7_tab3_area_2'] = !isset($data2[0]->equipo7_tab3_area_2) ? '0' : $data2[0]->equipo7_tab3_area_2;

  $arrayName = array(
    'status' => true,
    'datanumeros' => $datanumberseries,
  );
  echo json_encode($arrayName);
}




public function mostrarGrafica3()
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

  $arraybusqueda1 = ['fecha_tab3_area1 >=' => $fechainicialmod, 'fecha_tab3_area1 <=' => $fechafinalmod];
  $arraybusqueda2 = ['fecha_tab3_area2 >=' => $fechainicialmod, 'fecha_tab3_area2 <=' => $fechafinalmod];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area2', $arraybusqueda2)->getResult();

    // Variables para la libreria de los graficos
  $dividgrafica = 'graficatabla3';
    $legendata = ['Equipo 2 del Area 1','Equipo 5 del Area 1','Equipo 2 del Area 2','Equipo 5 del Are T3 - A2-5'];
    $colores = ["#2962FF", "#4fc3f7", "#4fc444", "#ffc447"];

    $seriesdata = array();
    $datanumberseries = array();

    if (count($data1)>0 || count($data2)>0) {

      foreach ($data1 as $key => $value) {
        // Area 1
        $datanumberseries['0'][] = $value->equipo2_tab3_area_1;
        $datanumberseries['1'][] = $value->equipo5_tab3_area_1;

        // Area 2
        $datanumberseries['2'][] = !isset($data2[$key]->equipo2_tab3_area_2) ? '0' : $data2[$key]->equipo2_tab3_area_2;
        $datanumberseries['3'][] = !isset($data2[$key]->equipo5_tab3_area_2) ? '0' : $data2[$key]->equipo5_tab3_area_2;

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
  $arraybusqueda1 = ['fecha_tab3_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab3_area1 <=' => $fechafinalmod . ' 12:59:59'];
  $arraybusqueda2 = ['fecha_tab3_area2 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab3_area2 <=' => $fechafinalmod . ' 12:59:59'];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area2', $arraybusqueda2)->getResult();

  if (count($data1)>0 || count($data2)>0) {
      //Tabla 3 Area 1
    $arrayequipo7area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-7', 'equipo7_tab3_area_1', $fechas, '6');

      //Tabla 3 Area 2
    $arrayequipo7area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-7', 'equipo7_tab3_area_2', $fechas, '6');

    return json_encode(array('status' => true,'arrayequipo7area1' => $arrayequipo7area1, 'arrayequipo7area2' => $arrayequipo7area2));
  }else{
    return json_encode(array('status' => false));
  }
}


public function calculosalidatabla3($databusquedatabla6, $arrayequipo7, $nombreprimerequipo, $nombrequipotab6, $area, $equipo, $fechainicialmod, $fechafinalmod)
{

  $idprimario = $area . "---" . $equipo . "---" . $fechainicialmod . " - " . $fechafinalmod;
  $result = array($idprimario, $area, $equipo);
  $sumatoria = 0;
    $promedio6am = 0; //18 horas
    $promedio12m = 0; //24 horas
    $iteraccionpromedio = 0;

    for ($i = 0; $i <= 23; $i++) {
      if ($i == '0') {
        $valornumero1 = !isset($arrayequipo7[$i]->$nombreprimerequipo) ? '0' : $arrayequipo7[$i]->$nombreprimerequipo;
        $valornumero2 = !isset($databusquedatabla6[$i]->$nombrequipotab6) ? '0' : $databusquedatabla6[$i]->$nombrequipotab6;
        $calculo = ($valornumero1 - $valornumero2) * 24 * 1000;
        $sumatoria = $calculo;
        if ($calculo != '0' && isset($arrayequipo7[$i]->$nombreprimerequipo) || isset($databusquedatabla6[$i]->$nombrequipotab6)) {
          $iteraccionpromedio++;
        }
        $result[] = number_format($calculo, '2', ',', '.');
      } else {
        $valornumero1 = !isset($arrayequipo7[$i]->$nombreprimerequipo) ? '0' : $arrayequipo7[$i]->$nombreprimerequipo;
        $valornumero2 = !isset($arrayequipo7[($i - 1)]->$nombreprimerequipo) ? '0' : $arrayequipo7[($i - 1)]->$nombreprimerequipo;
        $calculo = ($valornumero1 - $valornumero2) * 24 * 1000;
        $sumatoria += $calculo;
        if ($calculo != '0' && isset($arrayequipo7[$i]) && isset($arrayequipo7[($i - 1)])) {
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

    public function ordenardatosdatatable3($arraydata, $nombrearea, $nombreequipo, $nombrequipo, $fecha, $cantidadecimales)
    {
    $pm1 = !isset($arraydata[0]->$nombrequipo) ? '0' : $arraydata[0]->$nombrequipo; //Columna del excel G
    $pm2 = !isset($arraydata[1]->$nombrequipo) ? '0' : $arraydata[1]->$nombrequipo;
    $pm3 = !isset($arraydata[2]->$nombrequipo) ? '0' : $arraydata[2]->$nombrequipo;
    $pm4 = !isset($arraydata[3]->$nombrequipo) ? '0' : $arraydata[3]->$nombrequipo;
    $pm5 = !isset($arraydata[4]->$nombrequipo) ? '0' : $arraydata[4]->$nombrequipo;
    $pm6 = !isset($arraydata[5]->$nombrequipo) ? '0' : $arraydata[5]->$nombrequipo;
    $pm7 = !isset($arraydata[6]->$nombrequipo) ? '0' : $arraydata[6]->$nombrequipo;
    $pm8 = !isset($arraydata[7]->$nombrequipo) ? '0' : $arraydata[7]->$nombrequipo;
    $pm9 = !isset($arraydata[8]->$nombrequipo) ? '0' : $arraydata[8]->$nombrequipo;
    $pm10 = !isset($arraydata[9]->$nombrequipo) ? '0' : $arraydata[9]->$nombrequipo;
    $pm11 = !isset($arraydata[10]->$nombrequipo) ? '0' : $arraydata[10]->$nombrequipo;
    $am0 = !isset($arraydata[11]->$nombrequipo) ? '0' : $arraydata[11]->$nombrequipo;
    $am1 = !isset($arraydata[12]->$nombrequipo) ? '0' : $arraydata[12]->$nombrequipo;
    $am2 = !isset($arraydata[13]->$nombrequipo) ? '0' : $arraydata[13]->$nombrequipo;
    $am3 = !isset($arraydata[14]->$nombrequipo) ? '0' : $arraydata[14]->$nombrequipo;
    $am4 = !isset($arraydata[15]->$nombrequipo) ? '0' : $arraydata[15]->$nombrequipo;
    $am5 = !isset($arraydata[16]->$nombrequipo) ? '0' : $arraydata[16]->$nombrequipo;
    $am6 = !isset($arraydata[17]->$nombrequipo) ? '0' : $arraydata[17]->$nombrequipo; //Columna del excel X
    $am7 = !isset($arraydata[18]->$nombrequipo) ? '0' : $arraydata[18]->$nombrequipo;
    $am8 = !isset($arraydata[19]->$nombrequipo) ? '0' : $arraydata[19]->$nombrequipo;
    $am9 = !isset($arraydata[20]->$nombrequipo) ? '0' : $arraydata[20]->$nombrequipo;
    $am10 = !isset($arraydata[21]->$nombrequipo) ? '0' : $arraydata[21]->$nombrequipo;
    $am11 = !isset($arraydata[22]->$nombrequipo) ? '0' : $arraydata[22]->$nombrequipo;
    $pm12 = !isset($arraydata[23]->$nombrequipo) ? '0' : $arraydata[23]->$nombrequipo; //Columna del excel AD

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

  public function EditarDatosTabla3()
  {
    $input = filter_input_array(INPUT_POST);
    $datos = $this->obtenerValoresTablaEditable($input);

    $numerotabla = '3';
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

    if ($numeroequipo == '6') {
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
  $arraybusqueda1 = ['fecha_tab3_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab3_area1 <=' => $fechafinalmod . ' 12:59:59'];
  $arraybusqueda2 = ['fecha_tab3_area2 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab3_area2 <=' => $fechafinalmod . ' 12:59:59'];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area2', $arraybusqueda2)->getResult();

  if (count($data1)>0 || count($data2)>0) {
      //Tabla 3 Area 1
    $arrayequipo1area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-1', 'equipo1_tab3_area_1', $fechas, '0');
    $arrayequipo2area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-2', 'equipo2_tab3_area_1', $fechas, '0');
    $arrayequipo4area1 = $this->ordenardatosdatatable3($data1, 'Área-1', 'Equipo-4', 'equipo4_tab3_area_1', $fechas, '0');

      //Tabla 3 Area 2
    $arrayequipo2area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-2', 'equipo2_tab3_area_2', $fechas, '0');
    $arrayequipo4area2 = $this->ordenardatosdatatable3($data2, 'Área-2', 'Equipo-4', 'equipo4_tab3_area_2', $fechas, '0');

    return json_encode(array('status' => true,
      'arrayequipo1area1' => $arrayequipo1area1, 'arrayequipo2area1' => $arrayequipo2area1, 'arrayequipo4area1' => $arrayequipo4area1,
      'arrayequipo2area2' => $arrayequipo2area2,
      'arrayequipo4area2' => $arrayequipo4area2));
  }else{
    return json_encode(array('status' => false));
  }
}

public function MostrarLog3()
{
  $areatabla3 = $this->funcion->transformardecimales($this->request->getPost('areatabla3', FILTER_SANITIZE_STRING));
  $equipoareatabla3 = $this->funcion->transformardecimales($this->request->getPost('equipoareatabla3', FILTER_SANITIZE_STRING));
  $fechalogtabla3 = $this->funcion->transformardecimales($this->request->getPost('fechalogtabla3', FILTER_SANITIZE_STRING));
  $tiempologtabla3 = $this->funcion->transformardecimales($this->request->getPost('tiempologtabla3', FILTER_SANITIZE_STRING));

  $numerotabla = '3';
  $tabla = 'tabla'.$numerotabla.'_area'.$areatabla3;

  $arrayhora = explode(':', $tiempologtabla3);
  $horaseleccionada = $arrayhora[0];

  $selectidtabla = $tabla.'_id';
  $fecha = $fechalogtabla3." ".$horaseleccionada;
  $buscarfecha = 'fecha_tab'.$numerotabla.'_area'.$areatabla3;
  $where = [$buscarfecha.' >= '=>$fecha.':00',$buscarfecha.' <= '=>$fecha.':59'];


  $tablaid = $this->tabla->buscaridtabla($tabla, $selectidtabla, $where)->getResult();

  if (count($tablaid)>0) {
    $nombrequipobuscar = 'equipo'.$equipoareatabla3.'_tab'.$numerotabla.'_area_'.$areatabla3;
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
