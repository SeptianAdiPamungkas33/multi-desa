<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = ['file_path', 'file_name', 'website_id', 'desa_id'];

    public function galeri()
    {
        return $this->belongsToMany(Galeri::class);
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
