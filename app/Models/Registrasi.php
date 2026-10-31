<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasis';

    protected $primaryKey = 'noReg';

    protected $fillable = ['tanggal', 'nim'];

    public $timestamps = true;

    // Relasi ke Mahasiswa (Many to One)
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');

    }

    // Relasi ke Krskhs (One to Many)
    public function krskhs()
    {
        return $this->hasMany(Krskhs::class, 'noReg', 'noReg');
    }
}
