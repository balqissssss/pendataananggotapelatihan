<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelatihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pelatihan',
        'status'
    ];
    public function datapelatihans()
{
    return $this->hasMany(datapelatihan::class, 'pelatihan_id');
}
}
