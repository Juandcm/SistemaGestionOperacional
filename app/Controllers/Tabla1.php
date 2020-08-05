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

class Tabla1 extends Controller
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

  public function RegistroTabla1()
  {
    //Tengo que validar todos los campos con str_replace
    //Tabla1 Area 1:
    $equit1area1num1 = $this->funcion->transformardecimales($this->request->getPost('equit1area1num1', FILTER_SANITIZE_STRING));
    $equit1area1num2 = $this->funcion->transformardecimales($this->request->getPost('equit1area1num2', FILTER_SANITIZE_STRING));

    //Tabla1 Area 2:
    $equit1area2num1 = $this->funcion->transformardecimales($this->request->getPost('equit1area2num1', FILTER_SANITIZE_STRING));
    $equit1area2num2 = $this->funcion->transformardecimales($this->request->getPost('equit1area2num2', FILTER_SANITIZE_STRING));
    $equit1area2num3 = $this->funcion->transformardecimales($this->request->getPost('equit1area2num3', FILTER_SANITIZE_STRING));
    $equit1area2num4 = $this->funcion->transformardecimales($this->request->getPost('equit1area2num4', FILTER_SANITIZE_STRING));
    $equit1area2num5 = $this->funcion->transformardecimales($this->request->getPost('equit1area2num5', FILTER_SANITIZE_STRING));
    $equit1area2num6 = $this->funcion->transformardecimales($this->request->getPost('equit1area2num6', FILTER_SANITIZE_STRING));

    //Tabla1 Area 3:
    $equit1area3num1 = $this->funcion->transformardecimales($this->request->getPost('equit1area3num1', FILTER_SANITIZE_STRING));
    $equit1area3num2 = $this->funcion->transformardecimales($this->request->getPost('equit1area3num2', FILTER_SANITIZE_STRING));
    $equit1area3num3 = $this->funcion->transformardecimales($this->request->getPost('equit1area3num3', FILTER_SANITIZE_STRING));
    $equit1area3num4 = $this->funcion->transformardecimales($this->request->getPost('equit1area3num4', FILTER_SANITIZE_STRING));
    $equit1area3num5 = $this->funcion->transformardecimales($this->request->getPost('equit1area3num5', FILTER_SANITIZE_STRING));



    $fechayactual = Time::now()->toDateString();
    $horactual = Time::now()->getHour();

    $fechahorainicial = $fechayactual." ".$horactual.":00:00";
    $fechahorafinal = $fechayactual." ".$horactual.":59:59";

    $tabla1 = 'tabla1_area1';
    $select1 = 'tabla1_area1_id';
    $arraybusqueda1 = ['fecha_tab1_area1 >='=>$fechahorainicial, 'fecha_tab1_area1 <='=>$fechahorafinal];

    $tabla2 = 'tabla1_area2';
    $select2 = 'tabla1_area2_id';
    $arraybusqueda2 = ['fecha_tab1_area2 >='=>$fechahorainicial, 'fecha_tab1_area2 <='=>$fechahorafinal];

    $tabla3 = 'tabla1_area3';
    $select3 = 'tabla1_area3_id';
    $arraybusqueda3 = ['fecha_tab1_area3 >='=>$fechahorainicial, 'fecha_tab1_area3 <='=>$fechahorafinal];

    $arraydata1 = $this->tabla->buscaridtabla($tabla1, $select1, $arraybusqueda1)->getResult();
    $arraydata2 = $this->tabla->buscaridtabla($tabla2, $select2, $arraybusqueda2)->getResult();
    $arraydata3 = $this->tabla->buscaridtabla($tabla3, $select3, $arraybusqueda3)->getResult();


    $data1 = [
      'tabla1_area1_id' => (count($arraydata1)>0)?$arraydata1[0]->$select1:null,
      'equipo1_tab1_area_1' => $equit1area1num1,
      'equipo2_tab1_area_1' => $equit1area1num2,
      'fecha_tab1_area1' => Time::now()->toDateTimeString(),
      'status_tab1_area1' => '1',
    ];
    $data2 = [
      'tabla1_area2_id' => (count($arraydata2)>0)?$arraydata2[0]->$select2:null,
      'equipo1_tab1_area_2' => $equit1area2num1,
      'equipo2_tab1_area_2' => $equit1area2num2,
      'equipo3_tab1_area_2' => $equit1area2num3,
      'equipo4_tab1_area_2' => $equit1area2num4,
      'equipo5_tab1_area_2' => $equit1area2num5,
      'equipo6_tab1_area_2' => $equit1area2num6,
      'fecha_tab1_area2' => Time::now()->toDateTimeString(),
      'status_tab1_area2' => '1',
    ];
    $data3 = [
      'tabla1_area3_id' => (count($arraydata3)>0)?$arraydata3[0]->$select3:null,
      'equipo1_tab1_area_3' => $equit1area3num1,
      'equipo2_tab1_area_3' => $equit1area3num2,
      'equipo3_tab1_area_3' => $equit1area3num3,
      'equipo4_tab1_area_3' => $equit1area3num4,
      'equipo5_tab1_area_3' => $equit1area3num5,
      'fecha_tab1_area3' => Time::now()->toDateTimeString(),
      'status_tab1_area3' => '1',
    ];
    // Registrando datos
    if (count($arraydata1)>0) {
      $where1 = ['tabla1_area1_id'=>$arraydata1[0]->$select1];
      $registrotabla1 = $this->tabla->EdiccionTabla($data1, $tabla1, $where1);
    }else{
      $registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla1_area1');
      $datamejorada1 = json_decode($registrotabla1);
    }

    if (count($arraydata2)>0) {
      $where2 = ['tabla1_area2_id'=>$arraydata2[0]->$select2];
      $registrotabla2 = $this->tabla->EdiccionTabla($data2, $tabla2, $where2);
    }else{
      $registrotabla2 = $this->tabla->RegistroTablas($data2, 'tabla1_area2');
      $datamejorada2 = json_decode($registrotabla2);
    }

    if (count($arraydata3)>0) {
      $where3 = ['tabla1_area3_id'=>$arraydata3[0]->$select3];
      $registrotabla3 = $this->tabla->EdiccionTabla($data3, $tabla3, $where3);
    }else{
      $registrotabla3 = $this->tabla->RegistroTablas($data3, 'tabla1_area3');
      $datamejorada3 = json_decode($registrotabla3);
    }

    // Guardando el log
    $guardarlogs = [
      [
        'log_id' => null,
        'log_tabla' => 'tabla1_area1',
        'log_tipo' => 'registro del usuario',
        'log_fecha' => Time::now()->toDateTimeString(),
        'log_id_referencia' => (count($arraydata1)>0) ? $arraydata1[0]->$select1: $datamejorada1->retornoid,
        'usuario_id' => $this->session->get('usuario_id')
      ],
      [
        'log_id' => null,
        'log_tabla' => 'tabla1_area2',
        'log_tipo' => 'registro del usuario',
        'log_fecha' => Time::now()->toDateTimeString(),
        'log_id_referencia' => (count($arraydata2)>0) ? $arraydata2[0]->$select2: $datamejorada2->retornoid,
        'usuario_id' => $this->session->get('usuario_id')
      ],
      [
        'log_id' => null,
        'log_tabla' => 'tabla1_area3',
        'log_tipo' => 'registro del usuario',
        'log_fecha' => Time::now()->toDateTimeString(),
        'log_id_referencia' => (count($arraydata3)>0) ? $arraydata3[0]->$select3: $datamejorada3->retornoid,
        'usuario_id' => $this->session->get('usuario_id')
      ]
    ];
    $this->log->RegistrarLog($guardarlogs);

    echo json_encode(array('data' => true));
  }

  public function mostrarfechascargadas()
  {
    $result = array();
    $tabla1_area1 = $this->tabla->mostrarfechascargadas('tabla1_area1', 'fecha_tab1_area1')->getResult();
    echo json_encode($tabla1_area1);
  }

  public function MostrarDatosTabla1()
  {
    $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);

    if ($fechas == '') {
      echo json_encode(array('data' => []));
    } else {
      $fechasnew = explode(' - ',  $fechas);
      $fechainicialmod = $fechasnew[0];
      $fechafinalmod = $fechasnew[1];
      $arraybusqueda1 = ['fecha_tab1_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab1_area1 <=' => $fechafinalmod . ' 12:59:59'];
      $arraybusqueda2 = ['fecha_tab1_area2 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab1_area2 <=' => $fechafinalmod . ' 12:59:59'];
      $arraybusqueda3 = ['fecha_tab1_area3 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab1_area3 <=' => $fechafinalmod . ' 12:59:59'];

      $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area1', $arraybusqueda1)->getResult();
      $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area2', $arraybusqueda2)->getResult();
      $data3 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area3', $arraybusqueda3)->getResult();

      if (count($data1)>0 || count($data2)>0 || count($data3)>0) {
      //Tabla 1 Area 1
        $arrayequipo1area1 = $this->funcion->ordenardatosdatatable($data1, 'Área-1', 'Equipo-1', 'equipo1_tab1_area_1', $fechas, '0');
        $arrayequipo2area1 = $this->funcion->ordenardatosdatatable($data1, 'Área-1', 'Equipo-2', 'equipo2_tab1_area_1', $fechas, '0');

      //Tabla 1 Area 2
        $arrayequipo1area2 = $this->funcion->ordenardatosdatatable($data2, 'Área-2', 'Equipo-1', 'equipo1_tab1_area_2', $fechas, '0');
        $arrayequipo2area2 = $this->funcion->ordenardatosdatatable($data2, 'Área-2', 'Equipo-2', 'equipo2_tab1_area_2', $fechas, '0');
        $arrayequipo3area2 = $this->funcion->ordenardatosdatatable($data2, 'Área-2', 'Equipo-3', 'equipo3_tab1_area_2', $fechas, '0');
        $arrayequipo4area2 = $this->funcion->ordenardatosdatatable($data2, 'Área-2', 'Equipo-4', 'equipo4_tab1_area_2', $fechas, '0');
        $arrayequipo5area2 = $this->funcion->ordenardatosdatatable($data2, 'Área-2', 'Equipo-5', 'equipo5_tab1_area_2', $fechas, '0');
        $arrayequipo6area2 = $this->funcion->ordenardatosdatatable($data2, 'Área-2', 'Equipo-6', 'equipo6_tab1_area_2', $fechas, '0');

      //Tabla 1 Area 3
        $arrayequipo1area3 = $this->funcion->ordenardatosdatatable($data3, 'Área-3', 'Equipo-1', 'equipo1_tab1_area_3', $fechas, '0');
        $arrayequipo2area3 = $this->funcion->ordenardatosdatatable($data3, 'Área-3', 'Equipo-2', 'equipo2_tab1_area_3', $fechas, '0');
        $arrayequipo3area3 = $this->funcion->ordenardatosdatatable($data3, 'Área-3', 'Equipo-3', 'equipo3_tab1_area_3', $fechas, '0');
        $arrayequipo4area3 = $this->funcion->ordenardatosdatatable($data3, 'Área-3', 'Equipo-4', 'equipo4_tab1_area_3', $fechas, '0');
        $arrayequipo5area3 = $this->funcion->ordenardatosdatatable($data3, 'Área-3', 'Equipo-5', 'equipo5_tab1_area_3', $fechas, '0');

        $arrayfinal = array(
          $arrayequipo1area1, $arrayequipo2area1,
          $arrayequipo1area2, $arrayequipo2area2, $arrayequipo3area2, $arrayequipo4area2, $arrayequipo5area2, $arrayequipo6area2,
          $arrayequipo1area3, $arrayequipo2area3, $arrayequipo3area3, $arrayequipo4area3, $arrayequipo5area3
        );
        echo json_encode(array('data' => $arrayfinal));

      }else{
       echo json_encode(array('data' => []));
     }
   }
 }


 public function buscarUsuariosTablaFechas1()
 {
  $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);

  if ($fechas == '') {
    echo json_encode(array('data' => []));
  } else {
    $fechasnew = explode(' - ',  $fechas);
    $fechainicialmod = $fechasnew[0];
    $fechafinalmod = $fechasnew[1];
    $select = 'log_id, log_tabla, log_tipo, log_fecha, logs.usuario_id, usuario_cedula, usuario_nombre, usuario_apellido';

    $innerjoinlogs1 =  'tabla1_area1.tabla1_area1_id = logs.log_id_referencia';
    $arraybusquedalogs1 = ['fecha_tab1_area1 >=' => $fechainicialmod, 'fecha_tab1_area1 <=' => $fechafinalmod];

    $innerjoinlogs2 =  'tabla1_area2.tabla1_area2_id = logs.log_id_referencia';
    $arraybusquedalogs2 = ['fecha_tab1_area2 >=' => $fechainicialmod, 'fecha_tab1_area2 <=' => $fechafinalmod];

    $innerjoinlogs3 =  'tabla1_area3.tabla1_area3_id = logs.log_id_referencia';
    $arraybusquedalogs3 = ['fecha_tab1_area3 >=' => $fechainicialmod, 'fecha_tab1_area3 <=' => $fechafinalmod];

    $datalogs1 = $this->tabla->mostrarTodosDatosUsuariosTablas('tabla1_area1',$select,$innerjoinlogs1,$arraybusquedalogs1)->getResult();
    $datalogs2 = $this->tabla->mostrarTodosDatosUsuariosTablas('tabla1_area2',$select,$innerjoinlogs2,$arraybusquedalogs2)->getResult();
    $datalogs3 = $this->tabla->mostrarTodosDatosUsuariosTablas('tabla1_area3',$select,$innerjoinlogs3,$arraybusquedalogs3)->getResult();

    if (count($datalogs1)>0 || count($datalogs2)>0 || count($datalogs3)>0) {
      $arrayuserfinal =array_merge($datalogs1,$datalogs2,$datalogs3);
      $details = $this->funcion->unique_multidim_array($arrayuserfinal,'usuario_id'); 
      echo json_encode(array('status'=>true,'usuarios'=>$details));
    }else{
      echo json_encode(array('status'=>false));
    }
  }
}

public function MostrarDataPorHora1()
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

  $arraybusqueda1 = ['fecha_tab1_area1 >=' => $fechainicialmod, 'fecha_tab1_area1 <=' => $fechafinalmod];
  $arraybusqueda2 = ['fecha_tab1_area2 >=' => $fechainicialmod, 'fecha_tab1_area2 <=' => $fechafinalmod];
  $arraybusqueda3 = ['fecha_tab1_area3 >=' => $fechainicialmod, 'fecha_tab1_area3 <=' => $fechafinalmod];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area2', $arraybusqueda2)->getResult();
  $data3 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area3', $arraybusqueda3)->getResult();

  $datanumberseries = array();

  // Area 1
  $datanumberseries['equipo1_tab1_area_1'] = !isset($data1[0]->equipo1_tab1_area_1) ? '0' : $data1[0]->equipo1_tab1_area_1;
  $datanumberseries['equipo2_tab1_area_1'] = !isset($data1[0]->equipo2_tab1_area_1) ? '0' : $data1[0]->equipo2_tab1_area_1;

  // Area 2
  $datanumberseries['equipo1_tab1_area_2'] = !isset($data2[0]->equipo1_tab1_area_2) ? '0' : $data2[0]->equipo1_tab1_area_2;
  $datanumberseries['equipo2_tab1_area_2'] = !isset($data2[0]->equipo2_tab1_area_2) ? '0' : $data2[0]->equipo2_tab1_area_2;
  $datanumberseries['equipo3_tab1_area_2'] = !isset($data2[0]->equipo3_tab1_area_2) ? '0' : $data2[0]->equipo3_tab1_area_2;
  $datanumberseries['equipo4_tab1_area_2'] = !isset($data2[0]->equipo4_tab1_area_2) ? '0' : $data2[0]->equipo4_tab1_area_2;
  $datanumberseries['equipo5_tab1_area_2'] = !isset($data2[0]->equipo5_tab1_area_2) ? '0' : $data2[0]->equipo5_tab1_area_2;
  $datanumberseries['equipo6_tab1_area_2'] = !isset($data2[0]->equipo6_tab1_area_2) ? '0' : $data2[0]->equipo6_tab1_area_2;

  // Area 3
  $datanumberseries['equipo1_tab1_area_3'] = !isset($data3[0]->equipo1_tab1_area_3) ? '0' : $data3[0]->equipo1_tab1_area_3;
  $datanumberseries['equipo2_tab1_area_3'] = !isset($data3[0]->equipo2_tab1_area_3) ? '0' : $data3[0]->equipo2_tab1_area_3;
  $datanumberseries['equipo3_tab1_area_3'] = !isset($data3[0]->equipo3_tab1_area_3) ? '0' : $data3[0]->equipo3_tab1_area_3;
  $datanumberseries['equipo4_tab1_area_3'] = !isset($data3[0]->equipo4_tab1_area_3) ? '0' : $data3[0]->equipo4_tab1_area_3;
  $datanumberseries['equipo5_tab1_area_3'] = !isset($data3[0]->equipo5_tab1_area_3) ? '0' : $data3[0]->equipo5_tab1_area_3;

  $arrayName = array(
    'status' => true,
    'datanumeros' => $datanumberseries,
  );
  echo json_encode($arrayName);
}


public function mostrarGrafica1()
{
  $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);
  $fechasnew = explode(' - ',  $fechas);
  $fechainicialmodprimera = $fechasnew[0];
  $fechafinalmodprimera = $fechasnew[1];
  $hora = Time::now()->hour;

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

  $arraybusqueda1 = ['fecha_tab1_area1 >=' => $fechainicialmod, 'fecha_tab1_area1 <=' => $fechafinalmod];
  $arraybusqueda2 = ['fecha_tab1_area2 >=' => $fechainicialmod, 'fecha_tab1_area2 <=' => $fechafinalmod];
  $arraybusqueda3 = ['fecha_tab1_area3 >=' => $fechainicialmod, 'fecha_tab1_area3 <=' => $fechafinalmod];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area2', $arraybusqueda2)->getResult();

  $dividgrafica = 'graficatabla1';
  $legendata = ['Equipo 1 del Area 1','Equipo 2 del Area 2'];
  $colores = ["#2962FF", "#4fc3f7"];

  $seriesdata = array();
  $datanumberseries = array();

  if (count($data1)>0 || count($data2)>0) {
    foreach ($data1 as $key => $value) {
        // Area 1
      $datanumberseries['0'][] = $value->equipo1_tab1_area_1;
        // Area 2
      $datanumberseries['1'][] = !isset($data2[$key]->equipo2_tab1_area_2) ? '0' : $data2[$key]->equipo2_tab1_area_2;
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

public function EditarDatosTabla1()
{
  $input = filter_input_array(INPUT_POST);
  $datos = $this->obtenerValoresTablaEditable($input);

  $numerotabla = '1';
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
      echo json_encode(array('status' => true, 'tabla' => $numerotabla));
    } else {
      echo json_encode(array('status' => false,'mensaje'=>'No se pudo editar','tabla' => $numerotabla));
    }
  }else {
    echo json_encode(array('status' => false,'mensaje'=>'No se puede editar','tabla' => $numerotabla));
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
  $arraybusqueda1 = ['fecha_tab1_area1 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab1_area1 <=' => $fechafinalmod . ' 12:59:59'];
  $arraybusqueda2 = ['fecha_tab1_area2 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab1_area2 <=' => $fechafinalmod . ' 12:59:59'];
  $arraybusqueda3 = ['fecha_tab1_area3 >=' => $fechainicialmod . ' 13:00:00', 'fecha_tab1_area3 <=' => $fechafinalmod . ' 12:59:59'];

  $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area1', $arraybusqueda1)->getResult();
  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area2', $arraybusqueda2)->getResult();
  $data3 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area3', $arraybusqueda3)->getResult();

  if (count($data1)>0 || count($data2)>0 || count($data3)>0) {
      //Tabla 1 Area 1
    $arrayequipo1area1 = $this->funcion->ordenardatosdatatable($data1, 'Área-1', 'Equipo-1', 'equipo1_tab1_area_1', $fechas, '0');
      //Tabla 1 Area 2
    $arrayequipo1area2 = $this->funcion->ordenardatosdatatable($data2, 'Área-2', 'Equipo-1', 'equipo1_tab1_area_2', $fechas, '0');
    $arrayequipo2area2 = $this->funcion->ordenardatosdatatable($data2, 'Área-2', 'Equipo-2', 'equipo2_tab1_area_2', $fechas, '0');
      //Tabla 1 Area 3
    $arrayequipo3area3 = $this->funcion->ordenardatosdatatable($data3, 'Área-3', 'Equipo-3', 'equipo3_tab1_area_3', $fechas, '0');

    return json_encode(array('status' => true,
      'arrayequipo1area1' => $arrayequipo1area1, 
      'arrayequipo1area2' => $arrayequipo1area2,'arrayequipo2area2' => $arrayequipo2area2,
      'arrayequipo3area3' => $arrayequipo3area3));
  }else{
    return json_encode(array('status' => false));
  }
}

public function MostrarLog1()
{
  $areatabla1 = $this->funcion->transformardecimales($this->request->getPost('areatabla1', FILTER_SANITIZE_STRING));
  $equipoareatabla1 = $this->funcion->transformardecimales($this->request->getPost('equipoareatabla1', FILTER_SANITIZE_STRING));
  $fechalogtabla1 = $this->funcion->transformardecimales($this->request->getPost('fechalogtabla1', FILTER_SANITIZE_STRING));
  $tiempologtabla1 = $this->funcion->transformardecimales($this->request->getPost('tiempologtabla1', FILTER_SANITIZE_STRING));

  $numerotabla = '1';
  $tabla = 'tabla'.$numerotabla.'_area'.$areatabla1;

  $arrayhora = explode(':', $tiempologtabla1);
  $horaseleccionada = $arrayhora[0];

  $selectidtabla = $tabla.'_id';
  $fecha = $fechalogtabla1." ".$horaseleccionada;
  $buscarfecha = 'fecha_tab'.$numerotabla.'_area'.$areatabla1;
  $where = [$buscarfecha.' >= '=>$fecha.':00',$buscarfecha.' <= '=>$fecha.':59'];



  $tablaid = $this->tabla->buscaridtabla($tabla, $selectidtabla, $where)->getResult();

  if (count($tablaid)>0) {
    $nombrequipobuscar = 'equipo'.$equipoareatabla1.'_tab'.$numerotabla.'_area_'.$areatabla1;
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


// Funcion para utilizar los graficos
// public function MostrarDataPorHora1()
// {
//   $fechamanana = Time::tomorrow()->toDateString();
//   $fechatual = Time::now()->toDateString();
//   $fechayer = Time::yesterday()->toDateString();
//   $hora = Time::now()->hour;
//     // Le resto 1 hora para que me traiga todos los datos de las tabla exceptuando la de la hora actual

//   if ($hora == '0' || $hora == '1' || $hora == '2' || $hora == '3' || $hora == '4' || $hora == '5' || $hora == '6' || $hora == '7' || $hora == '8' || $hora == '9' || $hora == '10' || $hora == '11' || $hora == '12') {
//     if ($hora == '0') {
//       $unahorantes = '23';
//     }else{
//       $unahorantes = $hora-1;
//     }
//     $fechainicialmod = $fechayer.' 13:00:00';
//     $fechafinalmod = $fechatual. ' '.$unahorantes.':59:59';
//   } else {
//     $unahorantes = $hora-1;
//     $fechainicialmod = $fechatual. ' 13:00:00';
//     $fechafinalmod = $fechamanana. ' '.$unahorantes.':59:59';
//   }

//   $arraybusqueda1 = ['fecha_tab1_area1 >=' => $fechainicialmod, 'fecha_tab1_area1 <=' => $fechafinalmod];
//   $arraybusqueda2 = ['fecha_tab1_area2 >=' => $fechainicialmod, 'fecha_tab1_area2 <=' => $fechafinalmod];
//   $arraybusqueda3 = ['fecha_tab1_area3 >=' => $fechainicialmod, 'fecha_tab1_area3 <=' => $fechafinalmod];

//   $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area1', $arraybusqueda1)->getResult();
//   $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area2', $arraybusqueda2)->getResult();
//   $data3 = $this->tabla->mostrarTodosDatosTablasFechas('tabla1_area3', $arraybusqueda3)->getResult();

//   $dividgrafica = 'graficatabla1';
//   $legendata = ['Equipo T1 - A1-1','Equipo T1 - A1-2', 'Equipo T1 - A2-1','Equipo T1 - A2-2','Equipo T1 - A2-3','Equipo T1 - A2-4','Equipo T1 - A2-5','Equipo T1 - A2-6', 'Equipo T1 - A3-1','Equipo T1 - A3-2','Equipo T1 - A3-3','Equipo T1 - A3-4','Equipo T1 - A3-5' ];
//   $colores = ["#2962FF", "#4fc3f7", 
//   "#4fc4cc", "#4fc4f7", "#4fc5fc","#4fcc5c", "#4fc4f7", "#4f55fc",
//   "#4fc34cc", "#4f54f7", "#4f45fc","#4fcffc", "#4ff4f7"];

//   $seriesdata = array();
//   $datanumberseries = array();

//   if (count($data1)>0 || count($data2)>0 || count($data3)>0) {

//     foreach ($data1 as $key => $value) {
//         // Area 1
//       $datanumberseries['0'][] = $value->equipo1_tab1_area_1;
//       $datanumberseries['1'][] = $value->equipo2_tab1_area_1;

//         // Area 2
//       $datanumberseries['2'][] = !isset($data2[$key]->equipo1_tab1_area_2) ? '0' : $data2[$key]->equipo1_tab1_area_2;
//       $datanumberseries['3'][] = !isset($data2[$key]->equipo2_tab1_area_2) ? '0' : $data2[$key]->equipo2_tab1_area_2;
//       $datanumberseries['4'][] = !isset($data2[$key]->equipo3_tab1_area_2) ? '0' : $data2[$key]->equipo3_tab1_area_2;
//       $datanumberseries['5'][] = !isset($data2[$key]->equipo4_tab1_area_2) ? '0' : $data2[$key]->equipo4_tab1_area_2;
//       $datanumberseries['6'][] = !isset($data2[$key]->equipo5_tab1_area_2) ? '0' : $data2[$key]->equipo5_tab1_area_2;
//       $datanumberseries['7'][] = !isset($data2[$key]->equipo6_tab1_area_2) ? '0' : $data2[$key]->equipo6_tab1_area_2;

//         // Area 3
//       $datanumberseries['8'][] = !isset($data3[$key]->equipo1_tab1_area_3) ? '0' : $data3[$key]->equipo1_tab1_area_3;
//       $datanumberseries['9'][] = !isset($data3[$key]->equipo2_tab1_area_3) ? '0' : $data3[$key]->equipo2_tab1_area_3;
//       $datanumberseries['10'][] = !isset($data3[$key]->equipo3_tab1_area_3) ? '0' : $data3[$key]->equipo3_tab1_area_3;
//       $datanumberseries['11'][] = !isset($data3[$key]->equipo4_tab1_area_3) ? '0' : $data3[$key]->equipo4_tab1_area_3;
//       $datanumberseries['12'][] = !isset($data3[$key]->equipo5_tab1_area_3) ? '0' : $data3[$key]->equipo5_tab1_area_3;
//     }

//     foreach ($legendata as $key => $value) {
//       $seriesdata[] = [
//         'name'=>$legendata[$key],
//         'type'=>'line',
//         'data'=>$datanumberseries[$key],
//       ]; 
//     }

//     $arrayName = array(
//       'status' => true,
//       'arraybusqueda1' => $arraybusqueda1,
//       'dividgrafica' => $dividgrafica,
//       'legendata' => $legendata,
//       'colores' => $colores,
//       'seriesdata' => $seriesdata,
//     );
//     echo json_encode($arrayName);
//   }else{
//     foreach ($legendata as $key => $value) {
//       $seriesdata[] = [
//         'name'=>$legendata[$key],
//         'type'=>'line',
//         'data'=>[],
//       ]; 
//     }
//     echo json_encode(array('status' => false,'arraybusqueda1' => $arraybusqueda1,'legendata' => $legendata,
//       'colores' => $colores,'seriesdata' => $seriesdata));
//   }
// }