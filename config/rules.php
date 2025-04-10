<?php

declare(strict_types=1);

return [
	'line_ending' => "\n",
	'risky_allowed' => true,
	'set_indent' => "\t",
	'rules' => [
		'@PSR2' => true,
		'indentation_type' => true,
		'single_quote' => true,
		'array_syntax' => ['syntax' => 'short'],
		'ordered_imports' => ['sort_algorithm' => 'alpha'],
		'no_unused_imports' => true,
		'no_extra_blank_lines' => [
			'tokens' => [
				'extra',
				'throw',
				'continue',
				'curly_brace_block',
				'parenthesis_brace_block',
			],
		],
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
				'=>' => 'single_space',
				'|' => 'single_space',
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
	],
];
