<?php

namespace Ocademy;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];
    public function tutorials()
    {
        return $this->hasMany('Ocademy\Tutorial');
    }
}
