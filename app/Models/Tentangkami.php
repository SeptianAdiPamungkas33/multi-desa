<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentangkami extends Model
{
    use HasFactory;

    protected $table = 'tentangkamis';

    protected $fillable = [
        'judul', 'deskripsi', 'gambar', 'website_id'
    ];

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
