<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        $projects = Project::orderBy('id', 'desc')->paginate(6);
        $services = Service::orderBy('id', 'asc')->paginate(8);
        $skills = Skill::orderBy('id', 'asc')->get();
        $about = About::first();
        $slides = Slider::paginate(4);
        return view('HomePage', compact('posts', 'projects', 'services', 'skills', 'about', 'slides'));
    }
}
