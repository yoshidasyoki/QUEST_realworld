<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Exception;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('article.create.index', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $form = $request->validated();

        try {
            DB::transaction(function () use ($form) {
                $article = Article::create([
                    'user_id' => Auth::id(),
                    'title' => $form['title'],
                    'meta_description' => $form['meta_description'],
                    'body' => $form['body'],
                ]);
                $article->tags()->attach($form['tags']);
            });

            session()->flash('success', 'Article created!');
            return to_route('home');
        } catch (Exception) {
            session()->flash('error', 'Error! Please try again.');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $isAuthor = (Auth::id() === $article->user_id);
        return view('article.show.index', [
            'article' => $article,
            'isAuthor' => $isAuthor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        $tags = Tag::all();
        return view('article.edit.index', ['article' => $article, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $form = $request->validated();
        $this->authorize('update', $article);

        try {
            DB::transaction(function () use ($article, $form) {
                // 記事本体データの保存
                $article->fill([
                    'title' => $form['title'],
                    'meta_description' => $form['meta_description'],
                    'body' => $form['body']
                ])->save();

                // 選択タグの保存
                $article->tags()->sync($form['tags'] ?? []);
            });

            session()->flash('success', 'Article updated!');
            return to_route('home');
        } catch (Exception) {
            session()->flash('error', 'Error! Please try again.');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();
        session()->flash('success', 'Article deleted!');
        return to_route('home');
    }
}
