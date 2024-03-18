<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Heritage extends Model implements TranslatableContract
{
    use HasFactory , Translatable;

    public $translatedAttributes = ['title' , 'description'];

    protected $fillable = [
        'image'
    ];

    public function delete()
    {
        image_delete($this->image , 'heritages');

        return parent::delete();
    }
}
