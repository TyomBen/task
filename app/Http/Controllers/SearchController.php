<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function SearchArticles (Request $request) :void
    {
        if ($request->input('query') !== ''){

   $search = $request->input('query');
        $sections = Article::select('title', )->where('title', 'like', "$search%")->orWhere('id', 'like', "$search%")->get();
        echo json_encode($sections);
        }

    }
}
