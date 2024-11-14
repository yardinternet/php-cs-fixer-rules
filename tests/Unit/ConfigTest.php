<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use Yard\PhpCsFixerRules\Config;
use Yard\PhpCsFixerRules\Interfaces\ConfigInterface;

it('can create config', function () {
    $config = Config::create(Finder::create());

    expect($config)->toBeInstanceOf(ConfigInterface::class);
});

it('can merge rules', function () {
    $config = Config::create(Finder::create());

    $config->setRules([ // reset rules list
        '@PSR2' => true,
        'indentation_type' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
    ])->mergeRules([
        'ordered_imports' => ['case_sensitive' => false],
        'array_syntax' => ['syntax' => 'short'],
        'phpdoc_scalar' => true,
    ]);

    expect($config->getRules())->toBe([
        '@PSR2' => true,
        'indentation_type' => true,
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'case_sensitive' => false,
        ],
        'array_syntax' => ['syntax' => 'short'],
        'phpdoc_scalar' => true,
    ]);
});

it('can override rules', function () {
    $config = Config::create(Finder::create());

    $config->setRules([ // reset rules list
        '@PSR2' => true,
        'indentation_type' => true,
        'ordered_imports' => ['case_sensitive' => false],
    ])->mergeRules([
        'indentation_type' => false,
        'ordered_imports' => ['case_sensitive' => true],
    ]);

    expect($config->getRules())->toBe([
        '@PSR2' => true,
        'indentation_type' => false,
        'ordered_imports' => ['case_sensitive' => true],
    ]);
});

it('can merge and override', function () {
    $config = Config::create(Finder::create());

    $config->setRules([ // reset rules list
        '@PSR2' => true,
        'indentation_type' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
    ])->mergeRules([
        '@PSR2' => false,
        'ordered_imports' => ['case_sensitive' => false],
        'phpdoc_scalar' => true,
    ]);

    expect($config->getRules())->toBe([
        '@PSR2' => false,
        'indentation_type' => true,
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'case_sensitive' => false,
        ],
        'phpdoc_scalar' => true,
    ]);
});

it('can merge and override deep nested arrays', function () {
    $config = Config::create(Finder::create());

    $config->setRules([ // reset rules list
        'binary_operator_spaces' => [
            'default' => 'single_space',
            'operators' => [
                '=>' => null,
                '|' => 'no_space',
            ],
        ],
    ])->mergeRules([
        'binary_operator_spaces' => [
            'default' => 'align',
            'operators' => [
                '|' => 'single_space',
                '<>' => null,
            ],
        ],
    ]);

    expect($config->getRules())->toBe([
        'binary_operator_spaces' => [
            'default' => 'align',
            'operators' => [
                '=>' => null,
                '|' => 'single_space',
                '<>' => null,
            ],
        ],
    ]);
});

it('can merge empty arrays', function () {
    $config = Config::create(Finder::create());

    $config->setRules([ // reset rules list
        '@PSR2' => true,
        'indentation_type' => true,
        'ordered_imports' => ['case_sensitive' => false],
    ])->mergeRules([]);

    expect($config->getRules())->toBe([
        '@PSR2' => true,
        'indentation_type' => true,
        'ordered_imports' => ['case_sensitive' => false],
    ]);
});
