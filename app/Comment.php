<?php

namespace Ocademy;

use Ocademy\User;
use Ocademy\Tutorial;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * Comment belongs to User.
     */
    public function user()
    {
        return $this->belongsTo('Ocademy\User');
    }

    public function Tutorial()
    {
        return $this->belongsTo('Ocademy\Tutorial');
    }
}
