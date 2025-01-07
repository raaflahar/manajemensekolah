<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['kelas'];
    protected $table = 'Kelas';
    public $timestamps = false;

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas', 'kelas');
    }

    public function guru()
    {
        return $this->hasMany(Guru::class, 'kelas', 'kelas');
    }
}