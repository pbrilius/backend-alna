<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobPostControllerTest extends TestCase
{
    /**
     * Job Post API endpoint.
     *
     * @return void
     */
    public function testJobPostController()
    {
        $response = $this->post('/crawl', [
            [
                'name' => 'URL',
                'value' =>
                    'https://medium.com/swlh/fun-with-python-3-hacking-instagram-giveaways-35e5b1d51670',
            ],
            [
                'name' => 'CSS3',
                'value' => 'article.meteredContent',
            ],
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['site', 'css3']);
    }
}
