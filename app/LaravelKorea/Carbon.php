<?php namespace LaravelKorea;

class Carbon extends \Carbon\Carbon {

	public function diffForHumans(\Carbon\Carbon $other = null)
	{
		$dictionary = [
			'second' => '초',
			'minute' => '분',
			'hours'  => '시간',
			'hour'   => '시간',
			'day'    => '일',
			'week'   => '주',
			'month'  => '월',
			'year'   => '년',
			'before' => '전',
			'after'  => '후',
			'ago'    => '전',
		];

		return strtr(parent::diffForHumans($other), $dictionary);
	}

}