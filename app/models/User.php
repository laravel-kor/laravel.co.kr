<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{
    /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $hidden = array('password');

    /**
    * Get the unique identifier for the user.
    *
    * @return mixed
    */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
    * Get the password for the user.
    *
    * @return string
    */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
    * Get the e-mail address where password reminders are sent.
    *
    * @return string
    */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function roles()
    {
        return $this->belongsToMany('Role', 'role_user')->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function hasRole($key)
    {
        foreach($this->roles as $role) {
            if($role->name == $key) {
                return true;
            }
        }

        return false;
    }


    public function hasAnyRole($keys)
    {
        if( ! is_array($keys)) {
            $keys = func_get_args();
        }

        foreach($this->roles as $role) {
            if(in_array($role->name, $keys)) {
                return true;
            }
        }

        return false;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}