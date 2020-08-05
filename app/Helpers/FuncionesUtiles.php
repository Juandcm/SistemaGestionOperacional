<?php

// function obtenerValoresTablaEditable($valoresinput)
// {
// 	$i = 0;
// 	$data = array();
//     // $i == '0' //accion_id
//     // $i == '1' //variable con el nombre del campo para actualizar
//     // $i == '2' //action == edit
// 	foreach ($valoresinput as $key => $value) {
// 		if ($i == '1') {
// 			$conversioncomaporpunto => $this->transformardecimales($this->request->getPost($key, FILTER_SANITIZE_STRING));
// 			$data = [
// 				$key => str_replace(',', '', $conversioncomaporpunto)
// 			];
// 		}
// 		$i++;
// 	}
// 	return $data;
// }
if (!function_exists('transformardecimales')) {
	function transformardecimales($input)
	{
		$conversionpuntovacio = str_replace('.', '', $input);
		$conversioncomaporpunto = str_replace(',', '.', $conversionpuntovacio);
		return $conversioncomaporpunto;
	}
}