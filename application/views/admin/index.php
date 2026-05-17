<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Analytics - Bitlytic</title>
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
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 h-20 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-violet-600 rounded-xl flex items-center justify-center shadow-lg shadow-violet-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <span class="text-xl font-bold text-slate-900">Bit<span class="text-violet-600">lytic</span> Affiliate</span>
            </div>
            <button onclick="openModal()" class="bg-violet-600 text-white px-5 py-2.5 rounded-xl font-bold hover:bg-violet-700 transition flex items-center gap-2 shadow-lg shadow-violet-100">
                <span>+</span> Tambah Produk
            </button>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-10">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                <p class="text-slate-500 text-sm font-semibold mb-1 uppercase tracking-wider">Total Klik Affiliate</p>
                <h3 class="text-3xl font-extrabold text-slate-900">1,284 <span class="text-sm font-normal text-green-500">+12%</span></h3>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                <p class="text-slate-500 text-sm font-semibold mb-1 uppercase tracking-wider">Kategori Terlaris</p>
                <h3 class="text-3xl font-extrabold text-violet-600">Elektronik</h3>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                <p class="text-slate-500 text-sm font-semibold mb-1 uppercase tracking-wider">Top Device</p>
                <h3 class="text-3xl font-extrabold text-amber-500">Mobile (85%)</h3>
            </div>
        </div>

        <?php if($this->session->flashdata('success')): ?>
            <div id="alertSuccess" class="max-w-7xl mx-auto mb-6 animate-bounce-short">
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-2xl shadow-sm flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-sm text-green-700 font-bold"><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                    <button onclick="document.getElementById('alertSuccess').remove()" class="text-green-400 hover:text-green-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div id="alertError" class="max-w-7xl mx-auto mb-6 animate-bounce-short">
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-2xl shadow-sm flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <p class="text-sm text-red-700 font-bold"><?php echo $this->session->flashdata('error'); ?></p>
                    </div>
                    <button onclick="document.getElementById('alertError').remove()" class="text-red-400 hover:text-red-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <h2 class="text-xl font-extrabold text-slate-900">Performa Produk Affiliate</h2>
                <span class="px-4 py-1 bg-violet-100 text-violet-700 rounded-full text-xs font-bold uppercase">Update Real-time</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-slate-400 text-sm uppercase tracking-tighter">
                            <th class="px-6 py-4 font-bold">Produk & Kategori</th>
                            <th class="px-6 py-4 font-bold text-center">Total Klik</th>
                            <th class="px-6 py-4 font-bold">Insight Device</th>
                            <th class="px-6 py-4 font-bold">Top Referrer</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php foreach($affiliate_data as $row): ?>
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-5">
                                <p class="font-bold text-slate-900 mb-0.5"><?php echo $row['product_name']; ?></p>
                                <span class="text-xs px-2 py-0.5 bg-slate-100 text-slate-500 rounded-md"><?php echo $row['category']; ?></span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-black text-violet-600"><?php echo number_format($row['total_clicks']); ?></span>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-700 bg-amber-100 px-2 py-1 rounded-md"><?php echo $row['top_device']; ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-sm text-slate-600 font-medium">
                                <?php echo $row['top_referrer']; ?>
                            </td>
                            <td class="px-6 py-5">
                                <a href="<?php echo base_url('admin/toggle_status/'.$row['id']); ?>" 
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase transition-all hover:scale-105 <?php echo $row['status'] == 'aktif' ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-red-100 text-red-700 hover:bg-red-200'; ?>">
                                    <span class="w-1.5 h-1.5 rounded-full <?php echo $row['status'] == 'aktif' ? 'bg-green-500' : 'bg-red-500'; ?>"></span>
                                    <?php echo $row['status']; ?>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="addModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
        <div class="bg-white w-full max-w-lg rounded-3xl shadow-2xl relative z-10 overflow-hidden border border-slate-200">
            <div class="bg-sunset p-8 text-white">
                <h3 class="text-2xl font-bold">Tambah Produk Baru</h3>
                <p class="text-violet-100 text-sm">Sistem akan mendeteksi kategori secara otomatis.</p>
            </div>
            <form action="<?php echo base_url('admin/add_affiliate_action'); ?>" method="POST" class="p-8 space-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Produk Shopee</label>
                    <input type="text" name="product_name" required placeholder="Contoh: Mouse Gaming Wireless RGB" class="w-full px-5 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-violet-500 focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Link Affiliate (Shopee URL)</label>
                    <input type="url" name="affiliate_url" required placeholder="https://shope.ee/..." class="w-full px-5 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-violet-500 focus:outline-none transition">
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="flex-1 px-6 py-3 border border-slate-200 text-slate-600 rounded-xl font-bold hover:bg-slate-50 transition">Batal</button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-violet-600 text-white rounded-xl font-bold hover:bg-violet-700 shadow-lg shadow-violet-200 transition">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() { document.getElementById('addModal').classList.remove('hidden'); }
        function closeModal() { document.getElementById('addModal').classList.add('hidden'); }
    </script>
</body>
</html>