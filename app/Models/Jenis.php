<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $table = 'jenis';

    protected $primaryKey = 'id_jenis';
    
    protected $fillable = [
        'status', 'nama', 'id_jenis'
    ];

    public function pengeluaran(){
        return $this->hasMany(Pengeluaran::class);
    }

    public function pemasukan(){
        return $this->hasMany(Pemasukan::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
    
    
}
