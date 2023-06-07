<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    
    use HasFactory;
    protected $table='advertisements';
    protected $fillable = [
        'id',
        'ads_type',
        'image',
        'google_script',
        'url',
        'position_id'
    ];
    public $timestamps=false;
}
