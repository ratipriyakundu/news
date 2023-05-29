<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    
    use HasFactory;
    protected $table='home_templates';
    protected $fillable = [
        'id',
        'category',
        'position',
        'section'
    ];
    public $timestamps=false;
}
