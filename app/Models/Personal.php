<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id','nombre', 'correo', 'cargo', 'asistencia'];
}
