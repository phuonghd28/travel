<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Type;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        $type = Type::all();
        return view('admin.articles.form', ['data' => null, 'type' => $type]);
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->fill($request->validated());
        $article->is_featured = $request->is_featured;
        $article->save();
        return redirect()->route('listArticle')
            ->with('success', 'Thêm mới thành công.');
    }

    public function list(Request $request)
    {
        $queryBuilder = Article::query();
        $search = $request->get('search');
        $sort = (int) $request->get('sort');
        if ($search || strlen($search) > 0) {
            $queryBuilder = $queryBuilder->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%');
        }
        if ($sort === 1) {
            $queryBuilder = $queryBuilder->orderBy('created_at', 'DESC');
        }
        if ($sort === 2) {
            $queryBuilder = $queryBuilder->orderBy('created_at', 'ASC');
        }
        $data = $queryBuilder->orderBy('created_at','DESC')->paginate(10)->appends(['search' => $search, 'sort' => $sort]);
        return view('admin.articles.table', [
            'articles' => $data,
            'sort' => $sort,
        ]);

    }

    public function edit($id)
    {
        $article = Article::find($id);
        $type = Type::all();
        return view('admin.articles.form', ['data' => $article, 'type' => $type]);
    }

    public function save(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request['content'];
        $article->images = $request->images;
        $article->author = $request->author;
        $article->type_id = $request->type_id;
        $article->update();
        return redirect()->route('listArticle')->with('success', 'Update thành công.');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('listArticle')
            ->with('success', 'Xoá thành công.');
    }


//    public function listClient(Request $request)
//    {
//        $article = Article::query();
//        $search = $request->get('search');
//        if ($search || strlen($search) > 0) {
//            $article = $article->where('title', 'like', '%' . $search . '%')
//                ->orWhere('content', 'like', '%' . $search . '%')
//                ->orWhere('author', 'like', '%' . $search . '%')
//                ->orWhere('author_slogan', 'like', '%' . $search . '%');
//        }
//        $data = $article->orderBy('created_at','DESC')->paginate(6)->appends(['search' => $search]);
//        $latest = $article->orderBy('created_at', 'DESC')->take(3)->get();
//        $popular = $article->orderBy('view', 'DESC')->take(3)->get();
//        $featured = $article->where('is_featured', 1)->take(3)->get();
//
//        return view('clients.articles', [
//            'articles' => $data,
//            'latest' => $latest,
//            'popular' => $popular,
//            'featured' => $featured,
//        ]);
//
//    }
//
//    public function detailClient($id) {
//        $article = Article::query();
//        $data = Article::find($id);
//        $latest = $article->orderBy('created_at', 'DESC')->take(3)->get();
//        $popular = $article->orderBy('view', 'DESC')->take(3)->get();
//        $featured = $article->where('is_featured', 1)->take(3)->get();
//
//        return view('clients.articles-detail', [
//            'data' => $data,
//            'latest' => $latest,
//            'popular' => $popular,
//            'featured' => $featured,
//        ]);
//    }

}
