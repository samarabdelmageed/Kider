<?php

namespace App\Traits;

Trait Unread {
    /**
	 * Filter to get only unread emalis
	 *
	 * @return self|Message
	 */
	public function unread()
	{
		$this->add('is:unread');

		return $this;
	}

	public abstract function add($query, $column = 'q', $encode = true);
}