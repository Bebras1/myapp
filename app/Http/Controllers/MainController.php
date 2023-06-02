<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class MainController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function loginGuest()
    {
        $articles = Article::all();
        return view('guestHome', compact('articles'));
    }
    public function guestHome()
    {
        $articles = Article::all();
        return view('guestHome', compact('articles'));
    }
    public function checklogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('guestHome');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
