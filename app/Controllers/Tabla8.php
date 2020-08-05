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

class Tabla8 extends Controller
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
  public function buscardatostabla8()
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

    // Trayendo datos desde la tabla 2
      $datostabla2 = $this->tabla2->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla2 = json_decode($datostabla2);

    // Trayendo datos desde la tabla 3
      $datostabla3 = $this->tabla3->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla3 = json_decode($datostabla3);

    // Trayendo datos desde la tabla 4
      $datostabla4 = $this->tabla4->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla4 = json_decode($datostabla4);


      $datostabla5 = $this->tabla5->llevandoDatosTabla7y8('12',$fechafinalmod);
      $datamejortabla5 = json_decode($datostabla5);

      $datostabla6 = $this->tabla6->llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod);
      $datamejortabla6 = json_decode($datostabla6);


      if ($datamejortabla1->status && $datamejortabla2->status && $datamejortabla3->status && $datamejortabla4->status && $datamejortabla5->status && $datamejortabla6->status) {

        $resultadotablas = $this->tablalastvalor12m($datamejortabla1,$datamejortabla2,$datamejortabla3,$datamejortabla4,$datamejortabla5,$datamejortabla6);
        $arrayFinal = array('status' => true,'resultadotablas' => $resultadotablas, 'fechainicialmod' => $fechainicialmod, 'fechafinalmod' => $fechafinalmod);
      }else{
        $arrayFinal = array('status' => false,'msg'=>'Hubo un error al calcular todos los datos, asegurese de tener todos los datos en las tablas de la fecha seleccionada');
      }

      echo json_encode($arrayFinal);

    }


  }

  public function tablalastvalor12m($datamejortabla1,$datamejortabla2,$datamejortabla3,$datamejortabla4,$datamejortabla5,$datamejortabla6)
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
    $tab4arrayequipo2area1 = $datamejortabla4->arrayequipo2area1;
    $tab4arrayequipo14area1 = $datamejortabla4->arrayequipo14area1;
    $tab4arrayequipo15area1 = $datamejortabla4->arrayequipo15area1;

    //Datos de la tabla 5
    $E110 = $datamejortabla5->equit5area2num2;
    $E111 = $datamejortabla5->equit5area2num3;
    $E116 = $datamejortabla5->equit5area3num2;
    $E117 = $datamejortabla5->equit5area3num3;
    $E121 = $datamejortabla5->equit5area4num1;
    $E122 = $datamejortabla5->equit5area4num2;

    //Datos de la tabla 6
    $datostabla6f3 = $datamejortabla6->calculosarea3->datosmostrararea3filaf;
    $F149N = $this->funcion->transformardecimales($datostabla6f3->F149N);
    $F149S = $this->funcion->transformardecimales($datostabla6f3->F149S);
    $F150N = $this->funcion->transformardecimales($datostabla6f3->F150N);
    $F150S = $this->funcion->transformardecimales($datostabla6f3->F150S);
    $F151 = $this->funcion->transformardecimales($datostabla6f3->F151);
    $F152 = $this->funcion->transformardecimales($datostabla6f3->F152);
    $F153 = $this->funcion->transformardecimales($datostabla6f3->F153);
    $F154N = $this->funcion->transformardecimales($datostabla6f3->F154N);
    $F154S = $this->funcion->transformardecimales($datostabla6f3->F154S);


    $EF6S = $F149S;
    $EF6N = $F149N;
    $EF7S = $F150S;
    $EF7N = $F150N;
    $EF9 = $F153;
    $EF10 = $F151;
    $EF11 = $F152;
    $EF8 = $EF10+$EF11; 


    $EF13 = $E111;
    $EF14 = $E110;
    $EF15 = $EF13+$EF14;
    $EF16 = $E117;
    $EF17 = $E116;
    $EF18 = $EF16+$EF17;
    $EF19 = $EF13+$EF16;
    $EF20 = $EF14+$EF17;
    $EF21 = $EF19+$EF20;
    
    if ($EF21 == '0') {
      $EF22 = ($EF20/1)*100;
    }else{
      $EF22 = ($EF20/$EF21)*100;
    }


    $G23 = $E121;
    $H23 = $E122;
    $EF23 = $G23+$H23;
// EF6 == F149 //Equipo T6 - A3-1
// EF7 == F150 //Equipo T6 - A3-2
// EF8 == E10+E11 //TABLA 8
// EF9 == F153 //Equipo T6 - A3-5
// EF10 == F151 //Equipo T6 - A3-3
// EF11 == F152 //Equipo T6 - A3-4

    // array 20 = 6am
    // array 27 = promedio6am
    // array 26 = 12m
    // array 28 = promedio12am
    // AF = Promedio 6AM
    // X = 6AM
    // AH = Promedio 12M
    // AD = 12M

    // Sacando los datos de los arrays de la Tabla 1
    $AH8 = $tab1arrayequipo1area1[28];
    $AD8 = $tab1arrayequipo1area1[26];
    $AH12 = $tab1arrayequipo1area2[28];
    $AD12 = $tab1arrayequipo1area2[26];
    $AD13 = $tab1arrayequipo2area2[26];
    $AH22 = $tab1arrayequipo3area3[28];
    $AD22 = $tab1arrayequipo3area3[26];

    // Sacando los datos de los arrays de la Tabla 2
    $AH27 = $tab2arrayequipo1area1[28];
    $AD27 = $tab2arrayequipo1area1[26];
    $AH28 = $tab2arrayequipo2area1[28];
    $AH32 = $tab2arrayequipo1area2[28];
    $AD32 = $tab2arrayequipo1area2[26];
    $AH33 = $tab2arrayequipo2area2[28];
    $AD33 = $tab2arrayequipo2area2[26];
    $AH35 = $tab2arrayequipo4area2[28];
    $AH40 = $tab2arrayequipo1area3[28];
    $AD40 = $tab2arrayequipo1area3[26];
    $AH41 = $tab2arrayequipo2area3[28];
    $AD41 = $tab2arrayequipo2area3[26];
    $AH43 = $tab2arrayequipo4area3[28];
    $AH48 = $tab2arrayequipo1area4[28];
    $AD48 = $tab2arrayequipo1area4[26];
    $AH49 = $tab2arrayequipo2area4[28];
    $AD49 = $tab2arrayequipo2area4[26];
    $AH51 = $tab2arrayequipo4area4[28];

    // Sacando los datos de los arrays de la Tabla 3
    $AH57 = $tab3arrayequipo1area1[28];
    $AD57 = $tab3arrayequipo1area1[26];
    $AH58 = $tab3arrayequipo2area1[28];
    $AD58 = $tab3arrayequipo2area1[26];
    $AH60 = $tab3arrayequipo4area1[28];
    $AD68 = $tab3arrayequipo2area2[26];
    $AH70 = $tab3arrayequipo4area2[28];

    // Sacando los datos de los arrays de la Tabla 4
    $AH78 = $tab4arrayequipo2area1[28];
    $AH90 = $tab4arrayequipo14area1[28];
    $AD90 = $tab4arrayequipo14area1[26];
    $AH91 = $tab4arrayequipo15area1[28];
    $AD91 = $tab4arrayequipo15area1[26];

    //Haciendo los array new 
    $arrayTab1 = array(
      'AH8' => $AH8, 'AD8' => $AD8,
      'AH12' => $AH12, 'AD12' => $AD12,
      'AD13' => $AD13,
      'AH22' => $AH22, 'AD22' => $AD22
    );

    $arrayTab2 = array(
      'AH27' => $AH27, 'AD27' => $AD27,
      'AH28' => $AH28,
      'AH32' => $AH32, 'AD32' => $AD32,
      'AH33' => $AH33, 'AD33' => $AD33,
      'AH35' => $AH35,
      'AH40' => $AH40, 'AD40' => $AD40,
      'AH41' => $AH41, 'AD41' => $AD41,
      'AH43' => $AH43,
      'AH48' => $AH48, 'AD48' => $AD48,
      'AH49' => $AH49, 'AD49' => $AD49,
      'AH51' => $AH51,
    );

    $arrayTab3 = array(
      'AH57' => $AH57, 'AD57' => $AD57,
      'AH58' => $AH58, 'AD58' => $AD58,
      'AD68' => $AD68,
      'AH60' => $AH60,
      'AH70' => $AH70,
    );

    $arrayTab4 = array(
      'AH78' => $AH78,
      'AH90' => $AH90, 'AD90' => $AD90,
      'AH91' => $AH91, 'AD91' => $AD91,
    );

    $arrayTab5 = array(
      'EF13' => number_format($EF13, '2', ',', '.'),
      'EF14' => number_format($EF14, '2', ',', '.'),
      'EF15' => number_format($EF15, '2', ',', '.'),
      'EF16' => number_format($EF16, '2', ',', '.'),
      'EF17' => number_format($EF17, '2', ',', '.'),
      'EF18' => number_format($EF18, '2', ',', '.'),
      'EF19' => number_format($EF19, '2', ',', '.'),
      'EF20' => number_format($EF20, '2', ',', '.'),
      'EF21' => number_format($EF21, '2', ',', '.'),
      'EF22' => number_format($EF22, '2', ',', '.'),
      'G23' => number_format($G23, '2', ',', '.'),
      'H23' => number_format($H23, '2', ',', '.'),
      'EF23' => number_format($EF23, '2', ',', '.'),
    );

    $arrayTab6 = array(
      'EF6S' => $EF6S,
      'EF6N' => $EF6N,
      'EF7S' => $EF7S,
      'EF7N' => $EF7N,
      'EF9' => $EF9,
      'EF10' => $EF10,
      'EF11' => $EF11,
      'EF8' => $EF8
    );
    $arrayreturn = array('arrayTab1' => $arrayTab1, 'arrayTab2' => $arrayTab2, 'arrayTab3' => $arrayTab3, 'arrayTab4' => $arrayTab4, 'arrayTab5' => $arrayTab5, 'arrayTab6'=>$arrayTab6);
    return $arrayreturn;
  }

  public function reportetabla8()
  {
   header('Content-Type: application/pdf');
   header('Content-Disposition: inline; filename="VivesPromocion.pdf"');

   $selecreportetabla8 = $this->request->getPost('selecreportetabla8', FILTER_SANITIZE_STRING);
   $fechatabla8 = $this->request->getPost('fechatabla8', FILTER_SANITIZE_STRING);
   $fechasnew = explode(' - ',  $fechatabla8);
   $fechainicialmod = $fechasnew[0];
   $fechafinalmod = $fechasnew[1];

   $F149 = ($this->request->getPost('F149', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('F149', FILTER_SANITIZE_STRING);
   $F150 = ($this->request->getPost('F150', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('F150', FILTER_SANITIZE_STRING);
   $EF8 = ($this->request->getPost('EF8', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF8', FILTER_SANITIZE_STRING);
   $F153 = ($this->request->getPost('F153', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('F153', FILTER_SANITIZE_STRING);
   $F151 = ($this->request->getPost('F151', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('F151', FILTER_SANITIZE_STRING);
   $F152 = ($this->request->getPost('F152', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('F152', FILTER_SANITIZE_STRING);
   $EF13 = ($this->request->getPost('EF13', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF13', FILTER_SANITIZE_STRING);
   $EF14 = ($this->request->getPost('EF14', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF14', FILTER_SANITIZE_STRING);
   $EF15 = ($this->request->getPost('EF15', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF15', FILTER_SANITIZE_STRING);
   $EF16 = ($this->request->getPost('EF16', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF16', FILTER_SANITIZE_STRING);
   $EF17 = ($this->request->getPost('EF17', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF17', FILTER_SANITIZE_STRING);
   $EF18 = ($this->request->getPost('EF18', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF18', FILTER_SANITIZE_STRING);
   $EF19 = ($this->request->getPost('EF19', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF19', FILTER_SANITIZE_STRING);
   $EF20 = ($this->request->getPost('EF20', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF20', FILTER_SANITIZE_STRING);
   $EF21 = ($this->request->getPost('EF21', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF21', FILTER_SANITIZE_STRING);
   $EF22 = ($this->request->getPost('EF22', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF22', FILTER_SANITIZE_STRING);
   $EF23 = ($this->request->getPost('EF23', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('EF23', FILTER_SANITIZE_STRING);
   $G23 = ($this->request->getPost('G23', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('G23', FILTER_SANITIZE_STRING);
   $H23 = ($this->request->getPost('H23', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('H23', FILTER_SANITIZE_STRING);
   $AH8 = ($this->request->getPost('AH8', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH8', FILTER_SANITIZE_STRING);
   $AD8 = ($this->request->getPost('AD8', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD8', FILTER_SANITIZE_STRING);
   $AH12 = ($this->request->getPost('AH12', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH12', FILTER_SANITIZE_STRING);
   $AH27 = ($this->request->getPost('AH27', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH27', FILTER_SANITIZE_STRING);
   $AD12 = ($this->request->getPost('AD12', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD12', FILTER_SANITIZE_STRING);
   $AD13 = ($this->request->getPost('AD13', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD13', FILTER_SANITIZE_STRING);
   $AH22 = ($this->request->getPost('AH22', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH22', FILTER_SANITIZE_STRING);
   $AH28 = ($this->request->getPost('AH28', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH28', FILTER_SANITIZE_STRING);
   $AD22 = ($this->request->getPost('AD22', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD22', FILTER_SANITIZE_STRING);
   $AD27 = ($this->request->getPost('AD27', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD27', FILTER_SANITIZE_STRING);
   $AH32 = ($this->request->getPost('AH32', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH32', FILTER_SANITIZE_STRING);
   $AH33 = ($this->request->getPost('AH33', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH33', FILTER_SANITIZE_STRING);
   $AH35 = ($this->request->getPost('AH35', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH35', FILTER_SANITIZE_STRING);
   $AD32 = ($this->request->getPost('AD32', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD32', FILTER_SANITIZE_STRING);
   $AD33 = ($this->request->getPost('AD33', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD33', FILTER_SANITIZE_STRING);
   $AH40 = ($this->request->getPost('AH40', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH40', FILTER_SANITIZE_STRING);
   $AH41 = ($this->request->getPost('AH41', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH41', FILTER_SANITIZE_STRING);
   $AH43 = ($this->request->getPost('AH43', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH43', FILTER_SANITIZE_STRING);
   $AD40 = ($this->request->getPost('AD40', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD40', FILTER_SANITIZE_STRING);
   $AD41 = ($this->request->getPost('AD41', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD41', FILTER_SANITIZE_STRING);
   $AH48 = ($this->request->getPost('AH48', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH48', FILTER_SANITIZE_STRING);
   $AH49 = ($this->request->getPost('AH49', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH49', FILTER_SANITIZE_STRING);
   $AH51 = ($this->request->getPost('AH51', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH51', FILTER_SANITIZE_STRING);
   $AD48 = ($this->request->getPost('AD48', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD48', FILTER_SANITIZE_STRING);
   $AD49 = ($this->request->getPost('AD49', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD49', FILTER_SANITIZE_STRING);
   $AH57 = ($this->request->getPost('AH57', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH57', FILTER_SANITIZE_STRING);
   $AD57 = ($this->request->getPost('AD57', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD57', FILTER_SANITIZE_STRING);
   $AH58 = ($this->request->getPost('AH58', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH58', FILTER_SANITIZE_STRING);
   $AH60 = ($this->request->getPost('AH60', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH60', FILTER_SANITIZE_STRING);
   $AD58 = ($this->request->getPost('AD58', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD58', FILTER_SANITIZE_STRING);
   $AH78 = ($this->request->getPost('AH78', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH78', FILTER_SANITIZE_STRING);
   $AH70 = ($this->request->getPost('AH70', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH70', FILTER_SANITIZE_STRING);
   $AD68 = ($this->request->getPost('AD68', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD68', FILTER_SANITIZE_STRING);
   $AH90 = ($this->request->getPost('AH90', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH90', FILTER_SANITIZE_STRING);
   $AH91 = ($this->request->getPost('AH91', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AH91', FILTER_SANITIZE_STRING);
   $AD90 = ($this->request->getPost('AD90', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD90', FILTER_SANITIZE_STRING);
   $AD91 = ($this->request->getPost('AD91', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('AD91', FILTER_SANITIZE_STRING);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   // $pdf->SetProtection(array('print', 'copy'), '', null, 0, null);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 9, '', true);
$pdf->AddPage();


$usuario_cedula = $this->session->get('usuario_cedula');
$usuario_nombre = $this->session->get('usuario_nombre');
$usuario_apellido =  $this->session->get('usuario_apellido');
$nombrefull = $usuario_nombre." ".$usuario_apellido;

$pdf->Write(0, 'Reporte tabla 8 de Fecha: '.$fechatabla8, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Caso seleccionado: '.$selecreportetabla8, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Usuario que descargo el archivo: ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'C.I: '.$usuario_cedula, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Nombre: '.$nombrefull, '', 0, 'L', true, 0, false, false, 0);

$html = <<<EOD
<table border="1" cellpadding="1" cellspacing="0" style="width: 100%">
<thead width="100%">
<tr style="background-color:#FFFF00;color:#0000FF;">
<th colspan="4" align="center" style="text-align: center;">FECHA DESDE: $fechainicialmod 12:00:00 PM</th>
<th colspan="2" align="center" style="text-align: center;">HASTA $fechafinalmod 12:00:00 PM</th>
</tr>
<tr style="background-color:#FF0000;color:#FFFF00;">
<th colspan="6" align="center" style="text-align: center;">PARÁMETROS DEL GAS</th>
</tr>
</thead>
<tbody width="100%">
<tr>
<td colspan="4" align="center">PARÁMETROS GENERALES</td>
<td colspan="2" align="center"></td>
</tr>
<tr>
<td colspan="4" align="center">Vol.de Gas Procesado</td>
<td colspan="1" align="center">$F149</td>
<td colspan="1" align="center">PCN</td>
</tr>
<tr>
<td colspan="4" align="center">Vol. de Gas Entregado a Turbina</td>
<td colspan="1" align="center">$F150</td>
<td colspan="1" align="center">PCN</td>
</tr>
<tr>
<td colspan="4" align="center">Vol. de Gas Combustible Total</td>
<td colspan="1" align="center">$EF8</td>
<td colspan="1" align="center">PCN</td>
</tr>
<tr>
<td colspan="4" align="center">Vol. de Gas Quemado</td>
<td colspan="1" align="center">$F153</td>
<td colspan="1" align="center">PCN</td>
</tr>
<tr>
<td colspan="4" align="center">Vol. de Gas combustible Calentador 31-E-301</td>
<td colspan="1" align="center">$F151</td>
<td colspan="1" align="center">PCN</td>
</tr>
<tr>
<td colspan="4" align="center">Vol. de Gas combustible Calentador 31-E-401</td>
<td colspan="1" align="center">$F152</td>
<td colspan="1" align="center">PCN</td>
</tr>
<tr>
<td colspan="4" align="center">LÍQUIDOS INGRESADOS A TANQUES</td>
<td colspan="2" align="center"></td>
</tr>
<tr>
<td colspan="2" rowspan="2" align="center">Vol. de Líquidos Ingresado en el Tk-A</td>
<td colspan="1" align="center">Condensados (Bls)</td>
<td colspan="1" align="center">$EF13</td>
<td colspan="2" rowspan="9" align="center">REPORTE DE CIERRE (12 M)</td>
</tr>
<tr>
<td colspan="1" align="center">Agua (Bls)</td>
<td colspan="1" align="center">$EF14</td>
</tr>
<tr>
<td colspan="2" align="center"></td>
<td colspan="1" align="center">Tot. TK-A</td>
<td colspan="1" align="center">$EF15</td>
</tr>
<tr>
<td colspan="2" rowspan="2" align="center">Vol. de Líquidos Ingresado en el Tk-B</td>
<td colspan="1" align="center">Condensados (Bls)</td>
<td colspan="1" align="center">$EF16</td>
</tr>
<tr>
<td colspan="1" align="center">Agua (Bls)</td>
<td colspan="1" align="center">$EF17</td>
</tr>
<tr>
<td colspan="2" align="center"></td>
<td colspan="1" align="center">Tot. TK-B</td>
<td colspan="1" align="center">$EF18</td>
</tr>
<tr>
<td colspan="2" rowspan="4" align="center">Vol. de Líq. Ingresado en PTG-OBP-01 (Bls.)</td>
<td colspan="1" align="center">Condensados   (Bls)</td>
<td colspan="1" align="center">$EF19</td>
</tr>
<tr>
<td colspan="1" align="center">Agua (Bls)</td>
<td colspan="1" align="center">$EF20</td>
</tr>
<tr>
<td colspan="1" align="center">Total (Bls)</td>
<td colspan="1" align="center">$EF21</td>
</tr>
<tr>
<td colspan="1" align="center">% Ag.    Libre</td>
<td colspan="1" align="center">$EF22</td>
<td colspan="1" align="center">Tot. A</td>
<td colspan="1" align="center">Tot. B</td>
</tr>
<tr>
<td colspan="3" align="center">Vol. de Líquidos Despachados (Bls.) TOTAL:</td>
<td colspan="1" align="center">$EF23</td>
<td colspan="1" align="center">$G23</td>
<td colspan="1" align="center">$H23</td>
</tr>
<tr>
<td colspan="4" align="center">PROMEDIO AL CIERRE</td>
<td colspan="2" align="center">ULTIMO VALOR (12M)</td>
</tr>
<tr>
<td colspan="1" rowspan="2" align="center">EQUIPO</td>
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
<td colspan="1" align="center">ENTRADA GASODUCTO (03-PIT-01)</td>
<td colspan="1" align="center">$AH8</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AD8</td>
<td colspan="1" align="center">N/A</td>
</tr>
<tr>
<td colspan="1" align="center">ENTRADA SLUG CATCHER (03-PIT-02)</td>
<td colspan="1" align="center">$AH12</td>
<td colspan="1" align="center">$AH27</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AD12</td>
<td colspan="1" align="center">$AD13</td>
</tr>
<tr>
<td colspan="1" align="center">ENTRADA DEPURADORES</td>
<td colspan="1" align="center">$AH22</td>
<td colspan="1" align="center">$AH28</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AD22</td>
<td colspan="1" align="center">$AD27</td>
</tr>
<tr>
<td colspan="1" align="center">DEPURADOR 30-V-301</td>
<td colspan="1" align="center">$AH32</td>
<td colspan="1" align="center">$AH33</td>
<td colspan="1" align="center">$AH35</td>
<td colspan="1" align="center">$AD32</td>
<td colspan="1" align="center">$AD33</td>
</tr>
<tr>
<td colspan="1" align="center">DEPURADOR 30-V-401</td>
<td colspan="1" align="center">$AH40</td>
<td colspan="1" align="center">$AH41</td>
<td colspan="1" align="center">$AH43</td>
<td colspan="1" align="center">$AD40</td>
<td colspan="1" align="center">$AD41</td>
</tr>
<tr>
<td colspan="1" align="center">FLASH TANK 40-V-5O1</td>
<td colspan="1" align="center">$AH48</td>
<td colspan="1" align="center">$AH49</td>
<td colspan="1" align="center">$AH51</td>
<td colspan="1" align="center">$AD48</td>
<td colspan="1" align="center">$AD49</td>
</tr>
<tr>
<td colspan="1" align="center">ENTRADA CALENTADORES</td>
<td colspan="1" align="center">$AH57</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AD57</td>
<td colspan="1" align="center">N/A</td>
</tr>
<tr>
<td colspan="1" align="center">CALENTADOR 31-E-301</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AH58</td>
<td colspan="1" align="center">$AH60</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AD58</td>
</tr>
<tr>
<td colspan="1" align="center">CALENTADOR 31-E-401</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AH78</td>
<td colspan="1" align="center">$AH70</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AD68</td>
</tr>
<tr>
<td colspan="1" align="center">SKID DE MEDICIÓN (34-FQI-331A)</td>
<td colspan="1" align="center">$AH90</td>
<td colspan="1" align="center">$AH91</td>
<td colspan="1" align="center">N/A</td>
<td colspan="1" align="center">$AD90</td>
<td colspan="1" align="center">$AD91</td>
</tr>
</tbody>
</table> 
EOD;

$time = Time::now();
$fecha = $time->year."_".$time->month."_".$time->day;
$hora = $time->hour."_".$time->minute;
$tabla = '8';
$nombrereporte = 'Reporte'.$fecha."-".$hora."-Tab".$tabla.".pdf";

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output($nombrereporte, 'D');
}

}
