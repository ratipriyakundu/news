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
<<<<<<< HEAD
        'section_order',
        'section_code'
=======
        'property_name',
        'property_description'
>>>>>>> 2a4fc60453b403165973040213c2c634ec5ad5db
    ];
}
