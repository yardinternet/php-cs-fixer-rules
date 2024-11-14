<?php

declare(strict_types=1);

namespace Yard\PhpCsFixerRules;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;

class PhpCsFixerRules
{
    /**
     * Create a new PhpCsFixerRules instance.
     */
    public function __construct(protected Application $app)
    {
    }

    /**
     * Retrieve a random inspirational quote.
     */
    public function getQuote(): string
    {
        $quotes = config('php-cs-fixer-rules.quotes');

        Assert::isArray($quotes);

        $quote = Arr::random(
            $quotes
        );

        Assert::string($quote);

        return $quote;
    }

    /**
     * Retrieve a post content.
     */
    public function getPostContent(int $postId): string
    {
        $post = \get_post($postId);

        return  $post ? $post->post_content : 'Post not found';
    }
}
