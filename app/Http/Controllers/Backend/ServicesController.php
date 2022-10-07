<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $services = Services::query()
            ->get();
        return view('admin.pages.services.services', ["services" => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.pages.services.create");
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
            'icon'=>'required|min:3',
            'description'=>'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $slug = Str::slug($request->title);

        $service=new Services;
        $service->title=$request->title;
        $service->slug=$slug;
        $service->icon=$request->icon;
        $service->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/blog'),$imageName);
            $service->photo='blog/'.$imageName;
        }
        $service->save();

        return redirect()->route('services.index')
            ->with('success','Services has been created successfully.');
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
        $services = Services::find($id);
        return view('admin.pages.services.edit', compact('services'));
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
            'icon'=>'required|min:3',
            'description'=>'required|min:3',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $slug = Str::slug($request->title);

        $services= Services::findOrFail($request->id);
        $services->title=$request->title;
        $services->icon=$request->icon;
        $services->slug=$slug;
        $services->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/blog'),$imageName);
            $services->photo='blog/'.$imageName;
        }
        $services->save();

        return redirect()->route('services.index')
            ->with('success','Services has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $services = Services::find($id);
        $services->delete();
        return redirect()->route('services.index')
            ->with('success','Services has been deleted successfully.');
    }
}
