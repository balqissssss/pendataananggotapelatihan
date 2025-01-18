<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapelatihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pelatihan_id',
        'nama',
        'nik',
        'alamat',
        'no_hp',
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}public function pelatihan()
{
    return $this->belongsTo(pelatihan::class, 'pelatihan_id');
}
}
