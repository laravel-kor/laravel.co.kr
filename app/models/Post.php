<?php

class Post extends Eloquent {

  /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
  
  public function User()
  {
      return $this->belongsTo('User');
  }

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

}