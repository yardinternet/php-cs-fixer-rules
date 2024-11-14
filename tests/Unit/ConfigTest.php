<?php

use PhpCsFixer\Finder;
use Yard\PhpCsFixerRules\Config;
use Yard\PhpCsFixerRules\Interfaces\ConfigInterface;

it('can create config', function () {
    $config = Config::create(Finder::create());

	expect($config)->toBeInstanceOf(ConfigInterface::class);
});

it('can create config', function () {
	$config = Config::create(Finder::create());

	expect($config)->toBeInstanceOf(ConfigInterface::class);
});
