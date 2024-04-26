<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage() {
        $articles = Article::orderby('created_at' , 'desc')->paginate(4);
        return view('welcome', compact('articles'));
    }
}
