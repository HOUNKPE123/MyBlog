<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Manager\ArticleManager;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::paginate(7);
        return view('article.index',[
            'articles'=> $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();
        Article::create([
            'title'=>$request->input('title'),
            'subtitle'=>$request->input('subtitle'),
            'content'=>$request->input('content'),
        ]);
        return redirect()->route('articles.index')->with('success',"L'article a ete bien sauvegarder !");
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',[
            "article"=>$article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(ArticleRequest $request, Article $article)
        {
            $article->title=$request->input('title');
            $article->subtitle=$request->input('subtitle');
            $article->content=$request->input('content');
            $article->save();
            return redirect()->route('articles.index')->with('success',"L'article a ete bien ete modifie !");
    
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success',"L'article a bien ete supprimer");
    }
}
