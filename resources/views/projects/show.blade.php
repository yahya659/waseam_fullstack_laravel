@extends('layouts.site')

@section('meta_title', $project->meta_title ?: $project->title)
@section('meta_description', $project->meta_description ?: Str::limit(strip_tags($project->description ?? ''), 160))
@section('meta_keywords', $project->title)


@section('content')



 <!-- Page Hero -->
    <section class="relative h-[40vh] min-h-[300px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/img/page-hero.webp') }}" alt="المدونة" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-primary/80 mix-blend-multiply"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center pt-20">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 animate-fade-in-up text-accent">{{ $project->title }}</h1>
            <nav
                class="flex justify-center items-center gap-2 text-sm md:text-base text-gray-300 animate-fade-in-up animation-delay-200">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">الرئيسية</a>
                <span >/</span>
                <a href="{{ route('projects.index') }}" class="hover:text-white transition-colors">أعمالنا</a>
                <span >/</span>
                <span class="text-accent/4 transition-colors py-1 relative  after:absolute after:bottom-0 after:right-0 after:w-full after:h-0.5 after:bg-accent after:transition-all">{{ $project->title }} </span>
            </nav>
        </div>
    </section>




<section class="py-20 bg-white">
    <div class="container mx-auto px-4">

        @if($project->main_image)
        <div class="mb-12 reveal">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl h-[400px] lg:h-[500px] group">
                <img src="{{ asset('storage/' . $project->main_image) }}"
                     alt="{{ $project->title }}"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                <div class="absolute bottom-0 right-0 w-full bg-gradient-to-t from-black/80 to-transparent p-8">
                    <h1 class="text-3xl lg:text-4xl font-bold text-accent">{{ $project->title }}</h1>
                </div>
            </div>
        </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-12">

            <div class="w-full lg:w-1/3 order-2 lg:order-1 reveal">
                <div class="sticky top-8 space-y-8">
                <div class="bg-gray-50 p-8 rounded-xl border border-gray-100 shadow-sm  top-8">
                    <h3 class="text-xl font-bold text-primary mb-6 relative after:content-[''] after:absolute after:-bottom-2 after:right-0 after:w-12 after:h-1 after:bg-accent">
                        بطاقة المشروع
                    </h3>

                    <ul class="space-y-6">
                        {{-- العميل --}}
                        <li class="flex justify-between border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                            <span class="font-bold text-gray-700">العميل:</span>
                            <span class="text-gray-500">{{ $project->client ?? 'عميل خاص' }}</span>
                        </li>

                        {{-- الموقع --}}
                        @if($project->location)
                        <li class="flex justify-between border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                            <span class="font-bold text-gray-700">الموقع:</span>
                            <span class="text-gray-500">{{ $project->location }}</span>
                        </li>
                        @endif

                        {{-- النطاق --}}
                        @if($project->scope)
                        <li class="flex justify-between border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                            <span class="font-bold text-gray-700">النطاق:</span>
                            <span class="text-gray-500">{{ $project->scope }}</span>
                        </li>
                        @endif
                         @if($project->duration)
                        <li class="flex justify-between border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                            <span class="font-bold text-gray-700">المدة الزمنية:</span>
                            <span class="text-gray-500">{{ $project->duration }}</span>
                        </li>
                        @endif


                        {{-- السنة --}}
                        <li class="flex justify-between border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                            <span class="font-bold text-gray-700">تاريخ النشر :</span>
                            <span class="text-gray-500">{{ $project->created_at->format('Y') }}</span>
                        </li>
                    </ul>


                </div>
                 <div class="mt-8  bg-primary text-white p-8 rounded-xl shadow-lg reveal delay-100">
                        <h3 class="text-xl font-bold mb-4">هل لديك مشروع مماثل؟</h3>
                        <p class="text-gray-300 mb-6 text-sm">تواصل معنا اليوم للحصول على استشارة مجانية لمشروعك.</p>
                        <a href="{{ route('contact') }}" class="block text-center bg-accent text-white py-3 rounded-lg font-bold hover:bg-white hover:text-primary transition-colors">اطلب عرض سعر</a>
                    </div>
                    </div>
            </div>

            <div class="w-full lg:w-2/3 order-1 lg:order-2 reveal delay-100">

                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-primary mb-6">تفاصيل المشروع</h2>
                    <div class="prose max-w-none text-gray-600 leading-relaxed text-lg text-justify">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </div>

                <hr class="border-gray-200 my-10">

                @if($projectImages && $projectImages->count() > 0)
                <div id="gallery-section">
                    <h3 class="text-2xl font-bold text-primary mb-6 flex items-center gap-2">
                        معرض الصور
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                        @foreach($projectImages as $image)
                        <div class="gallery-item group relative h-64 rounded-xl overflow-hidden shadow-md cursor-zoom-in">
                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                 alt="{{ $image->title }} - صورة {{ $loop->iteration }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass-plus text-white text-3xl"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-8 flex justify-center">

                        {{ $projectImages->links('partials.pagination') }}

                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>
{{--
<div id="lightbox" class="fixed inset-0 z-[9999] bg-black/95 hidden opacity-0 transition-opacity duration-300 flex items-center justify-center">
    <div class="absolute top-6 right-6 flex items-center gap-4 z-50">
        <button id="lightbox-zoom" class="text-white text-2xl hover:text-accent transition-colors focus:outline-none" title="تكبير/تصغير">
            <i class="fa-solid fa-magnifying-glass-plus"></i>
        </button>
        <button id="lightbox-close" class="text-white text-4xl hover:text-accent transition-colors focus:outline-none" title="إغلاق">
            <i class="fa-solid fa-times"></i>
        </button>
    </div>

    <button id="lightbox-prev" class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-accent transition-colors p-4 focus:outline-none bg-black/20 hover:bg-black/40 rounded-full w-12 h-12 flex items-center justify-center z-10">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <button id="lightbox-next" class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-accent transition-colors p-4 focus:outline-none bg-black/20 hover:bg-black/40 rounded-full w-12 h-12 flex items-center justify-center z-10">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

    <div class="relative max-h-[90vh] max-w-[90vw] overflow-hidden flex flex-col items-center">
        <img id="lightbox-img" src="" alt="Full size" class="max-h-[85vh] max-w-full object-contain transform scale-95 transition-transform duration-500 select-none cursor-grab">
        <p id="lightbox-caption" class="text-white text-center mt-4 text-lg font-medium opacity-0 transition-opacity duration-300 transform translate-y-2"></p>
    </div>
</div> --}}

@endsection

{{-- @push('scripts')
<script>
    // 6. كود الجافا سكريبت الخاص بك (نسخ لصق)
    // Lightbox Logic
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxClose = document.getElementById('lightbox-close');
    const lightboxNext = document.getElementById('lightbox-next');
    const lightboxPrev = document.getElementById('lightbox-prev');
    const lightboxZoom = document.getElementById('lightbox-zoom');

    // Dynamic Image List
    let currentImages = [];
    let currentImageIndex = 0;
    let isZoomed = false;

    function updateCurrentImages() {
        // قمت بإضافة .gallery-item img في التصميم أعلاه ليتوافق مع هذا السطر
        const allCandidates = Array.from(document.querySelectorAll('.gallery-item img, .portfolio-item img, .lightbox-trigger img'));

        currentImages = allCandidates.filter(img => {
            const parent = img.closest('.gallery-item, .portfolio-item');
            if (parent && parent.classList.contains('hidden')) {
                return false;
            }
            return true;
        });
    }

    function openLightbox(imgElement) {
        updateCurrentImages();
        const index = currentImages.indexOf(imgElement);
        if (index === -1) return;

        currentImageIndex = index;
        updateLightboxImage();

        lightbox.classList.remove('hidden');
        isZoomed = false;
        if (lightboxZoom) lightboxZoom.innerHTML = '<i class="fa-solid fa-magnifying-glass-plus"></i>';
        if (lightboxImg) {
            lightboxImg.style.transform = '';
            lightboxImg.classList.remove('scale-[2]');
            lightboxImg.classList.add('cursor-grab');
            lightboxImg.classList.remove('cursor-grabbing');
        }

        setTimeout(() => {
            lightbox.classList.remove('opacity-0');
            if (lightboxImg) {
                lightboxImg.classList.remove('scale-95');
                lightboxImg.classList.add('scale-100');
            }
            if (lightboxCaption) {
                lightboxCaption.classList.remove('opacity-0', 'translate-y-2');
            }
        }, 10);
        document.body.classList.add('overflow-hidden');
    }

    function updateLightboxImage() {
        if (!lightboxImg || currentImages.length === 0) return;
        const img = currentImages[currentImageIndex];
        lightboxImg.src = img.src;
        lightboxImg.alt = img.alt;
        if (lightboxCaption) {
            lightboxCaption.textContent = img.alt || 'صورة';
        }
    }

    function toggleZoom() {
        if (!lightboxImg) return;
        isZoomed = !isZoomed;
        if (isZoomed) {
            lightboxImg.classList.add('scale-[2]');
            lightboxImg.classList.remove('cursor-grab');
            lightboxImg.classList.add('cursor-grabbing');
            if (lightboxZoom) lightboxZoom.innerHTML = '<i class="fa-solid fa-magnifying-glass-minus"></i>';
        } else {
            lightboxImg.classList.remove('scale-[2]');
            lightboxImg.classList.add('cursor-grab');
            lightboxImg.classList.remove('cursor-grabbing');
            if (lightboxZoom) lightboxZoom.innerHTML = '<i class="fa-solid fa-magnifying-glass-plus"></i>';
            lightboxImg.style.transform = '';
        }
    }

    function closeLightbox() {
        if (!lightbox) return;
        lightbox.classList.add('opacity-0');
        if (lightboxImg) {
            lightboxImg.classList.remove('scale-100');
            lightboxImg.classList.add('scale-95');
        }
        if (lightboxCaption) {
            lightboxCaption.classList.add('opacity-0', 'translate-y-2');
        }
        setTimeout(() => {
            lightbox.classList.add('hidden');
            if (lightboxImg) lightboxImg.src = '';
        }, 300);
        document.body.classList.remove('overflow-hidden');
    }

    function nextImage() {
        if (currentImages.length === 0) return;
        currentImageIndex = (currentImageIndex + 1) % currentImages.length;
        lightboxImg.style.opacity = '0';
        if (lightboxCaption) lightboxCaption.style.opacity = '0';
        setTimeout(() => {
            updateLightboxImage();
            lightboxImg.style.opacity = '1';
            if (lightboxCaption) lightboxCaption.style.opacity = '1';
            isZoomed = false;
            lightboxImg.classList.remove('scale-[2]');
            if (lightboxZoom) lightboxZoom.innerHTML = '<i class="fa-solid fa-magnifying-glass-plus"></i>';
        }, 200);
    }

    function prevImage() {
        if (currentImages.length === 0) return;
        currentImageIndex = (currentImageIndex - 1 + currentImages.length) % currentImages.length;
        lightboxImg.style.opacity = '0';
        if (lightboxCaption) lightboxCaption.style.opacity = '0';
        setTimeout(() => {
            updateLightboxImage();
            lightboxImg.style.opacity = '1';
            if (lightboxCaption) lightboxCaption.style.opacity = '1';
            isZoomed = false;
            lightboxImg.classList.remove('scale-[2]');
            if (lightboxZoom) lightboxZoom.innerHTML = '<i class="fa-solid fa-magnifying-glass-plus"></i>';
        }, 200);
    }

    function initLightboxTriggers() {
        const triggers = document.querySelectorAll('.gallery-item img, .portfolio-item img, .lightbox-trigger img');
        triggers.forEach(img => {
            img.style.cursor = 'zoom-in';
            img.onclick = (e) => {
                e.stopPropagation();
                openLightbox(img);
            };
            const parent = img.closest('.gallery-item, .portfolio-item');
            if (parent && !parent.querySelector('a')) {
                parent.onclick = (e) => {
                    if (e.target.tagName !== 'A') {
                        openLightbox(img);
                    }
                };
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        initLightboxTriggers();
    });
    initLightboxTriggers();

    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    if (lightboxNext) lightboxNext.addEventListener('click', (e) => { e.stopPropagation(); nextImage(); });
    if (lightboxPrev) lightboxPrev.addEventListener('click', (e) => { e.stopPropagation(); prevImage(); });
    if (lightboxZoom) lightboxZoom.addEventListener('click', (e) => { e.stopPropagation(); toggleZoom(); });
    if (lightboxImg) lightboxImg.addEventListener('click', (e) => { e.stopPropagation(); toggleZoom(); });
    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    }
    document.addEventListener('keydown', (e) => {
        if (!lightbox || lightbox.classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft') prevImage();
    });
</script>
@endpush --}}
