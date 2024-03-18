<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'location' , 'sector' , 'brief' , 'description' , 'locale' , 'project_id'];
}
