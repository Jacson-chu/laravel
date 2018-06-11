<?php namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$articles = Article::orderBy('created_at','desc')->get();
		return view('articles.index',compact('articles'));
	}
	public function create()
    {
        return view('articles.create');
    }
	public function store(Request $request)
    {
		$article = Article::create([
		'title' => $request->title,
		'content' => $request->content,
	]);

	$articles = Article::orderBy('created_at','desc')->get();
	return view('articles.index',compact('articles'));  
    }
	public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }
	public function show(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return back();
    }
	public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return back();
    }

}
