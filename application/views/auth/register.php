<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bitlytic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0f172a; }
        .bg-sunset { background: linear-gradient(135deg, #6d28d9 0%, #a855f7 100%); }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-slate-200">
            <div class="bg-sunset p-10 text-center text-white">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <h2 class="text-2xl font-extrabold tracking-tight">Bitlytic Login</h2>
                <p class="text-violet-100 text-sm opacity-80 mt-1 uppercase tracking-widest font-bold">Admin Access</p>
            </div>
            
           <form action="<?= base_url('auth/register_process') ?>" method="POST" class="p-10 space-y-4">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" required class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-4 focus:ring-violet-100 focus:border-violet-500 outline-none transition-all font-semibold" placeholder="Nama Lengkap">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Username</label>
                        <input type="text" name="username" required class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-4 focus:ring-violet-100 focus:border-violet-500 outline-none transition-all font-semibold" placeholder="Username">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Email</label>
                        <input type="email" name="email" required class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-4 focus:ring-violet-100 focus:border-violet-500 outline-none transition-all font-semibold" placeholder="Email">
                    </div>
                </div>
                
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Password</label>
                    <input type="password" name="password" required class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-4 focus:ring-violet-100 focus:border-violet-500 outline-none transition-all font-semibold" placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-violet-600 hover:bg-violet-700 text-white py-4 rounded-2xl font-extrabold shadow-lg shadow-violet-200 transition-all hover:scale-[1.02] active:scale-95 mt-4">
                    Daftar Akun Gratis
                </button>

                <p class="text-center text-sm text-slate-500 font-medium pt-2">
                    Sudah punya akun? <a href="<?= base_url('auth') ?>" class="text-violet-600 font-bold hover:underline">Login</a>
                </p>
            </form>
        </div>
        <p class="text-center text-slate-500 mt-8 text-sm font-medium">© 2026 Bitlytic • Sunset Edition</p>
    </div>
</body>
</html>