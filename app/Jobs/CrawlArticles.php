<?php

namespace App\Jobs;

use App\Models\Article;
use DOMDocument;
use Goutte\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpClient\HttpClient;

class CrawlArticles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $article;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug(__CLASS__);
        $css3 = Redis::get('site.' . $this->article->URL);

        Log::debug($css3, [
            'f' => __FUNCTION__,
        ]);

        $this->article->css3 = $css3;

        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', $this->article->URL);
        
        $crawler->filter($this->article->css3)->each(function ($node) {
            Log::debug($node->text());
            $this->article->content .= $node->text();
        });

        $this->article->save();
    }
}
