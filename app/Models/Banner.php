<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    
    use HasFactory;
    protected $table='header_banner';
    protected $fillable = [
        'id',
        'image'
    ];
    public $timestamps=false;
}
