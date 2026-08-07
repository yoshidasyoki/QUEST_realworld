<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Exception;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $feed = $request->query('feed') ?? 'global';

        $articles = match ($feed) {
            'your' => Article::where('user_id', Auth::id())
                ->paginate(5)
                ->withQueryString(),
            'global' => Article::with('user')
                ->paginate(5)
                ->withQueryString(),
            default => abort(404),
        };

        return view('home.index', [
            'articles' => $articles,
            'feed' => $feed,
        ]);
    }
}
