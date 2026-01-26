<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('active', true)->orderBy('sort_order')->paginate(9);
        $meta_title = Setting::where('key', 'services_meta_title')->value('value') ?? 'الخدمات';
        $meta_description = Setting::where('key', 'services_meta_description')->value('value') ?? 'اكتشف خدماتنا المتنوعة في مجال المقاولات والبناء.';
        $meta_keywords = collect($services->pluck('title')->take(5))->implode(', ');

        return view('services.index', compact('services', 'meta_title', 'meta_description', 'meta_keywords'));
    }

    public function show($slug)
    {
        $service = Service::where('active', true)->where('slug', $slug)->first();
        if (! $service) {
            return redirect()->route('services.index')->with('error', 'عذراً، الخدمة المطلوبة غير موجودة.');
        }
        // جلب 8 خدمات عشوائية
        // ملاحظة: إذا كنت في صفحة خدمة، يفضل استبعاد الخدمة الحالية باستخدام where('slug', '!=', $slug)
        $sidebarServices = Service::inRandomOrder()->limit(8)->get();
        $meta_title = $service->meta_title ?: $service->title;
        $meta_description = $service->meta_description ?: Str::limit(strip_tags($service->description ?? ''), 160);
        $meta_keywords = $service->title;

        return view('services.show', compact('service','sidebarServices', 'meta_title', 'meta_description', 'meta_keywords'));
    }
}
