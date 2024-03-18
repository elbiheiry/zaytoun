<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'image' , 'project_id'
    ];

    public function delete()
    {   
        image_delete($this->image , 'projects');

        return parent::delete();
    }
}
