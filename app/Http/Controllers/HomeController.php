<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactAdminMail;
use App\Mail\ContactAutoReplyMail;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('active', true)->orderBy('sort_order')->take(3)->get();
        $projects = Project::where('active', true)->orderBy('sort_order')->take(6)->get();
        $totalprojects = Project::count();
        $testimonials = Testimonial::where('active', true)->orderBy('sort_order')->take(6)->get();
        $skills = Skill::where('active', true)->orderBy('sort_order')->get();

        $latestPosts = BlogPost::where('active', true)->orderBy('published_at', 'desc')->take(3)->get();
        $settings = Setting::all()->pluck('value', 'key');
        $meta_title = $settings['site_name'] ?? config('app.name', 'مؤسسة صاحب الوسام');
        $meta_description = $settings['site_description'] ?? null;
        $meta_keywords = collect([
            $settings['site_name'] ?? null,
            'الخدمات',
            'المشاريع',
            'المدونة',
            'من نحن',
            'تواصل معنا',
        ])->filter()->implode(', ');

        return view('home', compact('services', 'projects', 'testimonials', 'skills', 'latestPosts', 'meta_title', 'meta_description', 'meta_keywords', 'totalprojects'));
    }

    public function about()
    {
        $skills = Skill::where('active', true)->orderBy('sort_order')->get();
        $totalprojects = Project::count();
        $settings = Setting::all()->pluck('value', 'key');
        $meta_title = 'من نحن';
        $meta_description = $settings['site_description'] ?? null;
        $meta_keywords = collect([
            $settings['site_name'] ?? null,
            'من نحن',
            'مؤسسة صاحب الوسام',
            'خدماتنا',
            'مشاريعنا',
        ])->filter()->implode(', ');

        return view('about', compact('skills', 'settings', 'meta_title', 'meta_description', 'meta_keywords', 'totalprojects'));
    }

    public function contact()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $meta_title = 'تواصل معنا';
        $meta_description = $settings['site_description'] ?? null;
        $meta_keywords = collect([
            $settings['site_name'] ?? null,
            'تواصل معنا',
            'تواصل',
            'الاتصال',
        ])->filter()->implode(', ');

        return view('contact', compact('settings', 'meta_title', 'meta_description', 'meta_keywords'));
    }

    public function submit(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'subject' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:500'],
        ]);
        $adminEmail = Setting::where('key', 'email')->value('value') ?? config('mail.from.address');
        try {

            $message = Message::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'is_read' => false,
            ]);
            // البيانات المشتركة للإيميلات
            $data = [
                'name'    => $message->name,
                'email'   => $message->email,
                'phone'   => $message->phone,
                'subject' => $message->subject,
                'message' => $message->message,
                'id'      => $message->id,
            ];

            //  إرسال إشعار للإدارة (Queue)
            Mail::to($adminEmail)
                ->queue(new ContactAdminMail($data));

            //  رد تلقائي للعميل (Queue)
            Mail::to($message->email)
                ->queue(new ContactAutoReplyMail($data));

            return response()->json([
                'status' => 'ok'
            ]);
        } catch (\Throwable $e) {

            // تسجيل الخطأ
            Log::error($e);

            return response()->json([
                'status' => 'error',
                'message' => 'حدث خطأ أثناء إرسال الرسالة'
            ], 500);
        }
    }
}


/*
    $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'subject' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:500'],
        ]);
        $adminEmail = Setting::where('key', 'email')->value('value') ?? config('mail.from.address');
        try {

            $message = Message::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'is_read' => false,
            ]);
            // البيانات المشتركة للإيميلات
            $mailData = [
                'name'    => $message->name,
                'email'   => $message->email,
                'phone'   => $message->phone,
                'subject' => $message->subject,
                'message' => $message->message,
                'id'      => $message->id,
            ];

            $body = "اسم: {$validated['name']}\nبريد: {$validated['email']}\nهاتف: " . ($validated['phone'] ?? '') . "\nموضوع: {$validated['subject']}\n\nرسالة:\n{$validated['message']}";
            Mail::raw($body, function ($m) use ($adminEmail, $validated) {
                $m->to($adminEmail)->subject('رسالة تواصل جديدة: ' . $validated['subject']);
            });

            return response()->json(['status' => 'ok']);
        } catch (\Throwable $e) {
            return response()->json(['status' => 'error'], 500);
        }

*/
