<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        // return view('articles.index', ['articles' => DB::table('articles')->get(),]);\
        return view('articles.index', [
            'articles' => Article::all(),
        ]);
    }

    public function show($id)
    {
        // return view('articles.show', ['article' => DB::table('articles')->find($id),]);
        return view('articles.show', [
            'article' => Article::findOrFail($id),
        ]);
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
        // DB::table('articles')->insert([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // return redirect()->route('articles.index')->with('success', 'Article created successfully.');
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route('articles.index')->with(
            'success',
            'Artikel berhasil ditambahkan.'
        );
    }
    public function edit($id)
    {
        return view('articles.edit', ['articles' => DB::table('articles')->find($id),]);
    }
    public function update(Request $request, $id)
    {
        // $article = DB::table('articles')->where('id', $id)->first();

        // DB::table('articles')->where('id', $id)->update([
        //     'title' => $request->title,
        //     'body' => $request->body,
        // ]);

        // return redirect()->route('articles.index')->with(
        //     'success',
        //     'Artikel berhasil diupdate.'
        // );
        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route('articles.index')->with(
            'success',
            'Artikel berhasil diupdate.'
        );
    }
    public function destroy($id)
    {
        // DB::table('articles')->where('id', $id)->delete();

        // return redirect()->route('articles.index')->with(
        //     'success',
        //     'Artikel berhasil dihapus.'
        // );
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with(
            'success',
            'Artikel berhasil dihapus.'
        );
    }


}
