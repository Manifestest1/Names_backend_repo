<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class God extends Model
{
    use HasFactory;
    protected $fillable = [
        'godname', 'description',
    
    ];
    public function subgodnames()
    {
        return $this->hasMany(Subgodname::class);
    }
}
