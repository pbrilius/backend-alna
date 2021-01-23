<?php

namespace Tests\Unit;

use App\Models\Article;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

class ArticleModelTest extends TestCase
{
    /**
     * Article model
     *
     * @return void
     */
    public function testInheritance()
    {
        $article = new Article();
        $this->assertInstanceOf(Article::class, $article);
        $this->expectException(ExpectationFailedException::class);
        $this->assertIsBool($article->fillable);
    }
}
