<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeTestimonials;
use Illuminate\Http\Request;

class HomeTestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $hometestimonials = HomeTestimonials::query()
            ->get();
        return view('admin.pages.home.home_testimonials', ["hometestimonials" => $hometestimonials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.pages.home.create_testimonials");
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
            'description'=>'required|min:3',
            'authority'=>'required|min:3',
            'point'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $testimonials=new HomeTestimonials;
        $testimonials->name=$request->name;
        $testimonials->authority=$request->authority;
        $testimonials->point=$request->point;
        $testimonials->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/testimonials'),$imageName);
            $testimonials->photo='testimonials/'.$imageName;
        }
        $testimonials->save();

        return redirect()->route('hometestimonials.index')
            ->with('success','Testimonials has been created successfully.');
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
        $hometestimonials = HomeTestimonials::find($id);
        return view('admin.pages.home.edit_testimonials', compact('hometestimonials'));
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
        //dd($request->point);
        $request->validate([
            'name'=>'required|min:3',
            'description'=>'required|min:3',
            'authority'=>'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $testimonials= HomeTestimonials::findOrFail($request->id);
        $point = $testimonials->point;
        if ($request->point=="Point"){
            $point = $testimonials->point;
        }else{
            $point = $request->point;
        }
        //dd($point);

        $testimonials->name=$request->name;
        $testimonials->authority=$request->authority;
        $testimonials->point=$point;
        $testimonials->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/testimonials'),$imageName);
            $testimonials->photo='testimonials/'.$imageName;
        }
        $testimonials->save();

        return redirect()->route('hometestimonials.index')
            ->with('success','Testimonials has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $testimonials = HomeTestimonials::find($id);
        $testimonials->delete();
        return redirect()->route('hometestimonials.index')
            ->with('success','Testimonials has been deleted successfully.');
    }
}
