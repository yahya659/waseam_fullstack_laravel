 <!-- Service Detail Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">

                <!-- Main Content -->
                <div class="w-full lg:w-2/3">
                    <div class="reveal">
                        @if($service->image_path)
                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-full h-96 object-cover rounded-xl shadow-lg mb-8">
                    @endif
                            @if($service->title)
                        <h2 class="text-3xl font-bold text-primary mb-6">{{ $service->title }}</h2>
                        @endif
                        
                        <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        {!! nl2br(e($service->description)) !!}                        </p>
                        <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                            يعمل فريقنا من المهندسين والخبراء بشكل وثيق مع العملاء لفهم احتياجاتهم وتحويل رؤيتهم إلى واقع ملموس، مع الالتزام بالمواعيد النهائية والميزانيات المحددة.
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
                                <p class="text-gray-600 text-sm">البدء في أعمال التنفيذ وفقاً للمواصفات والمعايير المعتمدة.</p>
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
                        <h3 class="text-xl font-bold text-primary mb-4 relative after:content-[''] after:absolute after:-bottom-2 after:right-0 after:w-12 after:h-1 after:bg-accent">خدمات أخرى</h3>
                        <ul class="space-y-2">
                            <li><a href="service-detail.html" class="block bg-white hover:bg-accent hover:text-white px-4 py-3 rounded-lg shadow-sm transition-all font-medium text-accent border-r-4 border-accent">المقاولات العامة</a></li>
                            <li><a href="service-detail.html" class="block bg-white hover:bg-accent hover:text-white text-gray-600 px-4 py-3 rounded-lg shadow-sm transition-all font-medium">التصميم الهندسي</a></li>
                            <li><a href="service-detail.html" class="block bg-white hover:bg-accent hover:text-white text-gray-600 px-4 py-3 rounded-lg shadow-sm transition-all font-medium">التشطيبات والديكور</a></li>
                            <li><a href="service-detail.html" class="block bg-white hover:bg-accent hover:text-white text-gray-600 px-4 py-3 rounded-lg shadow-sm transition-all font-medium">الترميم والصيانة</a></li>
                            <li><a href="service-detail.html" class="block bg-white hover:bg-accent hover:text-white text-gray-600 px-4 py-3 rounded-lg shadow-sm transition-all font-medium">إدارة المشاريع</a></li>
                            <li><a href="service-detail.html" class="block bg-white hover:bg-accent hover:text-white text-gray-600 px-4 py-3 rounded-lg shadow-sm transition-all font-medium">الأعمال الكهروميكانيكية</a></li>
                        </ul>
                    </div>

                    <!-- Contact Widget -->
                    <div class="bg-primary text-white p-8 rounded-xl shadow-lg relative overflow-hidden reveal delay-200">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-accent opacity-10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2"></div>
                        <h3 class="text-xl font-bold mb-4">هل تحتاج مساعدة؟</h3>
                        <p class="text-gray-300 mb-6 text-sm">تواصل معنا الآن لمناقشة مشروعك والحصول على استشارة مجانية.</p>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-accent"><i class="fa-solid fa-phone"></i></div>
                                <span dir="ltr">+966 50 000 0000</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-accent"><i class="fa-solid fa-envelope"></i></div>
                                <span>info@alwisam.com</span>
                            </li>
                        </ul>
                        <a href="contact.html" class="block text-center bg-white text-primary py-3 rounded-lg font-bold hover:bg-accent hover:text-white transition-colors">اتصل بنا</a>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <x-section-header title="تواصل معنا" subtitle="نحن هنا للإجابة على استفساراتكم ومناقشة مشاريعكم" />
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div data-aos="fade-left">
                <h3 class="text-2xl font-bold text-primary mb-6">معلومات الاتصال</h3>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div
                            class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary ml-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">العنوان</h4>
                            <p class="text-gray-600">{{ $settings['address'] ?? 'المملكة العربية السعودية' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary ml-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">الهاتف</h4>
                            <p class="text-gray-600" dir="ltr">{{ $settings['phone'] ?? '+966 50 123 4567' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary ml-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">البريد الإلكتروني</h4>
                            <p class="text-gray-600">{{ $settings['email'] ?? 'info@example.com' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary ml-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">ساعات العمل</h4>
                            <p class="text-gray-600">{{ $settings['working_hours'] ?? 'الأحد - الخميس: 8:00 ص - 5:00 م' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Map Placeholder -->
                <div
                    class="mt-8 bg-gray-200 rounded-lg h-64 w-full flex items-center justify-center text-gray-500 overflow-hidden shadow-md">
                    <iframe src="" width="100%" height="100%" style="border:0;" allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-right">
                <h3 class="text-2xl font-bold text-primary mb-6">أرسل لنا رسالة</h3>
                <div id="contact-alert" class="hidden mb-4 p-4 rounded text-sm"></div>
                <form class="space-y-6" id="contact-form">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم
                                الكامل</label>
                            <input type="text" id="name"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-accent focus:ring-1 focus:ring-accent outline-none transition-all"
                                placeholder="أدخل اسمك">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد
                                الإلكتروني</label>
                            <input type="email" id="email"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-accent focus:ring-1 focus:ring-accent outline-none transition-all"
                                placeholder="أدخل بريدك الإلكتروني">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم
                                الهاتف</label>
                            <input type="tel" id="phone"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-accent focus:ring-1 focus:ring-accent outline-none transition-all"
                                placeholder="أدخل رقم هاتفك">
                        </div>
                        <div>

                            <label for="subject" class="block text-gray-700 font-bold mb-2">الموضوع</label>
                            <select id="subject" name="subject"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-secondary "
                                required>
                                <option value="" class="text-center">اختر الموضوع</option>
                                <option value="استشارة">استشارة</option>
                                <option value="عرض سعر">عرض سعر</option>
                                <option value="دعم">دعم</option>
                                <option value="أخرى">أخرى</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">الرسالة</label>
                        <textarea id="message" rows="5"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-accent focus:ring-1 focus:ring-accent outline-none transition-all"
                            placeholder="اكتب رسالتك هنا..."></textarea>
                    </div>
                    <button type="submit" id="submit-btn"
                        class="w-full bg-accent text-white px-8 py-3 rounded-lg font-bold hover:bg-primary transition-all shadow-lg">
                        إرسال الرسالة
                    </button>
                </form>
                <script>
                    const form = document.getElementById('contact-form');
                    const submitBtn = document.getElementById('submit-btn');
                    const alertBox = document.getElementById('contact-alert');
                    const emailInput = document.getElementById('email');
                    const nameInput = document.getElementById('name');
                    const subjectSelect = document.getElementById('subject');
                    const messageInput = document.getElementById('message');
                    const charCount = document.getElementById('char-count');

                    function showAlert(text, type) {
                        alertBox.textContent = text;
                        alertBox.className = 'mb-4 p-4 rounded text-sm ' + (type === 'success' ? 'bg-green-100 text-green-700' :
                            'bg-red-100 text-red-700');
                        alertBox.classList.remove('hidden');
                    }

                    function hideAlert() {
                        alertBox.classList.add('hidden');
                    }

                    function validEmail(v) {
                        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
                    }
                    messageInput.addEventListener('input', function() {
                        charCount.textContent = this.value.length;
                    });
                    form.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        hideAlert();
                        const name = nameInput.value.trim();
                        const email = emailInput.value.trim();
                        const subject = subjectSelect.value.trim();
                        const message = messageInput.value.trim();
                        if (!name || !email || !subject || !message) {
                            showAlert('يرجى ملء جميع الحقول المطلوبة', 'error');
                            return;
                        }
                        if (!validEmail(email)) {
                            showAlert('صيغة البريد الإلكتروني غير صحيحة', 'error');
                            return;
                        }
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'جاري الإرسال...';
                        try {
                            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            const res = await fetch('{{ route('contact.submit') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({
                                    name,
                                    email,
                                    subject,
                                    message,
                                    phone: document.getElementById('phone').value
                                })
                            });
                            const data = await res.json();
                            if (res.ok && data.status === 'ok') {
                                showAlert('تم إرسال رسالتك بنجاح', 'success');
                                form.reset();
                                charCount.textContent = '0';
                            } else {
                                showAlert('تعذر إرسال الرسالة، حاول لاحقاً', 'error');
                            }
                        } catch (err) {
                            showAlert('حدث خطأ غير متوقع', 'error');
                            console.error(err);
                        } finally {
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'إرسال';
                        }
                    });
                </script>
            </div>
        </div>
    </div>
