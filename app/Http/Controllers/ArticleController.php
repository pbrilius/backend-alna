<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles()
    {
        return response(Article::all()->jsonSerialize(), 200);
    }
}
