<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'wargas';
    protected $fillable = ['nama', 'alamat'];

    public function iuran()
    {
        return $this->hasMany(Iuran::class, 'id_warga');
    }
}
