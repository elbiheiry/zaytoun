<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title1','description1','title2','description2','mission','vision','message'];

    protected $fillable = [
        'image' , 'years'
    ];
}
