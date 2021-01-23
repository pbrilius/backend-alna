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
            'URL' => 'https://medium.com/swlh/fun-with-python-3-hacking-instagram-giveaways-35e5b1d51670',
            'CSS3' => 'article.meteredContent',
        ]);

        $response->assertStatus(200);
        $response->assertSeeText('Data inserted:');
    }
}
