<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json,text/html; charset=utf-8');

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
// use App\Models\UsuarioModel;
use CodeIgniter\I18n\Time;
use App\Models\Tabla;
use App\Models\Log;
use App\Controllers\Tabla1;
use App\Controllers\Tabla2;
use App\Controllers\Tabla3;
use App\Controllers\Tabla4;
use App\Controllers\Tabla5;
use App\Controllers\Tabla6;
use App\Controllers\FuncionesUtiles;
use TCPDF;

class Tabla7 extends Controller
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
    $this->tabla1 = new Tabla1();
    $this->tabla2 = new Tabla2();
    $this->tabla3 = new Tabla3();
    $this->tabla4 = new Tabla4();
    $this->tabla5 = new Tabla5();
    $this->tabla6 = new Tabla6();
  }

  public function mostrarfechascargadas()
  {
    $where = array('0' => 'fecha_inicial_tab6_area1', '1' => 'fecha_final_tab6_area1');
    $tabla6_area1 = $this->tabla->mostrarfechascargadastabla6('tabla6_area1', $where)->getResult();
    echo json_encode($tabla6_area1);
  }

  public function buscardatostabla7()
  {
    $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);
    $fechasnew = explode(' - ',  $fechas);
    $fechainicialmod = $fechasnew[0];
    $fechafinalmod = $fechasnew[1];

    if ($fechainicialmod == $fechafinalmod) {
      echo json_encode(array('status' => false, 'msg'=>'Las fechas no deben ser iguales'));
    }else{
    //Trayendo datos desde la tabla 1
      $datostabla1 = $this->tabla1->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla1 = json_decode($datostabla1);

    //Trayendo datos desde la tabla 2
      $datostabla2 = $this->tabla2->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla2 = json_decode($datostabla2);

    //Trayendo datos desde la tabla 3
      $datostabla3 = $this->tabla3->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla3 = json_decode($datostabla3);

    //Trayendo datos desde la tabla 4
      $datostabla4 = $this->tabla4->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla4 = json_decode($datostabla4);

      $datostabla5 = $this->tabla5->llevandoDatosTabla7y8('06',$fechafinalmod);
      $datamejortabla5 = json_decode($datostabla5);

    //Trayendo datos desde la tabla 6
      $datostabla6 = $this->tabla6->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla6 = json_decode($datostabla6);

      if ($datamejortabla1->status && $datamejortabla2->status && $datamejortabla3->status && $datamejortabla4->status && $datamejortabla6->status && $datamejortabla5->status) {
        $resultadotablas = $this->tablalastvalor6am($datamejortabla1,$datamejortabla2,$datamejortabla3,$datamejortabla4,$datamejortabla5,$datamejortabla6);
        $arrayFinal = array('status' => true,'resultadotablas' => $resultadotablas,  'fechainicialmod' => $fechainicialmod, 'fechafinalmod' => $fechafinalmod);
      }else{
        $arrayFinal = array('status' => false,'msg'=>'Hubo un error al calcular todos los datos, asegurese de tener todos los datos en las tablas de la fecha seleccionada');
      }

      echo json_encode($arrayFinal);
    }
  }

  public function tablalastvalor6am($datamejortabla1,$datamejortabla2,$datamejortabla3,$datamejortabla4,$datamejortabla5,$datamejortabla6)
  {
    //Datos de la tabla 1
    $tab1arrayequipo1area1 = $datamejortabla1->arrayequipo1area1;
    $tab1arrayequipo1area2 = $datamejortabla1->arrayequipo1area2;
    $tab1arrayequipo2area2 = $datamejortabla1->arrayequipo2area2;
    $tab1arrayequipo3area3 = $datamejortabla1->arrayequipo3area3;

    //Datos de la tabla 2
    $tab2arrayequipo1area1 = $datamejortabla2->arrayequipo1area1;
    $tab2arrayequipo2area1 = $datamejortabla2->arrayequipo2area1;
    $tab2arrayequipo1area2 = $datamejortabla2->arrayequipo1area2;
    $tab2arrayequipo2area2 = $datamejortabla2->arrayequipo2area2;
    $tab2arrayequipo4area2 = $datamejortabla2->arrayequipo4area2;
    $tab2arrayequipo1area3 = $datamejortabla2->arrayequipo1area3;
    $tab2arrayequipo2area3 = $datamejortabla2->arrayequipo2area3;
    $tab2arrayequipo4area3 = $datamejortabla2->arrayequipo4area3;
    $tab2arrayequipo1area4 = $datamejortabla2->arrayequipo1area4;
    $tab2arrayequipo2area4 = $datamejortabla2->arrayequipo2area4;
    $tab2arrayequipo4area4 = $datamejortabla2->arrayequipo4area4;

    //Datos de la tabla 3
    $tab3arrayequipo1area1 = $datamejortabla3->arrayequipo1area1;
    $tab3arrayequipo2area1 = $datamejortabla3->arrayequipo2area1;
    $tab3arrayequipo4area1 = $datamejortabla3->arrayequipo4area1;
    $tab3arrayequipo2area2 = $datamejortabla3->arrayequipo2area2;
    $tab3arrayequipo4area2 = $datamejortabla3->arrayequipo4area2;

    //Datos de la tabla 4
    $tab4arrayequipo14area1 = $datamejortabla4->arrayequipo14area1;
    $tab4arrayequipo15area1 = $datamejortabla4->arrayequipo15area1;

    //Datos de la tabla 5
    $E110 = $datamejortabla5->equit5area2num2;
    $E111 = $datamejortabla5->equit5area2num3;
    $E116 = $datamejortabla5->equit5area3num2;
    $E117 = $datamejortabla5->equit5area3num3;
    // $E121 = $datamejortabla5->equit5area4num1;
    // $E122 = $datamejortabla5->equit5area4num2;

    //Datos de la tabla 6
    // calculosarea2
    // calculosarea3
    // datostabla6
    $datostabla6 = $datamejortabla6->datostabla6;
    $E131 = $this->funcion->transformardecimales($datostabla6->equipo5_tab6_area_1);
    $E132 = $this->funcion->transformardecimales($datostabla6->equipo6_tab6_area_1);
    $E133 = $this->funcion->transformardecimales($datostabla6->equipo7_tab6_area_1);
    $E134 = $this->funcion->transformardecimales($datostabla6->equipo8_tab6_area_1);
    $E135 = $this->funcion->transformardecimales($datostabla6->equipo9_tab6_area_1);
    $E136 = $this->funcion->transformardecimales($datostabla6->equipo10_tab6_area_1);

    $datostabla6f2 = $datamejortabla6->calculosarea2->datosmostrararea2filaf;
    $F139N = $this->funcion->transformardecimales($datostabla6f2->F139N); 
    $F139S = $this->funcion->transformardecimales($datostabla6f2->F139S);
    $F140N = $this->funcion->transformardecimales($datostabla6f2->F140N);
    $F140S = $this->funcion->transformardecimales($datostabla6f2->F140S);
    $F141 = $this->funcion->transformardecimales($datostabla6f2->F141);
    $F142 = $this->funcion->transformardecimales($datostabla6f2->F142);
    $F143 = $this->funcion->transformardecimales($datostabla6f2->F143);

// columna D
    $DE6S = $F139S;
    $DE6N = $F139N;
    $DE7S = $F140S;
    $DE7N = $F140N;
    $DE9 = $F143;
    $DE1011 = $F141;
    $DE1213 = $F142;
    $DE8 = $DE1011+$DE1213;


    $J6 = ($E135-$E136)/($E135)*100; //TABLA 7
    $J7 = ($E131-$E132)/($E131)*100; //TABLA 7
    $J8 = ($E133-$E134)/($E133)*100; //TABLA 7

    $J9 = $E111;
    $J10 = $E110;
    $J11 = $J9 + $J10;
    $J12 = $E117;
    $J13 = $E116;
    $J14 = $J12 + $J13;
    $J15 = $J9 + $J12;
    $J16 = $J10 + $J13;
    $J17 = $J15 + $J16;

    if ($J17 == '0') {
      $J18 = ($J16/1)*100; 
    }else{
      $J18 = ($J16/$J17)*100; 
    }

    // array 20 = 6am
    // array 27 = promedio6am
    // array 26 = 12m
    // array 28 = promedio12am
    // AF = Promedio 6AM
    // X = 6AM
    // AH = Promedio 12M
    // AD = 12M

    // Sacando los datos de los arrays de la Tabla 1
    $AF8 = $tab1arrayequipo1area1[27];
    $X8 = $tab1arrayequipo1area1[20];
    $AF12 = $tab1arrayequipo1area2[27];
    $X12 = $tab1arrayequipo1area2[20];
    $X13 = $tab1arrayequipo2area2[20];
    $AF22 = $tab1arrayequipo3area3[27];
    $X22 = $tab1arrayequipo3area3[20];

    // Sacando los datos de los arrays de la Tabla 2
    $AF27 = $tab2arrayequipo1area1[27];
    $X27 = $tab2arrayequipo1area1[20];
    $AF28 = $tab2arrayequipo2area1[27];
    $AF32 = $tab2arrayequipo1area2[27];
    $X32 = $tab2arrayequipo1area2[20];
    $AF33 = $tab2arrayequipo2area2[27];
    $X33 = $tab2arrayequipo2area2[20];
    $AF35 = $tab2arrayequipo4area2[27];
    $AF40 = $tab2arrayequipo1area3[27];
    $X40 = $tab2arrayequipo1area3[20];
    $AF41 = $tab2arrayequipo2area3[27];
    $X41 = $tab2arrayequipo2area3[20];
    $AF43 = $tab2arrayequipo4area3[27];
    $AF48 = $tab2arrayequipo1area4[27];
    $X48 = $tab2arrayequipo1area4[20];
    $AF49 = $tab2arrayequipo2area4[27];
    $X49 = $tab2arrayequipo2area4[20];
    $AF51 = $tab2arrayequipo4area4[27];

    // Sacando los datos de los arrays de la Tabla 3
    $AF57 = $tab3arrayequipo1area1[27];
    $X57 = $tab3arrayequipo1area1[20];
    $AF58 = $tab3arrayequipo2area1[27];
    $X58 = $tab3arrayequipo2area1[20];
    $AF60 = $tab3arrayequipo4area1[27];
    $AF68 = $tab3arrayequipo2area2[27];
    $X68 = $tab3arrayequipo2area2[20];
    $AF70 = $tab3arrayequipo4area2[27];

    // Sacando los datos de los arrays de la Tabla 4
    $AF90 = $tab4arrayequipo14area1[27];
    $X90 = $tab4arrayequipo14area1[20];
    $AF91 = $tab4arrayequipo15area1[27];
    $X91 = $tab4arrayequipo15area1[20];

    //Haciendo los array new 
    $arrayTab1 = array(
      'AF8' => $AF8, 'X8' => $X8,
      'AF12' => $AF12, 'X12' => $X12,
      'X13' => $X13,
      'AF22' => $AF22, 'X22' => $X22
    );

    $arrayTab2 = array(
      'AF27' => $AF27, 'X27' => $X27,
      'AF28' => $AF28,
      'AF32' => $AF32, 'X32' => $X32,
      'AF33' => $AF33, 'X33' => $X33,
      'AF35' => $AF35,
      'AF40' => $AF40, 'X40' => $X40,
      'AF41' => $AF41, 'X41' => $X41,
      'AF43' => $AF43,
      'AF48' => $AF48, 'X48' => $X48,
      'AF49' => $AF49, 'X49' => $X49,
      'AF51' => $AF51,
    );

    $arrayTab3 = array(
      'AF57' => $AF57, 'X57' => $X57,
      'AF58' => $AF58, 'X58' => $X58,
      'AF60' => $AF60,
      'AF68' => $AF68, 'X68' => $X68,
      'AF70' => $AF70,
    );

    $arrayTab4 = array(
      'AF90' => $AF90, 'X90' => $X90,
      'AF91' => $AF91, 'X91' => $X91,
    );


    $arrayTab5 = array(
      'J9' => number_format($J9, '2', ',', '.'),
      'J10' => number_format($J10, '2', ',', '.'),
      'J11' => number_format($J11, '2', ',', '.'),
      'J12' => number_format($J12, '2', ',', '.'),
      'J13' => number_format($J13, '2', ',', '.'),
      'J14' => number_format($J14, '2', ',', '.'),
      'J15' => number_format($J15, '2', ',', '.'),
      'J16' => number_format($J16, '2', ',', '.'),
      'J17' => number_format($J17, '2', ',', '.'),
      'J18' => number_format($J18, '2', ',', '.')
    );

    $arrayTab6 = array(
      'J6' => number_format($J6, '2', ',', '.'),
      'J7' => number_format($J7, '2', ',', '.'),
      'J8' => number_format($J8, '2', ',', '.'),
      'E131' => $E131,
      'E132' => $E132,
      'E133' => $E133,
      'E134' => $E134,
      'E135' => $E135,
      'E136' => $E136,
      'DE6S' => $DE6S,
      'DE6N' => $DE6N,
      'DE7S' => $DE7S,
      'DE7N' => $DE7N,
      'DE9' => $DE9,
      'DE1011' => $DE1011,
      'DE1213' => $DE1213,
      'DE8' => $DE8
    );

    $arrayreturn = array('arrayTab1' => $arrayTab1, 'arrayTab2' => $arrayTab2, 'arrayTab3' => $arrayTab3, 'arrayTab4' => $arrayTab4, 'arrayTab5' => $arrayTab5, 'arrayTab6' => $arrayTab6);
    return $arrayreturn;
  }



  public function reportetabla7()
  {
   header('Content-Type: application/pdf');
   header('Content-Disposition: inline; filename="VivesPromocion.pdf"');

   $selecreportetabla7 = $this->request->getPost('selecreportetabla7', FILTER_SANITIZE_STRING);
   $fechatabla7 = $this->request->getPost('fechatabla7', FILTER_SANITIZE_STRING);
   $fechasnew = explode(' - ',  $fechatabla7);
   $fechainicialmod = $fechasnew[0];
   $fechafinalmod = $fechasnew[1];

   $F139 = $this->request->getPost('F139', FILTER_SANITIZE_STRING);
   $J6 = $this->request->getPost('J6', FILTER_SANITIZE_STRING);
   $J7 = $this->request->getPost('J7', FILTER_SANITIZE_STRING);
   $F140 = $this->request->getPost('F140', FILTER_SANITIZE_STRING);
   $DE8 = $this->request->getPost('DE8', FILTER_SANITIZE_STRING);
   $J8 = $this->request->getPost('J8', FILTER_SANITIZE_STRING);
   $F143 = $this->request->getPost('F143', FILTER_SANITIZE_STRING);
   $J9 = $this->request->getPost('J9', FILTER_SANITIZE_STRING);
   $F141 = $this->request->getPost('F141', FILTER_SANITIZE_STRING);
   $J10 = $this->request->getPost('J10', FILTER_SANITIZE_STRING);
   $J11 = $this->request->getPost('J11', FILTER_SANITIZE_STRING);
   $F142 = $this->request->getPost('F142', FILTER_SANITIZE_STRING);
   $J12 = $this->request->getPost('J12', FILTER_SANITIZE_STRING);
   $J13 = $this->request->getPost('J13', FILTER_SANITIZE_STRING);
   $J14 = $this->request->getPost('J14', FILTER_SANITIZE_STRING);
   $J15 = $this->request->getPost('J15', FILTER_SANITIZE_STRING);
   $J16 = $this->request->getPost('J16', FILTER_SANITIZE_STRING);
   $J17 = $this->request->getPost('J17', FILTER_SANITIZE_STRING);
   $J18 = $this->request->getPost('J18', FILTER_SANITIZE_STRING);
   $AF8 = $this->request->getPost('AF8', FILTER_SANITIZE_STRING);
   $X8 = $this->request->getPost('X8', FILTER_SANITIZE_STRING);
   $AF12 = $this->request->getPost('AF12', FILTER_SANITIZE_STRING);
   $AF27 = $this->request->getPost('AF27', FILTER_SANITIZE_STRING);
   $X12 = $this->request->getPost('X12', FILTER_SANITIZE_STRING);
   $X13 = $this->request->getPost('X13', FILTER_SANITIZE_STRING);
   $AF22 = $this->request->getPost('AF22', FILTER_SANITIZE_STRING);
   $AF28 = $this->request->getPost('AF28', FILTER_SANITIZE_STRING);
   $X22 = $this->request->getPost('X22', FILTER_SANITIZE_STRING);
   $X27 = $this->request->getPost('X27', FILTER_SANITIZE_STRING);
   $AF32 = $this->request->getPost('AF32', FILTER_SANITIZE_STRING);
   $AF33 = $this->request->getPost('AF33', FILTER_SANITIZE_STRING);
   $AF35 = $this->request->getPost('AF35', FILTER_SANITIZE_STRING);
   $X32 = $this->request->getPost('X32', FILTER_SANITIZE_STRING);
   $X33 = $this->request->getPost('X33', FILTER_SANITIZE_STRING);
   $AF40 = $this->request->getPost('AF40', FILTER_SANITIZE_STRING);
   $AF41 = $this->request->getPost('AF41', FILTER_SANITIZE_STRING);
   $AF43 = $this->request->getPost('AF43', FILTER_SANITIZE_STRING);
   $X40 = $this->request->getPost('X40', FILTER_SANITIZE_STRING);
   $X41 = $this->request->getPost('X41', FILTER_SANITIZE_STRING);
   $AF48 = $this->request->getPost('AF48', FILTER_SANITIZE_STRING);
   $AF49 = $this->request->getPost('AF49', FILTER_SANITIZE_STRING);
   $AF51 = $this->request->getPost('AF51', FILTER_SANITIZE_STRING);
   $X48 = $this->request->getPost('X48', FILTER_SANITIZE_STRING);
   $X49 = $this->request->getPost('X49', FILTER_SANITIZE_STRING);
   $AF57 = $this->request->getPost('AF57', FILTER_SANITIZE_STRING);
   $X57 = $this->request->getPost('X57', FILTER_SANITIZE_STRING);
   $AF58 = $this->request->getPost('AF58', FILTER_SANITIZE_STRING);
   $AF60 = $this->request->getPost('AF60', FILTER_SANITIZE_STRING);
   $X58 = $this->request->getPost('X58', FILTER_SANITIZE_STRING);
   $AF68 = $this->request->getPost('AF68', FILTER_SANITIZE_STRING);
   $AF70 = $this->request->getPost('AF70', FILTER_SANITIZE_STRING);
   $X68 = $this->request->getPost('X68', FILTER_SANITIZE_STRING);
   $AF90 = $this->request->getPost('AF90', FILTER_SANITIZE_STRING);
   $AF91 = $this->request->getPost('AF91', FILTER_SANITIZE_STRING);
   $X90 = $this->request->getPost('X90', FILTER_SANITIZE_STRING);
   $X91 = $this->request->getPost('X91', FILTER_SANITIZE_STRING);

   $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   // $pdf->SetProtection(array('print', 'copy'), '', null, 0, null);
   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
   $pdf->setFontSubsetting(true);
   $pdf->SetFont('dejavusans', '', 11, '', true);
   $pdf->AddPage();

   $usuario_cedula = $this->session->get('usuario_cedula');
   $usuario_nombre = $this->session->get('usuario_nombre');
   $usuario_apellido =  $this->session->get('usuario_apellido');
   
  $nombrefull = $usuario_nombre." ".$usuario_apellido;

   $pdf->Write(0, 'Reporte tabla 7 de Fecha: '.$fechatabla7, '', 0, 'L', true, 0, false, false, 0);
   $pdf->Write(0, 'Caso seleccionado: '.$selecreportetabla7, '', 0, 'L', true, 0, false, false, 0);
   $pdf->Write(0, 'Usuario que descargo el archivo: ', '', 0, 'L', true, 0, false, false, 0);
   $pdf->Write(0, 'C.I: '.$usuario_cedula, '', 0, 'L', true, 0, false, false, 0);
   $pdf->Write(0, 'Nombre: '.$nombrefull, '', 0, 'L', true, 0, false, false, 0);

   $html = <<<EOD
   <table border="1" cellpadding="1" cellspacing="0" style="width: 100%">
   <thead>
   <tr style="background-color:#FFFF00;color:#0000FF;">
   <th colspan="4" align="center" style="text-align: center;">FECHA DESDE: $fechainicialmod 12:00:00 PM</th>
   <th colspan="3" align="center" style="text-align: center;">HASTA $fechafinalmod 6:00:00 AM</th>
   </tr>
   <tr style="background-color:#FF0000;color:#FFFF00;">
   <th colspan="4" align="center" style="text-align: center;">PARÁMETROS DEL GAS</th>        
   <th colspan="3" align="center" style="text-align: center;">PARÁMETROS DE LOS LÌQUIDOS</th>
   </tr>
   </thead>
   <tbody width="100%">
   <tr>
   <td colspan="2" align="center">Vol.de Gas Procesado</td>
   <td colspan="1" align="center">$F139</td>
   <td colspan="1" align="center">PCN</td>
   <td colspan="2" align="center">% Agua Libre (Ayer)</td>
   <td colspan="1" align="center">$J6</td>
   </tr>
   <tr>
   <td colspan="2" align="center">Vol. de Gas Entregado a Turbina</td>
   <td colspan="1" align="center">$F140</td>
   <td colspan="1" align="center">PCN</td>
   <td colspan="1" rowspan="2" align="center">Vol. de Agua Ayer (Bls.)</td>
   <td colspan="1" align="center">40-TK-002A</td>
   <td colspan="1" align="center">$J7</td>
   </tr>
   <tr>
   <td colspan="2" align="center">Vol. de Gas Combustible Total</td>
   <td colspan="1" align="center">$DE8</td>
   <td colspan="1" align="center">PCN</td>
   <td colspan="1" align="center">40-TK-002B</td>
   <td colspan="1" align="center">$J8</td>
   </tr>
   <tr>
   <td colspan="2" align="center">Vol. de Gas Quemado</td>
   <td colspan="1" align="center">$F143</td>
   <td colspan="1" align="center">PCN</td>
   <td colspan="1" rowspan="3" align="center">Vol. de Ingresados al 40-TK-002A</td>
   <td colspan="1" align="center">Condensado</td>
   <td colspan="1" align="center">$J9</td>
   </tr>
   <tr>
   <td colspan="2" rowspan="2" align="center">Vol. de Gas combustible Calentador 31-E-301</td>
   <td colspan="1" rowspan="2" align="center">$F141</td>
   <td colspan="1" rowspan="2" align="center">PCN</td>
   <td colspan="1" rowspan="1" align="center">Agua</td>
   <td colspan="1" rowspan="1" align="center">$J10</td>
   </tr>
   <tr>
   <td colspan="1" align="center">Total (Bls)</td>
   <td colspan="1" align="center">$J11</td>
   </tr>
   <tr>
   <td colspan="2" rowspan="2" align="center">Vol. de Gas combustible Calentador 31-E-401</td>
   <td colspan="1" rowspan="2" align="center">$F142</td>
   <td colspan="1" rowspan="2" align="center">PCN</td>
   <td colspan="1" rowspan="3" align="center">Vol. de Ingresados al 40-TK-002B</td>
   <td colspan="1" align="center">Condensado</td>
   <td colspan="1" align="center">$J12</td>
   </tr>
   <tr>
   <td colspan="1" align="center">Agua</td>
   <td colspan="1" align="center">$J13</td>
   </tr>
   <tr>
   <td colspan="4" align="center" rowspan="5">PRE-CIERRE (6 AM)</td>
   <td colspan="1" align="center">Total (Bls)</td>
   <td colspan="1" align="center">$J14</td>
   </tr>
   <tr>
   <td colspan="1" rowspan="4" align="center">Vol. de Líquidos Ingresados a PTG-OBP-01</td>
   <td colspan="1" align="center">Condensado</td>
   <td colspan="1" align="center">$J15</td>
   </tr>
   <tr>
   <td colspan="1" align="center">Agua</td>
   <td colspan="1" align="center">$J16</td>
   </tr>
   <tr>
   <td colspan="1" align="center">Total</td>
   <td colspan="1" align="center">$J17</td>
   </tr>
   <tr>
   <td colspan="1" align="center">% Agua Libre</td>
   <td colspan="1" align="center">$J18</td>
   </tr>
   <tr>
   <td colspan="2" align="center"></td>
   <td colspan="3" align="center">PROMEDIO AL CIERRE</td>
   <td colspan="2" align="center">ÚLTIMO VALOR (6 AM)</td>
   </tr>
   <tr>
   <td colspan="2" rowspan="2" align="center">EQUIPO</td>
   <td colspan="1" align="center">PRESION</td>
   <td colspan="1" align="center">TEMP</td>
   <td colspan="1" align="center">NIVEL</td>
   <td colspan="1" align="center">PRESION</td>
   <td colspan="1" align="center">TEMP</td>
   </tr>
   <tr>
   <td colspan="1" align="center">Lpc</td>
   <td colspan="1" align="center">ºF</td>
   <td colspan="1" align="center">%</td>
   <td colspan="1" align="center">Lpc</td>
   <td colspan="1" align="center">ºF</td>
   </tr>
   <tr>
   <td colspan="2" align="center">ENTRADA GASODUCTO (03-PIT-01)</td>
   <td colspan="1" align="center">$AF8</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$X8</td>
   <td colspan="1" align="center">N/A</td>
   </tr>
   <tr>
   <td colspan="2" align="center">ENTRADA SLUG CATCHER (03-PIT-02)</td>
   <td colspan="1" align="center">$AF12</td>
   <td colspan="1" align="center">$AF27</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$X12</td>
   <td colspan="1" align="center">$X13</td>
   </tr>
   <tr>
   <td colspan="2" align="center">ENTRADA DEPURADORES</td>
   <td colspan="1" align="center">$AF22</td>
   <td colspan="1" align="center">$AF28</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$X22</td>
   <td colspan="1" align="center">$X27</td>
   </tr>
   <tr>
   <td colspan="2" align="center">DEPURADOR 30-V-301</td>
   <td colspan="1" align="center">$AF32</td>
   <td colspan="1" align="center">$AF33</td>
   <td colspan="1" align="center">$AF35</td>
   <td colspan="1" align="center">$X32</td>
   <td colspan="1" align="center">$X33</td>
   </tr>
   <tr>
   <td colspan="2" align="center">DEPURADOR 30-V-401</td>
   <td colspan="1" align="center">$AF40</td>
   <td colspan="1" align="center">$AF41</td>
   <td colspan="1" align="center">$AF43</td>
   <td colspan="1" align="center">$X40</td>
   <td colspan="1" align="center">$X41</td>
   </tr>
   <tr>
   <td colspan="2" align="center">FLASH TANK 40-V-5O1</td>
   <td colspan="1" align="center">$AF48</td>
   <td colspan="1" align="center">$AF49</td>
   <td colspan="1" align="center">$AF51</td>
   <td colspan="1" align="center">$X48</td>
   <td colspan="1" align="center">$X49</td>
   </tr>
   <tr>
   <td colspan="2" align="center">ENTRADA CALENTADORES</td>
   <td colspan="1" align="center">$AF57</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$X57</td>
   <td colspan="1" align="center">N/A</td>
   </tr>
   <tr>
   <td colspan="2" align="center">CALENTADOR 31-E-301</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$AF58</td>
   <td colspan="1" align="center">$AF60</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$X58</td>
   </tr>
   <tr>
   <td colspan="2" align="center">CALENTADOR 31-E-401</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$AF68</td>
   <td colspan="1" align="center">$AF70</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$X68</td>
   </tr>
   <tr>
   <td colspan="2" align="center">SKID DE MEDICIÓN (34-FQI-331A)</td>
   <td colspan="1" align="center">$AF90</td>
   <td colspan="1" align="center">$AF91</td>
   <td colspan="1" align="center">N/A</td>
   <td colspan="1" align="center">$X90</td>
   <td colspan="1" align="center">$X91</td>
   </tr>
   </tbody>
   </table>
   EOD;

   $time = Time::now();
   $fecha = $time->year."_".$time->month."_".$time->day;
   $hora = $time->hour."_".$time->minute;
   $tabla = '7';
   $nombrereporte = 'Reporte'.$fecha."-".$hora."-Tab".$tabla.".pdf";

   $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
   $pdf->Output($nombrereporte, 'D');
 }
}
