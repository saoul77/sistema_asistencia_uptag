<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = ['nombre','correo','cargo','asistencia'];

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'personal_id');
    }
}
