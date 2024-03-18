<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeritageTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'description' , 'locale' , 'heritage_id'];
}
