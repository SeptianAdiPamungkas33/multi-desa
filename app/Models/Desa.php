<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'desa_id');
    }
}
