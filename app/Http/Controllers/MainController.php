<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class MainController extends Controller
{
    function index()
    {
        return view('login');
    }

    /**
     * @throws ValidationException
     */
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/successlogin');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    function successlogin()
    {
        return view('loginGuest');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

?>
