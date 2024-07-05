<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $table = 'headers';

    protected $fillable = ['title', 'nama_menu1', 'nama_menu2', 'nama_menu3', 'nama_menu4', 'nama_menu5', 'nama_menu6', 'image', 'website_id', 'navbar_color'];

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }

    public function getImageAttribute($value)
    {
        return $value ? url($value) : asset('images/default.jpg');
    }
}
