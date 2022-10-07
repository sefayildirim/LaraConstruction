<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutService;
use App\Models\AboutTeam;
use App\Models\ContactInformation;
use App\Models\HomeAbout;
use App\Models\HomeFeatures;
use App\Models\HomeService;
use App\Models\HomeSlider;
use App\Models\HomeTestimonials;
use App\Models\Services;
use http\Env\Request;

/*use Illuminate\Http\Request;
use Illuminate\Support\Str;*/

class FrontendController extends Controller
{
    public function index(){
        // Home Slider
        $homeslider = HomeSlider::query()
            ->where('active', 1)
            ->orderBy('desk', 'ASC')
            ->get();
        // Home About
        $homeabout = HomeAbout::find(1);
        // Home Services
        $homeservice = HomeService::query()
            ->get();
        // Home Features
        $homefeatures = HomeFeatures::query()
            ->get();
        // Home Testimonials
        $hometestimonials = HomeTestimonials::query()
            ->get();

        return view('frontend.pages.index', compact(
            'homeslider',
            'homeabout',
            'homeservice',
            'homefeatures',
            'hometestimonials'
        ));
    }

    public function about(){
        // About
        $about = About::find(1);
        // About Services
        $aboutservices = AboutService::query()
            ->get();
        // About Team
        $aboutteam = AboutTeam::query()
            ->get();

        return view('frontend.pages.about', compact(
            'about',
            'aboutservices',
            'aboutteam'
        ));
    }
    public function services(){
        // Services
        $services = Services::query()
            ->paginate(3);

        return view('frontend.pages.services', compact(
            'services'
        ));
    }

    public function servicesdetail($slug){
        // Services Detail
        $servicesdetail = Services::query()->where('slug',$slug)->first() ?? abort(404);
        return view('frontend.pages.services_detail', compact(
            'servicesdetail'
        ));
    }

    public function contact(){
        return view('frontend.pages.contact');
    }




}
