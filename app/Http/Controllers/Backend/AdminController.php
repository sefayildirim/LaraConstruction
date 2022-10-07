<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use function view;

class AdminController extends Controller
{
    public function index(){
        //dd('geldi');
        return view('admin.pages.index');
    }
}
