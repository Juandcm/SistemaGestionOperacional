<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json,text/html; charset=utf-8');

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\I18n\Time;
use App\Models\Tabla;
use App\Models\Log;

class RegistroTabla extends Controller
{
  protected $request;
  public $session = null;
  
  public function __construct()
  {
    $this->session = \Config\Services::session();
    $this->tabla = new Tabla();
    $this->log = new Log();
  }

  public function calculosPrueba()
  {
    //Guardar en la bd los decimales con "." y los enteros sin nada para hacer los calculos de manera exacta
    // $a = '0.110000';
    // $b = '0.000000';
    // $c = '-0.558708';
    // $d = '-2.027900';
    // $calculo= $a - $b - $c - $d;

    // $ad = '34.44';
    // $otrocalculo = $ad * '1000000';
    // $res = number_format($calculo, 6, ',', '.');
    // $resotro = number_format($otrocalculo, 0, ',', '.');
    // // echo "Calculo exacto es: $res";
    // // echo "<br>";
    // // echo "Calculo exacto es: $resotro";
    echo Time::now()->toDateString();
    echo "----"; 
    echo Time::now()->toTimeString(); 
    // echo "----"; 
    // $myTime = new Time('now', 'America/Caracas', 'es_VE');
    // echo  new Time('now');
        // $time = Time::parse('2020-04-24 15:38:55', getConfig('site_timezone'));
        // echo $time->humanize();
    // echo date('yy:d:m')." ".time();
    // echo lang('Tests.shortTime', [time()]);
    // $input = filter_input_array(INPUT_POST);
    // echo json_encode($input);       
    // helper('text');
    // $valortext = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla fuga tempora obcaecati impedit numquam voluptatum voluptatem amet harum eaque consequuntur odit, sint, provident, minima velit vero omnis, nostrum ea corporis.';
    // // echo random_string('alnum', 8);
    // // echo excerpt($valortext,false, 100, '...');
    // echo excerpt($valortext, null, 100, '...');
// echo Time::now()->toDateString();
//     echo "----"; 
//     echo Time::now()->toTimeString(); 
    $time = Time::now();
    $fecha = $time->year."_".$time->month."_".$time->day;
    $hora = $time->hour."_".$time->minute;
    $tabla = '7';
    $nombrereporte = 'Reporte'.$fecha."-".$hora."-Tab".$tabla.".pdf";
    echo Time::now();
   // $timestamp = Time::createFromTimestamp(Time::parse($time)->getTimestamp(), 'America/Caracas', 'es_VE');
   // echo $timestamp;
   // echo $time; 
    // echo Time::createFromTimestamp('1591546526','America/Caracas', 'es_VE');
  }

  public function pruebastiempo()
  {
    echo Time::now()->toDateTimeString();
    echo "-------------\n";
    echo Time::now()->subHours('1')->toDateString();
    echo "-------------\n";
    echo Time::now()->subHours('1')->getHour();
  }
  public function RegistrarTodo()
  {
    $validarregistro1 = $this->registroautomaticotabla1();
    $validarregistro2 = $this->registroautomaticotabla2();
    $validarregistro3 = $this->registroautomaticotabla3();
    $validarregistro4 = $this->registroautomaticotabla4();
    $validarregistro5 = $this->registroautomaticotabla5();

    $validar1 = json_decode($validarregistro1);
    $validar2 = json_decode($validarregistro2);
    $validar3 = json_decode($validarregistro3);
    $validar4 = json_decode($validarregistro4);
    $validar5 = json_decode($validarregistro5);

    if ($validar1->status == true || $validar2->status == true || $validar3->status == true || $validar4->status == true || $validar5->status == true) {
      echo json_encode(array('status' => true ));
    }else{
      echo json_encode(array('status' => false ));    }

    }

    public function verificarhora()
    {

      $fechayactual = Time::now()->toDateString();
      $fechayer= Time::now()->subDays('1')->toDateString();
      $horanterior = Time::now()->subHours('1')->getHour();

      if ($horanterior == '23') {
        $fechayactual = $fechayer;
      }else{
        $fechayactual = Time::now()->toDateString();
      }


      $fechahorainicial = $fechayactual." ".$horanterior.":00:00";
      $fechahorafinal = $fechayactual." ".$horanterior.":59:59";

      $tabla1 = 'tabla1_area1';
      $arraybusqueda1 = ['fecha_tab1_area1 >='=>$fechahorainicial, 'fecha_tab1_area1 <='=>$fechahorafinal];

      echo json_encode($arraybusqueda1);
    }

    public function registroautomaticotabla1()
    {
      $fechayactual = Time::now()->toDateString();
      $fechayer= Time::now()->subDays('1')->toDateString();
      $horanterior = Time::now()->subHours('1')->getHour();

      if ($horanterior == '23') {
        $fechayactual = $fechayer;
      }else{
        $fechayactual = Time::now()->toDateString();
      }

      $fechahorainicial = $fechayactual." ".$horanterior.":00:00";
      $fechahorafinal = $fechayactual." ".$horanterior.":59:59";

      $tabla1 = 'tabla1_area1';
      $arraybusqueda1 = ['fecha_tab1_area1 >='=>$fechahorainicial, 'fecha_tab1_area1 <='=>$fechahorafinal];

      $tabla2 = 'tabla1_area2';
      $arraybusqueda2 = ['fecha_tab1_area2 >='=>$fechahorainicial, 'fecha_tab1_area2 <='=>$fechahorafinal];

      $tabla3 = 'tabla1_area3';
      $arraybusqueda3 = ['fecha_tab1_area3 >='=>$fechahorainicial, 'fecha_tab1_area3 <='=>$fechahorafinal];

      $arraydata1 = $this->tabla->mostrarTodosDatosTablasFechas($tabla1, $arraybusqueda1)->getResult();
      $arraydata2 = $this->tabla->mostrarTodosDatosTablasFechas($tabla2, $arraybusqueda2)->getResult();
      $arraydata3 = $this->tabla->mostrarTodosDatosTablasFechas($tabla3, $arraybusqueda3)->getResult();

      if (count($arraydata1)>0 || count($arraydata2)>0 || count($arraydata3)>0) {
        $data1 = [
          'tabla1_area1_id' => null,
          'equipo1_tab1_area_1' => $arraydata1[0]->equipo1_tab1_area_1,
          'equipo2_tab1_area_1' => $arraydata1[0]->equipo2_tab1_area_1,
          'fecha_tab1_area1' => Time::now()->toDateTimeString(),
          'status_tab1_area1' => '1',
        ];
        $data2 = [
          'tabla1_area2_id' => null,
          'equipo1_tab1_area_2' => $arraydata2[0]->equipo1_tab1_area_2,
          'equipo2_tab1_area_2' => $arraydata2[0]->equipo2_tab1_area_2,
          'equipo3_tab1_area_2' => $arraydata2[0]->equipo3_tab1_area_2,
          'equipo4_tab1_area_2' => $arraydata2[0]->equipo4_tab1_area_2,
          'equipo5_tab1_area_2' => $arraydata2[0]->equipo5_tab1_area_2,
          'equipo6_tab1_area_2' => $arraydata2[0]->equipo6_tab1_area_2,
          'fecha_tab1_area2' => Time::now()->toDateTimeString(),
          'status_tab1_area2' => '1',
        ];
        $data3 = [
          'tabla1_area3_id' => null,
          'equipo1_tab1_area_3' => $arraydata3[0]->equipo1_tab1_area_3,
          'equipo2_tab1_area_3' => $arraydata3[0]->equipo2_tab1_area_3,
          'equipo3_tab1_area_3' => $arraydata3[0]->equipo3_tab1_area_3,
          'equipo4_tab1_area_3' => $arraydata3[0]->equipo4_tab1_area_3,
          'equipo5_tab1_area_3' => $arraydata3[0]->equipo5_tab1_area_3,
          'fecha_tab1_area3' => Time::now()->toDateTimeString(),
          'status_tab1_area3' => '1',
        ];
      }else{
        $data1 = [
          'tabla1_area1_id' => null,
          'equipo1_tab1_area_1' => '0',
          'equipo2_tab1_area_1' => '0',
          'fecha_tab1_area1' => Time::now()->toDateTimeString(),
          'status_tab1_area1' => '1',
        ];
        $data2 = [
          'tabla1_area2_id' => null,
          'equipo1_tab1_area_2' => '0',
          'equipo2_tab1_area_2' => '0',
          'equipo3_tab1_area_2' => '0',
          'equipo4_tab1_area_2' => '0',
          'equipo5_tab1_area_2' => '0',
          'equipo6_tab1_area_2' => '0',
          'fecha_tab1_area2' => Time::now()->toDateTimeString(),
          'status_tab1_area2' => '1',
        ];
        $data3 = [
          'tabla1_area3_id' => null,
          'equipo1_tab1_area_3' => '0',
          'equipo2_tab1_area_3' => '0',
          'equipo3_tab1_area_3' => '0',
          'equipo4_tab1_area_3' => '0',
          'equipo5_tab1_area_3' => '0',
          'fecha_tab1_area3' => Time::now()->toDateTimeString(),
          'status_tab1_area3' => '1',
        ];
      }

    // Registrando datos
      $registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla1_area1');
      $registrotabla2 = $this->tabla->RegistroTablas($data2, 'tabla1_area2');
      $registrotabla3 = $this->tabla->RegistroTablas($data3, 'tabla1_area3');

    //Obteniendo datos mejor 
      $datamejorada1 = json_decode($registrotabla1);
      $datamejorada2 = json_decode($registrotabla2);
      $datamejorada3 = json_decode($registrotabla3);

    //Obteniendo datos mejor 
      $datamejorada1 = json_decode($registrotabla1);
      $datamejorada2 = json_decode($registrotabla2);
      $datamejorada3 = json_decode($registrotabla3);

    // Guardando el log
      $guardarlogs = [
        [
          'log_id' => null,
          'log_tabla' => 'tabla1_area1',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada1->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ],
        [
          'log_id' => null,
          'log_tabla' => 'tabla1_area2',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada2->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ],
        [
          'log_id' => null,
          'log_tabla' => 'tabla1_area3',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada3->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ]
      ];
      $this->log->RegistrarLog($guardarlogs);

      return json_encode(array('status' => true, 'registrotabla1' => $datamejorada1, 'registrotabla2' => $datamejorada2, 'registrotabla3' => $datamejorada3));

    }

    public function registroautomaticotabla2()
    {

      $fechayactual = Time::now()->toDateString();
      $fechayer= Time::now()->subDays('1')->toDateString();
      $horanterior = Time::now()->subHours('1')->getHour();

      if ($horanterior == '23') {
        $fechayactual = $fechayer;
      }else{
        $fechayactual = Time::now()->toDateString();
      }

      $fechahorainicial = $fechayactual." ".$horanterior.":00:00";
      $fechahorafinal = $fechayactual." ".$horanterior.":59:59";

      $tabla1 = 'tabla2_area1';
      $arraybusqueda1 = ['fecha_tab2_area1 >='=>$fechahorainicial, 'fecha_tab2_area1 <='=>$fechahorafinal];

      $tabla2 = 'tabla2_area2';
      $arraybusqueda2 = ['fecha_tab2_area2 >='=>$fechahorainicial, 'fecha_tab2_area2 <='=>$fechahorafinal];

      $tabla3 = 'tabla2_area3';
      $arraybusqueda3 = ['fecha_tab2_area3 >='=>$fechahorainicial, 'fecha_tab2_area3 <='=>$fechahorafinal];

      $tabla4 = 'tabla2_area4';
      $arraybusqueda4 = ['fecha_tab2_area4 >='=>$fechahorainicial, 'fecha_tab2_area4 <='=>$fechahorafinal];

      $arraydata1 = $this->tabla->mostrarTodosDatosTablasFechas($tabla1, $arraybusqueda1)->getResult();
      $arraydata2 = $this->tabla->mostrarTodosDatosTablasFechas($tabla2, $arraybusqueda2)->getResult();
      $arraydata3 = $this->tabla->mostrarTodosDatosTablasFechas($tabla3, $arraybusqueda3)->getResult();
      $arraydata4 = $this->tabla->mostrarTodosDatosTablasFechas($tabla4, $arraybusqueda4)->getResult();

      if (count($arraydata1)>0 || count($arraydata2)>0 || count($arraydata3)>0 || count($arraydata4)>0) {
        $data1 = [
          'tabla2_area1_id' => null,
          'equipo1_tab2_area_1' => $arraydata1[0]->equipo1_tab2_area_1,
          'equipo2_tab2_area_1' => $arraydata1[0]->equipo2_tab2_area_1,
          'equipo3_tab2_area_1' => $arraydata1[0]->equipo3_tab2_area_1,
          'fecha_tab2_area1' => Time::now()->toDateTimeString(),
          'status_tab2_area1' => '1',
        ];
        $data2 = [
          'tabla2_area2_id' => null,
          'equipo1_tab2_area_2' => $arraydata2[0]->equipo1_tab2_area_2,
          'equipo2_tab2_area_2' => $arraydata2[0]->equipo2_tab2_area_2,
          'equipo3_tab2_area_2' => $arraydata2[0]->equipo3_tab2_area_2,
          'equipo4_tab2_area_2' => $arraydata2[0]->equipo4_tab2_area_2,
          'equipo5_tab2_area_2' => $arraydata2[0]->equipo5_tab2_area_2,
          'equipo6_tab2_area_2' => $arraydata2[0]->equipo6_tab2_area_2,
          'fecha_tab2_area2' => Time::now()->toDateTimeString(),
          'status_tab2_area2' => '1',
        ];
        $data3 = [
          'tabla2_area3_id' => null,
          'equipo1_tab2_area_3' => $arraydata3[0]->equipo1_tab2_area_3,
          'equipo2_tab2_area_3' => $arraydata3[0]->equipo2_tab2_area_3,
          'equipo3_tab2_area_3' => $arraydata3[0]->equipo3_tab2_area_3,
          'equipo4_tab2_area_3' => $arraydata3[0]->equipo4_tab2_area_3,
          'equipo5_tab2_area_3' => $arraydata3[0]->equipo5_tab2_area_3,
          'equipo6_tab2_area_3' => $arraydata3[0]->equipo6_tab2_area_3,
          'fecha_tab2_area3' => Time::now()->toDateTimeString(),
          'status_tab2_area3' => '1',
        ];
        $data4 = [
          'tabla2_area4_id' => null,
          'equipo1_tab2_area_4' => $arraydata4[0]->equipo1_tab2_area_4,
          'equipo2_tab2_area_4' => $arraydata4[0]->equipo2_tab2_area_4,
          'equipo3_tab2_area_4' => $arraydata4[0]->equipo3_tab2_area_4,
          'equipo4_tab2_area_4' => $arraydata4[0]->equipo4_tab2_area_4,
          'equipo5_tab2_area_4' => $arraydata4[0]->equipo5_tab2_area_4,
          'equipo6_tab2_area_4' => $arraydata4[0]->equipo6_tab2_area_4,
          'fecha_tab2_area4' => Time::now()->toDateTimeString(),
          'status_tab2_area4' => '1',
        ];
      }else{
        $data1 = [
          'tabla2_area1_id' => null,
          'equipo1_tab2_area_1' => '0',
          'equipo2_tab2_area_1' => '0',
          'equipo3_tab2_area_1' => '0',
          'fecha_tab2_area1' => Time::now()->toDateTimeString(),
          'status_tab2_area1' => '1',
        ];
        $data2 = [
          'tabla2_area2_id' => null,
          'equipo1_tab2_area_2' => '0',
          'equipo2_tab2_area_2' => '0',
          'equipo3_tab2_area_2' => '0',
          'equipo4_tab2_area_2' => '0',
          'equipo5_tab2_area_2' => '0',
          'equipo6_tab2_area_2' => '0',
          'fecha_tab2_area2' => Time::now()->toDateTimeString(),
          'status_tab2_area2' => '1',
        ];
        $data3 = [
          'tabla2_area3_id' => null,
          'equipo1_tab2_area_3' => '0',
          'equipo2_tab2_area_3' => '0',
          'equipo3_tab2_area_3' => '0',
          'equipo4_tab2_area_3' => '0',
          'equipo5_tab2_area_3' => '0',
          'equipo6_tab2_area_3' => '0',
          'fecha_tab2_area3' => Time::now()->toDateTimeString(),
          'status_tab2_area3' => '1',
        ];
        $data4 = [
          'tabla2_area4_id' => null,
          'equipo1_tab2_area_4' => '0',
          'equipo2_tab2_area_4' => '0',
          'equipo3_tab2_area_4' => '0',
          'equipo4_tab2_area_4' => '0',
          'equipo5_tab2_area_4' => '0',
          'equipo6_tab2_area_4' => '0',
          'fecha_tab2_area4' => Time::now()->toDateTimeString(),
          'status_tab2_area4' => '1',
        ];
      }

    // Registrando datos
      $registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla2_area1');
      $registrotabla2 = $this->tabla->RegistroTablas($data2, 'tabla2_area2');
      $registrotabla3 = $this->tabla->RegistroTablas($data3, 'tabla2_area3');
      $registrotabla4 = $this->tabla->RegistroTablas($data4, 'tabla2_area4');

    //Obteniendo datos mejor 
      $datamejorada1 = json_decode($registrotabla1);
      $datamejorada2 = json_decode($registrotabla2);
      $datamejorada3 = json_decode($registrotabla3);
      $datamejorada4 = json_decode($registrotabla4);

    // Guardando el log
      $guardarlogs = [
        [
          'log_id' => null,
          'log_tabla' => 'tabla2_area1',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada1->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ],
        [
          'log_id' => null,
          'log_tabla' => 'tabla2_area2',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada2->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ],
        [
          'log_id' => null,
          'log_tabla' => 'tabla2_area3',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada3->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ],
        [
          'log_id' => null,
          'log_tabla' => 'tabla2_area4',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada4->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ]
      ];
      $this->log->RegistrarLog($guardarlogs);
      return json_encode(array('status' => true, 'registrotabla1' => $datamejorada1, 'registrotabla2' => $datamejorada2, 'registrotabla3' => $datamejorada3, 'registrotabla4' => $datamejorada4));
    }

    public function registroautomaticotabla3()
    {
      $fechayactual = Time::now()->toDateString();
      $fechayer= Time::now()->subDays('1')->toDateString();
      $horanterior = Time::now()->subHours('1')->getHour();

      if ($horanterior == '23') {
        $fechayactual = $fechayer;
      }else{
        $fechayactual = Time::now()->toDateString();
      }

      $fechahorainicial = $fechayactual." ".$horanterior.":00:00";
      $fechahorafinal = $fechayactual." ".$horanterior.":59:59";

      $tabla1 = 'tabla3_area1';
      $arraybusqueda1 = ['fecha_tab3_area1 >='=>$fechahorainicial, 'fecha_tab3_area1 <='=>$fechahorafinal];

      $tabla2 = 'tabla3_area2';
      $arraybusqueda2 = ['fecha_tab3_area2 >='=>$fechahorainicial, 'fecha_tab3_area2 <='=>$fechahorafinal];

      $arraydata1 = $this->tabla->mostrarTodosDatosTablasFechas($tabla1, $arraybusqueda1)->getResult();
      $arraydata2 = $this->tabla->mostrarTodosDatosTablasFechas($tabla2, $arraybusqueda2)->getResult();

      if (count($arraydata1)>0 || count($arraydata2)>0) {
        $data1 = [
          'tabla3_area1_id' => null,
          'equipo1_tab3_area_1' => $arraydata1[0]->equipo1_tab3_area_1,
          'equipo2_tab3_area_1' => $arraydata1[0]->equipo2_tab3_area_1,
          'equipo3_tab3_area_1' => $arraydata1[0]->equipo3_tab3_area_1,
          'equipo4_tab3_area_1' => $arraydata1[0]->equipo4_tab3_area_1,
          'equipo5_tab3_area_1' => $arraydata1[0]->equipo5_tab3_area_1,
          'equipo7_tab3_area_1' => $arraydata1[0]->equipo7_tab3_area_1,
          'fecha_tab3_area1' => Time::now()->toDateTimeString(),
          'status_tab3_area1' => '1'
        ];
        $data2 = [
          'tabla3_area2_id' => null,
          'equipo1_tab3_area_2' => $arraydata2[0]->equipo1_tab3_area_2,
          'equipo2_tab3_area_2' => $arraydata2[0]->equipo2_tab3_area_2,
          'equipo3_tab3_area_2' => $arraydata2[0]->equipo3_tab3_area_2,
          'equipo4_tab3_area_2' => $arraydata2[0]->equipo4_tab3_area_2,
          'equipo5_tab3_area_2' => $arraydata2[0]->equipo5_tab3_area_2,
          'equipo7_tab3_area_2' => $arraydata2[0]->equipo7_tab3_area_2,
          'fecha_tab3_area2' => Time::now()->toDateTimeString(),
          'status_tab3_area2' => '1'
        ];
      }else{
        $data1 = [
          'tabla3_area1_id' => null,
          'equipo1_tab3_area_1' => '0',
          'equipo2_tab3_area_1' => '0',
          'equipo3_tab3_area_1' => '0',
          'equipo4_tab3_area_1' => '0',
          'equipo5_tab3_area_1' => '0',
          'equipo7_tab3_area_1' => '0',
          'fecha_tab3_area1' => Time::now()->toDateTimeString(),
          'status_tab3_area1' => '1'
        ];
        $data2 = [
          'tabla3_area2_id' => null,
          'equipo1_tab3_area_2' => '0',
          'equipo2_tab3_area_2' => '0',
          'equipo3_tab3_area_2' => '0',
          'equipo4_tab3_area_2' => '0',
          'equipo5_tab3_area_2' => '0',
          'equipo7_tab3_area_2' => '0',
          'fecha_tab3_area2' => Time::now()->toDateTimeString(),
          'status_tab3_area2' => '1'
        ];
      }

    // Registrando datos
      $registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla3_area1');
      $registrotabla2 = $this->tabla->RegistroTablas($data2, 'tabla3_area2');

    //Obteniendo datos mejor 
      $datamejorada1 = json_decode($registrotabla1);
      $datamejorada2 = json_decode($registrotabla2);

    // Guardando el log
      $guardarlogs = [
        [
          'log_id' => null,
          'log_tabla' => 'tabla3_area1',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada1->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ],
        [
          'log_id' => null,
          'log_tabla' => 'tabla3_area2',
          'log_tipo' => 'registro del sistema',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada2->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ],
      ];
      $this->log->RegistrarLog($guardarlogs);
      return json_encode(array('status' => true, 'registrotabla1' => $datamejorada1, 'registrotabla2' => $datamejorada2));
    }

    public function registroautomaticotabla4()
    {

      $fechayactual = Time::now()->toDateString();
      $fechayer= Time::now()->subDays('1')->toDateString();
      $horanterior = Time::now()->subHours('1')->getHour();

      if ($horanterior == '23') {
        $fechayactual = $fechayer;
      }else{
        $fechayactual = Time::now()->toDateString();
      }

      $fechahorainicial = $fechayactual." ".$horanterior.":00:00";
      $fechahorafinal = $fechayactual." ".$horanterior.":59:59";

      $tabla1 = 'tabla4_area1';
      $arraybusqueda1 = ['fecha_tab4_area1 >='=>$fechahorainicial, 'fecha_tab4_area1 <='=>$fechahorafinal];

      $tabla2 = 'tabla4_area2';
      $arraybusqueda2 = ['fecha_tab4_area2 >='=>$fechahorainicial, 'fecha_tab4_area2 <='=>$fechahorafinal];

      $arraydata1 = $this->tabla->mostrarTodosDatosTablasFechas($tabla1, $arraybusqueda1)->getResult();
      $arraydata2 = $this->tabla->mostrarTodosDatosTablasFechas($tabla2, $arraybusqueda2)->getResult();

      if (count($arraydata1)>0 || count($arraydata2)>0) {

       $data1 = [
        'tabla4_area1_id' => null,
        'equipo1_tab4_area_1' => $arraydata1[0]->equipo1_tab4_area_1,
        'equipo3_tab4_area_1' => $arraydata1[0]->equipo3_tab4_area_1,
        'equipo5_tab4_area_1' => $arraydata1[0]->equipo5_tab4_area_1,
        'equipo6_tab4_area_1' => $arraydata1[0]->equipo6_tab4_area_1,
        'equipo7_tab4_area_1' => $arraydata1[0]->equipo7_tab4_area_1,
        'equipo8_tab4_area_1' => $arraydata1[0]->equipo8_tab4_area_1,
        'equipo9_tab4_area_1' => $arraydata1[0]->equipo9_tab4_area_1,
        'equipo10_tab4_area_1' => $arraydata1[0]->equipo10_tab4_area_1,
        'equipo11_tab4_area_1' => $arraydata1[0]->equipo11_tab4_area_1,
        'equipo12_tab4_area_1' => $arraydata1[0]->equipo12_tab4_area_1,
        'equipo13_tab4_area_1' => $arraydata1[0]->equipo13_tab4_area_1,
        'equipo14_tab4_area_1' => $arraydata1[0]->equipo14_tab4_area_1,
        'equipo15_tab4_area_1' => $arraydata1[0]->equipo15_tab4_area_1,
        'equipo16_tab4_area_1' => $arraydata1[0]->equipo16_tab4_area_1,
        'equipo18_tab4_area_1' => $arraydata1[0]->equipo18_tab4_area_1,
        'fecha_tab4_area1' => Time::now()->toDateTimeString(),
        'status_tab4_area1' => '1'
      ];
      $data2 = [
        'tabla4_area2_id' => null,
        'equipo1_tab4_area_2' => $arraydata2[0]->equipo1_tab4_area_2,
        'equipo2_tab4_area_2' => $arraydata2[0]->equipo2_tab4_area_2,
        'equipo3_tab4_area_2' => $arraydata2[0]->equipo3_tab4_area_2,
        'fecha_tab4_area2' => Time::now()->toDateTimeString(),
        'status_tab4_area2' => '1'
      ];
    }else{
     $data1 = [
      'tabla4_area1_id' => null,
      'equipo1_tab4_area_1' => '0',
      'equipo3_tab4_area_1' => '0',
      'equipo5_tab4_area_1' => '0',
      'equipo6_tab4_area_1' => '0',
      'equipo7_tab4_area_1' => '0',
      'equipo8_tab4_area_1' => '0',
      'equipo9_tab4_area_1' => '0',
      'equipo10_tab4_area_1' => '0',
      'equipo11_tab4_area_1' => '0',
      'equipo12_tab4_area_1' => '0',
      'equipo13_tab4_area_1' => '0',
      'equipo14_tab4_area_1' => '0',
      'equipo15_tab4_area_1' => '0',
      'equipo16_tab4_area_1' => '0',
      'equipo18_tab4_area_1' => '0',
      'fecha_tab4_area1' => Time::now()->toDateTimeString(),
      'status_tab4_area1' => '1'
    ];
    $data2 = [
      'tabla4_area2_id' => null,
      'equipo1_tab4_area_2' => '0',
      'equipo2_tab4_area_2' => '0',
      'equipo3_tab4_area_2' => '0',
      'fecha_tab4_area2' => Time::now()->toDateTimeString(),
      'status_tab4_area2' => '1'
    ];
  }

    // Registrando datos
  $registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla4_area1');
  $registrotabla2 = $this->tabla->RegistroTablas($data2, 'tabla4_area2');

    //Obteniendo datos mejor 
  $datamejorada1 = json_decode($registrotabla1);
  $datamejorada2 = json_decode($registrotabla2);

    // Guardando el log
  $guardarlogs = [
    [
      'log_id' => null,
      'log_tabla' => 'tabla4_area1',
      'log_tipo' => 'registro del sistema',
      'log_fecha' => Time::now()->toDateTimeString(),
      'log_id_referencia' => $datamejorada1->retornoid,
      'usuario_id' => $this->session->get('usuario_id')
    ],
    [
      'log_id' => null,
      'log_tabla' => 'tabla4_area2',
      'log_tipo' => 'registro del sistema',
      'log_fecha' => Time::now()->toDateTimeString(),
      'log_id_referencia' => $datamejorada2->retornoid,
      'usuario_id' => $this->session->get('usuario_id')
    ],
  ];
  $this->log->RegistrarLog($guardarlogs);
  return json_encode(array('status' => true, 'registrotabla1' => $datamejorada1, 'registrotabla2' => $datamejorada2));
}

public function registroautomaticotabla5()
{
  $fechayactual = Time::now()->toDateString();
  $fechayer= Time::now()->subDays('1')->toDateString();
  $horanterior = Time::now()->subHours('1')->getHour();

  if ($horanterior == '23') {
    $fechayactual = $fechayer;
  }else{
    $fechayactual = Time::now()->toDateString();
  }

  $fechahorainicial = $fechayactual." ".$horanterior.":00:00";
  $fechahorafinal = $fechayactual." ".$horanterior.":59:59";

  $tabla1 = 'tabla5_area1';
  $arraybusqueda1 = ['fecha_tab5_area1 >='=>$fechahorainicial, 'fecha_tab5_area1 <='=>$fechahorafinal];

  $tabla2 = 'tabla5_area2';
  $arraybusqueda2 = ['fecha_tab5_area2 >='=>$fechahorainicial, 'fecha_tab5_area2 <='=>$fechahorafinal];

  $tabla3 = 'tabla5_area3';
  $arraybusqueda3 = ['fecha_tab5_area3 >='=>$fechahorainicial, 'fecha_tab5_area3 <='=>$fechahorafinal];

  $tabla4 = 'tabla5_area4';
  $arraybusqueda4 = ['fecha_tab5_area4 >='=>$fechahorainicial, 'fecha_tab5_area4 <='=>$fechahorafinal];

  $arraydata1 = $this->tabla->mostrarTodosDatosTablasFechas($tabla1, $arraybusqueda1)->getResult();
  $arraydata2 = $this->tabla->mostrarTodosDatosTablasFechas($tabla2, $arraybusqueda2)->getResult();
  $arraydata3 = $this->tabla->mostrarTodosDatosTablasFechas($tabla3, $arraybusqueda3)->getResult();
  $arraydata4 = $this->tabla->mostrarTodosDatosTablasFechas($tabla4, $arraybusqueda4)->getResult();

  if (count($arraydata1)>0 || count($arraydata2)>0 || count($arraydata3)>0 || count($arraydata4)>0) {
   $data1 = [
    'tabla5_area1_id' => null,
    'equipo1_tab5_area_1' => $arraydata1[0]->equipo1_tab5_area_1,
    'equipo2_tab5_area_1' => $arraydata1[0]->equipo2_tab5_area_1,
    'equipo3_tab5_area_1' => $arraydata1[0]->equipo3_tab5_area_1,
    'equipo4_tab5_area_1' => $arraydata1[0]->equipo4_tab5_area_1,
    'fecha_tab5_area1' => Time::now()->toDateTimeString(),
    'status_tab5_area1' => '1',
  ];
  $data2 = [
    'tabla5_area2_id' => null,
    'equipo1_tab5_area_2' => $arraydata2[0]->equipo1_tab5_area_2,
    'equipo2_tab5_area_2' => $arraydata2[0]->equipo2_tab5_area_2,
    'equipo3_tab5_area_2' => $arraydata2[0]->equipo3_tab5_area_2,
    'equipo4_tab5_area_2' => $arraydata2[0]->equipo4_tab5_area_2,
    'equipo5_tab5_area_2' => $arraydata2[0]->equipo5_tab5_area_2,
    'fecha_tab5_area2' => Time::now()->toDateTimeString(),
    'status_tab5_area2' => '1'
  ];
  $data3 = [
    'tabla5_area3_id' => null,
    'equipo1_tab5_area_3' => $arraydata3[0]->equipo1_tab5_area_3,
    'equipo2_tab5_area_3' => $arraydata3[0]->equipo2_tab5_area_3,
    'equipo3_tab5_area_3' => $arraydata3[0]->equipo3_tab5_area_3,
    'equipo4_tab5_area_3' => $arraydata3[0]->equipo4_tab5_area_3,
    'equipo5_tab5_area_3' => $arraydata3[0]->equipo5_tab5_area_3,
    'fecha_tab5_area3' => Time::now()->toDateTimeString(),
    'status_tab5_area3' => '1'
  ];
  $data4 = [
    'tabla5_area4_id' => null,
    'equipo1_tab5_area_4' => $arraydata4[0]->equipo1_tab5_area_4,
    'equipo2_tab5_area_4' => $arraydata4[0]->equipo2_tab5_area_4,
    'fecha_tab5_area4' => Time::now()->toDateTimeString(),
    'status_tab5_area4' => '1'
  ];
}else{
 $data1 = [
  'tabla5_area1_id' => null,
  'equipo1_tab5_area_1' => '0',
  'equipo2_tab5_area_1' => '0',
  'equipo3_tab5_area_1' => '0',
  'equipo4_tab5_area_1' => '0',
  'fecha_tab5_area1' => Time::now()->toDateTimeString(),
  'status_tab5_area1' => '1',
];
$data2 = [
  'tabla5_area2_id' => null,
  'equipo1_tab5_area_2' => '0',
  'equipo2_tab5_area_2' => '0',
  'equipo3_tab5_area_2' => '0',
  'equipo4_tab5_area_2' => '0',
  'equipo5_tab5_area_2' => '0',
  'fecha_tab5_area2' => Time::now()->toDateTimeString(),
  'status_tab5_area2' => '1'
];
$data3 = [
  'tabla5_area3_id' => null,
  'equipo1_tab5_area_3' => '0',
  'equipo2_tab5_area_3' => '0',
  'equipo3_tab5_area_3' => '0',
  'equipo4_tab5_area_3' => '0',
  'equipo5_tab5_area_3' => '0',
  'fecha_tab5_area3' => Time::now()->toDateTimeString(),
  'status_tab5_area3' => '1'
];
$data4 = [
  'tabla5_area4_id' => null,
  'equipo1_tab5_area_4' => '0',
  'equipo2_tab5_area_4' => '0',
  'fecha_tab5_area4' => Time::now()->toDateTimeString(),
  'status_tab5_area4' => '1'
];
}


    // Registrando datos
$registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla5_area1');
$registrotabla2 = $this->tabla->RegistroTablas($data2, 'tabla5_area2');
$registrotabla3 = $this->tabla->RegistroTablas($data3, 'tabla5_area3');
$registrotabla4 = $this->tabla->RegistroTablas($data4, 'tabla5_area4');

    //Obteniendo datos mejor 
$datamejorada1 = json_decode($registrotabla1);
$datamejorada2 = json_decode($registrotabla2);
$datamejorada3 = json_decode($registrotabla3);
$datamejorada4 = json_decode($registrotabla4);
    // Guardando el log
$guardarlogs = [
  [
    'log_id' => null,
    'log_tabla' => 'tabla5_area1',
    'log_tipo' => 'registro del sistema',
    'log_fecha' => Time::now()->toDateTimeString(),
    'log_id_referencia' => $datamejorada1->retornoid,
    'usuario_id' => $this->session->get('usuario_id')
  ],
  [
    'log_id' => null,
    'log_tabla' => 'tabla5_area2',
    'log_tipo' => 'registro del sistema',
    'log_fecha' => Time::now()->toDateTimeString(),
    'log_id_referencia' => $datamejorada2->retornoid,
    'usuario_id' => $this->session->get('usuario_id')
  ],
  [
    'log_id' => null,
    'log_tabla' => 'tabla5_area3',
    'log_tipo' => 'registro del sistema',
    'log_fecha' => Time::now()->toDateTimeString(),
    'log_id_referencia' => $datamejorada3->retornoid,
    'usuario_id' => $this->session->get('usuario_id')
  ],
  [
    'log_id' => null,
    'log_tabla' => 'tabla5_area4',
    'log_tipo' => 'registro del sistema',
    'log_fecha' => Time::now()->toDateTimeString(),
    'log_id_referencia' => $datamejorada4->retornoid,
    'usuario_id' => $this->session->get('usuario_id')
  ],
];
$this->log->RegistrarLog($guardarlogs);
return json_encode(array('status' => true, 'registrotabla1' => $datamejorada1, 'registrotabla2' => $datamejorada2, 'registrotabla3' => $datamejorada3, 'registrotabla4' => $datamejorada4));
}

}