# php-cs-fixer-rules

[![Code Style](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/format-php.yml/badge.svg?no-cache)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/format-php.yml)
[![PHPStan](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/phpstan.yml/badge.svg?no-cache)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/phpstan.yml)
[![Tests](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/run-tests.yml/badge.svg?no-cache)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/run-tests.yml)
[![Code Coverage Badge](https://github.com/yardinternet/php-cs-fixer-rules/blob/badges/coverage.svg)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/badges.yml)
[![Lines of Code Badge](https://github.com/yardinternet/php-cs-fixer-rules/blob/badges/lines-of-code.svg)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/badges.yml)

PHP CS Fixer rules used within the WordPress team for sites and packages.
This package centralizes formatting settings and allows for easy configuration of PHP CS Fixer.

## Installation

```sh
composer require yard/php-cs-fixer-rules
```

## Usage

This package enhances the `PhpCsFixer\Config` class (see the [ConfigInterface](src/Interfaces/ConfigInterface.php)). One
can create a new configuration object by calling the static
`create(Finder $finder, string $name = 'default'): self` method.

```php
<?php

use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->exclude('public')
    ->exclude('node_modules')
    ->exclude('build');

return \Yard\PhpCsFixerRules\Config::create($finder);
```

### Removing rules

`removeRules(array $rulesKeys): self` or `removeRule(string $ruleKey): self` allows you to remove rules.

```php

/**
 * Default rules:
 * 
 * [
 *     'method_chaining_indentation' => true,
 *     'yoda_style' => [
 *         'always_move_variable' => true,
 *         'equal' => true,
 *         'identical' => true,
 *         'less_and_greater' => true,
 *     ],
 *     'binary_operator_spaces' => [
 *         'default' => 'single_space',
 *         'operators' => [
 *             '=>' => null,
 *             '|' => 'no_space',
 *         ],
 *     ],
 * ]
 */

$config = \Yard\PhpCsFixerRules\Config::create($finder)
    ->removeRules(['yoda_style', 'binary_operator_spaces']); 

/**
 * Expected rule set: 
 * 
 * [
 *     'method_chaining_indentation' => true,
 * ]
 */


return $config->removeRule('method_chaining_indentation');

/**
 * Expected rule set: []
 */
```

### Add and override rules

`mergeRules(array $rules): self` allows you to add and override rules.

```php

/**
 * Default rules:
 * 
 * [
 *     'yoda_style' => [
 *         'always_move_variable' => true,
 *         'equal' => true,
 *         'identical' => true,
 *         'less_and_greater' => true,
 *     ],
 *     'binary_operator_spaces' => [
 *         'default' => 'single_space',
 *         'operators' => [
 *             '=>' => null,
 *             '|' => 'no_space',
 *         ],
 *     ],
 * ]
 */

return \Yard\PhpCsFixerRules\Config::create($finder)
    ->mergeRules([
        'yoda_style' => [
            'equal' => false,
        ],
        'binary_operator_spaces' => [
            'operators' => [
                '|' => 'single_space',
                '<>' => null,
            ]
        ]
    ]); 

/**
 * Expected rule set: 
 *  
 * [
 *     'yoda_style' => [
 *         'always_move_variable' => true,
 *         'equal' => false, // this setting changed!
 *         'identical' => true,
 *         'less_and_greater' => true,
 *     ],
 *     'binary_operator_spaces' => [
 *         'default' => 'single_space',
 *         'operators' => [
 *             '=>' => null,
 *             '|' => 'single_space', // this setting changed!
 *             '<>' => null, // this setting was added!
 *         ],
 *     ],
 * ]
 */

```

### Calling native PHP CS Fixer config methods

[Yard\PhpCsFixerRules\Config](src/Config.php) extends the PHP CS Fixer config object so all native methods are
available. Note that the native PHP CS Fixer methods return
a [PhpCsFixer\ConfigInterface](./vendor/friendsofphp/php-cs-fixer/src/ConfigInterface.php) type (instead
of [Yard\PhpCsFixerRules\Interfaces\ConfigInterface](src/Interfaces/ConfigInterface.php)).
Your linter may not like this.

```php

return \Yard\PhpCsFixerRules\Config::create($finder)
    ->setRiskyAllowed(false) // native PHP CS Fixer method
    ->mergeRules([ // Yard\PhpCsFixerRules\Config method
        'yoda_style' => [
            'equal' => false,
        ],
        'binary_operator_spaces' => [
            'operators' => [
                '|' => 'single_space',
                '<>' => null,
            ]
        ]
    ]);
```

## Older projects and risky fixers

`RiskyAllowed` is set to [true](config/rules.php) by default. In older projects you may need to disable it.

```php
return \Yard\PhpCsFixerRules\Config::create($finder)
    ->setRiskyAllowed(false);
```

### setDefaultRules()

`setDefaultRules(): self` gets called by the static `create(Finder $finder, string $name = 'default'): self` method.
In normal use cases there is no need to call this method.
