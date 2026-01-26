<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('active', true)->orderBy('sort_order')->paginate(12);
        $meta_title = Setting::where('key', 'projects_meta_title')->value('value') ?? 'المشاريع';
        $meta_description = Setting::where('key', 'projects_meta_description')->value('value') ?? 'تصفح أحدث مشاريعنا المنفذة بجودة واحترافية.';
        $meta_keywords = collect($projects->pluck('title')->take(5))->implode(', ');

        return view('projects.index', compact('projects', 'meta_title', 'meta_description', 'meta_keywords'));
    }

    public function show($slug)
    {
        $project = Project::with('images')->where('active', true)->where('slug', $slug)->first();
        if (! $project) {
            return redirect()->route('projects.index')->with('error', 'عذراً، المشروع المطلوب غير موجود.');
        }
        $projectImages = $project->images()->paginate(6);
        $meta_title = $project->meta_title ?: $project->title;
        $meta_description = $project->meta_description ?: Str::limit(strip_tags($project->description ?? ''), 160);
        $meta_keywords = $project->title;

        return view('projects.show', compact('project','projectImages', 'meta_title', 'meta_description', 'meta_keywords'));
    }
}
