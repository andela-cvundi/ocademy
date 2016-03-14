<?php

namespace Ocademy;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'provider_id', 'avatar', 'provider', 'info',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //User has many tutorials.
    public function tutorials()
    {
        return $this->hasMany('Learn\Tutorial');
    }

     /**
     * Get the avatar from gravatar.
     *
     * @return string
     */
    private function getAvatarFromGravatar()
    {
        return 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?d=mm&s=500';
    }

    /**
     * Get avatar from the model.
     *
     * @return string
     */
    public function getAvatar()
    {
        return (!is_null($this->avatar)) ? $this->avatar : $this->getAvatarFromGravatar();
    }

    /**
     * Update user avatar
     *
     * return void
     */
    public function updateAvatar($url)
    {
        $this->avatar = $url;
        $this->save();
    }
}
