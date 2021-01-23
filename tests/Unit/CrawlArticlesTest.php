<?php

namespace Tests\Unit;

use App\Jobs\CrawlArticles as JobsCrawlArticles;
use App\Models\Article;
use PHPUnit\Framework\TestCase;

class CrawlArticlesTest extends TestCase
{
    /**
     * Test objectivity
     *
     * @return void
     */
    public function testObjectiveness()
    {
        $crawlArticles = new JobsCrawlArticles($this->prophesize(Article::class)->reveal());
        $this->assertInstanceOf(JobsCrawlArticles::class, $crawlArticles);
    }
}
