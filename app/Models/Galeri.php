<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = [
        'judul_galeri', 'image', 'website_id',
    ];

    // Accessor untuk mendapatkan URL gambar yang benar
    public function getImageAttribute($value)
    {
        return url('images/' . $value); // Menggabungkan path dengan direktori 'images'
    }

    // Mutator untuk menyimpan hanya nama file gambar
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = basename($value);
    }

    // Relasi dengan model Website
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
