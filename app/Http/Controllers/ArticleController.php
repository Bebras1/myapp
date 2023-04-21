<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class ArticleController extends Controller
{

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    function loginGuest()
    {
        $articles = Article::all();
        return view('guestHome', ['articles' => $articles]);
    }
    function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('edit', compact('article'));
    }
    function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->title = $request->input('title');
        $article->content = $request->input('content');

        $article->save();

        return redirect('/loginGuest');
    }
    function create()
    {
        return view('create');
    }
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        // Save the new article to the database
        $article->save();

        // Redirect the user back to the index page with a success message
        return redirect()->route('loginGuest')->with('success', 'Article created successfully.');
    }
    function destroy($id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
            return redirect()->route('loginGuest')->with('success', 'Article deleted successfully.');
        } else {
            return redirect()->route('loginGuest')->with('error', 'Article not found.');
        }
    }
}

?>
