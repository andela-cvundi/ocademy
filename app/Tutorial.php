<?php

namespace Ocademy;

use Ocademy\User;
use Ocademy\Category;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use \Conner\Likeable\LikeableTrait;

    protected $fillable = ['title', 'description', 'url', 'user_id', 'category_id'];

    /**
     * Tutorial has many categories relationship.
     */
    public function category()
    {
        return $this->belongsTo('Ocademy\Category');
    }

    public function user()
    {
        return $this->belongsTo('Ocademy\User');
    }

    /**
     * Project has many comments relationship.
     */
    public function comments()
    {
        return $this->hasMany('Ocademy\Comment');
    }
}
