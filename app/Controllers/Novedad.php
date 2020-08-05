<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json,text/html; charset=utf-8');

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\NovedadModel;
use App\Models\Log;
use CodeIgniter\I18n\Time;


class Novedad extends Controller
{
	protected $request;
	public $session = null;
	public $user = null;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		// $this->novedad = new Novedad();
	}

	public function registrarNovedad()
	{
		$novedad = new NovedadModel();
		$log = new Log();

		$novedadDescripcion = $this->request->getPost('novedadDescripcion', FILTER_SANITIZE_STRING);
		$selectPrioridadNovedad = $this->request->getPost('selectPrioridadNovedad', FILTER_SANITIZE_STRING);
		
		$arrayDatos =  [
			'novedad_id' => null,
			'novedad_descripcion'  => $novedadDescripcion,
			'novedad_prioridad'  => $selectPrioridadNovedad
		];

		// Registrando datos
		$registronovedadtabla = $novedad->RegistroNovedad($arrayDatos, 'novedades');

  		//Obteniendo datos mejor 
		$datamejorada = json_decode($registronovedadtabla);


		if ($datamejorada->status) {
    		// Guardando el log
			$guardarlogs = [
				[
					'log_id' => null,
					'log_tabla' => 'novedades',
					'log_tipo' => 'registro',
					'log_fecha' => Time::now()->toDateTimeString(),
					'log_id_referencia' => $datamejorada->retornoid,
					'usuario_id' => $this->session->get('usuario_id')
				]
			];
			$log->RegistrarLog($guardarlogs);
			echo json_encode(array('status' => true));
		}else{
			echo json_encode(array('status' => false));
		}
	}


	public function mostrarTodasNovedades()
	{
		helper('text');
		$novedad = new NovedadModel();
		$datos = $novedad->mostrarTodasNovedades()->getResult();
		$result = array();

		foreach ($datos as $key => $value) {

			switch ($value->novedad_prioridad) {
				case '0':
				$novedad_prioridad = '<span class="label label-success">Baja</span>';
				break;
				case '1':
				$novedad_prioridad = '<span class="label label-warning">Media</span>';
				break;
				case '2':
				$novedad_prioridad = '<span class="label label-danger">Alta</span>';
				break;
				default:
				break;
			}
			$buttons = '<div class="btn-group">
			<button type="button" class="btn btn-dark dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-original-title="Opciones" aria-hidden="true">
			<i class="ti-settings"></i>
			</button>
			<div class="dropdown-menu animated fadeIn" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px); background: #ccc;">
			<a class="dropdown-item" href="javascript:void(0)" onclick="detallesNovedad(\'' . $value->novedad_id . '\',
			\'' . $value->novedad_descripcion  . '\',
			\'' . $value->novedad_prioridad . '\',
			\'' . $value->log_fecha . '\')">

			<i class="ti-pencil-alt"></i> Detalles
			</a>
			<a class="dropdown-item" href="javascript:void(0)" onclick="editarNovedad(\'' . $value->novedad_id . '\',
			\'' . $value->novedad_descripcion  . '\',
			\'' . $value->novedad_prioridad . '\')">
			<i class="ti-pencil-alt"></i> Editar
			</a>
			</div>
			</div>
			';

 			// excerpt($text, $phrase = false, $radius = 100, $ellipsis = '...');
			
			$result[] = array(
				"0" => excerpt($value->novedad_descripcion,null, 100, '...'),
				"1" => $novedad_prioridad,
				"2" => $value->log_fecha,
				'3' => $value->usuario_cedula." <br> ".$value->usuario_nombre."<br>".$value->usuario_apellido,
				"4" => $buttons,
			);
		}
		$json_data = array("data" => $result);
		echo json_encode($json_data);
	}

	public function verDetallesNovedad()
	{
		$novedad = new NovedadModel();		
		$idlog = $this->request->getPost('idlog', FILTER_SANITIZE_STRING);
		$where = ['log_id_referencia' => $idlog, 'log_tabla' => 'novedades'];
		$datos = $novedad->verDetallesNovedad($where)->getResult();
		if (count($datos)>0) {
			echo json_encode(array('status' => true, 'data' => $datos));
		}else{
			echo json_encode(array('status' => false));
		}

	}

	public function editarNovedad()
	{
		$novedad = new NovedadModel();
		$log = new Log();

		$idnovedadEditar = $this->request->getPost('idnovedadEditar', FILTER_SANITIZE_STRING);
		$novedadDescripcionEditar = $this->request->getPost('novedadDescripcionEditar', FILTER_SANITIZE_STRING);
		$selectPrioridadNovedadEditar = $this->request->getPost('selectPrioridadNovedadEditar', FILTER_SANITIZE_STRING);


		$datosactualizar = ['novedad_descripcion' => $novedadDescripcionEditar,'novedad_prioridad' => $selectPrioridadNovedadEditar];
		$where = ['novedad_id' => $idnovedadEditar];
		$nombretabla = 'novedades';
		$edicciontabla = $novedad->EdiccionTabla($datosactualizar, $nombretabla, $where);

		if ($edicciontabla == '1') {

			// Guardando el log
			$guardarlogs = [
				[
					'log_id' => null,
					'log_tabla' => 'novedades',
					'log_tipo' => 'editado',
					'log_fecha' => Time::now()->toDateTimeString(),
					'log_id_referencia' => $idnovedadEditar,
					'usuario_id' => $this->session->get('usuario_id')
				]
			];
			$log->RegistrarLog($guardarlogs);
			echo json_encode(array('status' => true));
		} else {
			echo json_encode(array('status' => false));
		}
	}
}