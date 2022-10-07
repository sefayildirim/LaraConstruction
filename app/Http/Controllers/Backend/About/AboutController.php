<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Home About
        $about = About::find(1);

        return view('admin.pages.about.about', compact(
            'about'
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
            'video_link'=>'required',
            'description'=>'required|min:3',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $about= About::findOrFail($request->id);
        $about->title=$request->title;
        $about->video_link=$request->video_link;
        $about->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/'),$imageName);
            $about->photo=$imageName;
        }
        $about->save();

        return redirect()->route('about.index')
            ->with('success','About has been updated successfully.');

    }


}
