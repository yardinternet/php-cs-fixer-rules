<?php

declare(strict_types=1);

namespace Yard\PhpCsFixerRules\Interfaces;

use PhpCsFixer\Finder;

interface ConfigInterface extends \PhpCsFixer\ConfigInterface
{
	/**
	 * Creates default PHP CS fixer config. Calls setDefaultSettings()
	 */
	public static function create(Finder $finder, string $name = 'default'): self;

	/**
	 * Sets rules, line ending and risky allowed
	 */
	public function setDefaultRules(): self;

	/**
	 * Recursively merges provided rules with current rules.
	 * Allows default rules to be overridden.
	 *
	 * @param array<string, array<string, mixed>|bool> $rules
	 */
	public function mergeRules(array $rules): self;

	/**
	 * Unset matching rules
	 *
	 * @param array<int, string> $rulesKeys
	 */
	public function removeRules(array $rulesKeys): self;

	/**
	 * Removes rule name
	 */
	public function removeRule(string $ruleKey): self;
}
