<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Log extends Model
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

    public function RegistrarLog($arrayDatos)
    {
        $builder1 = $this->db->table('logs')->insertBatch($arrayDatos);
        if ($this->db->resultID) {
            return json_encode(array('status' => true));
        } else {
            return json_encode(array('status' => false));
        }
    }

    //     $data = [
    //         'title' => $title,
    //         'name'  => $name,
    //         'date'  => $date
    // ];

    // $db->table('mytable')->insert($data);  // Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')

}
