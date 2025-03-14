<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use Yard\PhpCsFixerRules\Config;

beforeEach(function () {
	$this->config = Config::create(Finder::create());
});

it('can remove rules', function () {
	$this->config->setRules([ // reset rules list
		'@PSR2' => true,
		'indentation_type' => true,
		'ordered_imports' => ['sort_algorithm' => 'alpha'],
	])->removeRules([
		'@PSR2', 'ordered_imports',
	]);

	expect($this->config->getRules())->toBe([
		'indentation_type' => true,
	]);
});

it('can handle an request to remove nothing', function () {
	$this->config->setRules([ // reset rules list
		'@PSR2' => true,
		'indentation_type' => true,
		'ordered_imports' => ['sort_algorithm' => 'alpha'],
	])->removeRules([]);

	expect($this->config->getRules())->toBe([
		'@PSR2' => true,
		'indentation_type' => true,
		'ordered_imports' => ['sort_algorithm' => 'alpha'],
	]);
});

it('can remove one rule', function () {
	$this->config->setRules([ // reset rules list
		'@PSR2' => true,
		'indentation_type' => true,
		'ordered_imports' => ['sort_algorithm' => 'alpha'],
	])->removeRule('@PSR2');

	expect($this->config->getRules())->toBe([
		'indentation_type' => true,
		'ordered_imports' => ['sort_algorithm' => 'alpha'],
	]);
});

it('can remove a list with one rule', function () {
	$this->config->setRules([ // reset rules list
		'@PSR2' => true,
		'indentation_type' => true,
		'ordered_imports' => ['sort_algorithm' => 'alpha'],
	])->removeRules(['@PSR2']);

	expect($this->config->getRules())->toBe([
		'indentation_type' => true,
		'ordered_imports' => ['sort_algorithm' => 'alpha'],
	]);
});
