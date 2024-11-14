<?php

declare(strict_types=1);

namespace Yard\PhpCsFixerRules\Interfaces;

use PhpCsFixer\Finder;

interface ConfigInterface extends \PhpCsFixer\ConfigInterface
{
    public static function create(Finder $finder, string $name = 'default'): self;
    public function mergeRules(array $rules): self;
    public function removeRules(array $rules): self;
}
