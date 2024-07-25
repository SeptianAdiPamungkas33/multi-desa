<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = [
        'judul_galeri', 'image', 'website_id', 'status',
    ];

    public function getImageAttribute($value)
    {
        return url('images/' . $value);
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = basename($value);
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function media()
    {
        return $this->belongsToMany(Media::class);
    }
}
