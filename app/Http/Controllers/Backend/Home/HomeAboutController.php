<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeAbout;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Home About
        $homeabout = HomeAbout::find(1);

        return view('admin.pages.home.home_about', compact(
            'homeabout'
        ));

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
        $request->validate([
            'title'=>'required|min:3',
            'description'=>'required|min:3',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $about= HomeAbout::findOrFail($request->id);
        $about->title=$request->title;
        $about->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/'),$imageName);
            $about->photo=$imageName;
        }
        $about->save();

        return redirect()->route('homeabout.index')
            ->with('success','Home About has been updated successfully.');

    }

}
