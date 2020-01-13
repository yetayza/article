<?php

namespace App\Http\Controllers;
use Auth;
use App\Tag;
use App\Article;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {    
        if(request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }else{
            $articles = Article::latest()->get();
        }

        return view('article.index', ['articles' => $articles]);
    }
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }
    public function create()
    {
        return view('article.create', [
            'tags' => Tag::all()
        ]);
    }
    public function store(ArticleStoreRequest $request)
    {

        $validated = $request->validated();
        $data = new Article(request(['title', 'expert', 'body']));
        $data->user_id = Auth::id();
        $data->save();
        $data->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }
    public function update(ArticleUpdateRequest $request, Article $article)
    { 
        $validated = $request->validated();

        $article->update($validated);

        return redirect($article->path());
    }
    public function delete(article $article)
    {
        $article->delete();
        return redirect(route('article.index'));
    }
}
