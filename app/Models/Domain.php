<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['domain'];
    public function tenant()
    {
        return $this->hasMany(User::class, 'domain');
    }

    use HasFactory;
}
