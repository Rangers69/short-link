<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitlytic - Smart Link Shortener & Analytics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        .bg-sunset {
            background: linear-gradient(135deg, #6d28d9 0%, #a855f7 50%, #f59e0b 100%);
        }
        .text-gradient {
            background: linear-gradient(to right, #f59e0b, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* Efek transparan pada navbar */
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-slate-50">

    <nav class="glass-nav shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-violet-600 rounded-xl flex items-center justify-center rotate-3 shadow-lg shadow-violet-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-extrabold text-slate-900 tracking-tight">Bit<span class="text-violet-600">lytic</span></span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#fitur" class="text-slate-600 hover:text-violet-600 font-medium transition">Fitur</a>
                    <a href="<?php echo base_url('auth/login'); ?>" class="text-slate-600 font-semibold hover:text-violet-600">Masuk</a>
                    <a href="<?php echo base_url('auth/register'); ?>" class="bg-amber-400 text-amber-950 px-6 py-3 rounded-2xl font-bold hover:bg-amber-500 transition shadow-lg shadow-amber-200 hover:-translate-y-1 transform">Mulai Gratis</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-sunset text-white pt-24 pb-48 px-4 relative">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <span class="inline-block py-2 px-4 rounded-full bg-white/20 text-white text-sm font-bold mb-6 backdrop-blur-sm">
                🚀 Analytics Link Tercanggih
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold mb-8 leading-tight tracking-tight">
                Pendekkan Link, <br><span class="text-gradient">Perluas Insight.</span>
            </h1>
            <p class="text-xl text-violet-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                Bitlytic memberikan data presisi tentang siapa, kapan, dan di mana link kamu diklik dengan tampilan visual yang memukau.
            </p>
            
            <div class="bg-white p-3 rounded-3xl shadow-2xl max-w-2xl mx-auto flex flex-col md:flex-row gap-3 border-4 border-violet-400/30">
                <input type="text" placeholder="Masukkan link panjangmu..." class="flex-1 px-6 py-4 text-slate-800 focus:outline-none text-lg font-medium bg-transparent">
                <button class="bg-violet-600 text-white px-10 py-4 rounded-2xl font-black text-lg hover:bg-violet-700 transition shadow-xl shadow-violet-300">
                    Sikat!
                </button>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 relative z-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 -mt-28">
            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-slate-100 text-center hover:translate-y-[-8px] transition duration-300">
                <div class="text-4xl mb-3 text-violet-600">📊</div>
                <div class="text-xl md:text-2xl font-bold text-slate-900">Real-time</div>
                <div class="text-slate-500 text-sm">Data masuk seketika</div>
            </div>
            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-slate-100 text-center hover:translate-y-[-8px] transition duration-300">
                <div class="text-4xl mb-3 text-amber-500">🌍</div>
                <div class="text-xl md:text-2xl font-bold text-slate-900">Global</div>
                <div class="text-slate-500 text-sm">Lacak negara visitor</div>
            </div>
            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-slate-100 text-center hover:translate-y-[-8px] transition duration-300">
                <div class="text-4xl mb-3 text-violet-600">⚡</div>
                <div class="text-xl md:text-2xl font-bold text-slate-900">Custom</div>
                <div class="text-slate-500 text-sm">Nama link sesukamu</div>
            </div>
            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-slate-100 text-center hover:translate-y-[-8px] transition duration-300">
                <div class="text-4xl mb-3 text-amber-500">📱</div>
                <div class="text-xl md:text-2xl font-bold text-slate-900">Responsive</div>
                <div class="text-slate-500 text-sm">Akses di semua device</div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Fitur Unggulan</h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-violet-600 to-amber-400 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-10">
                <div class="group p-8 rounded-3xl hover:bg-white hover:shadow-2xl transition duration-300 border border-transparent hover:border-slate-100">
                    <div class="mb-6 inline-flex w-16 h-16 bg-violet-100 text-violet-600 rounded-2xl items-center justify-center group-hover:bg-violet-600 group-hover:text-white transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Analisis Mendalam</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Pantau klik berdasarkan waktu, lokasi, hingga tipe perangkat visitor secara detail.</p>
                </div>
                <div class="group p-8 rounded-3xl hover:bg-white hover:shadow-2xl transition duration-300 border border-transparent hover:border-slate-100">
                    <div class="mb-6 inline-flex w-16 h-16 bg-amber-100 text-amber-600 rounded-2xl items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Sistem Aman</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Setiap tautan dipindai secara otomatis untuk mencegah penyalahgunaan link dari malware.</p>
                </div>
                <div class="group p-8 rounded-3xl hover:bg-white hover:shadow-2xl transition duration-300 border border-transparent hover:border-slate-100">
                    <div class="mb-6 inline-flex w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Redirect Kilat</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Pengalihan URL dioptimasi untuk kecepatan maksimal tanpa jeda yang mengganggu.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-16 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <div class="flex items-center justify-center gap-2 mb-8">
                <div class="w-8 h-8 bg-violet-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <span class="text-2xl font-extrabold text-white">Bitlytic</span>
            </div>
            <p class="mb-8 max-w-md mx-auto text-sm">Ubah cara Anda berbagi link dan mulai kumpulkan data penting hari ini.</p>
            <div class="border-t border-slate-800 pt-8 text-xs">
                &copy; 2026 Bitlytic Analytics Project. Created with ❤️.
            </div>
        </div>
    </footer>

</body>
</html>