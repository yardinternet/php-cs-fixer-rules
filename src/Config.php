<?php

declare(strict_types=1);

namespace Yard\PhpCsFixerRules;

use PhpCsFixer\Finder;
use Yard\PhpCsFixerRules\Interfaces\ConfigInterface;
use Yard\PhpCsFixerRules\Traits\Helpers;

class Config extends \PhpCsFixer\Config implements ConfigInterface
{
    use Helpers;

    private function __construct(string $name)
    {
        parent::__construct($name);
    }

    public static function create(Finder $finder, string $name = 'default'): self
    {
        $config = new self($name);

        $config->setFinder($finder);
        $config->setDefaultSettings();

        return $config;
    }

    public function setDefaultSettings(): self
    {

        $this->setRules($this->configRule('rules', []))
            ->setLineEnding($this->configRule('line_ending', "\n"))
            ->setRiskyAllowed($this->configRule('risky_allowed', true));

        return $this;
    }

    public function mergeRules(array $rules): self
    {
        $this->setRules(\Ckr\Util\ArrayMerger::doMerge($this->getRules(), $rules));

        return $this;
    }

    public function removeRules(array $rulesKeys): self
    {
        $rules = $this->getRules();

        $this->setRules(array_diff_key($rules, array_flip($rulesKeys)));

        return $this;
    }

    public function removeRule(string $ruleKey): self
    {
        return $this->removeRules([$ruleKey]);
    }
}
