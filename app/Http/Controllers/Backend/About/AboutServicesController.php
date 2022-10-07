<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutService;
use Illuminate\Http\Request;

class AboutServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $aboutservices = AboutService::query()
            ->get();
        return view('admin.pages.about.about_services', ["aboutservices" => $aboutservices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.pages.about.create_services");
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
            'number'=>'required|min:3',
            'icon'=>'required'
        ]);

        $aboutservice= new AboutService;
        $aboutservice->title=$request->title;
        $aboutservice->icon=$request->icon;
        $aboutservice->number=$request->number;
        $aboutservice->save();

        return redirect()->route('aboutservices.index')
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
        $aboutservices = AboutService::find($id);
        return view('admin.pages.about.edit_services', compact('aboutservices'));
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
            'number'=>'required',
            'icon'=>'required'
        ]);

        $aboutservices= AboutService::findOrFail($request->id);
        $aboutservices->title=$request->title;
        $aboutservices->icon=$request->icon;
        $aboutservices->number=$request->number;

        $aboutservices->save();

        return redirect()->route('aboutservices.index')
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
        $services = AboutService::find($id);
        $services->delete();
        return redirect()->route('aboutservices.index')
            ->with('success','Services has been deleted successfully.');
    }
}
