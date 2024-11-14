<?php

declare(strict_types=1);

namespace Yard\PhpCsFixerRules;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Yard\PhpCsFixerRules\Console\PhpCsFixerRulesCommand;

class PhpCsFixerRulesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('php-cs-fixer-rules')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(PhpCsFixerRulesCommand::class);
    }

    public function packageRegistered(): void
    {
        $this->app->singleton('PhpCsFixerRules', fn () => new PhpCsFixerRules($this->app));
    }

    public function packageBooted(): void
    {
        $this->app->make('PhpCsFixerRules');
    }
}
