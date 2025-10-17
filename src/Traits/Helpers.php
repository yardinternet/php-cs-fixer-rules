<?php

declare(strict_types=1);

namespace Yard\PhpCsFixerRules\Traits;

use Webmozart\Assert\Assert;

trait Helpers
{
	/**
	 * Get specified configuration value.
	 *
	 * @param string $configFile filename of config file
	 * @param string $key key of config array
	 * @param mixed $default default value
	 *
	 * @return mixed
	 */
	public function config(string $configFile, string $key, $default = null)
	{
		$path = __DIR__ . "/../../config/{$configFile}.php";

		Assert::fileExists($path, 'provided config file does not exist');

		$config = require $path;

		return $config[$key] ?? $default;
	}

	/**
	 * Get specified rule from configuration.
	 *
	 * @param string $key key of config array
	 * @param mixed $default default value
	 *
	 * @return mixed
	 */
	public function configRule(string $key, $default = null)
	{
		return $this->config('rules', $key, $default);
	}
}
