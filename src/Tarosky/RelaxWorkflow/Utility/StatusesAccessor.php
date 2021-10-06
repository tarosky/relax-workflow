<?php

namespace Tarosky\RelaxWorkflow\Utility;

use Tarosky\RelaxWorkflow\Controller\Statuses;

/**
 * Status accessor
 */
trait StatusesAccessor {

	/**
	 * Get statuses.
	 *
	 * @return Statuses
	 */
	public function statuses() {
		return Statuses::get_instance();
	}
}
