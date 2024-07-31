<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $table = 'website';

    protected $fillable = ['url', 'desa_id', 'user_id'];

    protected $with = ['header', 'footer', 'postingan', 'slider', 'layanan', 'tentangkami', 'galeris', 'kategoris'];

    public function header()
    {
        return $this->hasOne(Header::class);
    }

    public function footer()
    {
        return $this->hasOne(Footer::class);
    }

    public function slider()
    {
        return $this->hasMany(Slider::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function layanan()
    {
        return $this->hasOne(Layanan::class);
    }

    public function tentangkami()
    {
        return $this->hasOne(Tentangkami::class);
    }

    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }

    public function postingan()
    {
        return $this->hasMany(Postingan::class);
    }

    public function kategoris()
    {
        return $this->hasMany(Kategori::class);
    }

    public function penduduk()
    {
        return $this->hasOne(Penduduk::class);
    }
}
