<?php

namespace App\Http\Controllers;

use App\Jobs\CrawlArticles;
use App\Models\Article;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class JobPost extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $site = [
            'site' => $request->input('0')['value'],
            'css3' => $request->input(1)['value'],
        ];
        
        Redis::set('site.' . $site['site'], $site['css3']);

        $article = Article::create([
            'URL' => $site['site'],
        ]);


        CrawlArticles::dispatch($article);
        
        return response('Data inserted: ' . json_encode($site), 200);
    }
}
