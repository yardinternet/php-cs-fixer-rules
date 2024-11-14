<?php

declare(strict_types=1);

namespace Yard\PhpCsFixerRules\Console;

use Illuminate\Console\Command;
use Yard\PhpCsFixerRules\Facades\PhpCsFixerRules;

class PhpCsFixerRulesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phpcsfixerrules';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My custom Acorn command.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info(
            PhpCsFixerRules::getQuote()
        );
    }
}
