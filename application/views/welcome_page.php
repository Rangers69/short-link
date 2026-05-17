<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 28 28' fill='none'><g transform='rotate(3 12 12)'><rect width='32' height='26' rx='6' fill='%237c3aed'/><path d='M17 7h8m0 0v8m0-8l-8 8-4-4-6 6' stroke='white' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'/></g></svg>"> -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 28' fill='none'><g transform='rotate(3 12 12)'><rect width='25' height='25' rx='6' fill='%237c3aed'/><path d='M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' stroke='white' stroke-width='2.8' stroke-linecap='round' stroke-linejoin='round'/></g></svg>">
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
        @keyframes bounce-short {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }
        .animate-bounce-short {
            animation: bounce-short 0.5s ease-in-out;
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

            <?php if($this->session->flashdata('error')): ?>
                <div id="errorAlert" class="max-w-2xl mx-auto mb-6 animate-bounce-short">
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-2xl shadow-sm flex items-center gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex-1 text-left">
                            <p class="text-xs font-bold text-red-800 uppercase tracking-wider">Terjadi Kesalahan</p>
                            <p class="text-sm text-red-600 font-medium"><?php echo $this->session->flashdata('error'); ?></p>
                        </div>

                        <button onclick="document.getElementById('errorAlert').style.display='none'" class="text-red-400 hover:text-red-600 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            
            <form action="<?php echo base_url('link/createPublic')?>" method="post">
                <div class="bg-white p-3 rounded-3xl shadow-2xl max-w-2xl mx-auto flex flex-col md:flex-row gap-3 border-4 border-violet-400/30">
                    <input type="text" placeholder="Masukkan link panjangmu..." name="link" class="flex-1 px-6 py-4 text-slate-800 focus:outline-none text-lg font-medium bg-transparent">
                    <button class="bg-violet-600 text-white px-10 py-4 rounded-2xl font-black text-lg hover:bg-violet-700 transition shadow-xl shadow-violet-300">
                        Sikat!
                    </button>
                </div>
            </form>
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

<?php if($this->session->flashdata('short_result')): ?>
<div id="resultModal" class="fixed inset-0 z-[60] flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="relative w-full max-w-md mx-auto z-[70]">
        <div class="bg-white rounded-3xl shadow-2xl p-8 text-center relative border-4 border-violet-100">
            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Link Berhasil Dipotong!</h3>
            <p class="text-slate-500 mb-6">Sekarang kamu bisa membagikan link ini ke teman-temanmu.</p>
            
            <div class="flex items-center gap-2 bg-slate-50 p-2 rounded-2xl border border-slate-200 mb-6">
                <input type="text" readonly value="<?php echo $this->session->flashdata('short_result'); ?>" id="shortlinkInput" class="flex-1 bg-transparent px-4 font-bold text-violet-600 focus:outline-none">
                <button onclick="copyToClipboard()" class="bg-violet-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-violet-700 transition">Salin</button>
            </div>

            <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 font-medium transition">Tutup Halaman</button>
        </div>
    </div>
</div>

<script>
    function copyToClipboard() {
        var copyText = document.getElementById("shortlinkInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // Untuk mobile
        navigator.clipboard.writeText(copyText.value);
        
        // Ganti teks tombol sementara
        event.target.innerText = "Tersalin!";
        setTimeout(() => { event.target.innerText = "Salin"; }, 2000);
    }

    function closeModal() {
        document.getElementById("resultModal").classList.add("hidden");
    }
</script>
<?php endif; ?>