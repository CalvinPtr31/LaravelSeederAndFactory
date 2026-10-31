<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $primaryKey = 'jadwalId';

    protected $fillable = ['hari', 'waktu', 'kodeMk', 'grup', 'nik', 'ruang'];

    public $timestamps = true;

    // Relasi ke Matakuliah (Many to One)
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kodeMk', 'kodeMk');
    }

    // Relasi ke Dosen (Many to One)
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nik', 'nik');
    }

    // Relasi ke KRS (One to Many)
    public function krskhs()
    {
        return $this->hasMany(Krskhs::class, 'jadwalId', 'jadwalId');
    }
}
