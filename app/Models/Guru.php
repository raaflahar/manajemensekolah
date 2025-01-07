<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = ['guru', 'kelas'];
    protected $table = 'Guru';
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
