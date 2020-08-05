<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $db;
    protected $DBGroup = 'default';
    protected $table = 'usuarios';

    public function __construct()
    {
        $this->db = \Config\Database::connect($this->DBGroup);
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function login($email)
    {
        $builder = $this->db->table($this->table)
        ->select('*')
        ->where('usuario_indicador_red', '' . $email . '')
        ->limit(1);
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function comprobarCodigoCorreo($arrayDatos)
    {
        $builder = $this->db->table($this->table)
        ->select('*')
        ->where('user_email', $arrayDatos['user_email'])
        ->where('user_code_verificacion', $arrayDatos['user_code_verificacion'])
        ->limit(1);
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $builder = $this->db->table($this->table)
        ->select('*')
        ->where('user_id', '' . $id . '')
        ->limit(1);
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function mostrarTodosUsuario()
    {
        $builder = $this->db->table($this->table)
        ->select('*');
        if ($query = $builder->get()) {
            return $query;
        } else {
            return false;
        }
    }

    public function registrarUsuario($arrayDatos)
    {
        $builder = $this->db->table($this->table)
        ->select('*')
        ->where('usuario_correo', '' . $arrayDatos['usuario_correo'] . '');

        if ($builder->countAllResults() >= '1') {
            return false;
        } else {
            if ($arrayDatos['usuario_foto'] != '') {
                $foto = $arrayDatos['usuario_foto'];
            } else {
                $foto = '';
            }
            $builder = $this->db->table($this->table)
            ->set('usuario_cedula', $arrayDatos['usuario_cedula'])
            ->set('usuario_nombre', $arrayDatos['usuario_nombre'])
            ->set('usuario_apellido', $arrayDatos['usuario_apellido'])
            ->set('usuario_telefono', $arrayDatos['usuario_telefono'])
            ->set('usuario_fecha_nac', $arrayDatos['usuario_fecha_nac'])
            ->set('usuario_direccion', $arrayDatos['usuario_direccion'])
            ->set('usuario_correo', $arrayDatos['usuario_correo'])
            ->set('usuario_foto', $foto)
            ->set('usuario_indicador_red', $arrayDatos['usuario_indicador_red'])
            ->set('usuario_clave_red', $arrayDatos['usuario_clave_red'])
            ->set('usuario_tipo', $arrayDatos['usuario_tipo'])
            ->set('usuario_status', $arrayDatos['usuario_status'])
            ->insert();

            if ($this->db->resultID) {
                return json_encode(array('status' => true, 'usuarioid' => $this->db->insertID()));
            } else {
                return json_encode(array('status' => false));
            }
        }
    }

    public function editarUsuario($arrayDatos)
    {
        $pass = password_hash($arrayDatos['usuario_clave_red'], PASSWORD_BCRYPT);

        if ($arrayDatos['usuario_tipo'] != '') {
            $builder = $this->db->table($this->table)
            ->set('usuario_cedula', $arrayDatos['usuario_cedula'])
            ->set('usuario_nombre', $arrayDatos['usuario_nombre'])
            ->set('usuario_apellido', $arrayDatos['usuario_apellido'])
            ->set('usuario_telefono', $arrayDatos['usuario_telefono'])
            ->set('usuario_fecha_nac', $arrayDatos['usuario_fecha_nac'])
            ->set('usuario_direccion', $arrayDatos['usuario_direccion'])
            ->set('usuario_correo', $arrayDatos['usuario_correo'])
            ->set('usuario_foto', $arrayDatos['usuario_foto'])
            ->set('usuario_indicador_red', $arrayDatos['usuario_indicador_red'])
            ->set('usuario_clave_red', $pass)
            ->set('usuario_tipo', $arrayDatos['usuario_tipo'])
            ->where('usuario_id', $arrayDatos['usuario_id'])
            ->update();
        }else{
           $builder = $this->db->table($this->table)
           ->set('usuario_cedula', $arrayDatos['usuario_cedula'])
           ->set('usuario_nombre', $arrayDatos['usuario_nombre'])
           ->set('usuario_apellido', $arrayDatos['usuario_apellido'])
           ->set('usuario_telefono', $arrayDatos['usuario_telefono'])
           ->set('usuario_fecha_nac', $arrayDatos['usuario_fecha_nac'])
           ->set('usuario_direccion', $arrayDatos['usuario_direccion'])
           ->set('usuario_correo', $arrayDatos['usuario_correo'])
           ->set('usuario_foto', $arrayDatos['usuario_foto'])
           ->set('usuario_indicador_red', $arrayDatos['usuario_indicador_red'])
           ->set('usuario_clave_red', $pass)
           ->where('usuario_id', $arrayDatos['usuario_id'])
           ->update(); 
       }
       return $this->db->affectedRows($arrayDatos);
   }

   public function bilitarUsuario($arrayDatos)
   {
    $builder = $this->db->table($this->table)
    ->set('usuario_status', $arrayDatos['usuario_status'])
    ->where('usuario_id', $arrayDatos['usuario_id'])
    ->update();
    return $this->db->affectedRows();
}
}
