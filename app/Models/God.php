<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class God extends Model
{
    use HasFactory;
    protected $fillable = [
<<<<<<< HEAD
        'godname', 
=======
        'godname', 'description',
    
>>>>>>> 183af908bcf2a08f952837f4ab293fe948691aee
    ];
    public function subgodnames()
    {
        return $this->hasMany(Subgodname::class);
    }
}
