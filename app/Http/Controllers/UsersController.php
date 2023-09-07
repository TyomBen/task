<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $articles = Article::all();
        return view('my_list', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Article::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('my_app');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $articles, Request $request)
    {
        if (Auth::user()->id !== $articles->user_id){
            return redirect()->back()->withErrors(['msg' => "You can edit only your articles"]);
        };
        $article = Article::find($articles->id);
        return view('edit', compact('article'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $articles)
    {
        $articles->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        // if (dd(Auth::user()->id !== User::))
        return redirect()->route('my_app');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $articles, Request $request)
    {
        $articles->delete([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        return redirect()->route('my_app');
    }
}
