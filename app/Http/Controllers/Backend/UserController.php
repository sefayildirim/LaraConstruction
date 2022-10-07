<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all(); // kullanıcılar user modelinden çağırdık
        return view("admin.pages.user", ["users" => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate(array(
            "name" => "required",
            "email" => "required|email",
        ));
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect()->route('user.index')->with('message','Data added Successfully');
    }

    public function passwordForm(){
        $users = User::all(); // kullanıcılar user modelinden çağırdık
        return view("admin.pages.password_form", ["users" => $users]);
    }


    public function changePassword(Request $request)
    {
        $request->validate(array(
            "password" => "required|max:255|min:8|confirmed",
            "password_confirmation" => "required|max:255|min:8",
        ));

        $user = User::find($request->id);
        $password = $request->get("password");
        $user->password = Hash::make($password);

        $user->update();
        return redirect()->route('user.passwordForm')->with('message','Data added Successfully');
    }


}
