<?php

declare(strict_types=1);

namespace Yard\PhpCsFixerRules;

use PhpCsFixer\Finder;
use Yard\PhpCsFixerRules\Interfaces\ConfigInterface;

class Config extends \PhpCsFixer\Config implements ConfigInterface
{
    private const LINE_ENDING = "\n";
    private const RISKY_ALLOWED = true;
    private const RULES = [
        '@PSR2' => true,
        'indentation_type' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha',
        ],
        'no_unused_imports' => true,
        'not_operator_with_successor_space' => true,
        'logical_operators' => true,
        'trailing_comma_in_multiline' => true,
        'phpdoc_scalar' => true,
        'phpdoc_var_without_name' => true,
        'phpdoc_single_line_var_spacing' => true,
        'unary_operator_spaces' => true,
        'phpdoc_trim' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'align_multiline_comment' => true,
        'array_indentation' => true,
        'no_superfluous_elseif' => true,
        'single_blank_line_before_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'no_blank_lines_after_phpdoc' => true,
        'phpdoc_separation' => true,
        'method_chaining_indentation' => true,
        'binary_operator_spaces' => [
            'default' => 'single_space',
            'operators' => [
                '=>' => null,
                '|' => 'no_space',
            ],
        ],
        'return_type_declaration' => [
            'space_before' => 'none',
        ],
        'blank_line_before_statement' => [
            'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
        ],
        'full_opening_tag' => true,
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => true,
        ],
        'yoda_style' => [
            'always_move_variable' => true,
            'equal' => true,
            'identical' => true,
            'less_and_greater' => true,
        ],
        'declare_strict_types' => true,
    ];


    private function __construct(string $name)
    {
        parent::__construct($name);
    }

	/**
	 * Creates default PHP CS fixer config. Sets rules, line ending and risky allowed
	 */
    public static function create(Finder $finder, string $name = 'default'): static
    {
		$config = new static($name);

		$config->setFinder($finder)
			->setRules(self::RULES)
			->setLineEnding(self::LINE_ENDING)
			->setRiskyAllowed(self::RISKY_ALLOWED);

        return $config;
    }

	/**
	 * Merge provided rules with current rules.
	 * Allows default rules to be overridden.
	 *
	 * @param array<string, array<string, mixed>|bool> $rules
	 */
    public function mergeRules(array $rules): self
    {
		$this->setRules(array_merge($this->getRules(), $rules));

        return $this;
    }

	/**
	 * Recursively unset matching rules
	 *
	 * @param array<int, string> $rulesKeys
	 */
    public function removeRules(array $rulesKeys): self
    {
		$rules = $this->getRules();

		$this->setRules(array_diff_key($rules, array_flip($rulesKeys)));

		return $this;
    }
}
