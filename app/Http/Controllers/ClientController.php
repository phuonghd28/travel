<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home() {
        $types = Type::all();
        $query = Article::query();
        $articles = $query->orderBy('created_at', 'DESC')->limit(3)->get();
        return view('clients.index', ['type' => $types, 'articles' => $articles]);
    }

    public function list(Request $request) {
        $query = Article::query();
        $type = (int)$request->get('type');
        $search = $request->get('search');

        if ($search || strlen($search) > 0) {
            $query = $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%');
        }

        if ($type) {
            $query = $query->where('type_id', $type);
        }

        $articles = $query->orderBy('created_at', 'DESC')->paginate(9);
        return view('clients.articles', ['article' => $articles]);
    }
    public function detail($id) {
        $article = Article::find($id);
        return view('clients.detail', [
            'article' => $article,
        ]);
    }
}
