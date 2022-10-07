<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use App\Models\AboutTeam;
use Illuminate\Http\Request;

class AboutTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $aboutteams = AboutTeam::query()
            ->get();
        return view('admin.pages.about.about_team', ["aboutteams" => $aboutteams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.pages.about.create_team");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'authority'=>'required|min:3',
            'description'=>'required|min:3',
            'facebook_link'=>'required',
            'twitter_link'=>'required',
            'instagram_link'=>'required',
            'linkedin_link'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $team=new AboutTeam;
        $team->name=$request->name;
        $team->authority=$request->authority;
        $team->facebook_link=$request->facebook_link;
        $team->twitter_link=$request->twitter_link;
        $team->instagram_link=$request->instagram_link;
        $team->linkedin_link=$request->linkedin_link;
        $team->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/team'),$imageName);
            $team->photo='team/'.$imageName;
        }
        $team->save();

        return redirect()->route('aboutteam.index')
            ->with('success','About Team has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $aboutteam = AboutTeam::find($id);
        return view('admin.pages.about.edit_team', compact('aboutteam'));
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
            'name'=>'required|min:3',
            'authority'=>'required|min:3',
            'description'=>'required|min:3',
            'facebook_link'=>'required',
            'twitter_link'=>'required',
            'instagram_link'=>'required',
            'linkedin_link'=>'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $team= AboutTeam::findOrFail($request->id);
        $team->name=$request->name;
        $team->authority=$request->authority;
        $team->facebook_link=$request->facebook_link;
        $team->twitter_link=$request->twitter_link;
        $team->instagram_link=$request->instagram_link;
        $team->linkedin_link=$request->linkedin_link;
        $team->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/team'),$imageName);
            $team->photo='team/'.$imageName;
        }
        $team->save();

        return redirect()->route('aboutteam.index')
            ->with('success','About Team has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $team = AboutTeam::find($id);
        $team->delete();
        return redirect()->route('aboutteam.index')
            ->with('success','About Team has been deleted successfully.');
    }
}
