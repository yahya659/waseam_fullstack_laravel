@extends('layouts.site')


@section('title', $service->title)
@section('meta_title', $service->meta_title ?: $service->title)
@section('meta_description', $service->meta_description ?: Str::limit(strip_tags($service->description ?? ''), 160))
@section('meta_keywords', $service->title)

@section('content')



    <!-- Page Hero -->
    <section class="relative h-[40vh] min-h-[300px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/img/page-hero.webp') }}" alt="المدونة" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-primary/80 mix-blend-multiply"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center pt-20">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 animate-fade-in-up text-accent">{{ $service->title }}
            </h1>
            <nav
                class="flex justify-center items-center gap-2 text-sm md:text-base text-gray-300 animate-fade-in-up animation-delay-200">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">الرئيسية</a>
                <span>/</span>
                <a href="{{ route('services.index') }}" class="hover:text-white transition-colors">خدماتنا</a>
                <span>/</span>
                <span
                    class="text-accent/4 transition-colors py-1 relative  after:absolute after:bottom-0 after:right-0 after:w-full after:h-0.5 after:bg-accent after:transition-all">{{ $service->title }}
                </span>
            </nav>
        </div>
    </section>



    <!-- Service Detail Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">

                <!-- Main Content -->
                <div class="w-full lg:w-2/3">
                    <div class="reveal">
                        @if ($service->image_path)
                            <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}"
                                class="w-full  object-cover h-[400px] lg:h-[500px] rounded-xl shadow-lg mb-8">
                        @endif {{-- object-cover --}}
                        @if ($service->title)
                            <h2 class="text-3xl font-bold text-accent mb-6">{{ $service->title }}</h2>
                        @endif

                        <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                            {!! nl2br(e($service->description)) !!}
                        </p>

                        <h3 class="text-2xl font-bold text-primary mb-4">ماذا تشمل خدماتنا؟</h3>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start gap-3 text-gray-600">
                                <i class="fa-solid fa-check-circle text-accent mt-1"></i>
                                <span>إنشاء المباني السكنية والتجارية (عظم وتشطيب).</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <i class="fa-solid fa-check-circle text-accent mt-1"></i>
                                <span>أعمال الحفر والردم وتجهيز المواقع.</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <i class="fa-solid fa-check-circle text-accent mt-1"></i>
                                <span>أعمال الخرسانة المسلحة والهياكل المعدنية.</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <i class="fa-solid fa-check-circle text-accent mt-1"></i>
                                <span>أعمال البناء واللياسة والدهانات.</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <i class="fa-solid fa-check-circle text-accent mt-1"></i>
                                <span>تركيب الأنظمة الميكانيكية والكهربائية.</span>
                            </li>
                        </ul>
                        <hr class="border-gray-200 my-10">
                        <h3 class="text-2xl font-bold text-primary mb-4">مراحل العمل</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                                <span class="text-4xl font-bold text-accent/20 block mb-2">01</span>
                                <h4 class="text-xl font-bold text-primary mb-2">الدراسة والتخطيط</h4>
                                <p class="text-gray-600 text-sm">دراسة متطلبات المشروع وإعداد المخططات والجدول الزمني.</p>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                                <span class="text-4xl font-bold text-accent/20 block mb-2">02</span>
                                <h4 class="text-xl font-bold text-primary mb-2">التنفيذ والبناء</h4>
                                <p class="text-gray-600 text-sm">البدء في أعمال التنفيذ وفقاً للمواصفات والمعايير المعتمدة.
                                </p>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                                <span class="text-4xl font-bold text-accent/20 block mb-2">03</span>
                                <h4 class="text-xl font-bold text-primary mb-2">المتابعة والرقابة</h4>
                                <p class="text-gray-600 text-sm">مراقبة سير العمل وضمان الجودة والسلامة في الموقع.</p>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                                <span class="text-4xl font-bold text-accent/20 block mb-2">04</span>
                                <h4 class="text-xl font-bold text-primary mb-2">التسليم والصيانة</h4>
                                <p class="text-gray-600 text-sm">تسليم المشروع للعميل وتقديم خدمات الضمان والصيانة.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="w-full lg:w-1/3 space-y-8">
                    <!-- Services Menu -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-100 reveal delay-100">
                        <h3
                            class="text-xl font-bold text-primary mb-4 relative after:content-[''] after:absolute after:-bottom-2 after:right-0 after:w-12 after:h-1 after:bg-accent">
                            خدمات أخرى
                        </h3>

                        <ul class="space-y-2">
                            @foreach ($sidebarServices as $serviceItem)
                                <li>
                                    {{-- التحقق مما إذا كان هذا الرابط هو الصفحة الحالية لتمييزه --}}
                                    @php
                                        // هذا الشرط يعمل إذا كنا في صفحة خدمة ونقارن الـ Slug
                                        $isActive = request()->route('slug') == $serviceItem->slug;
                                    @endphp

                                    <a href="{{ route('services.show', $serviceItem->slug) }}"
                                        class="block px-4 py-3 rounded-lg shadow-sm transition-all font-medium
                                  {{ $isActive ? 'bg-white text-accent border-r-4 border-accent pointer-events-none' : 'bg-white text-gray-600 hover:bg-accent hover:text-white' }}">
                                        {{ $serviceItem->title }} {{-- تأكد أن اسم العمود في الداتابيز title أو name --}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Contact Widget -->
                    <div class="bg-primary text-white p-8 rounded-xl shadow-lg relative overflow-hidden reveal delay-200">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-accent opacity-10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2">
                        </div>
                        <h3 class="text-xl font-bold mb-4">هل تحتاج مساعدة؟</h3>
                        <p class="text-gray-300 mb-6 text-sm">تواصل معنا الآن لمناقشة مشروعك والحصول على استشارة مجانية.</p>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-accent">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <span dir="ltr">{{ $settings['phone'] ?? '+966 50 123 4567' }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-accent">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <span> {{ $settings['email'] ?? 'info@example.com' }}</span>
                            </li>
                        </ul>
                        <a href="{{ route('contact') }}"
                            class="block text-center bg-white text-primary py-3 rounded-lg font-bold hover:bg-accent hover:text-white transition-colors">اتصل
                            بنا</a>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
