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

class Tabla10 extends Controller
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

  public function mostrarCalculosTabla10()
  {
    $result = array();
    $data = $this->tabla->mostrarTodosCalculosTabla10();
    $datos = $data->getResult();
    $subtotal = array();
    $subtotalfinal = array();

    $totalgral = 0;
    $totalporcionlectura1 = 0;
    $totalporcionlectura2 = 0;
    $totalporcionlectura3 = 0;
    $totalporcionlectura4 = 0;
    $totalantes6am = 0;

    foreach ($datos as $key => $value) {
      $grl = $value->lect1_condc2 - $value->lect1_condc1;
      $porcionlectura1 = $value->lect2_condc2 - $value->lect2_condc1;
      $porcionlectura2 = $value->lect3_condc2 - $value->lect3_condc1;
      $porcionlectura3 = ($value->lect4_condc2 - $value->lect4_condc1) / 1000000;
      $porcionlectura4 = $grl - $porcionlectura3 - $porcionlectura1 - $porcionlectura2;
      $res1 = number_format($grl, 6, ',', '.');
      $res2 = number_format($porcionlectura1, 6, ',', '.');
      $res3 = number_format($porcionlectura2, 6, ',', '.');
      $res4 = number_format($porcionlectura3, 6, ',', '.');
      $res5 = number_format($porcionlectura4, 6, ',', '.');

      if ($key == 0) {
        $res6 = $res5;
      } else {
        $valorsubtotalanterior = str_replace(',', '.', $result[($key - 1)][14]);
        $res5mod = str_replace(',', '.', $res5);
        $valorsubtotal = $valorsubtotalanterior + $res5mod;
        $res6 = number_format($valorsubtotal, 6, ',', '.');
      }

      //Sumando totales
      $totalgral += $grl;
      $totalporcionlectura1 += $porcionlectura1;
      $totalporcionlectura2 += $porcionlectura2;
      $totalporcionlectura3 += $porcionlectura3;
      $totalporcionlectura4 += $porcionlectura4;

      if ($key == 9) {
        $totalantes6am += $totalporcionlectura4;
      }

      $result[] = array(
        "0" => $value->accion_id,
        "1" => number_format($value->lect1_condc1, 2, ',', '.'),
        "2" => number_format($value->lect2_condc1, 6, ',', '.'),
        "3" => number_format($value->lect3_condc1, 6, ',', '.'),
        "4" => number_format($value->lect4_condc1, 6, ',', '.'),
        "5" => number_format($value->lect1_condc2, 2, ',', '.'),
        "6" => number_format($value->lect2_condc2, 6, ',', '.'),
        "7" => number_format($value->lect3_condc2, 6, ',', '.'),
        "8" => number_format($value->lect4_condc2, 6, ',', '.'),
        "9" => $res1,
        "10" => $res2,
        "11" => $res3,
        "12" => $res4,
        "13" => $res5,
        "14" => $res6
      );
    }

    $resultfinal = array(
      "0" => '',
      "1" => '',
      "2" => '',
      "3" => '',
      "4" => '',
      "5" => '',
      "6" => '',
      "7" => '',
      "8" => '<div class="text-danger">Total</div>',
      "9" => number_format($totalgral, 6, ',', '.'),
      "10" => number_format($totalporcionlectura1, 6, ',', '.'),
      "11" => number_format($totalporcionlectura2, 6, ',', '.'),
      "12" => number_format($totalporcionlectura3, 6, ',', '.'),
      "13" => '<div class="bg-warning">' . number_format($totalporcionlectura4, 6, ',', '.') . '</div>',
      "14" => ''
    );

    $resultfinal2 = array(
      "0" => '',
      "1" => '',
      "2" => '',
      "3" => '',
      "4" => '',
      "5" => '',
      "6" => '',
      "7" => '',
      "8" => '',
      "9" => '',
      "10" => '',
      "11" => '',
      "12" => '<div class="font-weight-bold">Antes de las 6 am:</div>',
      "13" => '<div class="bg-warning">' . number_format($totalantes6am, 6, ',', '.') . '</div>',
      "14" => ''
    );

    array_push($result, $resultfinal);
    array_push($result, $resultfinal2);

    //Actualizando datos totales de la tabla 10
    $totalporcionlectura4_primero = str_replace('.', '', number_format($totalporcionlectura4, 6, ',', '.'));
    $totalporcionlectura4_segundo = str_replace(',', '.', $totalporcionlectura4_primero);
    $totalantes6am_primero = str_replace('.', '', number_format($totalantes6am, 6, ',', '.'));
    $totalantes6am_segundo = str_replace(',', '.', $totalantes6am_primero);
    $tabla = 'total_calculos_tabla10';
    $where = ['tot_cal_tab10_id' => '1'];
    $datos = ['total_12m' => $totalporcionlectura4_segundo, 'total_antes6am' => $totalantes6am_segundo];
    $edicciontabla = $this->tabla->EdiccionTabla($datos, $tabla, $where);

    $json_data = array("data" => $result);
    echo json_encode($json_data);
  }


  public function editarTabla10()
  {
    $input = filter_input_array(INPUT_POST);
    $accion_id = $this->request->getPost('accion_id', FILTER_SANITIZE_STRING);
    $datos = $this->obtenerValoresTablaEditable($input);

    $tabla = 'calculos_tabla10';
    $where = ['accion_id' => $accion_id];
    $edicciontabla = $this->tabla->EdiccionTabla($datos, $tabla, $where);
    if ($edicciontabla == '1') {
      echo json_encode(array('status' => true, 'tabla' => '10'));
    } else {
      echo json_encode(array('status' => false));
    }
  }


  public function obtenerValoresTablaEditable($valoresinput)
  {
    $i = 0;
    $data = array();
    // $i == '0' //accion_id
    // $i == '1' //variable con el nombre del campo para actualizar
    // $i == '2' //action == edit
    foreach ($valoresinput as $key => $value) {
      if ($i == '1') {
        $conversioncomaporpunto = $this->funcion->transformardecimales($this->request->getPost($key, FILTER_SANITIZE_STRING));
        $data = [
          $key => str_replace(',', '', $conversioncomaporpunto)
        ];
      }
      $i++;
    }
    return $data;
  }
}
