<?php

namespace App\Models;

use CodeIgniter\Model;

class TramiteModel extends Model
{
    protected $table      = 'tramite_tabla'; // 🚨 Asegúrate que la tabla existe en la BD
    protected $primaryKey = 'id'; // Cambia si tu PK tiene otro nombre

    protected $allowedFields = [
        'usuario_id',
        'titulo',
        'descripcion',
        'estado',
        'fecha_solicitud',
    ];

    protected $returnType     = 'array';
    protected $useTimestamps  = true; // Si tienes campos created_at / updated_at
}