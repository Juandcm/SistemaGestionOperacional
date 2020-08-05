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
// use App\Controllers\Tabla3;
// use App\Controllers\Tabla5;
use App\Controllers\Tabla6;
use TCPDF;

class TablaR3 extends Controller
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
    // $this->tabla3 = new Tabla3();
    // $this->tabla5 = new Tabla5();
    $this->tabla6 = new Tabla6();
  }


  public function mostrarDataParteA()
  {
    $fechainicial=$this->request->getPost('fecha', FILTER_SANITIZE_STRING);
    $fechasnew = explode('-',  $fechainicial);
    $ano = $fechasnew[0];
    $mes = $fechasnew[1];
    $fechafinal = $ano.'-'.($mes+1);

    $numerodiasmes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
    $valorcomprobar = $numerodiasmes - 1;

    $fechainicialmod = $fechainicial.'-01 13:00:00';
    $fechafinalmod = $fechafinal.'-01 12:59:59';

    $arraybusqueda1 = ['fecha_tab3_area1 >=' =>  $fechainicialmod, 'fecha_tab3_area1 <=' => $fechafinalmod];
    $arraybusqueda2 = ['fecha_tab3_area2 >=' => $fechainicialmod , 'fecha_tab3_area2 <=' => $fechafinalmod];

    $data1 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area1', $arraybusqueda1)->getResult();
    $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla3_area2', $arraybusqueda2)->getResult();


    $valort6equipo1area3 = 0;
    $valort6equipo2area3 = 0;
    $valort3equipo7area1 = 0;
    $valort3equipo7area2 = 0;
    $subtotala = 0;
    $valort6equipo5area3 = 0;
    if (count($data1)>0 && count($data2)>0) {

      foreach ($data1 as $key => $value) {
        $equipo7_tab3_area_1 = $value->equipo7_tab3_area_1;
        $equipo7_tab3_area_2 = $data2[$key]->equipo7_tab3_area_2;
        $valort3equipo7area1 += $equipo7_tab3_area_1;
        $valort3equipo7area2 += $equipo7_tab3_area_2;
      }

      $arrayName = array(
        'status' => true, 
        'valort3equipo7area1' =>  number_format($valort3equipo7area1, '2', ',', '.'), 
        'valort3equipo7area2' =>  number_format($valort3equipo7area2, '2', ',', '.'),
      );

    }else{
      $arrayName = array(
        'status' => false
      );
    }

    $statustabla6 = true;
    $where = array('0' => 'fecha_inicial_tab6_area1', '1' => 'fecha_final_tab6_area1');
    $tabla6_area1 = $this->tabla->mostrarfechascargadastabla6('tabla6_area1', $where)->getResult();
    $minimafecha = $tabla6_area1[0]->minimafecha;
    $maximafecha = $tabla6_area1[0]->maximafecha;

    $minimafechamod = Time::parse($minimafecha, 'America/Caracas')->toDateString();

    for ($i=0; $i < $numerodiasmes; $i++) {
      $fechainicialanomesdia = $fechainicial.'-'.($i+1);
      $fechainicialbuscar = $fechainicialanomesdia.' 13:00:00';
      $fechainicialanomesdiamod = Time::parse($fechainicialanomesdia, 'America/Caracas')->toDateString();

      if ($fechainicialanomesdiamod >= $minimafechamod) {
        if ($statustabla6 == true) {
         if ($valorcomprobar == $i) {
          $fechafinalbuscar =  $fechafinalmod;
          $fechasnewinicial = explode(' ',  $fechainicialbuscar);
          $anomesinicial = $fechasnewinicial[0];
          $fechasnewfinal = explode(' ',  $fechafinalbuscar);
          $anomesfinal = $fechasnewfinal[0];
          $valortabla6 = $this->tabla6->llevandoDatosTablaR3($anomesinicial,$anomesfinal);
        }else{
         $fechafinalbuscar = $fechainicial.'-'.($i+2).' 12:59:59';
         $fechasnewinicial = explode(' ',  $fechainicialbuscar);
         $anomesinicial = $fechasnewinicial[0];
         $fechasnewfinal = explode(' ',  $fechafinalbuscar);
         $anomesfinal = $fechasnewfinal[0];
         $valortabla6 = $this->tabla6->llevandoDatosTablaR3($anomesinicial,$anomesfinal);
       }
       $datamejortabla6 = json_decode($valortabla6);

       if ($datamejortabla6->status == true){
        $E149  = $this->funcion->transformardecimales($datamejortabla6->calculosarea3->datosmostrararea3filae->E149);
        $E150  = $this->funcion->transformardecimales($datamejortabla6->calculosarea3->datosmostrararea3filae->E150);
        $E151  = $this->funcion->transformardecimales($datamejortabla6->calculosarea3->datosmostrararea3filae->E151);
        $E152  = $this->funcion->transformardecimales($datamejortabla6->calculosarea3->datosmostrararea3filae->E152);
        $E153  = $this->funcion->transformardecimales($datamejortabla6->calculosarea3->datosmostrararea3filae->E153);

        $valort6equipo1area3 += $E149;
        $valort6equipo2area3 += $E150;
        $subtotala += $E151 + $E152;
        $valort6equipo5area3 += $E153;
      }else{
        $statustabla6 = false;
      }    
    }
  }
}

$arrayNew = array(
  'valort6equipo1area3' =>  number_format($valort6equipo1area3, '2', ',', '.'),
  'valort6equipo2area3' =>  number_format($valort6equipo2area3, '2', ',', '.'), 
  'subtotala' =>  number_format($subtotala, '2', ',', '.'),
  'valort6equipo5area3' =>  number_format($valort6equipo5area3, '2', ',', '.'),
);
$arraFinal = array_merge($arrayNew,$arrayName);
echo json_encode($arraFinal);

}


public function mostrarDataParteB()
{
  $fechainicial=$this->request->getPost('fecha', FILTER_SANITIZE_STRING);
  $fechasnew = explode('-',  $fechainicial);
  $ano = $fechasnew[0];
  $mes = $fechasnew[1];
  $fechafinal = $ano.'-'.($mes+1);

  $fechainicialmod = $fechainicial.'-01 13:00:00';
  $fechafinalmod = $fechafinal.'-01 12:59:59';
  $arraybusqueda2 = ['fecha_tab5_area2 >=' =>  $fechainicialmod, 'fecha_tab5_area2 <=' => $fechafinalmod];
  $arraybusqueda3 = ['fecha_tab5_area3 >=' => $fechainicialmod , 'fecha_tab5_area3 <=' => $fechafinalmod];
  $arraybusqueda4 = ['fecha_tab5_area4 >=' => $fechainicialmod , 'fecha_tab5_area4 <=' => $fechafinalmod];

  $data2 = $this->tabla->mostrarTodosDatosTablasFechas('tabla5_area2', $arraybusqueda2)->getResult();
  $data3 = $this->tabla->mostrarTodosDatosTablasFechas('tabla5_area3', $arraybusqueda3)->getResult();
  $data4 = $this->tabla->mostrarTodosDatosTablasFechas('tabla5_area4', $arraybusqueda4)->getResult();

  $valort5equipo3area4 = 0;
  $valort5equipo1area4 = 0;
  $valort5equipo2area4 = 0;
  $subtotalb1 = 0;
  $subtotalb2 = 0;
  $subtotalb3 = 0;
  if (count($data2)>0 && count($data3)>0 && count($data4)>0) {

    foreach ($data2 as $key => $value) {
      $equipo1_tab5_area_2 = $value->equipo1_tab5_area_2;
      $equipo2_tab5_area_2 = $value->equipo2_tab5_area_2;
      $equipo3_tab5_area_2 = $value->equipo3_tab5_area_2;

      $equipo1_tab5_area_3 = $data3[$key]->equipo1_tab5_area_3;
      $equipo2_tab5_area_3 = $data3[$key]->equipo2_tab5_area_3;
      $equipo3_tab5_area_3 = $data3[$key]->equipo3_tab5_area_3;

      $equipo1_tab5_area_4 = $data4[$key]->equipo1_tab5_area_4;
      $equipo2_tab5_area_4 = $data4[$key]->equipo2_tab5_area_4;
      $equipo3_tab5_area_4 = $equipo1_tab5_area_4 + $equipo2_tab5_area_4;

      $valort5equipo3area4 += $equipo3_tab5_area_4;
      $valort5equipo1area4 += $equipo1_tab5_area_4;
      $valort5equipo2area4 += $equipo2_tab5_area_4;

      $subtotalb1 += $equipo1_tab5_area_2 + $equipo1_tab5_area_3;
      $subtotalb2 += $equipo2_tab5_area_2 + $equipo2_tab5_area_3;
      $subtotalb3 += $equipo3_tab5_area_2 + $equipo3_tab5_area_3;
    }

    $arrayName = array(
      'status' => true, 
      'valort5equipo3area4' =>  number_format($valort5equipo3area4, '2', ',', '.'), 
      'valort5equipo1area4' =>  number_format($valort5equipo1area4, '2', ',', '.'),
      'valort5equipo2area4' =>  number_format($valort5equipo2area4, '2', ',', '.'),
      'subtotalb1' =>  number_format($subtotalb1, '2', ',', '.'),
      'subtotalb2' =>  number_format($subtotalb2, '2', ',', '.'),
      'subtotalb3' =>  number_format($subtotalb3, '2', ',', '.')
    );
  }else{
    $arrayName = array(
      'status' => false
    );
  }

  echo json_encode($arrayName);
}

public function mostrarfechascargadas()
{
  $tabla5_area2 = $this->tabla->mostrarfechascargadas('tabla5_area2', 'fecha_tab5_area2')->getResult();
  echo json_encode($tabla5_area2);
}

public function reportetablaparteB()
{
 header('Content-Type: application/pdf');
 header('Content-Disposition: inline; filename="VivesPromocion.pdf"');    

 $valort5equipo3area4=$this->request->getPost('valort5equipo3area4', FILTER_SANITIZE_STRING);
 $valort5equipo1area4=$this->request->getPost('valort5equipo1area4', FILTER_SANITIZE_STRING);
 $valort5equipo2area4=$this->request->getPost('valort5equipo2area4', FILTER_SANITIZE_STRING);
 $subtotalb1=$this->request->getPost('subtotalb1', FILTER_SANITIZE_STRING);
 $subtotalb2=$this->request->getPost('subtotalb2', FILTER_SANITIZE_STRING);
 $subtotalb3=$this->request->getPost('subtotalb3', FILTER_SANITIZE_STRING);
 $fechatabla3b=$this->request->getPost('fechatabla3b', FILTER_SANITIZE_STRING);



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

 $pdf->Write(0, 'Reporte acumulado Parte B de Fecha: '.$fechatabla3b, '', 0, 'L', true, 0, false, false, 0);
 $pdf->Write(0, 'Usuario que descargo el archivo: ', '', 0, 'L', true, 0, false, false, 0);
 $pdf->Write(0, 'C.I: '.$usuario_cedula, '', 0, 'L', true, 0, false, false, 0);
 $pdf->Write(0, 'Nombre: '.$nombrefull, '', 0, 'L', true, 0, false, false, 0);

 $html = <<<EOD
 <table border="1" cellpadding="1" cellspacing="0" style="width: 100%">
 <thead>
 <tr style="background-color:#FFFF00;color:#0000FF;">
 <th align="center">Equipo</th>
 <th align="center">Unidad</th>
 <th align="center">Total</th>
 </tr>
 </thead>
 <tbody width="100%">
 <tr>
 <td align="center">Equipo T5 - A4-3</td>
 <td align="center">vyc</td>
 <td>$valort5equipo3area4</td>
 </tr>
 <tr>
 <td align="center">Equipo T5 - A4-1</td>
 <td align="center">vyc</td>
 <td>$valort5equipo1area4</td>
 </tr>
 <tr>
 <td align="center">Equipo T5 - A4-2</td>
 <td align="center">vyc</td>
 <td>$valort5equipo2area4</td>
 </tr>
 <tr>
 <td align="center">Sub Total B1</td>
 <td align="center">vyc</td>
 <td>$subtotalb1</td>
 </tr>
 <tr>
 <td align="center">Sub Total B2</td>
 <td align="center">vyc</td>
 <td>$subtotalb2</td>
 </tr>
 <tr>
 <td align="center">Sub Total B3</td>
 <td align="center">vyc</td>
 <td>$subtotalb3</td>
 </tr>
 </tbody>
 </table>
 EOD;

 $time = Time::now();
 $fecha = $time->year."_".$time->month."_".$time->day;
 $hora = $time->hour."_".$time->minute;
 $tabla = '7';
 $nombrereporte = 'Reporte'.$fecha."-".$hora."-R3B.pdf";

 $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
 $pdf->Output($nombrereporte, 'D');
}

public function reportetablaparteA()
{
  header('Content-Type: application/pdf');
  header('Content-Disposition: inline; filename="VivesPromocion.pdf"');    

  $valort6equipo1area3=($this->request->getPost('valort6equipo1area3', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('valort6equipo1area3', FILTER_SANITIZE_STRING);
  $valort6equipo2area3=($this->request->getPost('valort6equipo2area3', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('valort6equipo2area3', FILTER_SANITIZE_STRING);
  $valort3equipo7area1=($this->request->getPost('valort3equipo7area1', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('valort3equipo7area1', FILTER_SANITIZE_STRING);
  $valort3equipo7area2=($this->request->getPost('valort3equipo7area2', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('valort3equipo7area2', FILTER_SANITIZE_STRING);
  $subtotala=($this->request->getPost('subtotala', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('subtotala', FILTER_SANITIZE_STRING);
  $valort6equipo5area3=($this->request->getPost('valort6equipo5area3', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('valort6equipo5area3', FILTER_SANITIZE_STRING);
  $fechatabla3a=($this->request->getPost('fechatabla3a', FILTER_SANITIZE_STRING)=='')?'0':$this->request->getPost('fechatabla3a', FILTER_SANITIZE_STRING);

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

  $pdf->Write(0, 'Reporte acumulado Parte A de Fecha: '.$fechatabla3a, '', 0, 'L', true, 0, false, false, 0);
  $pdf->Write(0, 'Usuario que descargo el archivo: ', '', 0, 'L', true, 0, false, false, 0);
  $pdf->Write(0, 'C.I: '.$usuario_cedula, '', 0, 'L', true, 0, false, false, 0);
  $pdf->Write(0, 'Nombre: '.$nombrefull, '', 0, 'L', true, 0, false, false, 0);

  $html = <<<EOD
  <table border="1" cellpadding="1" cellspacing="0" style="width: 100%">
  <thead>
  <tr style="background-color:#FFFF00;color:#0000FF;">
  <th align="center">Equipo</th>
  <th align="center">Unidad</th>
  <th align="center">Total</th>
  </tr>
  </thead>
  <tbody width="100%">
  <tr>
  <td align="center">Equipo T6 - A3-1</td>
  <td align="center">vycyy</td>
  <td>$valort6equipo1area3</td>
  </tr>
  <tr>
  <td align="center">Equipo T6 - A3-2</td>
  <td align="center">vycyy</td>
  <td>$valort6equipo2area3</td>
  </tr>
  <tr>
  <td align="center">Equipo T3 - A1-7</td>
  <td align="center">vyc</td>
  <td>$valort3equipo7area1</td>
  </tr>
  <tr>
  <td align="center">Equipo T3 - A2-7</td>
  <td align="center">vyc</td>
  <td>$valort3equipo7area2</td>
  </tr>
  <tr>
  <td align="center">Sub Total A</td>
  <td align="center">vyc</td>
  <td>$subtotala</td>
  </tr>
  <tr>
  <td align="center">Equipo T6 - A3-5</td>
  <td align="center">vyc</td>
  <td>$valort6equipo5area3</td>
  </tr>
  </tbody>
  </table>
  EOD;

  $time = Time::now();
  $fecha = $time->year."_".$time->month."_".$time->day;
  $hora = $time->hour."_".$time->minute;
  $nombrereporte = 'Reporte'.$fecha."-".$hora."-R3A.pdf";

  $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
  $pdf->Output($nombrereporte, 'D');
}

}