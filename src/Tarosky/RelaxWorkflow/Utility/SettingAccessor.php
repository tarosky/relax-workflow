<?php

namespace Tarosky\RelaxWorkflow\Utility;


use Tarosky\RelaxWorkflow\Controller\Settings;

/**
 * Access setting.
 */
trait SettingAccessor {

	/**
	 * Get settings controller.
	 *
	 * @return Settings
	 */
	public function settings() {
		return Settings::get_instance();
	}
}
