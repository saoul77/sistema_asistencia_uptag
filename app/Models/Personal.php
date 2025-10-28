<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'Personal';
    protected $primaryKey = 'personal_id';
    public $incrementing = true;
    protected $fillable = ['nombre','correo','cargo','asistencia'];
}
