<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = ['personal_id','fecha','hora_entrada','hora_salida','estado','observacion'];

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id');
    }
}
