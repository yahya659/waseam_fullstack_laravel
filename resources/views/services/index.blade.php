@extends('layouts.site')

@section('title', ' خدماتنا')
@section('meta_title', $settings['site_name'] ?? config('app.name', 'مؤسسة صاحب الوسام'))
@section('meta_description', $settings['site_description'] ?? null)
@section('meta_keywords', collect([
    $settings['site_name'] ?? null,
    'خدماتنا','خدمات','الخدمات'
])->filter()->implode(', '))

@section('content')


 <!-- Page Hero -->
    <section class="relative h-[40vh] min-h-[300px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/img/page-hero.webp') }}" alt="المدونة" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-primary/80 mix-blend-multiply"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center pt-20">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 animate-fade-in-up text-accent">خدماتنا</h1>
            <nav
                class="flex justify-center items-center gap-2 text-sm md:text-base text-gray-300 animate-fade-in-up animation-delay-200">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">الرئيسية</a>
                <span >/</span>
                <span class="text-accent/4 transition-colors py-1 relative  after:absolute after:bottom-0 after:right-0 after:w-full after:h-0.5 after:bg-accent after:transition-all">جميع الخدمات</span>
            </nav>
        </div>
    </section>


<section class="py-16">
    <div class="container mx-auto px-4">
        @if(session('error'))
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">{{ session('error') }}</div>
        @endif
         @if ($services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up md-10">
                    @foreach ($services as $index => $service)
                        <!-- Service 1 -->
                        <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up  border border-gray-100  "
                            data-aos-delay="{{ $index * 100 }}">

                            <div class="relative h-64 overflow-hidden">
                                <div class="absolute inset-0 bg-primary/40 group-hover:bg-primary/20 transition-all z-10">
                                </div>
                                @if ($service->image_path)
                                    <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="absolute bottom-4 right-4 z-20 bg-white p-3 rounded-lg shadow-md text-accent">
                                        <i class="fa-solid  {!! $service->icon !!} text-2xl"></i>
                                    </div>
                                @endif
                                @if ($service->icon)
                                    <div
                                        class="absolute bottom-4 right-4 z-20 bg-white p-3 rounded-lg shadow-md text-accent">
                                        <i class="fa-solid  {!! $service->icon !!} text-2xl"></i>
                                    </div>
                                @else
                                    <div
                                        class="absolute bottom-4 right-4 z-20 bg-white p-3 rounded-lg shadow-md text-accent">
                                        <i class="fa-solid fa-trowel-bricks text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-primary mb-3 group-hover:text-accent transition-colors">
                                    <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
                                </h3>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    {{ Str::limit($service->description, 100) }}
                                </p>
                                <a href="{{ route('services.show', $service->slug) }}"
                                    class="inline-flex items-center text-primary font-bold hover:text-accent transition-colors">
                                    اقرأ المزيد <i
                                        class="fa-solid fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                   {{ $services->links('partials.pagination') }}
                </div>
        </div>
    @else
        <div class="text-center text-gray-500 py-8">
            <p>لا توجد خدمات متاحة حالياً.</p>
        </div>
        @endif
    </div>
</section>

 <!-- Why Choose Us -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="w-full lg:w-1/2 reveal">
                    <h2 class="text-accent font-bold text-lg mb-2">لماذا تختارنا؟</h2>
                    <h3 class="text-3xl font-bold text-primary mb-6">نقدم حلولاً هندسية متكاملة</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-white rounded-lg shadow-sm flex items-center justify-center text-accent text-xl flex-shrink-0">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary text-lg mb-1">الالتزام بالمواعيد</h4>
                                <p class="text-gray-600 text-sm">نحترم وقت عملائنا ونلتزم بتسليم المشاريع في موعدها.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-white rounded-lg shadow-sm flex items-center justify-center text-accent text-xl flex-shrink-0">
                                <i class="fa-solid fa-sack-dollar"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary text-lg mb-1">أسعار تنافسية</h4>
                                <p class="text-gray-600 text-sm">نقدم أفضل جودة مقابل أفضل سعر في السوق.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-white rounded-lg shadow-sm flex items-center justify-center text-accent text-xl flex-shrink-0">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary text-lg mb-1">دعم فني مستمر</h4>
                                <p class="text-gray-600 text-sm">فريقنا جاهز للرد على استفساراتكم وتقديم الدعم في أي وقت.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 reveal delay-200">
                    <img src="{{ asset('assets/img/page-hero.webp') }}" alt="فريق العمل" class="rounded-lg shadow-xl w-full">
                </div>
            </div>
        </div>
    </section>



   <section class="py-16 bg-primary relative overflow-hidden">
        <div class="absolute inset-0 bg-accent/4 pattern-dots"></div>
        <div class="container mx-auto px-4 relative z-10 text-center reveal">
            <h2 class="text-3xl font-bold text-white mb-6">هل أعجبتك خدماتنا؟</h2>
            <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
                نحن جاهزون لتنفيذ مشروعك القادم بنفس مستوى الجودة والاحترافية.
            </p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-accent text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-primary transition-all shadow-lg">
                تواصل معنا الآن
            </a>
        </div>
    </section>
@endsection
