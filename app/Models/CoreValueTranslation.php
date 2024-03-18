<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValueTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name','description' , 'locale' , 'core_value_id'];
}
