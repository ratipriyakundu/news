<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategories extends Model
{
    use HasFactory;
    protected $table='menu_categories';
    protected $fillable = [
        'id',
        'menu_id',
        'category_id',
        'title'
    ];
    public $timestamps=false;
}
