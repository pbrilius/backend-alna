<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    /**
     * Article listing
     *
     * @return void
     */
    public function testArticleController()
    {
        $response = $this->getJson('/api/articles');

        $response->assertStatus(200);
    }
}
