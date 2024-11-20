<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use Yard\PhpCsFixerRules\Config;
use Yard\PhpCsFixerRules\Interfaces\ConfigInterface;

beforeEach(function () {
	$this->config = Config::create(Finder::create());
});

it('can create config', function () {
	expect($this->config)->toBeInstanceOf(ConfigInterface::class);
});

it('sets rules on create', function () {
	expect($this->config->getRules())->not->toBeEmpty();
});

it('sets line ending on create', function () {
	expect($this->config->getLineEnding())->not->toBeEmpty();
});

it('sets risky allowed on create', function () {
	expect($this->config->getRiskyAllowed())->not->toBeEmpty();
});

it('sets indent on create', function () {
	expect($this->config->getIndent())->not->toBeEmpty();
});

it('can reset to default rules using setDefaultRules()', function () {
	$defaultRules = $this->config->getRules();
	$defaultLineEnding = $this->config->getLineEnding();
	$defaultRiskyAllowed = $this->config->getRiskyAllowed();

	$this->config->setRules([])
		->setLineEnding("\t\n")
		->setRiskyAllowed(false);

	$this->config->setDefaultRules();

	expect($this->config->getRules())->toBe($defaultRules);
	expect($this->config->getLineEnding())->toBe($defaultLineEnding);
	expect($this->config->getRiskyAllowed())->toBe($defaultRiskyAllowed);
});

it('can override all rules', function () {
	$this->config->setRules([]);

	expect($this->config->getRules())->toBeEmpty();
});

it('can override line ending', function () {
	$this->config->setLineEnding("\t\n");

	expect($this->config->getLineEnding())->toBe("\t\n");
});

it('can override risky allowed', function () {
	$this->config->setRiskyAllowed(false);

	expect($this->config->getRiskyAllowed())->toBe(false);
});

it('can override indent', function () {
	$this->config->setIndent('    ');

	expect($this->config->getIndent())->toBe('    ');
});
