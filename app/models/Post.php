<?php

class Post extends Eloquent
{
    public function User()
    {
        return $this->belongsTo('User');
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
}