<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'website_id',
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function getImageAttribute($value)
    {
        return url('images/' . $value); // Menggabungkan path dengan direktori 'images'
    }

    // Mutator untuk menyimpan hanya nama file gambar
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = basename($value);
    }
}
