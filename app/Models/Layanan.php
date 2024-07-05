<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';

    protected $fillable = [
        'judul1', 'deskripsi1', 'gambar1',
        'judul2', 'deskripsi2', 'gambar2',
        'judul3', 'deskripsi3', 'gambar3', 'website_id'
    ];

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
