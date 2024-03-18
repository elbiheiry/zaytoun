<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'comment' ,'email' , 'article_id'
    ];

    /**
     * return user image from gravatar
     *
     * @return Response
     */
    public function user_image()
    {
        $hash = md5(strtolower(trim($this->email)));
        $image = 'http://www.gravatar.com/avatar/'.$hash;

        return $image;
    }
}
