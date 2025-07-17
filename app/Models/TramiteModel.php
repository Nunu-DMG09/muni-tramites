<?php 

namespace App\Models;

use CodeIgniter\Model;

class TramiteModel extends Model
{
    protected $tabla = 'tramites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'titulo', 'descripcion', 'estado', 'fecha_solicitud'];
    protected $returnType    = 'array';

}