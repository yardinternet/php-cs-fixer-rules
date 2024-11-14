<?php

declare(strict_types=1);

use Yard\PhpCsFixerRules\Facades\PhpCsFixerRules;

it('can retrieve a random inspirational quote', function () {
    $quote = PhpCsFixerRules::getQuote();

    expect($quote)->tobe('For every Sage there is an Acorn.');
});
