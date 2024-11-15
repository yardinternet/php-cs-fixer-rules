# php-cs-fixer-rules

[![Code Style](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/format-php.yml/badge.svg?no-cache)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/format-php.yml)
[![PHPStan](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/phpstan.yml/badge.svg?no-cache)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/phpstan.yml)
[![Tests](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/run-tests.yml/badge.svg?no-cache)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/run-tests.yml)
[![Code Coverage Badge](https://github.com/yardinternet/php-cs-fixer-rules/blob/badges/coverage.svg)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/badges.yml)
[![Lines of Code Badge](https://github.com/yardinternet/php-cs-fixer-rules/blob/badges/lines-of-code.svg)](https://github.com/yardinternet/php-cs-fixer-rules/actions/workflows/badges.yml)

Enables you to easily import the Yard PHP CS Fixer rules.

## Installation

To install this package using Composer, follow these steps:

1. Add the following to the `repositories` section of your `composer.json`:

    ```json
    {
      "type": "vcs",
      "url": "git@github.com:yardinternet/php-cs-fixer-rules.git"
    }
    ```

2. Install this package with Composer:

    ```sh
    composer require yard/php-cs-fixer-rules
    ```

## Usage

Simple example:

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
    ->exclude('build')
;

return \Yard\PhpCsFixerRules\Config::create($finder);
```

More complex:

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
	->exclude('build')
;

return \Yard\PhpCsFixerRules\Config::create($finder)
	->mergeRules([
		'yoda_style' => [
			'equal' => false,
		],
	])
	->removeRule('declare_strict_types')
	->removeRules(['no_unused_imports', 'trailing_comma_in_multiline'])
	->setRiskyAllowed(false); // disable this for old sites!
```
 
