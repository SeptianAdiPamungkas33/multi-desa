<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    protected $table = 'postingans';

    protected $fillable = [
        'judul',
        'isi',
        'kategori_id',
        'website_id',
        'gambar',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function getGambarAttribute($value)
    {
        return url('images/' . $value); // Menggabungkan path dengan direktori 'images'
    }

    public function setGambarAttribute($value)
    {
        $this->attributes['gambar'] = basename($value);
    }
}
