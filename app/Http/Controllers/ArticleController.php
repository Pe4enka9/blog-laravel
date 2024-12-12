<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()->orderBy('created_at', 'desc')->get();

        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id' => ['required', 'integer', 'exists:articles,id'],
            'is_moderated' => ['nullable', 'boolean'],
        ]);

        $article = Article::query()->find($validated['id']);
        $article->update(['is_moderated' => $validated['is_moderated']]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function personalIndex(): View
    {
        $articles = Article::query()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('personal.articles.index', ['articles' => $articles]);
    }
}
