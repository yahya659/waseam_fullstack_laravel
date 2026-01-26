<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', 'alpha_dash', Rule::unique('projects', 'slug')],
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'scope' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'boolean',
            'sort_order' => 'integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = $request->except('main_image');

        if ($request->hasFile('main_image')) {


            // $slug =$request->slug?$request->slug: Str::slug($request->title) ;
            // عمل سلاج مؤقت لتسمية الصورة بحسب العنوان
            $tempslug = Str::slug($request->title);
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('main_image'));
            $image->scaleDown(900);
            $imagename = $tempslug . "-" . time() . ".webp";

            $image->toWebp(70)->save(storage_path("app/public/projects/" . $imagename));


            // $data['main_image'] = $request->file('main_image')->store('projects', 'public');
            $data['main_image'] = 'projects/' . $imagename;
        }

        $data['active'] = $request->has('active') ? $request->active : 1;
        $data['sort_order'] = $request->sort_order ?? 0;

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'تم إضافة المشروع بنجاح');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', 'alpha_dash', Rule::unique('projects', 'slug')->ignore($project->id)],
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'scope' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'boolean',
            'sort_order' => 'integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = $request->except('main_image');

        if ($request->hasFile('main_image')) {
            if ($project->main_image) {
                Storage::disk('public')->delete($project->main_image);
            }
              // عمل سلاج مؤقت لتسمية الصورة بحسب العنوان
            $tempslug = Str::slug($request->title);
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('main_image'));
            $image->scaleDown(900);
            $imagename = $tempslug . "-" . time() . ".webp";

            $image->toWebp(70)->save(storage_path("app/public/projects/" . $imagename));


            // $data['main_image'] = $request->file('main_image')->store('projects', 'public');
            $data['main_image'] = 'projects/' . $imagename;

        }

        $data['active'] = $request->has('active') ? 1 : 0;

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'تم تحديث المشروع بنجاح');
    }

    public function destroy(Project $project)
    {
        if ($project->main_image) {
            Storage::disk('public')->delete($project->main_image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'تم حذف المشروع بنجاح');
    }
}
