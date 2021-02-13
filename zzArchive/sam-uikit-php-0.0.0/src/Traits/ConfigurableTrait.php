<?php

namespace SAMUIKit\Traits;

trait ConfigurableTrait {
	private $config = [];	

	/**
	 * Convenience method for updating the configuration.
	 * 
	 * @param  [type] $key   [description]
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	private function updateConfig($key, $value)
	{
		$this->config[$key] = $value;
		return $this;
	}
}