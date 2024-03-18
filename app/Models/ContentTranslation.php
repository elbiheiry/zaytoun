<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['description1' , 'description2' , 'description3' , 'description4' , 'locale' , 'content_id'];
}
