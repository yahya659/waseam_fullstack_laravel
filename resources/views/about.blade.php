@extends('layouts.site')
@section('title', ' من نحن')

@section('meta_description', $settings['site_description'] ?? null)
@section('meta_keywords',
    collect([$settings['site_name'] ?? null, 'من نحن', 'مؤسسة صاحب الوسام', 'خدماتنا', 'مشاريعنا'])->filter()->implode(',
    '))



@section('content')
    <!-- Header -->
    <!-- Page Hero -->
    <section class="relative h-[40vh] min-h-[300px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/img/page-hero.webp') }}" alt="من نـحـن" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-primary/80 mix-blend-multiply"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center pt-20">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 animate-fade-in-up text-accent">من نـحـن</h1>
            <nav
                class="flex justify-center items-center gap-2 text-sm md:text-base text-gray-300 animate-fade-in-up animation-delay-200">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">الرئيسية</a>
                <span>/</span>
                <span
                    class="text-accent/4 transition-colors py-1 relative  after:absolute after:bottom-0 after:right-0 after:w-full after:h-0.5 after:bg-accent after:transition-all">من
                    نـحـن</span>
            </nav>
        </div>
    </section>



    <!-- Detailed About Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="w-full lg:w-1/2 reveal animate-fade-in-up">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl max-w-[580px] h-[422px] ">
                        <img src="{{ asset('assets/img/about-us-alwisam.png') }}" alt="About Us"
                            class="w-full  max-w-[580px] h-[422px] ">
                        <div class="absolute inset-0 bg-primary/10"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="صورة 2" class="rounded-xl shadow-lg h-48 object-cover w-full">
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="صورة 3" class="rounded-xl shadow-lg h-48 object-cover w-full">
                    </div>
                </div>
                <div class="w-full lg:w-1/2 reveal animate-fade-in-up">
                    <div class="flex items-center gap-2 mb-7 text-3xl">
                        <div class="w-12 h-1 bg-accent rounded-full"></div>
                        <span class="text-accent font-bold uppercase tracking-wider"> من نحن- ABOUT US</span>
                    </div>
                    {{-- <h2 class="text-3xl md:text-4xl font-bold text-primary mb-6">تاريخ حافل بالنجاح والتميز</h2> --}}
                    <p class="text-gray-600 leading-relaxed mb-6 text-2xl">

                        تأسسـت <span class="text-accent font-bold">مؤسسـة صاحب الوسـام</span> في مكة المكرمة بتاريخ <span
                            dir="rtl">1445/12/04 </span>
                        نـحـن متخصصون في إدارة
                        وتنفيـذ الإنشائيات. مـع ضمـان تنفيذهـا وفق أعلى معاييـر الجـودة, ومراقبـة التقـدم,
                        والالتزام بالمواعيد والميزانية لتلبية احتياجات عملائنا ودعم رؤية 2030.

                    </p>
                    <p class="text-gray-600 leading-relaxed mb-6 text-2xl" dir="ltr">

                        <span class="text-accent font-bold">Sahib Al-Wisam </span>Establishment was founded in Makkah on
                        1445/12/04 AH. We
                        specialize in managing and executing construction projects, ensuring they are
                        completed to the highest quality standards, while monitoring progress and adhering
                        to timelines and budgets to meet our clients' needs and support Vision 2030.

                    </p>
                    <div class="border-r-4 border-accent pr-6 mb-8 bg-gray-50 p-4 rounded-r-lg">
                        <p class="text-primary font-bold italic text-lg">
                            "نحن لا نبني مجرد مباني، بل نشيد صروحاً تعكس تطلعات عملائنا وتساهم في نهضة مجتمعنا."
                        </p>
                        <span class="block mt-2 text-sm text-gray-500">- المدير العام</span>
                    </div>
                </div>
            </div>
        </div>
    </section>












    <section class="py-20 bg-primary text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('assets/img/cubes.png')] opacity-10"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-center">

                <!-- Text Content (Right Side) -->
                <div class="w-full lg:w-1/2 animate-fade-in-up ">
                    <span class="text-accent text-3xl font-bold uppercase tracking-wider block mb-6">
                        الـرؤيـة - VISION
                    </span>
                    <p class="mx-auto mb-8 leading-relaxed text-2xl">
                        نسعى في <span class="text-accent  font-bold">
                            مؤسسـة صاحب الوسـام</span> للمقاولات العامة أن
                        نكون رواداً من خلال تقديم حلول مبتكرة لتنظيم وتنسيق

                        جميع الاعمال الانشائية، نركز على تنفيذ مشاريع عالية
                        الجودة تساهم في تعزيز البنية التحتية ودعم التنمية
                        المستدامة، مع تبني التقنيات الحديثة وتطوير القوى
                        العاملة المحلية لتحقيق رؤية .2030

                    </p>
                    <p class="leading-relaxed mb-6 text-lg" dir="ltr">

                        At <span class="text-accent  font-bold">Sahib Al-Wisam </span>Establishment, we strive to be
                        pioneers by providing innovative solutions for
                        organizing and coordinating all construction
                        projects. We focus on executing high-quality
                        projects that contribute to enhancing
                        infrastructure and supporting sustainable
                        development, while adopting modern
                        technologies and fostering the growth of the local
                        workforce to help achieve Vision 2030.

                    </p>

                </div>

                <!-- Image Content (Left Side) -->
                <div class="w-full lg:w-1/2 flex justify-center animate-fade-in-up ">
                    <div class="relative w-full max-w-[580px] h-[422px] rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('assets/img/vision-2030.png') }}" alt="  2030  مؤسسة صاحب الوسام"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-primary/10"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="w-full lg:w-1/2 reveal animate-fade-in-up">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl max-w-[580px] h-[422px]">
                        <img src="{{ asset('assets/img/about-us-alwisam.png') }}" alt="About Us"
                            class="w-full max-w-[580px] h-[422px] ">
                        <div class="absolute inset-0 bg-primary/10"></div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 reveal animate-fade-in-up">
                    <span class="text-accent text-3xl font-bold uppercase tracking-wider block mb-7">الـرسـالة -
                        MISSION</span>
                    {{-- <h2 class="text-3xl md:text-4xl font-bold text-primary mb-6">تاريخ حافل بالنجاح والتميز</h2> --}}
                    <p class="mx-auto mb-8 leading-relaxed text-2xl">
                        نلتزم في <span class="text-accent  font-bold">
                            مؤسسـة صاحب الوسـام</span>
                        للمقاولات العامة بتحقيق التميز في
                        تقديم خدمات البناء والتشييد.
                        ونركز على تنفيذ مشاريع مبتكرة، حيث
                        نتبنى أحدث التقنيات ونطور الكوادر
                        المحلية لتحقيق أهدافنا التنموية
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-6 text-2xl" dir="ltr">


                        At <span class="text-accent  font-bold">Sahib Al-Wisam </span> Contracting
                        Establishment, we are committed
                        to excellence in providing
                        construction services. We focus on
                        executing innovative projects by
                        adopting the latest technologies
                        and developing local talent to
                        achieve our development goals.

                    </p>

                </div>

            </div>
        </div>
    </section>






     <!-- Experience & Skills Section -->
    <section id="skills" class="py-20 bg-primary text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('assets/img/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="reveal">
                    <span class="text-accent font-bold uppercase tracking-wider block mb-2">خبراتنا</span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">
                        لماذا تختار مؤسسة صاحب الوسام؟
                    </h2>
                    <p class="text-gray-300 mb-8 leading-relaxed">
                        نمتلك سجلاً حافلاً من الإنجازات والخبرات المتراكمة التي تجعلنا
                        الخيار الأمثل لمشروعك القادم. نجمع بين الدقة الهندسية والإبداع
                        المعماري.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6 mb-8">
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center gap-2 text-accent font-bold hover:text-white transition-colors group">
                            اكتشف المزيد من مهاراتنا
                            <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Skills Progress -->
                    <div class="space-y-6">
                        @foreach ($skills as $skill)
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span class="font-bold">{{ $skill->name }}</span>
                                    <span class="text-accent">{{ $skill->percentage }}%</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2.5">
                                    <div class="progress-bar bg-accent h-2.5 rounded-full transition-all duration-1000 ease-out"
                                        style="width: {{ trim($skill->percentage) }}%" data-width="95"></div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 reveal counter-container">
                    <div
                        class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 text-center hover:bg-white/20 transition-colors">
                        <i class="fa-solid fa-diagram-project text-4xl text-accent mb-4"></i>
                        <div class="text-4xl font-bold mb-2 counter" data-goal="{{ $totalprojects }}" data-suffix="+">
                            {{ $totalprojects }}
                        </div>
                        <div class="text-gray-300">مشروع مكتمل</div>
                    </div>
                    <div
                        class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 text-center hover:bg-white/20 transition-colors">
                        <i class="fa-solid fa-users text-4xl text-accent mb-4"></i>
                        <div class="text-4xl font-bold mb-2 counter" data-goal="45" data-suffix="+">
                            0
                        </div>
                        <div class="text-gray-300">مهندس وفني</div>
                    </div>
                    <div
                        class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 text-center hover:bg-white/20 transition-colors">
                        <i class="fa-solid fa-award text-4xl text-accent mb-4"></i>
                        <div class="text-4xl font-bold mb-2 counter" data-goal="12">
                            0
                        </div>
                        <div class="text-gray-300">جائزة وشهادة</div>
                    </div>
                    <div
                        class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 text-center hover:bg-white/20 transition-colors">
                        <i class="fa-solid fa-smile text-4xl text-accent mb-4"></i>
                        <div class="text-4xl font-bold mb-2 counter" data-goal="100" data-suffix="%">
                            0
                        </div>
                        <div class="text-gray-300">رضا العملاء</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="py-20 bg-primary relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('assets/img/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">هل لديك مشروع تود تنفيذه؟</h2>
            <p class="text-gray-300 text-lg mb-10 max-w-2xl mx-auto">نحن هنا لمساعدتك في تحويل رؤيتك إلى واقع. تواصل
                معنا
                اليوم للحصول على استشارة مجانية وعرض سعر.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}"
                    class="bg-accent hover:bg-yellow-600 text-white px-8 py-4 rounded-lg font-bold transition-all shadow-lg hover:shadow-accent/50 transform hover:-translate-y-1">
                    تواصل معنا الآن
                </a>
                <a href="{{ route(name: 'services.index') }}"
                    class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/30 text-white px-8 py-4 rounded-lg font-bold transition-all hover:shadow-lg transform hover:-translate-y-1">
                    شاهد أعمالنا
                </a>
            </div>
        </div>
    </section>

@endsection
