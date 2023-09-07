<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
        $articles = Article::all();
        return view('classic_user_crud', [
            'articles' => $articles
        ]);
    }
}
