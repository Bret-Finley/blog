<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Hash;
use Auth;
use App\User;
use App\Blog;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'blogtitle' => 'required',
            'blogdesc' => 'required'], [
                'same' => 'Your passwords must match'
                ]);

        $input = $request->all();
        $username = $input["username"];
        $email = $username . '@gmail.com';
        $password = Hash::make($input["password"]);

        $title = $input["blogtitle"];
        $description = $input["blogdesc"];

        $user = User::create(array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        ));

        $user->blog()->save(new Blog(array(
            'title' => $title,
            'description' => $description
        )));

        return redirect('/');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
            ]);

        $input = $request->all();
        $username = $input['username'];
        $password = $input['password'];

        if(Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return redirect('/');
        }

        return 'failed';
    }

    public function editaccount(Request $request)
    {
        $this->validate($request, [
            'uname' => 'required',
            'pw' => 'required',
            'cpw' => 'same:pw',
            'bt' => 'required',
            'bd' => 'required'
            ]);

        $user = User::find(Auth::id());
        $blog = $user->blog()->first();
        $input = $request->all();

        $user->username = $input["uname"];
        $user->password = Hash::make($input["pw"]);
        $user->save();

        $blog->title = $input["bt"];
        $blog->description = $input["bd"];
        $blog->save();

        return redirect('/account');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function account()
    {
        if(!Auth::check())
        {
            return redirect('/');
        }

        $data = Auth::user();
        $blog = Auth::user()->blog()->first();
        $data["blog"] = $blog;
        return view('account', $data);
    }
}
