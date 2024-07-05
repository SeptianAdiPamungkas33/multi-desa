<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footers';

    protected $fillable = [
        'alamat', 'sosmed', 'email', 'no_telepon', 'jadwal1', 'jadwal2', 'jadwal3',
        'link_terkait1', 'link_terkait2', 'link_terkait3',
        'link_url1', 'link_url2', 'link_url3', 'navbar_color', 'website_id'
    ];

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
