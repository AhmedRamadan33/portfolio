<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $profile = Profile::first();
        $skills = Skill::ordered()->get()->groupBy('category');
        $projects = Project::ordered()->get();
        $experiences = Experience::ordered()->get();
        $educations = Education::ordered()->get();

        return view('home', compact('profile', 'skills', 'projects', 'experiences', 'educations'));
    }
}
