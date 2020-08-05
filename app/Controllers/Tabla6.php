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
use App\Controllers\Tabla4;
use App\Controllers\Tabla10;
use TCPDF;

class Tabla6 extends Controller
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
    $this->tabla3 = new Tabla3();
    $this->tabla4 = new Tabla4();
    $this->tabla10 = new Tabla10();
    // $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  }

  public function RegistroTabla6()
  {
    //Tabla6 Area 1:
    $equit6area1num1 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num1', FILTER_SANITIZE_STRING));
    $equit6area1num2 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num2', FILTER_SANITIZE_STRING));
    $equit6area1num3 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num3', FILTER_SANITIZE_STRING));
    $equit6area1num5 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num5', FILTER_SANITIZE_STRING));
    $equit6area1num6 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num6', FILTER_SANITIZE_STRING));
    $equit6area1num7 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num7', FILTER_SANITIZE_STRING));
    $equit6area1num8 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num8', FILTER_SANITIZE_STRING));
    $equit6area1num9 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num9', FILTER_SANITIZE_STRING));
    $equit6area1num10 = $this->funcion->transformardecimales($this->request->getPost('equit6area1num10', FILTER_SANITIZE_STRING));



    $fechas = $this->request->getPost('fechatabla6registro', FILTER_SANITIZE_STRING);
    $fechasnew = explode(' - ',  $fechas);
    $fechainicialmod = $fechasnew[0];
    $fechafinalmod = $fechasnew[1];

    $data1 = [
      'tabla6_area1_id' => null,
      'equipo1_tab6_area_1' => $equit6area1num1,
      'equipo2_tab6_area_1' => $equit6area1num2,
      'equipo3_tab6_area_1' => $equit6area1num3,
      'equipo5_tab6_area_1' => $equit6area1num5,
      'equipo6_tab6_area_1' => $equit6area1num6,
      'equipo7_tab6_area_1' => $equit6area1num7,
      'equipo8_tab6_area_1' => $equit6area1num8,
      'equipo9_tab6_area_1' => $equit6area1num9,
      'equipo10_tab6_area_1' => $equit6area1num10,
      'fecha_inicial_tab6_area1' => $fechainicialmod,
      'fecha_final_tab6_area1' => $fechafinalmod,
      'status_tab6_area1' => '1',
    ];
    
    $arraybusqueda1 = ['fecha_inicial_tab6_area1' => $fechainicialmod, 'fecha_final_tab6_area1' => $fechafinalmod];
    $databusqueda = $this->tabla->mostrarTodosDatosTablasFechas('tabla6_area1', $arraybusqueda1)->getResult();

    if (count($databusqueda) > 0) {
      echo json_encode(array('status' => false, 'mensaje' => 'Estas fechas ya estan registradas'));
    } else {
      // Registrando datos
      $registrotabla1 = $this->tabla->RegistroTablas($data1, 'tabla6_area1');
      // Obteniendo datos mejor 
      $datamejorada1 = json_decode($registrotabla1);
      // Guardando el log
      $guardarlogs = [
        [
          'log_id' => null,
          'log_tabla' => 'tabla6_area1',
          'log_tipo' => 'registro del usuario',
          'log_fecha' => Time::now()->toDateTimeString(),
          'log_id_referencia' => $datamejorada1->retornoid,
          'usuario_id' => $this->session->get('usuario_id')
        ]
      ];
      $this->log->RegistrarLog($guardarlogs);
      echo json_encode(array('status' => true, 'databusqueda' => count($databusqueda)));
    }
  }

  public function mostrarfechascargadas()
  {
    $where = array('0' => 'fecha_inicial_tab6_area1', '1' => 'fecha_final_tab6_area1');
    $tabla6_area1 = $this->tabla->mostrarfechascargadastabla6('tabla6_area1', $where)->getResult();
    echo json_encode($tabla6_area1);
  }

  public function EditarDatosTabla6()
  {
    $tabla6_area1_id = $this->request->getPost('tabla6_area1_id', FILTER_SANITIZE_STRING);
    $equit6area1num1editar = $this->request->getPost('equit6area1num1editar', FILTER_SANITIZE_STRING);
    $equit6area1num2editar = $this->request->getPost('equit6area1num2editar', FILTER_SANITIZE_STRING);
    $equit6area1num3editar = $this->request->getPost('equit6area1num3editar', FILTER_SANITIZE_STRING);
    $equit6area1num5editar = $this->request->getPost('equit6area1num5editar', FILTER_SANITIZE_STRING);
    $equit6area1num6editar = $this->request->getPost('equit6area1num6editar', FILTER_SANITIZE_STRING);
    $equit6area1num7editar = $this->request->getPost('equit6area1num7editar', FILTER_SANITIZE_STRING);
    $equit6area1num8editar = $this->request->getPost('equit6area1num8editar', FILTER_SANITIZE_STRING);
    $equit6area1num9editar = $this->request->getPost('equit6area1num9editar', FILTER_SANITIZE_STRING);
    $equit6area1num10editar = $this->request->getPost('equit6area1num10editar', FILTER_SANITIZE_STRING);
    
    $tabla = 'tabla6_area1';
    $data = [
      'equipo1_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num1editar),
      'equipo2_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num2editar),
      'equipo3_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num3editar),
      'equipo5_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num5editar),
      'equipo6_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num6editar),
      'equipo7_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num7editar),
      'equipo8_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num8editar),
      'equipo9_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num9editar),
      'equipo10_tab6_area_1' => $this->funcion->transformardecimales($equit6area1num10editar),
    ];
    $where = ['tabla6_area1_id' => $tabla6_area1_id];
    $edicciontabla = $this->tabla->EdiccionTabla($data, $tabla, $where);

    // Guardando el log
    $guardarlogs = [
      [
        'log_id' => null,
        'log_tabla' => $tabla,
        'log_tipo' => 'editado',
        'log_fecha' => Time::now()->toDateTimeString(),
        'log_id_referencia' => $tabla6_area1_id,
        'usuario_id' => $this->session->get('usuario_id')
      ]
    ];
    $this->log->RegistrarLog($guardarlogs);

    if ($edicciontabla == '1') {
      echo json_encode(array('status' => true, 'tabla' => '6'));
    } else {
      echo json_encode(array('status' => false));
    }
  }

  public function buscardatostabla6()
  {
    $fechas = $this->request->getPost('fechas', FILTER_SANITIZE_STRING);
    $fechasnew = explode(' - ',  $fechas);
    $fechainicialmod = $fechasnew[0];
    $fechafinalmod = $fechasnew[1];

    //Trayendo datos desde la tabla 3
    $datostabla3 = $this->tabla3->llevandoDatosTabla6($fechainicialmod,$fechafinalmod);
    $datamejortabla3 = json_decode($datostabla3);

    //Trayendo datos desde la tabla 4
    $datostabla4 = $this->tabla4->llevandoDatosTabla6($fechainicialmod,$fechafinalmod);
    $datamejortabla4 = json_decode($datostabla4);

    //Trayendo datos desde la tabla de calculos 10 
    $totaltabla10 = $this->tabla->TotalCalculosTabla10()->getResult();

    //Trayendo datos desde la tabla 6
    $arraybusquedatabla6 = ['fecha_inicial_tab6_area1' => $fechainicialmod, 'fecha_final_tab6_area1' => $fechafinalmod];
    $datatabla6 = $this->tabla->mostrarTodosDatosTablasFechas('tabla6_area1', $arraybusquedatabla6)->getResult();

    if ($datamejortabla3->status == true && $datamejortabla4->status == true) {
      $arrayequipo7area1count = count($datamejortabla3->arrayequipo7area1);
      $arrayequipo7area2count = count($datamejortabla3->arrayequipo7area2);
      $arrayequipo3area1count = count($datamejortabla4->arrayequipo3area1);
      $arrayequipo18area1count = count($datamejortabla4->arrayequipo18area1);

      if ($arrayequipo7area1count == '29' || $arrayequipo7area2count == '29' || $arrayequipo3area1count == '29' || $arrayequipo18area1count == '29') {
    // Calculos tabla 6 area 1
        $calculosarea2 = $this->sacandocalculosarea2($datamejortabla3,$datamejortabla4, $datatabla6, $totaltabla10);
        $calculosarea3 = $this->sacandocalculosarea3($datamejortabla3,$datamejortabla4, $datatabla6, $totaltabla10);

        $datatabla6mejor = $this->transformardecimalestabla6($datatabla6[0]);

        echo json_encode(array('status' => true,'calculosarea2' => $calculosarea2,'calculosarea3' => $calculosarea3,'datostabla6' => $datatabla6mejor));
      }else{
        echo json_encode(array('status' => false,'msg'=>'Hubo un error al calcular todos los datos, asegurese de tener todos los datos en las tablas de la fecha seleccionada'));
      }
    }else{
      echo json_encode(array('status' => false,'msg'=>'Hubo un error al calcular todos los datos, asegurese de tener todos los datos en las tablas de la fecha seleccionada'));
    }
  }

  public function transformardecimalestabla6($datatabla6)
  {
    $arrayNumeros = array(
      'tabla6_area1_id' => $datatabla6->tabla6_area1_id,
      'equipo1_tab6_area_1' => number_format($datatabla6->equipo1_tab6_area_1,6,',','.'),
      'equipo2_tab6_area_1' => number_format($datatabla6->equipo2_tab6_area_1,6,',','.'),
      'equipo3_tab6_area_1' => number_format($datatabla6->equipo3_tab6_area_1,6,',','.'),
      'equipo5_tab6_area_1' => number_format($datatabla6->equipo5_tab6_area_1,2,',','.'),
      'equipo6_tab6_area_1' => number_format($datatabla6->equipo6_tab6_area_1,2,',','.'),
      'equipo7_tab6_area_1' => number_format($datatabla6->equipo7_tab6_area_1,2,',','.'),
      'equipo8_tab6_area_1' => number_format($datatabla6->equipo8_tab6_area_1,2,',','.'),
      'equipo9_tab6_area_1' => number_format($datatabla6->equipo9_tab6_area_1,2,',','.'),
      'equipo10_tab6_area_1' => number_format($datatabla6->equipo10_tab6_area_1,2,',','.')
    );
    return $arrayNumeros;
  }

  public function sacandocalculosarea2($datamejortabla3,$datamejortabla4, $datatabla6, $totaltabla10)
  {
    //Datos tabla 3 y 4
    $valorx63 = $this->funcion->transformardecimales($datamejortabla3->arrayequipo7area1[20]);
    $valorx73 = $this->funcion->transformardecimales($datamejortabla3->arrayequipo7area2[20]);
    $valorx79 = $this->funcion->transformardecimales($datamejortabla4->arrayequipo3area1[20]);
    $valorx94 = $this->funcion->transformardecimales($datamejortabla4->arrayequipo18area1[20]);
    
    // Datos tabla 6
    $equipo1_tab6_area_1 = $datatabla6[0]->equipo1_tab6_area_1;
    $equipo2_tab6_area_1 = $datatabla6[0]->equipo2_tab6_area_1;
    $equipo3_tab6_area_1 = $datatabla6[0]->equipo3_tab6_area_1;

    //Datos tabla 10
    $valorestab10hora6 = $totaltabla10[0]->total_antes6am;
    $valorestab10hora12 = $totaltabla10[0]->total_12m;
    // Calculado
    $E139 = ($valorx79-$equipo1_tab6_area_1)*1000000;
    $E140 = $valorx94*1000000;
    $E141 = ($valorx63-$equipo2_tab6_area_1)*1000000;
    $E142 = ($valorx73-$equipo3_tab6_area_1)*1000000;
    $E143 = $E139-$E140-$E141-$E142;
    $E144 = $E139-$E140-$E141-$E142-$E143;
    //Corregido
    $F141 = $E141;
    $F142 = $E142;
    $F143 = $valorestab10hora6*1000000;

    $F139N = $E139;
    $F140N = $F139N-$F141-$F142-$F143;
    $F140S = $E140;
    $F139S = $F140S+$F141+$F142+$F143;

    //Calculos totales
    $calcorregidono = $F139N-$F140N-$F141-$F142-$F143;
    $calcorregidosi = $F139S-$F140S-$F141-$F142-$F143;

    $salidacalculado = round($E144,2);
    $salidacorregidono = round($calcorregidono,2);
    $salidacorregidosi = round($calcorregidosi,2);

    $datosmostrararea2filae = array(
      'E139' => number_format($E139, '0', ',', '.'),
      'E140' => number_format($E140, '0', ',', '.'),
      'E141' => number_format($E141, '0', ',', '.'),
      'E142' => number_format($E142, '0', ',', '.'), 
      'E143' => number_format($E143, '0', ',', '.'),
      'E144' => number_format($salidacalculado, '0', ',', '.'),
    );

    $datosmostrararea2filaf = array(
      'F139S' =>  number_format($F139S, '0', ',', '.'),
      'F140S' =>  number_format($F140S, '0', ',', '.'),
      'F139N' =>  number_format($F139N, '0', ',', '.'),
      'F140N' =>  number_format($F140N, '0', ',', '.'),
      'F141' =>  number_format($F141, '0', ',', '.'),
      'F142' =>  number_format($F142, '0', ',', '.'),
      'F143' =>  number_format($F143, '0', ',', '.'),
      'F144N' => number_format($salidacorregidono, '0', ',', '.'),
      'F144S' => number_format($salidacorregidosi, '0', ',', '.'),

    );
    return array('datosmostrararea2filae' => $datosmostrararea2filae, 'datosmostrararea2filaf' => $datosmostrararea2filaf);
  }

  public function sacandocalculosarea3($datamejortabla3,$datamejortabla4, $datatabla6, $totaltabla10)
  {
    //Datos tabla 3 y 4
    $valorad63 = $this->funcion->transformardecimales($datamejortabla3->arrayequipo7area1[26]);
    $valorad73 = $this->funcion->transformardecimales($datamejortabla3->arrayequipo7area2[26]);
    $valorad79 = $this->funcion->transformardecimales($datamejortabla4->arrayequipo3area1[26]);
    $valorad94 = $this->funcion->transformardecimales($datamejortabla4->arrayequipo18area1[26]);

    // Datos tabla 6
    $equipo1_tab6_area_1 = $datatabla6[0]->equipo1_tab6_area_1;
    $equipo2_tab6_area_1 = $datatabla6[0]->equipo2_tab6_area_1;
    $equipo3_tab6_area_1 = $datatabla6[0]->equipo3_tab6_area_1;

    //Datos tabla 10
    $valorestab10hora6 = $totaltabla10[0]->total_antes6am;
    $valorestab10hora12 = $totaltabla10[0]->total_12m;

    // // Calculado
    $E149 = ($valorad79-$equipo1_tab6_area_1)*1000000;
    $E150 = $valorad94*1000000;
    $E151 = ($valorad63-$equipo2_tab6_area_1)*1000000;
    $E152 = ($valorad73-$equipo3_tab6_area_1)*1000000;
    $E153 = $E149-$E150-$E151-$E152;
    $E154 = $E149-$E150-$E151-$E152-$E153;

    //Corregido
    $F151 = $E151;
    $F152 = $E152;
    $F153 = $valorestab10hora12*1000000;

    $F149N = $E149;
    $F150N = $F149N-$F151-$F152-$F153;
    $F150S = $E150;
    $F149S = $F150S+$F151+$F152+$F153;

    //Calculos totales
    $calcorregidono = $F149N-$F150N-$F151-$F152-$F153;
    $calcorregidosi = $F149S-$F150S-$F151-$F152-$F153;

    $salidacalculado = round($E154,2);
    $salidacorregidono = round($calcorregidono,2);
    $salidacorregidosi = round($calcorregidosi,2);

    $datosmostrararea3filae = array(
      'E149' => number_format($E149, '0', ',', '.'),
      'E150' => number_format($E150, '0', ',', '.'),
      'E151' => number_format($E151, '0', ',', '.'),
      'E152' => number_format($E152, '0', ',', '.'), 
      'E153' => number_format($E153, '0', ',', '.'),
      'E154' => number_format($salidacalculado, '0', ',', '.')
    );

    $datosmostrararea3filaf = array(
      'F149S' =>  number_format($F149S, '0', ',', '.'),
      'F150S' =>  number_format($F150S, '0', ',', '.'),
      'F149N' =>  number_format($F149N, '0', ',', '.'),
      'F150N' =>  number_format($F150N, '0', ',', '.'),
      'F151' =>  number_format($F151, '0', ',', '.'),
      'F152' =>  number_format($F152, '0', ',', '.'),
      'F153' =>  number_format($F153, '0', ',', '.'),
      'F154N' => number_format($salidacorregidono, '0', ',', '.'),
      'F154S' => number_format($salidacorregidosi, '0', ',', '.'),
    );
    return array('datosmostrararea3filae' => $datosmostrararea3filae, 'datosmostrararea3filaf' => $datosmostrararea3filaf);
  }

  public function reportetabla6area2()
  {
   header('Content-Type: application/pdf');
   header('Content-Disposition: inline; filename="VivesPromocion.pdf"');
   $E139 = $this->request->getPost('E139', FILTER_SANITIZE_STRING);
   $E140 = $this->request->getPost('E140', FILTER_SANITIZE_STRING);
   $E141 = $this->request->getPost('E141', FILTER_SANITIZE_STRING);
   $E142 = $this->request->getPost('E142', FILTER_SANITIZE_STRING);
   $E143 = $this->request->getPost('E143', FILTER_SANITIZE_STRING);
   $E144 = $this->request->getPost('E144', FILTER_SANITIZE_STRING);
   $F139 = $this->request->getPost('F139', FILTER_SANITIZE_STRING);
   $F140 = $this->request->getPost('F140', FILTER_SANITIZE_STRING);
   $F141 = $this->request->getPost('F141', FILTER_SANITIZE_STRING);
   $F142 = $this->request->getPost('F142', FILTER_SANITIZE_STRING);
   $F143 = $this->request->getPost('F143', FILTER_SANITIZE_STRING);
   $F144 = $this->request->getPost('F144', FILTER_SANITIZE_STRING);
   $selectabla6area2 = $this->request->getPost('selectabla6area2', FILTER_SANITIZE_STRING);
   $fechatabla6 = $this->request->getPost('fechatabla6', FILTER_SANITIZE_STRING);

   $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   // $pdf->SetProtection(array('print', 'copy'), '', null, 0, null);
   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
   $pdf->setFontSubsetting(true);
   $pdf->SetFont('dejavusans', '', 14, '', true);
   $pdf->AddPage();

   $pdf->Write(0, 'Reporte tabla 6 Area 2 de Fecha:'.$fechatabla6, '', 0, 'L', true, 0, false, false, 0);
   $pdf->Write(0, 'Caso seleccionado: '.$selectabla6area2, '', 0, 'L', true, 0, false, false, 0);

   $html = <<<EOD
   <table style="width:100%" cellspacing="0" cellpadding="1" border="1">
   <thead>
   <tr style="background-color: #2d4154; color:#ffffff;">
   <th align="center">Equipo</th>
   <th align="center">Calculado</th>
   <th align="center">Corregido</th>
   </tr>
   </thead>
   <tbody>
   <tr>
   <td align="center">Equipo T6 - A2-1</td>
   <td align="center">$E139</td>
   <td align="center">$F139</td>
   </tr>
   <tr>
   <td align="center">Equipo T6 - A2-2</td>
   <td align="center">$E140</td>
   <td align="center">$F140</td>
   </tr>
   <tr>
   <td align="center">Equipo T6 - A2-3</td>
   <td align="center">$E141</td>
   <td align="center">$F141</td>
   </tr>
   <tr>
   <td align="center">Equipo T6 - A2-4</td>
   <td align="center">$E142</td>
   <td align="center">$F142</td>
   </tr>
   <tr>
   <td align="center">Equipo T6 - A2-5</td>
   <td align="center">$E143</td>
   <td align="center">$F143</td>
   </tr>
   <tr>
   <td align="center" rowspan="2">Equipo T6 - A2-5</td>
   <td align="center">$E144</td>
   <td align="center">$F144</td>
   </tr>
   <tr>
   <td align="center">Balanceado</td>
   <td align="center">Balanceado</td>
   </tr>
   </tbody>
   </table>
   EOD;

   $time = Time::now();
   $fecha = $time->year."_".$time->month."_".$time->day;
   $hora = $time->hour."_".$time->minute;
   $tabla = '6';
   $nombrereporte = 'Reporte'.$fecha."-".$hora."-Tab".$tabla.".pdf";

   $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
   $pdf->Output($nombrereporte, 'D');
 }

 public function reportetabla6area3()
 {
   header('Content-Type: application/pdf');
   header('Content-Disposition: inline; filename="VivesPromocion.pdf"');
   $E149 = $this->request->getPost('E149', FILTER_SANITIZE_STRING);
   $E150 = $this->request->getPost('E150', FILTER_SANITIZE_STRING);
   $E151 = $this->request->getPost('E151', FILTER_SANITIZE_STRING);
   $E152 = $this->request->getPost('E152', FILTER_SANITIZE_STRING);
   $E153 = $this->request->getPost('E153', FILTER_SANITIZE_STRING);
   $E154 = $this->request->getPost('E154', FILTER_SANITIZE_STRING);
   $F149 = $this->request->getPost('F149', FILTER_SANITIZE_STRING);
   $F150 = $this->request->getPost('F150', FILTER_SANITIZE_STRING);
   $F151 = $this->request->getPost('F151', FILTER_SANITIZE_STRING);
   $F152 = $this->request->getPost('F152', FILTER_SANITIZE_STRING);
   $F153 = $this->request->getPost('F153', FILTER_SANITIZE_STRING);
   $F154 = $this->request->getPost('F154', FILTER_SANITIZE_STRING);
   $selectabla6area3 = $this->request->getPost('selectabla6area3', FILTER_SANITIZE_STRING);
   $fechatabla6 = $this->request->getPost('fechatabla6', FILTER_SANITIZE_STRING);

   $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   // $pdf->SetProtection(array('print', 'copy'), '', null, 0, null);
   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
   $pdf->setFontSubsetting(true);
   $pdf->SetFont('dejavusans', '', 14, '', true);
   $pdf->AddPage();

   $pdf->Write(0, 'Reporte tabla 6 Area 3 de Fecha:'.$fechatabla6, '', 0, 'L', true, 0, false, false, 0);
   $pdf->Write(0, 'Caso seleccionado: '.$selectabla6area3, '', 0, 'L', true, 0, false, false, 0);

   $html = <<<EOD
   <table style="width:100%" cellspacing="0" cellpadding="1" border="1">
   <thead>
   <tr style="background-color: #2d4154; color:#ffffff;">
   <th align="center">Equipo</th>
   <th align="center">Calculado</th>
   <th align="center">Corregido</th>
   </tr>
   </thead>
   <tbody>
   <tr>
   <td align="center">Equipo T6 - A3-1</td>
   <td align="center">$E149</td>
   <td align="center">$F149</td>
   </tr>
   <tr>
   <td align="center">Equipo T6 - A3-2</td>
   <td align="center">$E150</td>
   <td align="center">$F150</td>
   </tr>
   <tr>
   <td align="center">Equipo T6 - A3-3</td>
   <td align="center">$E151</td>
   <td align="center">$F151</td>
   </tr>
   <tr>
   <td align="center">Equipo T6 - A3-4</td>
   <td align="center">$E152</td>
   <td align="center">$F152</td>
   </tr>
   <tr>
   <td align="center">Equipo T6 - A3-5</td>
   <td align="center">$E153</td>
   <td align="center">$F153</td>
   </tr>
   <tr>
   <td align="center" rowspan="2">Equipo T6 - A3-5</td>
   <td align="center">$E154</td>
   <td align="center">$F154</td>
   </tr>
   <tr>
   <td align="center">Balanceado</td>
   <td align="center">Balanceado</td>
   </tr>
   </tbody>
   </table>
   EOD;

   $time = Time::now();
   $fecha = $time->year."_".$time->month."_".$time->day;
   $hora = $time->hour."_".$time->minute;
   $tabla = '6';
   $nombrereporte = 'Reporte'.$fecha."-".$hora."-Tab".$tabla.".pdf";
   
   $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
   $pdf->Output($nombrereporte, 'D');
 }


 public function llevandoDatosTabla7y8($fechainicialmod,$fechafinalmod)
 {
      //Trayendo datos desde la tabla 3
  $datostabla3 = $this->tabla3->llevandoDatosTabla6($fechainicialmod,$fechafinalmod);
  $datamejortabla3 = json_decode($datostabla3);

    //Trayendo datos desde la tabla 4
  $datostabla4 = $this->tabla4->llevandoDatosTabla6($fechainicialmod,$fechafinalmod);
  $datamejortabla4 = json_decode($datostabla4);

    //Trayendo datos desde la tabla de calculos 10 
  $totaltabla10 = $this->tabla->TotalCalculosTabla10()->getResult();

    //Trayendo datos desde la tabla 6
  $arraybusquedatabla6 = ['fecha_inicial_tab6_area1 >=' => $fechainicialmod, 'fecha_final_tab6_area1 <=' => $fechafinalmod];
  $datatabla6 = $this->tabla->mostrarTodosDatosTablasFechas('tabla6_area1', $arraybusquedatabla6)->getResult();

  if ($datamejortabla3->status == true && $datamejortabla4->status == true) {
    $arrayequipo7area1count = count($datamejortabla3->arrayequipo7area1);
    $arrayequipo7area2count = count($datamejortabla3->arrayequipo7area2);
    $arrayequipo3area1count = count($datamejortabla4->arrayequipo3area1);
    $arrayequipo18area1count = count($datamejortabla4->arrayequipo18area1);

    if ($arrayequipo7area1count == '29' || $arrayequipo7area2count == '29' || $arrayequipo3area1count == '29' || $arrayequipo18area1count == '29') {
    // Calculos tabla 6 area 1
      $calculosarea2 = $this->sacandocalculosarea2($datamejortabla3,$datamejortabla4, $datatabla6, $totaltabla10);
      $calculosarea3 = $this->sacandocalculosarea3($datamejortabla3,$datamejortabla4, $datatabla6, $totaltabla10);

      $datatabla6mejor = $this->transformardecimalestabla6($datatabla6[0]);

      return json_encode(array('status' => true,'calculosarea2' => $calculosarea2,'calculosarea3' => $calculosarea3,'datostabla6' => $datatabla6mejor));
    }else{
      return json_encode(array('status' => false,'msg'=>'Hubo un error al calcular todos los datos, asegurese de tener todos los datos en las tablas de la fecha seleccionada'));
    }
  }else{
    return json_encode(array('status' => false,'msg'=>'Hubo un error al calcular todos los datos, asegurese de tener todos los datos en las tablas de la fecha seleccionada'));
  }
}


 public function llevandoDatosTablaR3($fechainicialmod,$fechafinalmod)
 {
      //Trayendo datos desde la tabla 3
  $datostabla3 = $this->tabla3->llevandoDatosTabla6($fechainicialmod,$fechafinalmod);
  $datamejortabla3 = json_decode($datostabla3);

    //Trayendo datos desde la tabla 4
  $datostabla4 = $this->tabla4->llevandoDatosTabla6($fechainicialmod,$fechafinalmod);
  $datamejortabla4 = json_decode($datostabla4);

    //Trayendo datos desde la tabla de calculos 10 
  $totaltabla10 = $this->tabla->TotalCalculosTabla10()->getResult();

    //Trayendo datos desde la tabla 6
  // $arraybusquedatabla6 = ['fecha_inicial_tab6_area1' => $fechainicialmod, 'fecha_final_tab6_area1' => $fechafinalmod];
    $arraybusquedatabla6 = ['fecha_inicial_tab6_area1 >= ' => $fechainicialmod, 'fecha_final_tab6_area1 <= ' => $fechafinalmod];
  $datatabla6 = $this->tabla->mostrarTodosDatosTablasFechas('tabla6_area1', $arraybusquedatabla6)->getResult();

  if ($datamejortabla3->status == true && $datamejortabla4->status == true) {
    $arrayequipo7area1count = count($datamejortabla3->arrayequipo7area1);
    $arrayequipo7area2count = count($datamejortabla3->arrayequipo7area2);
    $arrayequipo3area1count = count($datamejortabla4->arrayequipo3area1);
    $arrayequipo18area1count = count($datamejortabla4->arrayequipo18area1);

    if ($arrayequipo7area1count == '29' || $arrayequipo7area2count == '29' || $arrayequipo3area1count == '29' || $arrayequipo18area1count == '29') {
    // Calculos tabla 6 area 1
      $calculosarea3 = $this->sacandocalculosarea3($datamejortabla3,$datamejortabla4, $datatabla6, $totaltabla10);

      return json_encode(array('status' => true,'calculosarea3' => $calculosarea3));
    }else{
      return json_encode(array('status' => false,'msg'=>'Hubo un error al calcular todos los datos, asegurese de tener todos los datos en las tablas de la fecha seleccionada'));
    }
  }else{
    return json_encode(array('status' => false,'msg'=>'Hubo un error al calcular todos los datos, asegurese de tener todos los datos en las tablas de la fecha seleccionada'));
  }
}

public function MostrarLog6()
{
  $equipoareatabla6 = $this->funcion->transformardecimales($this->request->getPost('equipoareatabla6', FILTER_SANITIZE_STRING));
  $fechainiciallogtabla6 = $this->funcion->transformardecimales($this->request->getPost('fechainiciallogtabla6', FILTER_SANITIZE_STRING));
  $fechafinallogtabla6 = $this->funcion->transformardecimales($this->request->getPost('fechafinallogtabla6', FILTER_SANITIZE_STRING));

  $current = Time::parse($fechainiciallogtabla6, 'America/Caracas');
  $test    = Time::parse($fechafinallogtabla6, 'America/Caracas');
  $diff = $current->difference($test);

  $numerotabla = '6';
  $areatabla6 = '1';
  $tabla = 'tabla'.$numerotabla.'_area'.$areatabla6;

  $selectidtabla = $tabla.'_id';
  $buscarfecha = 'fecha_tab'.$numerotabla.'_area'.$areatabla6;
  $where = ['fecha_inicial_tab6_area1 >= '=>$fechainiciallogtabla6,'fecha_final_tab6_area1 <= '=>$fechafinallogtabla6];


  $tablaid = $this->tabla->buscaridtabla($tabla, $selectidtabla, $where)->getResult();
  if ($diff->getDays()>='2') {
        $arrayName = array(          
          'status' => false
        );
  }else{
    if (count($tablaid)>0) {
      $nombrequipobuscar = 'equipo'.$equipoareatabla6.'_tab'.$numerotabla.'_area_'.$areatabla6;
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
          'status' => false
        );
      }
    }else{
      $arrayName = array(
        'status' => false
      );
    }
  }
  echo json_encode($arrayName);
  // echo $diff->getDays();
}

}