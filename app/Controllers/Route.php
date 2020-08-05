<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json,text/html; charset=utf-8');

use CodeIgniter\HTTP\RequestInterface;


class Route extends BaseController
{
	protected $request;
	public $session = null;
	public $vistadentro = "dentro_session";
	public $vistafuera = "fuera_session";

	public function __construct()
	{
		$this->session = \Config\Services::session();
	}

	public function verificarSession($vistasecundaria)
	{
		return ($this->session->has('usuario_id'))
			? ['vistaprincipal' => $this->vistadentro, 'vistasecundaria' => $vistasecundaria,  'logueado' => true, 'permiso' => $this->session->get('usuario_tipo')]
			: ['vistaprincipal' => $this->vistafuera, 'vistasecundaria' => $vistasecundaria,  'logueado' => false, 'permiso' => $this->session->get('usuario_tipo')];
	}

	public function index()
	{
		$varvista = $this->verificarSession('');
		if ($varvista['logueado']) {
			$vistafull = $this->permisovista($varvista['permiso']);
			return view($varvista['vistaprincipal'], $vistafull);
		} else {
			return view($varvista['vistaprincipal']);
		}
	}

	public function permisovista($permiso)
	{
		$vistafullnew = [];
		switch ($permiso) {
			case '0': //operador
				$vistafullnew = ['vistafull' => 'inicio/operador'];
				break;
			case '1': //administrador
				$vistafullnew = ['vistafull' => 'inicio/administrador'];
				break;
			case '2': //supervisor
				$vistafullnew = ['vistafull' => 'inicio/supervisor'];
				break;
			case '3': //fin de semana
				$vistafullnew = ['vistafull' => 'inicio/findesemana'];
				break;
			default:
				break;
		}
		return $vistafullnew;
	}


	public function usuarios()
	{
		$varvista = $this->verificarSession('administracion/usuarios/administradorusuario');
		$vistafull = ['vistafull' => $varvista['vistasecundaria']];
		if ($varvista['logueado']) {
			return view($varvista['vistaprincipal'], $vistafull);
		} else {
			return view($varvista['vistaprincipal']);
		}
	}

	public function tablas()
	{
		$varvista = $this->verificarSession('operador/tablas/tablas');
		$vistafull = ['vistafull' => $varvista['vistasecundaria']];
		if ($varvista['logueado']) {
			return view($varvista['vistaprincipal'], $vistafull);
		} else {
			return view($varvista['vistaprincipal']);
		}
	}

	public function reportes()
	{
		$varvista = $this->verificarSession('reportes/reportes');
		$vistafull = ['vistafull' => $varvista['vistasecundaria']];
		if ($varvista['logueado']) {
			return view($varvista['vistaprincipal'], $vistafull);
		} else {
			return view($varvista['vistaprincipal']);
		}
	}

	public function novedades()
	{
		$varvista = $this->verificarSession('novedades/novedades');
		$vistafull = ['vistafull' => $varvista['vistasecundaria']];
		if ($varvista['logueado']) {
			return view($varvista['vistaprincipal'], $vistafull);
		} else {
			return view($varvista['vistaprincipal']);
		}
	}

	public function graficas()
	{
		$varvista = $this->verificarSession('graficas/graficas');
		$vistafull = ['vistafull' => $varvista['vistasecundaria']];
		if ($varvista['logueado']) {
			return view($varvista['vistaprincipal'], $vistafull);
		} else {
			return view($varvista['vistaprincipal']);
		}
	}

	// public function buscador()
	// {
	// 	//Tengo que crear un modelo que tenga el buscador
	// 	$buscadorpalabra = $this->request->uri->getSegment(2);
	// 	$buscadorpalabra = ['buscadorpalabra' => $buscadorpalabra, 'datosbuscador' => 'respuesta'];
	// 	$vista = $this->verificarSession('administracion/buscador/buscadorprincipal');

	// 	return view($vista, $buscadorpalabra);
	// }
	//--------------------------------------------------------------------

}
