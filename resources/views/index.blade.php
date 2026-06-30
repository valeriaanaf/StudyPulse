<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyTaskManager - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .tugas-selesai { opacity: 0.6; text-decoration: line-through; text-decoration-color: #10B981; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen antialiased selection:bg-indigo-500 selection:text-white">

    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-indigo-600 text-white p-2 rounded-xl shadow-md shadow-indigo-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                </div>
                <span class="font-bold text-lg tracking-tight text-slate-900">StudyTask<span class="text-indigo-600">Manager</span></span>
            </div>
            <div class="text-sm font-medium text-slate-500" id="live-date">Memuat Tanggal...</div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-10">
        
        <div class="grid grid-cols-3 gap-6 mb-10">
            <div class="bg-white border border-slate-200/80 p-6 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Tugas</p>
                    <h4 class="text-3xl font-bold text-slate-900 mt-1" id="statTotal">0</h4>
                </div>
                <div class="bg-slate-100 text-slate-600 p-3 rounded-xl"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg></div>
            </div>
            <div class="bg-white border border-slate-200/80 p-6 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Belum Selesai</p>
                    <h4 class="text-3xl font-bold text-amber-600 mt-1" id="statBelum">0</h4>
                </div>
                <div class="bg-amber-50 text-amber-600 p-3 rounded-xl"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
            </div>
            <div class="bg-white border border-slate-200/80 p-6 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Selesai</p>
                    <h4 class="text-3xl font-bold text-emerald-600 mt-1" id="statSelesai">0</h4>
                </div>
                <div class="bg-emerald-50 text-emerald-600 p-3 rounded-xl"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm sticky top-28">
                <div class="mb-5">
                    <h2 class="text-lg font-bold text-slate-900">Buat Tugas Baru</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Masukkan detail instrumen tugas kuliah[cite: 20].</p>
                </div>
                
                <form id="formTugas" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Nama Tugas</label>
                        <input type="text" id="nama_tugas" required placeholder="Contoh: Perancangan REST API" class="w-full mt-1.5 px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Mata Kuliah</label>
                        <input type="text" id="mata_kuliah" required placeholder="Contoh: Rekayasa Web" class="w-full mt-1.5 px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Tenggat Waktu</label>
                        <input type="datetime-local" id="tenggat_waktu" required class="w-full mt-1.5 px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition-all">
                    </div>
                    <button type="submit" class="w-full mt-2 bg-indigo-600 text-white py-3 rounded-xl text-sm font-semibold shadow-md shadow-indigo-100 hover:bg-indigo-700 active:scale-[0.98] transition-all cursor-pointer">
                        Simpan ke Cloud Repository
                    </button>
                </form>
            </div>

            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center justify-between mb-2 px-1">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">Daftar Tugas Aktif</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Memantau antrean tugas yang ditarik dari basis data[cite: 19].</p>
                    </div>
                </div>

                <div id="kontainerTugas" class="space-y-3.5">
                    <div class="text-center py-12 bg-white rounded-2xl border border-slate-200 text-slate-400 text-sm">
                        Menghubungkan ke API server...
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        const API_URL = '/api/tugas';

        // Tampilkan Tanggal Hari Ini secara Realtime
        document.getElementById('live-date').innerText = new Date().toLocaleDateString('id-ID', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        });

        // 1. ENGINE READ DATA & UPDATE WIDGET STATS
        async function muatTugas() {
            try {
                const respon = await fetch(API_URL, { headers: { 'Accept': 'application/json' } });
                const hasil = await respon.json();
                const kontainer = document.getElementById('kontainerTugas');
                kontainer.innerHTML = '';

                // Hitung Statistik Dashboard Dinamis
                const total = hasil.data.length;
                const selesai = hasil.data.filter(t => t.status == 1 || t.status === true || t.status === '1'). length;
                const belum = total - selesai;

                document.getElementById('statTotal').innerText = total;
                document.getElementById('statSelesai').innerText = selesai;
                document.getElementById('statBelum').innerText = belum;

                if (total === 0) {
                    kontainer.innerHTML = `
                        <div class="text-center py-16 bg-white rounded-2xl border border-slate-200 border-dashed p-8">
                            <div class="bg-indigo-50 text-indigo-500 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            </div>
                            <p class="text-slate-900 font-semibold text-sm">Semua Tugas Beres!</p>
                            <p class="text-xs text-slate-400 mt-0.5">Tidak ada antrean tugas kuliah terdeteksi saat ini.</p>
                        </div>`;
                    return;
                }

                hasil.data.forEach(tugas => {
                    const apakahSelesai = tugas.status == 1 || tugas.status === true || tugas.status === '1';
                    
                    // Kondisi styling dinamis berdasar status 
                    const cardStyle = apakahSelesai 
                        ? 'bg-slate-100/70 border-slate-200' 
                        : 'bg-white border-slate-200 hover:shadow-md hover:border-indigo-200';
                    const textStyle = apakahSelesai ? 'tugas-selesai text-slate-400' : 'text-slate-800';
                    const badgeStyle = apakahSelesai ? 'bg-slate-200 text-slate-500' : 'bg-indigo-50 text-indigo-600';
                    const btnStatusColor = apakahSelesai ? 'bg-amber-500 hover:bg-amber-600' : 'bg-emerald-600 hover:bg-emerald-700';
                    const btnStatusText = apakahSelesai ? 'Belum Selesai' : 'Set Selesai';

                    const deadlineObj = new Date(tugas.tenggat_waktu);
                    const tglFormat = deadlineObj.toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'short' });

                    kontainer.innerHTML += `
                        <div class="p-5 border rounded-2xl flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-all duration-300 ${cardStyle}">
                            <div class="space-y-1">
                                <span class="inline-block text-[10px] font-bold tracking-wider uppercase px-2 py-0.5 rounded-md ${badgeStyle}">
                                    ${tugas.mata_kuliah}
                                </span>
                                <h3 class="font-bold text-base leading-snug ${textStyle}">${tugas.nama_tugas}</h3>
                                <div class="flex items-center space-x-2 text-xs text-slate-400 pt-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    <span class="font-mono">${tglFormat} WIB</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 sm:self-center self-end">
                                <button onclick="ubahStatus(${tugas.id})" class="px-3.5 py-2 text-white text-xs font-semibold rounded-xl transition-all shadow-sm active:scale-95 cursor-pointer ${btnStatusColor}">
                                    ${btnStatusText}
                                </button>
                                <button onclick="hapusTugas(${tugas.id})" class="p-2 bg-slate-100 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all active:scale-95 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </div>
                        </div>
                    `;
                });
            } catch (error) {
                console.error('API Error:', error);
            }
        }

        // 2. ENGINE CREATE DATA 
        document.getElementById('formTugas').addEventListener('submit', async (e) => {
            e.preventDefault();
            const dataInput = {
                nama_tugas: document.getElementById('nama_tugas').value,
                mata_kuliah: document.getElementById('mata_kuliah').value,
                tenggat_waktu: document.getElementById('tenggat_waktu').value
            };
            try {
                const respon = await fetch(API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify(dataInput)
                });
                if (respon.ok) {
                    document.getElementById('formTugas').reset();
                    muatTugas();
                }
            } catch (error) {
                console.error('Simpan gagal:', error);
            }
        });

        // 3. ENGINE UPDATE STATUS DATA
        async function ubahStatus(id) {
            try {
                const respon = await fetch(`${API_URL}/${id}`, {
                    method: 'PUT',
                    headers: { 'Accept': 'application/json' }
                });
                if (respon.ok) muatTugas();
            } catch (error) {
                console.error('Update gagal:', error);
            }
        }

        // 4. ENGINE DELETE DATA
        async function hapusTugas(id) {
            if (confirm('Hapus data tugas dari database Cloud?')) {
                try {
                    const respon = await fetch(`${API_URL}/${id}`, {
                        method: 'DELETE',
                        headers: { 'Accept': 'application/json' }
                    });
                    if (respon.ok) muatTugas();
                } catch (error) {
                    console.error('Hapus gagal:', error);
                }
            }
        }

        window.onload = muatTugas;
    </script>
</body>
</html>