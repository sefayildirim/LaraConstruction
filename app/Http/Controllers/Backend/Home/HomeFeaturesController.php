<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeFeatures;
use Illuminate\Http\Request;

class HomeFeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $homefeatures = HomeFeatures::query()
            ->get();
        return view('admin.pages.home.home_features', ["homefeatures" => $homefeatures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.pages.home.create_features");
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
            'title'=>'required|min:3',
            'description'=>'required|min:3',
            'subtitle'=>'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $homefeatures=new HomeFeatures;
        $homefeatures->title=$request->title;
        $homefeatures->subtitle=$request->subtitle;
        $homefeatures->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/'),$imageName);
            $homefeatures->photo=$imageName;
        }
        $homefeatures->save();

        return redirect()->route('homefeatures.index')
            ->with('success','Home Features has been created successfully.');

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
        $homefeatures = HomeFeatures::find($id);
        return view('admin.pages.home.edit_features', compact('homefeatures'));
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
            'subtitle'=>'required|min:3',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $homefeatures= HomeFeatures::findOrFail($request->id);
        $homefeatures->title=$request->title;
        $homefeatures->subtitle=$request->subtitle;
        $homefeatures->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img'),$imageName);
            $homefeatures->photo=$imageName;
        }
        $homefeatures->save();

        return redirect()->route('homefeatures.index')
            ->with('success','Home Features has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $homefeatures = HomeFeatures::find($id);
        $homefeatures->delete();
        return redirect()->route('homefeatures.index')
            ->with('success','Home Features has been deleted successfully.');
    }
}
