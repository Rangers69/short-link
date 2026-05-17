<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-sunset { background: linear-gradient(135deg, #6d28d9 0%, #a855f7 100%); }
        
        @keyframes bounce-short {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }
        .animate-bounce-short {
            animation: bounce-short 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 h-20 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-violet-600 rounded-xl flex items-center justify-center shadow-lg shadow-violet-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <span class="text-xl font-bold text-slate-900 leading-none">Bitlytic <span class="block text-[10px] text-violet-600 uppercase tracking-widest font-black">User Space</span></span>
            </div>

            <div class="relative">
                <button onclick="toggleDropdown()" class="flex items-center gap-3 group focus:outline-none">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold text-slate-900 leading-none mb-1"><?= $this->session->userdata('nama'); ?></p>
                        <p class="text-[10px] font-black text-violet-600 uppercase tracking-widest leading-none">Member</p>
                    </div>
                    <div class="w-10 h-10 bg-sunset rounded-xl flex items-center justify-center text-white font-bold border-2 border-white shadow-md group-hover:scale-105 transition-all">
                        <?= substr($this->session->userdata('nama'), 0, 1); ?>
                    </div>
                </button>

                <div id="userDropdown" class="hidden absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden py-2 animate-bounce-short">
                    <a href="<?= base_url('auth/logout') ?>" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-10">
        
        <div class="mb-10">
            <?php 
                $nama = $this->session->userdata('nama');
                $firstname = explode(' ', $nama)[0];
            ?>
            <h1 class="text-3xl font-extrabold text-slate-900">Halo, <?= $firstname; ?>! 👋</h1>
            <p class="text-slate-500 mt-1">Kelola link pendekmu dan pantau performanya di sini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex items-center gap-5">
                <div class="w-14 h-14 bg-violet-100 rounded-2xl flex items-center justify-center text-violet-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Link</p>
                    <h3 class="text-2xl font-black text-slate-900"><?= isset($total_links) ? number_format($total_links) : 0; ?></h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex items-center gap-5">
                <div class="w-14 h-14 bg-amber-100 rounded-2xl flex items-center justify-center text-amber-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Klik</p>
                    <h3 class="text-2xl font-black text-slate-900"><?= isset($total_clicks) ? number_format($total_clicks) : 0; ?></h3>
                </div>
            </div>
            <div class="bg-violet-600 p-6 rounded-3xl shadow-xl shadow-violet-200 flex items-center justify-between text-white overflow-hidden relative group">
                <div class="relative z-10">
                    <p class="text-xs font-bold text-violet-200 uppercase tracking-widest">Aksi Cepat</p>
                    <a href="<?= base_url() ?>" class="mt-2 flex items-center gap-2 font-bold hover:gap-4 transition-all italic underline">
                        Buat Link Baru <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
                <svg class="w-24 h-24 absolute -right-5 -bottom-5 text-white/10 rotate-12" fill="currentColor" viewBox="0 0 24 24"><path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8 border-b border-slate-50 bg-slate-50/30">
                <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                    <span class="w-2 h-8 bg-violet-600 rounded-full"></span>
                    Koleksi Link Saya
                </h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-slate-400 text-[10px] uppercase tracking-[0.2em] border-b border-slate-50">
                            <th class="px-8 py-5 font-black">Detail Link</th>
                            <th class="px-8 py-5 font-black text-center">Klik</th>
                            <th class="px-8 py-5 font-black text-center">Status</th>
                            <th class="px-8 py-5 font-black text-right">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php if(isset($my_links) && is_array($my_links) && count($my_links) > 0): ?>
                            <?php foreach($my_links as $row): ?>
                            <tr class="group hover:bg-slate-50/80 transition-all">
                                <td class="px-8 py-6">
                                    <p class="font-bold text-slate-900"><?= $row['custom_title'] ?: 'Untitled Link'; ?></p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs font-bold text-violet-500"><?= base_url($row['short_code']); ?></span>
                                        <span class="text-xs text-slate-400 truncate max-w-[150px]"><?= $row['original_url']; ?></span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="font-black text-slate-900"><?= number_format($row['clicks']); ?></span>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase <?= $row['status'] == 'aktif' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'; ?>">
                                        <?= $row['status']; ?>
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <button onclick="copyToClipboard('<?= base_url($row['short_code']); ?>')" class="p-2 hover:bg-violet-100 text-slate-400 rounded-lg transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="px-8 py-20 text-center">
                                    <p class="text-slate-400 font-medium italic">Belum ada link yang dipendekkan.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('hidden');
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text);
            alert('Link berhasil disalin ke clipboard!');
        }

        // Tutup dropdown jika klik di luar area
        window.onclick = function(event) {
            if (!event.target.closest('.relative')) {
                const dropdown = document.getElementById('userDropdown');
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        }
    </script>
</body>
</html>