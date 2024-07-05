<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'judul_artikel',
        'isi_artikel',
        'gambar',
    ];

    public function getGambarAttribute($value)
    {
        return url('images/' . $value);
    }

    public function setGambarAttribute($value)
    {
        $this->attributes['gambar'] = basename($value);
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
