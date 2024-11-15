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

it('can reset to default settings', function () {
	$config = Config::create(Finder::create());

	$defaultRules = $config->getRules();
	$defaultLineEnding = $config->getLineEnding();
	$defaultRiskyAllowed = $config->getRiskyAllowed();

	$config->setRules([])
		->setLineEnding("\t\n")
		->setRiskyAllowed(false);

	$config->setDefaultSettings();

	expect($config->getRules())->toBe($defaultRules);
	expect($config->getLineEnding())->toBe($defaultLineEnding);
	expect($config->getRiskyAllowed())->toBe($defaultRiskyAllowed);
});

it('can override all rules', function () {
    $config = Config::create(Finder::create());

    $config->setRules([]);

    expect($config->getRules())->toBeEmpty();
});

it('can override line ending', function () {
    $config = Config::create(Finder::create());

    $config->setLineEnding("\t\n");

    expect($config->getLineEnding())->toBe("\t\n");
});

it('can override risky allowed', function () {
    $config = Config::create(Finder::create());

    $config->setRiskyAllowed(false);

    expect($config->getRiskyAllowed())->toBe(false);
});
