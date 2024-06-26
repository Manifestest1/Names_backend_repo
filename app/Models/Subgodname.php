<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subgodname extends Model
{
    use HasFactory;
    protected $fillable = [
        'subgodname', 
    ];
    public function god()
    {
        return $this->belongsTo(God::class);
    }
}
