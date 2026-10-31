<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliahs';

    protected $primaryKey = 'kodeMk';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['kodeMk', 'namaMk', 'sks'];

    public $timestamps = true;

    // Relasi ke Jadwal (1:M)
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'kodeMk', 'kodeMk');
    }
}
