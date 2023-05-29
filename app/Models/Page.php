<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'page_builder';
    protected $fillable = [
        'page_name',
        'section_order',
        'section_code'
    ];
}
