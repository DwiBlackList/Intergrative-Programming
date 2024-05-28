<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Iuran extends Model
{
    use HasFactory;
    protected $table = 'iurans';
    protected $fillable = ['id_warga', 'bulan', 'jumlah_iuran', 'status'];
    
    public function author()
    {
        return $this->belongsTo(Author::class, 'id_warga');
    }
}
