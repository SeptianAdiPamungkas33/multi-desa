<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = ['laki', 'perempuan', 'total_penduduk', 'persen_laki', 'persen_perempuan', 'website_id'];

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
