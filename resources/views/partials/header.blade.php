  <!-- Header -->
  <header id="header"
      class="fixed w-full top-0 z-50 transition-all duration-300 bg-white/90 backdrop-blur-md shadow-sm">
      <div class="container mx-auto px-4 py-3 flex justify-between items-center">
          <!-- Logo -->
          <a href="{{ route('home') }}" class="flex items-center gap-3 group">
              <img src="{{ isset($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('logo-wisam.PNG') }}"
                  alt="{{ $settings['site_name'] ?? 'مؤسسة صاحب الوسام' }}" alt="شعار مؤسسة صاحب الوسام"
                  class="h-12 md:h-16 object-contain group-hover:scale-105 transition-transform duration-300">
              <div class="hidden md:block">
                  <h1 class="text-primary font-bold text-lg leading-tight">مؤسسة صاحب الوسام</h1>
                  <p class="text-xs text-gray-500">للمقاولات العامة والهندسة</p>
              </div>
          </a>

          <!-- Desktop Nav -->
          <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
              <a href="{{ route('home') }}"
                  class="text-primary font-medium hover:text-accent transition-colors py-2 relative after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-full after:h-0.5 after:bg-accent after:transition-all">الرئيسية</a>
              <a href="{{ route('about') }}"
                  class="text-gray-600 font-medium hover:text-primary transition-colors py-2 relative after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-0 after:h-0.5 after:bg-accent after:transition-all hover:after:w-full">من
                  نحن</a>
              {{-- <a href="vision.html"
                  class="text-gray-600 font-medium hover:text-primary transition-colors py-2 relative after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-0 after:h-0.5 after:bg-accent after:transition-all hover:after:w-full">الرؤية
                  والرسالة</a> --}}
              <a href="{{ route('services.index') }}"
                  class="text-gray-600 font-medium hover:text-primary transition-colors py-2 relative after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-0 after:h-0.5 after:bg-accent after:transition-all hover:after:w-full">خدماتنا</a>
              <a href="{{ route('projects.index') }}"
                  class="text-gray-600 font-medium hover:text-primary transition-colors py-2 relative after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-0 after:h-0.5 after:bg-accent after:transition-all hover:after:w-full">أعمالنا</a>
              <a href="{{ route('home') }}#testimonials"
                  class="text-gray-600 font-medium hover:text-primary transition-colors py-2 relative after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-0 after:h-0.5 after:bg-accent after:transition-all hover:after:w-full">آراء
                  العملاء</a>
              <a href="{{ route('blog.index') }}"
                  class="text-gray-600 font-medium hover:text-primary transition-colors py-2 relative after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-0 after:h-0.5 after:bg-accent after:transition-all hover:after:w-full">المقالات</a>
              <a href="{{ route('contact') }}"
                  class="bg-primary text-white px-6 py-2.5 rounded-full font-bold hover:bg-opacity-90 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">تواصل
                  معنا</a>
          </nav>

          <!-- Mobile Menu Button -->
          <button id="mobile-menu-btn" class="lg:hidden text-primary text-2xl focus:outline-none">
              <i class="fa-solid fa-bars"></i>
          </button>
      </div>

      <!-- Mobile Menu Overlay -->
      <div id="mobile-menu"
          class="fixed inset-0 bg-primary/90 z-50 transform -translate-x-full transition-transform duration-300 lg:hidden flex flex-col pt-24 ">

          <!-- Close Button -->
          <button id="close-menu-btn"
              class="absolute top-6 left-6 text-white text-3xl hover:text-accent transition-colors">
              <i class="fa-solid fa-times"></i>
          </button>

          <nav class="flex flex-col items-center gap-6 bg-primary/90 pb-1">
              <a href="{{ route('home') }}"
                  class="mobile-link text-accent text-xl font-bold hover:text-white transition-colors">
                  الرئيسية
              </a>

              <a href="{{ route('about') }}"
                  class="mobile-link text-white text-xl font-bold hover:text-accent transition-colors">
                  من نحن
              </a>

              <a href="{{ route('services.index') }}"
                  class="mobile-link text-white text-xl font-bold hover:text-accent transition-colors">
                  خدماتنا
              </a>

              <a href="{{ route('projects.index') }}"
                  class="mobile-link text-white text-xl font-bold hover:text-accent transition-colors">
                  أعمالنا
              </a>

              <a href="{{ route('blog.index') }}"
                  class="mobile-link text-white text-xl font-bold hover:text-accent transition-colors">
                  المقالات
              </a>

              <a href="{{ route('contact') }}"
                  class="mobile-link bg-white text-primary px-8 py-3 rounded-full font-bold hover:bg-secondary transition-all mt-4 mb-2">
                  تواصل معنا
              </a>
          </nav>
      </div>


  </header>
