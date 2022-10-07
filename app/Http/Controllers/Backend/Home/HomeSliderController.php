<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Illuminate\Support\Str;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sliders = HomeSlider::query()
            ->orderBy('desk', 'ASC')
            ->get();
        return view('admin.pages.home.home_slider', ["sliders" => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.pages.home.create_slider");
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
            'desk'=>'required',
            'link'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $slider=new HomeSlider;
        $slider->title=$request->title;
        $slider->link=$request->link;
        $slider->active=$request->active;
        $slider->desk=$request->desk;
        $slider->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/hero-carousel'),$imageName);
            $slider->photo='hero-carousel/'.$imageName;
        }
        $slider->save();

        return redirect()->route('slider.index')
            ->with('success','Slider has been created successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $slider = HomeSlider::find($id);
        return view('admin.pages.home.edit_slider', compact('slider'));
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
            'desk'=>'required',
            'link'=>'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $slider= HomeSlider::findOrFail($request->id);
        $slider->title=$request->title;
        $slider->link=$request->link;
        $slider->active=$request->active;
        $slider->desk=$request->desk;
        $slider->description=$request->description;

        if($request->hasFile('image')){
            //$imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $imageName= date('YmdHi').$request->image->getClientOriginalName();
            $request->image->move(public_path('frontend/img/hero-carousel'),$imageName);
            $slider->photo='hero-carousel/'.$imageName;
        }
        $slider->save();

        return redirect()->route('slider.index')
            ->with('success','Slider has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $slider = HomeSlider::find($id);
        $slider->delete();
        return redirect()->route('slider.index')
            ->with('success','Slider has been deleted successfully.');
    }
}
