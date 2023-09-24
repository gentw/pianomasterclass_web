<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $users = User::get();

        return $users;
    }

    public function show($id){

        $user = User::find($id);

        return $user;
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->email = $request->input('email');
        $user->password =  bcrypt ($request->input('password'));

        $user->save();

        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);

        $user->email = $request->input('email');

        if($request->input('password') != null){
            $user->password = bcrypt($request->input('password'));
        }

        $user->update();

        return $user;
    }

    public function destroy($id){

        $user = User::find($id);

        $user->delete();
    }




}
