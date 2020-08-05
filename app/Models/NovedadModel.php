<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class NovedadModel extends Model
{
    protected $db;
    protected $DBGroup = 'default';
    protected $table = 'novedades';

    public function __construct()
    {
        $this->db = \Config\Database::connect($this->DBGroup);
    }

    public function __destruct()
    {
        $this->db->close();
    }


    public function RegistroNovedad($arrayDatos, $tabla)
    {
        $builder1 = $this->db->table($tabla)->insert($arrayDatos);
        if ($this->db->resultID) {
            return json_encode(array('status' => true, 'retornoid' => $this->db->insertID()));
        } else {
            return json_encode(array('status' => false));
        }
    }


    public function mostrarTodasNovedades()
    {
        $builder = $this->db->table($this->table)
        ->select('novedad_id, novedad_descripcion, novedad_prioridad, log_fecha, usuario_cedula, usuario_nombre, usuario_apellido')
        ->join('logs', 'logs.log_id_referencia = novedades.novedad_id')
        ->join('usuarios', 'usuarios.usuario_id = logs.usuario_id')
        ->where('logs.log_tabla', 'novedades')
        ->where('logs.log_tipo', 'registro');
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function verDetallesNovedad($where)
    {
        $builder = $this->db->table($this->table)
        ->select('log_fecha, log_tipo, usuario_cedula, usuario_nombre, usuario_apellido')
        ->join('logs', 'logs.log_id_referencia = novedades.novedad_id')
        ->join('usuarios', 'usuarios.usuario_id = logs.usuario_id')
        ->where($where);
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }


    public function buscarIdPorFecha($tabla, $fechaparabuscarwhere, $fechabuscar)
    {
        $builder = $this->db->table($tabla)
        ->select('*')
        ->like($fechaparabuscarwhere, $fechabuscar, 'after');
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function EdiccionTabla($arrayDatos, $tabla, $where)
    {
        $builder = $this->db->table($tabla)->update($arrayDatos, $where);
        return $this->db->affectedRows();
    }
}