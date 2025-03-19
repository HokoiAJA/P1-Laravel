<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => DB::table('articles')->get(),]);
    }

    public function show($id)
    {
        return view('articles.show', ['article' => DB::table('articles')->find($id),]);
    }
}
