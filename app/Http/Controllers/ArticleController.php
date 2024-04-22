<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    #index() lists table data and make a pagination with three elements on each page
    public function index()
    {
        $articles = DB::table('articles')->paginate(3);

        return view('articles.index', ['articles' => $articles]);
    }
    /**
     * Show the form for creating a new resource.
     */
    #cretae() returns the view to create a table item.
    public function create()
    {
        return view('articles.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'description' => 'required',
            'categorie' => 'required'
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'article created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact($article));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact($article));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'topic' => 'required',
            'description' => 'required',
            'categorie' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'article updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'article deleted successfully');
    }
}
