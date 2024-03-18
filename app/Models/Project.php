<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Project extends Model implements TranslatableContract
{
    use HasFactory,Sluggable , Translatable;

    public $translatedAttributes = ['name' , 'location' , 'sector' , 'brief' , 'description'];

    protected $fillable = [
        'image' , 'size' , 'slug' , 'brochure' ,'category_id' ,'map'
    ];

    /**
     * create slug input 
     *
     * @return response
     */
    public function sluggable() :Array
    {
        return [
            'slug' => [
                'source' => 'name_en'
            ]
        ];
    }

    public function images()
    {
        return $this->hasMany(ProjectSlider::class);
    }

    public function delete()
    {
        foreach ($this->images() as $image) {
            image_delete($image->image , 'projects');
        }

        image_delete($this->image , 'projects');
        image_delete($this->brochure , 'projects');

        return parent::delete();
    }
}
