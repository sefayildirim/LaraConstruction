<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeService;
use Illuminate\Http\Request;

class HomeServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $homeservices = HomeService::query()
            ->get();
        return view('admin.pages.home.home_services', ["homeservices" => $homeservices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.pages.home.create_services");
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
            'icon'=>'required'
        ]);

        $homeservice= new HomeService;
        $homeservice->title=$request->title;
        $homeservice->icon=$request->icon;
        $homeservice->description=$request->description;
        $homeservice->save();

        return redirect()->route('homeservices.index')
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
        $homeservices = HomeService::find($id);
        return view('admin.pages.home.edit_services', compact('homeservices'));
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
            'icon'=>'required'
        ]);

        $homeservices= HomeService::findOrFail($request->id);
        $homeservices->title=$request->title;
        $homeservices->icon=$request->icon;
        $homeservices->description=$request->description;

        $homeservices->save();

        return redirect()->route('homeservices.index')
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
        $services = HomeService::find($id);
        $services->delete();
        return redirect()->route('homeservices.index')
            ->with('success','Services has been deleted successfully.');
    }
}
