<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'sub_title',
        'description',
        'category',
        'subcategory',
        'news_date',
        'image',
        'latest_news',
        'popular',
        'added_at',
        'added_by'


    ];
    public $timestamps=false;

}
