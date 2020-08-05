<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Tabla extends Model
{
    protected $db;
    protected $DBGroup = 'default';
    // protected $table = 'usuarios';

    public function __construct()
    {
        $this->db = \Config\Database::connect($this->DBGroup);
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function RegistroTablas($arrayDatos, $tabla)
    {
        $builder1 = $this->db->table($tabla)->insert($arrayDatos);
        if ($this->db->resultID) {
            return json_encode(array('status' => true, 'retornoid' => $this->db->insertID()));
        } else {
            return json_encode(array('status' => false));
        }
    }

    public function mostrarTodosDatosTablasFechas($tabla, $arraybusqueda)
    {
        $builder = $this->db->table($tabla)
        ->select('*')
        ->where($arraybusqueda);
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function mostrarTodosDatosTabla5paraCalcular($tabla, $arraybusqueda,$valorOrder)
    {
        $builder = $this->db->table($tabla)
        ->select('*')
        ->where($arraybusqueda)
        ->orderBy($valorOrder, 'DESC')
        ->limit('1');
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

    public function mostrarfechascargadas($tabla, $campofecha)
    {
        $builder = $this->db->table($tabla)
        ->selectMin($campofecha, 'minimafecha')
        ->selectMax($campofecha, 'maximafecha');
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function mostrarfechascargadastabla6($tabla, $wherefecha)
    {
        $builder = $this->db->table($tabla)
        ->selectMin($wherefecha[0], 'minimafecha')
        ->selectMax($wherefecha[1], 'maximafecha');
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

    //Inicio Tabla10
    public function mostrarTodosCalculosTabla10()
    {
        $builder = $this->db->table('calculos_tabla10')
        ->select('*');
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function TotalCalculosTabla10()
    {
        $builder = $this->db->table('total_calculos_tabla10')
        ->select('*');
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function actualizarCalculosTabla10($arrayDatos, $tabla, $where)
    {
        $builder = $this->db->table('total_calculos_tabla10')->update($arrayDatos, $where);
        return $this->db->affectedRows();
    }
    //Fin Tabla10

    public function mostrarTodosDatosUsuariosTablas($tabla,$select,$innerjoinlogs,$arraybusquedalogs)
    {
        $builder = $this->db->table($tabla)
        ->select($select)
        ->join('logs', $innerjoinlogs)
        ->join('usuarios', 'usuarios.usuario_id = logs.usuario_id')
        ->where($arraybusquedalogs)
        ->groupBy("usuarios.usuario_id");
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function buscaridtabla($tabla, $select,$arraybusqueda)
    {
        $builder = $this->db->table($tabla)
        ->select($select)
        ->where($arraybusqueda);
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function mostrarTodosDatosLogsTablas($tabla,$select,$innerjoinlogs,$arraybusquedalogs)
    {
        $builder = $this->db->table($tabla)
        ->select($select)
        ->join('logs', $innerjoinlogs)
        ->join('usuarios', 'usuarios.usuario_id = logs.usuario_id')
        ->where($arraybusquedalogs);
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }
}