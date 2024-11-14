<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use Yard\PhpCsFixerRules\Config;
use Yard\PhpCsFixerRules\Interfaces\ConfigInterface;

it('can create config', function () {
    $config = Config::create(Finder::create());

    expect($config)->toBeInstanceOf(ConfigInterface::class);
});

it('sets rules on create', function () {
    $config = Config::create(Finder::create());

    expect($config->getRules())->not->toBeEmpty();
});

it('sets line ending on create', function () {
    $config = Config::create(Finder::create());

    expect($config->getLineEnding())->not->toBeEmpty();
});

it('sets risky allowed on create', function () {
    $config = Config::create(Finder::create());

    expect($config->getRiskyAllowed())->not->toBeEmpty();
});
