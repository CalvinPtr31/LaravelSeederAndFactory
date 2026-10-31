<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krskhs extends Model
{
    use HasFactory;

    protected $table = 'krskhs';

    protected $primaryKey = 'idKrs';

    public $incrementing = true;

    protected $fillable = [
        'noReg',
        'jadwalId',
        'nilai',
    ];

    public $timestamps = true;

    // Relasi ke Registrasi (M:1)
    public function registrasi()
    {

        return $this->belongsTo(Registrasi::class, 'noReg', 'noReg');
    }

    // Relasi ke Jadwal (M:1)
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwalId', 'jadwalId');
    }
}
