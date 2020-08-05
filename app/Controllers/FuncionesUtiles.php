<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json,text/html; charset=utf-8');

use CodeIgniter\Controller;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\I18n\Time;

class FuncionesUtiles extends Controller
{

  public function ordenardatosdatatable($arraydata, $nombrearea, $nombreequipo, $nombrequipo, $fecha, $cantidadecimales)
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
    $promedio6am_calculo = $this->sacarcalculospromedio($arraydata, $nombrequipo, '17');
    $promedio12am_calculo = $this->sacarcalculospromedio($arraydata, $nombrequipo, '23');

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

  public function sacarcalculospromedio($arraydata, $nombrequipo, $numeroiterar)
  {
    $sacarpromedio = '0';
    $sumatoria = '0';
    for ($i = 0; $i <= $numeroiterar; $i++) {
      if (!isset($arraydata[$i]->$nombrequipo) || $arraydata[$i]->$nombrequipo == '0') { } else {
        $sumatoria += $arraydata[$i]->$nombrequipo;
        $sacarpromedio++;
      }
    }
    return $sumatoria / $sacarpromedio;
  }


  public function transformardecimales($input)
  {
    $conversionpuntovacio = str_replace('.', '', $input);
    $conversioncomaporpunto = str_replace(',', '.', $conversionpuntovacio);
    return $conversioncomaporpunto;
  }
  public function transformardecimalesinverso($input)
  {
    $conversionpuntovacio = str_replace('.', ',', $input);
    // $conversioncomaporpunto = str_replace(',', '.', $conversionpuntovacio);
    return $conversioncomaporpunto;
  }

  public function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach($array as $val) {
      if (!in_array($val->$key, $key_array)) {
        $key_array[$i] = $val->$key;
        $temp_array[$i] = $val;
      }
      $i++;
    }
    return $temp_array;
  } 


  
}
